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

// Fetch the request body
$shonubody = file_get_contents("php://input");
$shonupost = json_decode($shonubody, true);

// Handle only POST requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    http_response_code(405);
    echo json_encode($res);
    exit();
}

// Check required parameters
if (isset($shonupost['language'], $shonupost['random'], $shonupost['signature'], $shonupost['timestamp'], $shonupost['pageNo'])) {
    $language = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['language']));
    $random = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['random']));
    $signature = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['signature']));
    $pageNo = max(1, intval($shonupost['pageNo'])); // Ensure pageNo is at least 1

    $shonustr = '{"language":'.$language.',"random":"'.$random.'"}';
    $shonusign = strtoupper(md5($shonustr));
    
    if ($shonusign) {
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

                // Initialize response data
                $data = [
                    'list' => [],    
                    'pageNo' => $pageNo,
                    'totalPage' => 0,
                    'totalCount' => 0,
                ];

                $limit = 5; // Records per page
                $offset = ($pageNo - 1) * $limit;

                // Fetch records with pagination
                $query = "SELECT type, prize,prize, time FROM spinrec WHERE user_id = '$userId' LIMIT $limit OFFSET $offset";
                $result = $conn->query($query);

                if ($result) {
                    // Count total records for pagination
                    $totalCountQuery = "SELECT COUNT(*) as totalCount FROM spinrec WHERE user_id = '$userId'";
                    $totalCountResult = $conn->query($totalCountQuery);
                    $totalCountRow = $totalCountResult->fetch_assoc();
                    $totalCount = $totalCountRow['totalCount'];

                    // If totalCount is greater than 0, process the results
                    if ($totalCount > 0) {
                       while ($row = $result->fetch_assoc()) {
                       $data["\x6c\x69\x73\x74"][] = [
                         "\x72\x6f\x74\x61\x74\x65\x4e\x75\x6d" => -1, 
                         "\x72\x65\x77\x61\x72\x64\x54\x79\x70\x65" => (int)$row['type'],  
                         "\x72\x65\x77\x61\x72\x64\x41\x6d\x6f\x75\x6e\x74" => sprintf('%.2f', (float)$row['prize']), 
                         "\x72\x65\x77\x61\x72\x64\x53\x65\x74\x74\x69\x6e\x67" => "",  
                         "\x64\x72\x61\x77\x54\x69\x6d\x65" => $row['time'] 
                          ];
                         }





                        // Set the totalCount and totalPage
                        $data['totalCount'] = $totalCount;
                        $data['totalPage'] = ceil($totalCount / $limit);
                    }

                    // Update response with data
                    $res['data'] = $data;
                    $res['code'] = 0;
                    $res['msg'] = 'Succeed';
                    $res['msgCode'] = 0;
                } else {
                    // Handle query error
                    $res['code'] = 5;
                    $res['msg'] = 'Error fetching data from the database';
                    $res['msgCode'] = 3;
                    http_response_code(500);
                }
            } else {
                // User does not have permission
                $res['code'] = 4;
                $res['msg'] = 'No operation permission';
                $res['msgCode'] = 2;
                http_response_code(401);
            }                    
        } else {                    
            // JWT token is not valid
            $res['code'] = 4;
            $res['msg'] = 'No operation permission';
            $res['msgCode'] = 2;
            http_response_code(401);                    
        }
    } else {
        // Signature validation failed
        $res['code'] = 5;
        $res['msg'] = 'Wrong signature';
        $res['msgCode'] = 3;
        http_response_code(200);
    }
} else {
    // Invalid parameters
    $res['code'] = 7;
    $res['msg'] = 'Param is Invalid';
    $res['msgCode'] = 6;
    http_response_code(200);
}        

$res['serviceNowTime'] = $shnunc;
echo json_encode($res);
?>
