<?php 
header('Content-Type: application/json; charset=utf-8');
header('Content-Type: application/json; charset=utf-8');
header('Strict-Transport-Security: max-age=31536000');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Access-Control-Allow-Credentials: true');
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
header('Access-Control-Allow-Origin: ' . $origin);
header('Vary: Origin');
date_default_timezone_set("Asia/Kolkata");
$serviceNowTime = date("Y-m-d H:i:s");

$response = [
    'data' => [
        [
            'id' => 5,
            'electronic' => 0.00100,
            'realPerson' => 0.00100,
            'physicalEducation' => 0.00100,
            'lottery' => 0.00100,
            'chess' => 0.00100
        ],
        [
            'id' => 3,
            'electronic' => 0.00100,
            'realPerson' => 0.00100,
            'physicalEducation' => 0.00100,
            'lottery' => 0.00100,
            'chess' => 0.00100
        ],
        [
            'id' => 0,
            'electronic' => 0.00050,
            'realPerson' => 0.00050,
            'physicalEducation' => 0.00050,
            'lottery' => 0.00050,
            'chess' => 0.00050
        ],
        [
            'id' => 4,
            'electronic' => 0.00100,
            'realPerson' => 0.00100,
            'physicalEducation' => 0.00100,
            'lottery' => 0.00100,
            'chess' => 0.00100
        ],
        [
            'id' => 1,
            'electronic' => 0.00050,
            'realPerson' => 0.00050,
            'physicalEducation' => 0.00050,
            'lottery' => 0.00050,
            'chess' => 0.00050
        ],
        [
            'id' => 8,
            'electronic' => 0.00150,
            'realPerson' => 0.00150,
            'physicalEducation' => 0.00150,
            'lottery' => 0.00150,
            'chess' => 0.00150
        ],
        [
            'id' => 6,
            'electronic' => 0.00150,
            'realPerson' => 0.00150,
            'physicalEducation' => 0.00150,
            'lottery' => 0.00150,
            'chess' => 0.00150
        ],
        [
            'id' => 2,
            'electronic' => 0.00050,
            'realPerson' => 0.00050,
            'physicalEducation' => 0.00050,
            'lottery' => 0.00050,
            'chess' => 0.00050
        ],
        [
            'id' => 10,
            'electronic' => 0.00300,
            'realPerson' => 0.00300,
            'physicalEducation' => 0.00300,
            'lottery' => 0.00300,
            'chess' => 0.00300
        ],
        [
            'id' => 7,
            'electronic' => 0.00150,
            'realPerson' => 0.00150,
            'physicalEducation' => 0.00150,
            'lottery' => 0.00150,
            'chess' => 0.00150
        ],
        [
            'id' => 9,
            'electronic' => 0.00200,
            'realPerson' => 0.00200,
            'physicalEducation' => 0.00200,
            'lottery' => 0.00200,
            'chess' => 0.00200
        ]
    ],
    'code' => 0,
    'msg' => 'Succeed',
    'msgCode' => 0,
    'serviceNowTime' => $shnunc,
];

echo json_encode($response, JSON_PRETTY_PRINT);
?>
