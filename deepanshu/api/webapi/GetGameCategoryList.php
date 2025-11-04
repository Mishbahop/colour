<?php
header("Access-Control-Allow-Origin: http://diuvin.shop");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": [
        {
            "id": 1,
            "typeNameCode": 9301,
            "categoryCode": "Lottery",
            "categoryName": "彩票",
            "state": 1,
            "sort": 10,
            "categoryImg": "https://ossimg.jalwa-jalwa.com/Jalwa/gamecategory/gamecategory_202503131718208r77.png"
        },
        {
            "id": 8,
            "typeNameCode": 9308,
            "categoryCode": "Flash",
            "categoryName": "小游戏",
            "state": 1,
            "sort": 9,
            "categoryImg": "https://ossimg.jalwa-jalwa.com/Jalwa/gamecategory/gamecategory_20250313171619xdvp.png"
        },
        {
            "id": 2,
            "typeNameCode": 9302,
            "categoryCode": "Popular",
            "categoryName": "热门游戏",
            "state": 1,
            "sort": 8,
            "categoryImg": "https://ossimg.jalwa-jalwa.com/Jalwa/gamecategory/gamecategory_20250313171546obyl.png"
        },
        {
            "id": 4,
            "typeNameCode": 9304,
            "categoryCode": "Slot",
            "categoryName": "电子游戏",
            "state": 1,
            "sort": 6,
            "categoryImg": "https://ossimg.jalwa-jalwa.com/Jalwa/gamecategory/gamecategory_202503131718274ean.png"
        },
        {
            "id": 3,
            "typeNameCode": 9303,
            "categoryCode": "Fish",
            "categoryName": "捕鱼游戏",
            "state": 1,
            "sort": 5,
            "categoryImg": "https://ossimg.jalwa-jalwa.com/Jalwa/gamecategory/gamecategory_202503131716285jqk.png"
        },
        {
            "id": 7,
            "typeNameCode": 9307,
            "categoryCode": "Chess",
            "categoryName": "棋牌游戏",
            "state": 1,
            "sort": 5,
            "categoryImg": "https://ossimg.jalwa-jalwa.com/Jalwa/gamecategory/gamecategory_202503131717268awj.png"
        },
        {
            "id": 6,
            "typeNameCode": 9306,
            "categoryCode": "Video",
            "categoryName": "视讯游戏",
            "state": 1,
            "sort": 4,
            "categoryImg": "https://ossimg.jalwa-jalwa.com/Jalwa/gamecategory/gamecategory_202503131718032ig4.png"
        },
        {
            "id": 5,
            "typeNameCode": 9305,
            "categoryCode": "Sport",
            "categoryName": "体育游戏",
            "state": 1,
            "sort": 1,
            "categoryImg": "https://ossimg.jalwa-jalwa.com/Jalwa/gamecategory/gamecategory_20250315182024qtyt.png"
        }
    ],
    "code": 0,
    "msg": "Succeed",
    "msgCode": 0,
    "serviceNowTime": "' . $serviceNowTimeFormatted . '"
}';

$data = json_decode($jsonData, true);

$response = json_encode($data, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $response;

?>