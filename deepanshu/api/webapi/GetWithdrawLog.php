<?php
include "../../conn.php";
include "../../functions2.php";

header('Content-Type: application/json; charset=utf-8');
header('Strict-Transport-Security: max-age=31536000');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Access-Control-Allow-Credentials: true');
header('Vary: Origin');

date_default_timezone_set("Asia/Kolkata");
$currentDate = date("Y-m-d H:i:s");
$response = [
    'code' => 11,
    'msg' => 'Method not allowed',
    'msgCode' => 12,
    'serviceNowTime' => $currentDate,
];

$requestBody = file_get_contents("php://input");
$requestData = json_decode($requestBody, true);

function maskSensitiveInfo($string) {
    if (strlen($string) < 10) return $string;
    $start = substr($string, 0, 6);
    $masked = str_repeat('*', 4);
    $end = substr($string, 10);
    return $start . $masked . $end;
}

// Handle OPTIONS request for preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    if (isset($requestData['language'], $requestData['random'], $requestData['signature'], $requestData['timestamp'], $requestData['type'], $requestData['startDate'], $requestData['endDate'], $requestData['pageNo'], $requestData['pageSize'])) {
        
        $language = htmlspecialchars(mysqli_real_escape_string($conn, $requestData['language']));
        $random = htmlspecialchars(mysqli_real_escape_string($conn, $requestData['random']));
        $signature = htmlspecialchars(mysqli_real_escape_string($conn, $requestData['signature']));
        $withdrawid = htmlspecialchars(mysqli_real_escape_string($conn, $requestData['type']));
        $startDate = htmlspecialchars(mysqli_real_escape_string($conn, $requestData['startDate']));
        $endDate = htmlspecialchars(mysqli_real_escape_string($conn, $requestData['endDate']));
        $pageNo = (int)$requestData['pageNo'];
        
        // Sanitize and set default for pageSize with a maximum limit
        $pageSize = isset($requestData['pageSize']) 
            ? (int)htmlspecialchars(mysqli_real_escape_string($conn, $requestData['pageSize'])) 
            : 10;
        $pageSize = min($pageSize, 100);

        $generatedString = '{"language":"' . $language . '","random":"' . $random . '","withdrawid":' . $withdrawid . ',"startDate":"' . $startDate . '","endDate":"' . $endDate . '"}';
        $expectedSignature = strtoupper(md5($generatedString));

        if ($expectedSignature) {
            $token = explode(" ", $_SERVER['HTTP_AUTHORIZATION'])[1] ?? '';
            $isValidJWT = is_jwt_valid($token);
            $authData = json_decode($isValidJWT, true);

            if ($authData['status'] === 'Success') {
                $userId = $authData['payload']['id'];
                $checkQuery = "SELECT akshinak FROM shonu_subjects WHERE akshinak = '$token'";
                $checkResult = $conn->query($checkQuery);

                if (mysqli_num_rows($checkResult) === 1) {
                    try {
                        // Determine the query conditions based on withdrawid
                        $dateCondition = "";
                        if (!empty($startDate) && !empty($endDate)) {
                            $dateCondition = " AND dinankavannuracisi BETWEEN '$startDate' AND '$endDate' ";
                        }

                        $condition = "";
                        if ($withdrawid == 1) {
                            $condition = "AND madari = 1";
                        } elseif ($withdrawid == -1) {
                            $condition = "";
                        } elseif ($withdrawid == 3) {
                            $condition = "AND madari = 3";
                        }

                        // Calculate total count
                        $countQuery = "SELECT COUNT(*) as totalCount FROM hintegedukolli WHERE balakedara = $userId $condition $dateCondition";
                        $countResult = $conn->query($countQuery);
                        $totalCount = $countResult->fetch_assoc()['totalCount'];

                        // Calculate total pages
                        $totalPage = ceil($totalCount / $pageSize);

                        // Set offset for pagination
                        $offset = ($pageNo - 1) * $pageSize;

                        // Main query with LIMIT and OFFSET for pagination
                        $query = "SELECT shonu, motta, remarks, dinankavannuracisi, madari, sthiti, dharavahi FROM hintegedukolli 
                                  WHERE balakedara = $userId $condition $dateCondition 
                                  ORDER BY shonu DESC LIMIT $offset, $pageSize";
                        $result = $conn->query($query);
                        $type = (int)$withdrawRow['madari']; $withdrawalslist[$i]['withdrawName'] = ($type === 1) ? 'BANK CARD' : (($type === 3) ? 'USDT' : 'OTHER');

                        if ($result) {
                            $withdrawalslist = [];
                            $i = 0;
                            while ($withdrawRow = $result->fetch_assoc()) {
                                $withdrawalslist[$i]['withdrawID'] = $withdrawRow['shonu'];
                                $withdrawalslist[$i]['type'] = (int)$withdrawRow['madari'];
                                $withdrawalslist[$i]['withdrawNumber'] = $withdrawRow['dharavahi'];
                                $withdrawalslist[$i]['withdrawName'] = ($withdrawRow['madari'] == 1) ? 'BANK CARD' : (($withdrawRow['madari'] == 3) ? 'USDT' : 'KIDS_OP');
                                $withdrawalslist[$i]['price'] = (int)$withdrawRow['motta'];
                                $withdrawalslist[$i]['addTime'] = $withdrawRow['dinankavannuracisi'];
                                $withdrawalslist[$i]['realityAmount'] = (int)$withdrawRow['motta'];
                                $withdrawalslist[$i]['remark'] = $withdrawRow['remarks'];
                                $withdrawalslist[$i]['state'] = (int)$withdrawRow['sthiti'];
                                $withdrawalslist[$i]['thirdpartyState'] = (int)$withdrawRow['sthiti'];
                                $i++;
                            }

                            $response = [
                                "data" => [
                                    "list" => $withdrawalslist,
                                    "pageNo" => (int)$pageNo,
                                    "totalPage" => (int)$totalPage,
                                    "totalCount" => (int)$totalCount
                                ],
                                "code" => 0,
                                "msg" => "Succeed",
                                "msgCode" => 0,
                                "serviceNowTime" => $currentDate
                            ];
                            http_response_code(200);
                        } else {
                            throw new Exception('Database query failed');
                        }
                    } catch (Exception $e) {
                        $response['code'] = 6;
                        $response['msg'] = $e->getMessage();
                        $response['msgCode'] = 4;
                        http_response_code(500);
                    }
                } else {
                    $response['code'] = 4;
                    $response['msg'] = 'No operation permission';
                    $response['msgCode'] = 2;
                    http_response_code(403);
                }
            } else {
                $response['code'] = 5;
                $response['msg'] = 'Invalid JWT';
                $response['msgCode'] = 3;
                http_response_code(401);
            }
        } else {
            $response['code'] = 7;
            $response['msg'] = 'Invalid signature';
            $response['msgCode'] = 6;
            http_response_code(403);
        }
    } else {
        $response['code'] = 8;
        $response['msg'] = 'Required parameters missing';
        $response['msgCode'] = 7;
        http_response_code(400);
    }
} else {
    http_response_code(405);
    echo json_encode($response);
}

echo json_encode($response);
?>
