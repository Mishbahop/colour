<?php
    include "../../conn.php";

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
                // Reward List
                $data['rewardList'] = [
                    [
                        'rewardType' => 1,
                        'rewardSetting' => "11",
                        'prizePicturesUrl' => "https://mishbahop.github.io/91club/other/turntable_20240820180506i7lf.png"
                    ],
                    [
                        'rewardType' => 1,
                        'rewardSetting' => "31",
                        'prizePicturesUrl' => "https://mishbahop.github.io/91club/other/turntable_20240820180506i7lf.png"
                    ],
                    [
                        'rewardType' => 1,
                        'rewardSetting' => "61",
                        'prizePicturesUrl' => "https://mishbahop.github.io/91club/other/turntable_20240820180506i7lf.png"
                    ],
                    [
                        'rewardType' => 1,
                        'rewardSetting' => "91",
                        'prizePicturesUrl' => "https://mishbahop.github.io/91club/other/turntable_20240820180506i7lf.png"
                    ],
                    [
                        'rewardType' => 1,
                        'rewardSetting' => "131",
                        'prizePicturesUrl' => "https://mishbahop.github.io/91club/other/turntable_20240820180506i7lf.png"
                    ],
                    [
                        'rewardType' => 1,
                        'rewardSetting' => "611",
                        'prizePicturesUrl' => "https://mishbahop.github.io/91club/other/turntable_20240820180506i7lf.png"
                    ],
                    [
                        'rewardType' => 1,
                        'rewardSetting' => "2111",
                        'prizePicturesUrl' => "https://mishbahop.github.io/91club/other/turntable_20240820180506i7lf.png"
                    ],
                    [
                        'rewardType' => 2,
                        'rewardSetting' => "iPhone16 Pro",
                        'prizePicturesUrl' => "https://ossimg.yuk87k786d.com/sikkim/other/turntable_20240912134058ei75.png"
                    ]
                ];

                // Task List
                $data['taskList'] = [
                    [
                        'taskType' => 2,
                        'targetAmount' => 500.00,
                        'rotateNum' => 1
                    ],
                    [
                        'taskType' => 2,
                        'targetAmount' => 1000.00,
                        'rotateNum' => 1
                    ],
                    [
                        'taskType' => 2,
                        'targetAmount' => 2000.00,
                        'rotateNum' => 1
                    ],
                    [
                        'taskType' => 2,
                        'targetAmount' => 5000.00,
                        'rotateNum' => 1
                    ],
                    [
                        'taskType' => 2,
                        'targetAmount' => 10000.00,
                        'rotateNum' => 2
                    ],
                    [
                        'taskType' => 2,
                        'targetAmount' => 50000.00,
                        'rotateNum' => 2
                    ],
                    [
                        'taskType' => 2,
                        'targetAmount' => 100000.00,
                        'rotateNum' => 3
                    ]
                ];

                $data['vipRating'] = "0,1,2,3,4,5,6,7,8,9,10";
                $data['memberGroup'] = "-1,0,1";
                $data['bindingType'] = 1;

                $res['data'] = $data;
                $res['code'] = 0;
                $res['msg'] = 'Succeed';
                $res['msgCode'] = 0;
                http_response_code(200);
                echo json_encode($res);
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
