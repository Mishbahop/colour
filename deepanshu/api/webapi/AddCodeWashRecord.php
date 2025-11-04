<?php 
include "../../conn.php";
include "../../functions2.php";

header('Content-Type: application/json; charset=utf-8');
header('Strict-Transport-Security: max-age=31536000');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Access-Control-Allow-Credentials: true');
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
header('Access-Control-Allow-Origin: ' . $origin);
header('Vary: Origin');

date_default_timezone_set("Asia/Kolkata");
$shnunc = date("Y-m-d H:i:s");
$res = [
    'code' => 11,
    'msg' => 'Method not allowed',
    'msgCode' => 12,
    'serviceNowTime' => $shnunc,
];

$shonubody = file_get_contents("php://input");
$shonupost = json_decode($shonubody, true);

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    if (isset($shonupost['language'], $shonupost['random'], $shonupost['signature'], $shonupost['timestamp'])) {
        $language = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['language']));
        $random = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['random']));
        $signature = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['signature']));
        
        $shonustr = '{"language":'.$language.',"random":"'.$random.'"}';
        $shonusign = strtoupper(md5($shonustr));
        
        if ($shonusign) {
            $bearer = explode(" ", $_SERVER['HTTP_AUTHORIZATION']);
            $author = $bearer[1];                
            $is_jwt_valid = is_jwt_valid($author);
            $data_auth = json_decode($is_jwt_valid, true);
            if ($data_auth['status']) {
                $sesquery = "SELECT id, akshinak FROM shonu_subjects WHERE akshinak = '$author'";
                $sesresult = $conn->query($sesquery);
                $sesnum = mysqli_num_rows($sesresult);
                
                if ($sesnum == 1) {
                    $sesresult = $sesresult->fetch_assoc();
                    $userId = $sesresult['id'];

                    // Fetch the level from the VIP table
                    $lvlquery = "SELECT lvl FROM vip WHERE userid = '$userId'";
                    $lvlresult = $conn->query($lvlquery);
                    $lvldata = $lvlresult->fetch_assoc();
                    $lvl = $lvldata['lvl'];

                    // Determine wash rate based on level
                    $washRate = null;
                    if (in_array($lvl, [0,1, 2])) {
                        $washRate = 0.05;
                    } elseif (in_array($lvl, [3, 4, 5])) {
                        $washRate = 0.1;
                    } elseif (in_array($lvl, [6, 7, 8])) {
                        $washRate = 0.15;
                    } elseif ($lvl == 9) {
                        $washRate = 0.2;
                    } elseif ($lvl == 10) {
                        $washRate = 0.3;
                    }

                    // Fetch the rebated amount
                    $reamountq = "SELECT rebet, motta FROM shonu_kaichila WHERE balakedara = '$userId'";
                    $reamount = $conn->query($reamountq);
                    $rc = $reamount->fetch_assoc();
                    $rebet = $rc['rebet'];
                    $motta = $rc['motta'];

                    // Calculate the new motta
                    $calculatedMotta = ($rebet / 100) * $washRate;
                    $newMotta = $motta + $calculatedMotta;

                    // Update motta and set rebet to 0
                    $updateQuery = "UPDATE shonu_kaichila SET motta = '$newMotta', rebet = 0 WHERE balakedara = '$userId'";
                    $conn->query($updateQuery);


                   if ($rebet > 0) {
    
                   $insertVyavahara = "INSERT INTO rebetrec (user_id, rebet, lvl, motta, rate, created_at) 
                    VALUES ('$userId', '$rebet', 'LVLCOMM$lvl', '$calculatedMotta', '$washRate', '$shnunc')";
                   $conn->query($insertVyavahara);

                      }

                    // Prepare the response
                    $res['data'] = [
                        'rebateAmount' => (int)$calculatedMotta
                    ];
                    $res['code'] = 0;
                    $res['msg'] = 'Succeed';
                    $res['msgCode'] = 0;
                    $res['serviceNowTime'] = $shnunc;

                    http_response_code(200);
                    echo json_encode($res);
                } else {
                    // Existing response structure
                    $res['data'] = [
                        'msgCode' => 904,
                        'bindingType' => 1,
                        'rewardType' => null,
                        'rewardSetting' => "",
                        'sumRotateNum' => 0,
                        'surplusRotateNum' => 0,
                    ];
                    $res['code'] = 1;
                    $res['msg'] = 'no user fetch';
                    $res['msgCode'] = 904;
                    $res['serviceNowTime'] = $shnunc;

                    http_response_code(200);
                    echo json_encode($res);
                }
            } else {                    
                $res['code'] = 4;
                $res['msg'] = 'No operation permission';
                $res['msgCode'] = 2;
                http_response_code(401);
                echo json_encode($res);                    
            }
        } else {
            $res['code'] = 5;
            $res['msg'] = 'Wrong signature';
            $res['msgCode'] = 3;
            http_response_code(200);
            echo json_encode($res);                
        }
    } else {
        $res['code'] = 7;
        $res['msg'] = 'Param is Invalid';
        $res['msgCode'] = 6;
        http_response_code(200);
        echo json_encode($res);            
    }        
} else {        
    http_response_code(405);
    echo json_encode($res);
}
?>
