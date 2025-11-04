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
        
        if ($shonusign == $signature) {
            $bearer = explode(" ", $_SERVER['HTTP_AUTHORIZATION']);
            $author = $bearer[1];                
            $is_jwt_valid = is_jwt_valid($author);
            $data_auth = json_decode($is_jwt_valid, true);
            
            if ($data_auth['status'] === 'Success') {
                $sesquery = "SELECT id, akshinak FROM shonu_subjects WHERE akshinak = '$author'";
                $sesresult = $conn->query($sesquery);
                $sesnum = mysqli_num_rows($sesresult);
                
                if ($sesnum == 1) {
                    $sesresult = $sesresult->fetch_assoc();
                    $userId = $sesresult['id'];

                    // Query to calculate the total amount (motta) where sthiti = 1
                    $bankLinkQuery = "
                       SELECT SUM(motta) as totalMotta 
                       FROM thevani 
                       WHERE balakedara = '$userId' 
                       AND sthiti = 1 
                       AND dinankavannuracisi >= CURDATE()";
                    $bankLinkResult = $conn->query($bankLinkQuery);

                    
                    if ($bankLinkResult) {
                        $totalMottaRow = $bankLinkResult->fetch_assoc();
                        $totalMotta = $totalMottaRow['totalMotta'] ?? 0.0; // Default to 0.0 if no records found
                        
                        // Determine sumRotateNum based on totalMotta
                        if ($totalMotta >= 100000) {
                            $sumRotateNum = 11;
                        } elseif ($totalMotta >= 50000) {
                            $sumRotateNum = 8;
                        } elseif ($totalMotta >= 10000) {
                            $sumRotateNum = 6;
                        } elseif ($totalMotta >= 5000) {
                            $sumRotateNum = 4;
                        } elseif ($totalMotta >= 2000) {
                            $sumRotateNum = 3;
                        } elseif ($totalMotta >= 1000) {
                            $sumRotateNum = 2;
                        } elseif ($totalMotta >= 500) {
                            $sumRotateNum = 1;
                        } else {
                            $sumRotateNum = 0;
                        }

                        // Query to fetch surplusRotateNum from shonu_kaichila table based on userId
                        $surplusRotateQuery = "SELECT spin FROM shonu_kaichila WHERE balakedara = '$userId'";
                        $surplusRotateResult = $conn->query($surplusRotateQuery);

                        $surplusRotateNum = 0; // Default value if no record is found
                        if ($surplusRotateResult && $surplusRotateResult->num_rows > 0) {
                            $surplusRotateRow = $surplusRotateResult->fetch_assoc();
                            $surplusRotateNum = (int)$surplusRotateRow['spin'];
                        }

                        $res = [
                            "data" => [
                                "userId" => $userId,
                                "date" => $shnunc,
                                "sumRotateNum" => $sumRotateNum,
                                "surplusRotateNum" => $surplusRotateNum,
                            ],
                            "code" => 0,
                            "msg" => "Succeed",
                            "msgCode" => 0,
                            "serviceNowTime" => $shnunc
                        ];

                        http_response_code(200);
                        echo json_encode($res);
                    } else {
                        $res['code'] = 5;
                        $res['msg'] = 'Error fetching data from the database';
                        $res['msgCode'] = 3;
                        http_response_code(500);
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
