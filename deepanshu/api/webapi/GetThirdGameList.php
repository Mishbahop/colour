<?php
header("Access-Control-Allow-Origin: http://diuvin.shop");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "gameCustomTypeLists": [],
        "gameLists": [
            {
                "gameID": "903",
                "gameNameEn": "DragonTiger",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/903_20250210111422071.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "800",
                "gameNameEn": "Aviator",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/800_20250210113151122.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "810",
                "gameNameEn": "Cricket",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/810_20250210113250708.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "501",
                "gameNameEn": "Treasure Wave",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/501_20250210111454539.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "500",
                "gameNameEn": "Bomb Wave",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/500_20250210111515519.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "811",
                "gameNameEn": "Mines Pro",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/811_20250210111531137.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "801",
                "gameNameEn": "Aviator-1Min",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/801_20250210111620851.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "110",
                "gameNameEn": "Limbo",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/110_20250210111637635.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "101",
                "gameNameEn": "Hilo",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/101_20250210111652965.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "102",
                "gameNameEn": "Dice",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/102_20250210111705541.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "100",
                "gameNameEn": "Mines",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/100.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "107",
                "gameNameEn": "Hotline",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/107.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "502",
                "gameNameEn": "Goal Wave",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/502_20250210111723255.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "119",
                "gameNameEn": "Treasure",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/119_20250210111739604.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "118",
                "gameNameEn": "DrawPoker",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/118_20250210111753896.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "115",
                "gameNameEn": "TeenPatti",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/115_20250210111808132.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "114",
                "gameNameEn": "HorseRacing",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/114_20250210111823763.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "113",
                "gameNameEn": "Pharaoh",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/113_20250210111843895.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "112",
                "gameNameEn": "Triple",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/112_20250210111856804.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "111",
                "gameNameEn": "Cryptos",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/111_20250210111910188.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "108",
                "gameNameEn": "SpaceDice",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/108_20250210111925043.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "106",
                "gameNameEn": "Keno",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/106.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "105",
                "gameNameEn": "Goal",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/105_20250210113618898.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "104",
                "gameNameEn": "Mini Roulette",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/104_20250210111939890.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "103",
                "gameNameEn": "Plinko",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/103_20250210111953841.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "900",
                "gameNameEn": "Keno80",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/900_20250210112011401.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            },
            {
                "gameID": "109",
                "gameNameEn": "Coinflip",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/109_20250210112028682.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": null,
                "customGameType": 0
            }
        ]
    },
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