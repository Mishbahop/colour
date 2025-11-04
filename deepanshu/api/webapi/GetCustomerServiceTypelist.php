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
$current_time = date("Y-m-d H:i:s");

$response = [
    'code' => 11,
    'msg' => 'Method not allowed',
    'msgCode' => 12,
    'serviceNowTime' => $current_time,
];

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $request_body = file_get_contents("php://input");
    $request_data = json_decode($request_body, true);

    if (isset($request_data['language'], $request_data['random'], $request_data['signature'], $request_data['timestamp'])) {
        $language = htmlspecialchars(mysqli_real_escape_string($conn, $request_data['language']));
        $random = htmlspecialchars(mysqli_real_escape_string($conn, $request_data['random']));
        $signature = htmlspecialchars(mysqli_real_escape_string($conn, $request_data['signature']));

        $data_string = '{"language":"' . $language . '","random":"' . $random . '"}';
        $calculated_signature = strtoupper(md5($data_string));

        if ($signature) {
            $data = [
                [
                    'typeID' => 3,
                    'typeName' => 'LiveChat',
                ]
            ];

            $response = [
                'code' => 0,
                'msg' => 'Succeed',
                'msgCode' => 0,
                'serviceNowTime' => $current_time,
                'data' => $data,
            ];
            http_response_code(200);
        } else {
            $response = [
                'code' => 5,
                'msg' => 'Wrong signature',
                'msgCode' => 3,
                'serviceNowTime' => $current_time,
            ];
            http_response_code(200);
        }
    } else {
        $response = [
            'code' => 7,
            'msg' => 'Param is Invalid',
            'msgCode' => 6,
            'serviceNowTime' => $current_time,
        ];
        http_response_code(200);
    }
} else {
    http_response_code(405);
}

echo json_encode($response);
?>
