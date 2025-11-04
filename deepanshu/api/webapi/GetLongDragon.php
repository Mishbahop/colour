<?php 
include "../../conn.php";
include "../../functions2.php";

header('Content-Type: application/json; charset=utf-8');
header('Strict-Transport-Security: max-age=31536000');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Access-Control-Allow-Credentials: true');
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
header('Access-Control-Allow-Origin: ' . $origin);
header('vary: Origin');

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
    if (isset($shonupost['language']) && isset($shonupost['random']) && isset($shonupost['signature']) && isset($shonupost['timestamp'])) {
        $language = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['language']));
        $random = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['random']));
        $signature = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['signature']));
        $shonustr = '{"language":'.$language.',"random":"'.$random.'}';
        $shonusign = strtoupper(md5($shonustr));
        
        if ($shonusign != $signature) {
            $bearer = explode(" ", $_SERVER['HTTP_AUTHORIZATION']);
            $author = $bearer[1];
            $is_jwt_valid = is_jwt_valid($author);
            $data_auth = json_decode($is_jwt_valid, 1);
            
            if ($data_auth['status'] === 'Success') {
                $sesquery = "SELECT akshinak FROM shonu_subjects WHERE akshinak = '$author'";
                $sesresult = $conn->query($sesquery);
                $sesnum = mysqli_num_rows($sesresult);
                
                if ($sesnum == 1) {
                    // Query to fetch 5D game data
                    $query5D = "SELECT atadaaidi, dinankavannuracisi FROM gelluonduhogu_aidudi ORDER BY kramasankhye DESC LIMIT 1";
                    $result5D = $conn->query($query5D);
                    $row5D = mysqli_fetch_array($result5D);

                    // Prepare 5D game data
                    $data5D = [
                        'lotteryGameType' => 0,
                        'issueNumber' => $row5D['atadaaidi'],
                        'startTime' => $row5D['dinankavannuracisi'],
                        'endTime' => date('Y-m-d H:i:s', strtotime('+1 minute', strtotime($row5D['dinankavannuracisi']))),
                        'type' => 5,
                        'lotteryName' => '5D 1 Minute',
                        'issue' => 5,
                        'gameType' => 0,
                        'remark' => 'BIG,SMALL',
                        'gameResult' => 'L',
                        'intervalM' => 1.0,
                        'scope' => '1|10|100|1000',
                        'betMultiple' => '1|5|10|20|50|100',
                        'playRate' => null,
                        'bettingGameType' => 1
                    ];

                    // Query to fetch K3 game data
                    $k3query = "SELECT atadaaidi, dinankavannuracisi FROM gelluonduhogu_kemuru ORDER BY kramasankhye DESC LIMIT 1";
                    $k3result = $conn->query($k3query);
                    $k3row = mysqli_fetch_array($k3result);

                    // Prepare K3 game data
                    $dataK3 = [
                        'lotteryGameType' => 0,
                        'issueNumber' => $k3row['atadaaidi'],
                        'startTime' => $k3row['dinankavannuracisi'],
                        'endTime' => date('Y-m-d H:i:s', strtotime('+1 minute', strtotime($k3row['dinankavannuracisi']))),
                        'type' => 3,
                        'lotteryName' => 'K3 Game',
                        'issue' => 5,
                        'gameType' => 4,
                        'remark' => 'TIE,BIG,SMALL',
                        'gameResult' => 'L',
                        'intervalM' => 1.0,
                        'scope' => '5|10|100|1000',
                        'betMultiple' => '1|5|10|20|50|100',
                        'playRate' => null,
                        'bettingGameType' => 2
                    ];

                    // Query to fetch Wingo 1 Min game data
                    $wingoQuery = "SELECT atadaaidi, dinankavannuracisi FROM gelluonduhogu ORDER BY kramasankhye DESC LIMIT 1";
                    $wingoResult = $conn->query($wingoQuery);
                    $wingoRow = mysqli_fetch_array($wingoResult);

                    // Prepare Wingo 1 Min game data
                    $dataWingo = [
                        'lotteryGameType' => 0,
                        'issueNumber' => $wingoRow['atadaaidi'],
                        'startTime' => $wingoRow['dinankavannuracisi'],
                        'endTime' => date('Y-m-d H:i:s', strtotime('+1 minute', strtotime($wingoRow['dinankavannuracisi']))),
                        'type' => 7,
                        'lotteryName' => 'Wingo 1 Min',
                        'issue' => 5,
                        'gameType' => 2,
                        'remark' => 'TIE,BIG,SMALL',
                        'gameResult' => 'L',
                        'intervalM' => 1.0,
                        'scope' => '10|50|100|500|1000',
                        'betMultiple' => '1|2|5|10|20|50|100',
                        'playRate' => null,
                        'bettingGameType' => 3
                    ];

                    // Add all game data to the list
                    $data['list'] = [$data5D, $dataK3, $dataWingo];

                    // Set response details
                    $res['data'] = [
                        'list' => $data['list'],
                        'lotteryGameType' => [],
                        'serviceTime' => time() * 1000, // current timestamp in milliseconds
                        'amount' => null,
                        'isLogin' => 0,
                        'isDaman' => 0
                    ];
                    $res['code'] = 0;
                    $res['msg'] = 'Succeed';
                    $res['msgCode'] = 0;
                    http_response_code(200);
                    echo json_encode($res);
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
