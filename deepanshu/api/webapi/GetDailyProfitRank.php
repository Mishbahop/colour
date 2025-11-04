<?php 
	include "../../conn.php";

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
			$shonustr = '{"language":'.$language.',"random":"'.$random.'"}';
			$shonusign = strtoupper(md5($shonustr));
			if($shonusign == $signature){
				http_response_code(200);
				echo '{
    "data": {
        "dataList": [
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "18",
                "nickName": "MemberDXCHNYJR",
                "betAmount": 41.00,
                "amount": 80.36,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "14",
                "nickName": "MemberOIGOVULF",
                "betAmount": 100.00,
                "amount": 196.00,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "18",
                "nickName": "MemberHKVWWAPP",
                "betAmount": 50.00,
                "amount": 98.00,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "4",
                "nickName": "MemberNXJQHODY",
                "betAmount": 10.00,
                "amount": 19.60,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "5",
                "nickName": "MemberQILSXMSS",
                "betAmount": 10.00,
                "amount": 19.60,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "18",
                "nickName": "MemberXZWXYERV",
                "betAmount": 20.00,
                "amount": 39.20,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "10",
                "nickName": "MemberKBIXLMYD",
                "betAmount": 1000.00,
                "amount": 1960.00,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "1",
                "nickName": "MemberDQLMWPFV",
                "betAmount": 500.00,
                "amount": 980.00,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "11",
                "nickName": "MemberOFDDETAW",
                "betAmount": 10.00,
                "amount": 88.20,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "3",
                "nickName": "MemberBGLFAKAH",
                "betAmount": 50.00,
                "amount": 98.00,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "10",
                "nickName": "MemberEKNLLOMB",
                "betAmount": 30.00,
                "amount": 58.80,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "8",
                "nickName": "MemberOYAOREVF",
                "betAmount": 10.00,
                "amount": 19.60,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "18",
                "nickName": "MemberENALYGZZ",
                "betAmount": 300.00,
                "amount": 588.00,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "18",
                "nickName": "MemberQODOJXBT",
                "betAmount": 50.00,
                "amount": 98.00,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "17",
                "nickName": "MemberAOTTLOYW",
                "betAmount": 8.00,
                "amount": 15.68,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "6",
                "nickName": "MemberQNOSDHDO",
                "betAmount": 1000.00,
                "amount": 1960.00,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "18",
                "nickName": "MemberXXODMRBI",
                "betAmount": 25.00,
                "amount": 49.00,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "8",
                "nickName": "MemberODOSEUJU",
                "betAmount": 8.00,
                "amount": 15.68,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "1",
                "nickName": "MemberJLULLOIY",
                "betAmount": 20.00,
                "amount": 39.20,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "30",
                "typeName": "WinGo_30Sec",
                "userPhoto": "14",
                "nickName": "MemberBNGQIKCA",
                "betAmount": 100.00,
                "amount": 196.00,
                "winTime": "2025-02-18 14:22:27",
                "showType": 11,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202502101011154e3a.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "12",
                "nickName": "MemberHNSAJFNW",
                "betAmount": 10.00,
                "amount": 11.00,
                "winTime": "2025-02-18 14:22:23",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "5",
                "nickName": "MemberDJYRJLEF",
                "betAmount": 10.00,
                "amount": 40.00,
                "winTime": "2025-02-18 14:22:23",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "12",
                "nickName": "MemberVPOBGJAX",
                "betAmount": 10.00,
                "amount": 15.31,
                "winTime": "2025-02-18 14:22:23",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "13",
                "nickName": "MemberNWFWGGMF",
                "betAmount": 10.00,
                "amount": 31.65,
                "winTime": "2025-02-18 14:22:22",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "18",
                "nickName": "MemberMSAWZNHP",
                "betAmount": 50.00,
                "amount": 157.62,
                "winTime": "2025-02-18 14:22:22",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "11",
                "nickName": "MemberTHTQLJTH",
                "betAmount": 10.00,
                "amount": 22.99,
                "winTime": "2025-02-18 14:22:22",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "1",
                "nickName": "MemberNUSYZXXV",
                "betAmount": 20.00,
                "amount": 69.28,
                "winTime": "2025-02-18 14:22:22",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "12",
                "nickName": "MemberPWDULCCH",
                "betAmount": 500.00,
                "amount": 850.87,
                "winTime": "2025-02-18 14:22:22",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "11",
                "nickName": "MemberDBTQXJCJ",
                "betAmount": 10.00,
                "amount": 10.10,
                "winTime": "2025-02-18 14:22:21",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "13",
                "nickName": "MemberYGTVQQXM",
                "betAmount": 10.00,
                "amount": 10.10,
                "winTime": "2025-02-18 14:22:21",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "15",
                "nickName": "MemberUOZNZDAO",
                "betAmount": 10.00,
                "amount": 11.00,
                "winTime": "2025-02-18 14:22:21",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "9",
                "nickName": "MemberPWDNXMXW",
                "betAmount": 20.00,
                "amount": 100.00,
                "winTime": "2025-02-18 14:22:20",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "19",
                "nickName": "MemberGCUIRQGC",
                "betAmount": 10.00,
                "amount": 10.10,
                "winTime": "2025-02-18 14:22:20",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "6",
                "nickName": "MemberRUHDDDOU",
                "betAmount": 50.00,
                "amount": 100.00,
                "winTime": "2025-02-18 14:22:20",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "7",
                "nickName": "MemberKCKBWRFQ",
                "betAmount": 10.00,
                "amount": 10.10,
                "winTime": "2025-02-18 14:22:20",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "1",
                "nickName": "MemberKDIKXMQZ",
                "betAmount": 20.00,
                "amount": 26.20,
                "winTime": "2025-02-18 14:22:20",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "8",
                "nickName": "MemberRDVKNEQS",
                "betAmount": 10.00,
                "amount": 15.00,
                "winTime": "2025-02-18 14:22:18",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "17",
                "nickName": "MemberZJEUMZUN",
                "betAmount": 10.00,
                "amount": 12.00,
                "winTime": "2025-02-18 14:22:18",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "17",
                "nickName": "MemberUHXCUKHW",
                "betAmount": 10.00,
                "amount": 27.71,
                "winTime": "2025-02-18 14:22:18",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "TB_Chess",
                "typeName": "TB_Chess",
                "userPhoto": "8",
                "nickName": "MemberNAKFUTYM",
                "betAmount": 10.00,
                "amount": 11.00,
                "winTime": "2025-02-18 14:22:17",
                "showType": 6,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165549td48.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "1",
                "nickName": "MemberEUEZZQYV",
                "betAmount": 19.60,
                "amount": 39.20,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "19",
                "nickName": "MemberUVEETWDT",
                "betAmount": 19.60,
                "amount": 39.20,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "1",
                "nickName": "MemberNEXWHWFU",
                "betAmount": 980.00,
                "amount": 1960.00,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "12",
                "nickName": "MemberCREEKLZD",
                "betAmount": 4900.00,
                "amount": 9800.00,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "7",
                "nickName": "MemberRLNGGANT",
                "betAmount": 980.00,
                "amount": 3763.20,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "3",
                "nickName": "MemberOMXIZFIS",
                "betAmount": 9.80,
                "amount": 19.60,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "9",
                "nickName": "MemberFXHNYUYJ",
                "betAmount": 294.00,
                "amount": 588.00,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "3",
                "nickName": "MemberLAEKNUBB",
                "betAmount": 23.52,
                "amount": 47.04,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "16",
                "nickName": "MemberOLVWFSUN",
                "betAmount": 19.60,
                "amount": 75.26,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "5",
                "nickName": "MemberFQLVLXBM",
                "betAmount": 29.40,
                "amount": 58.80,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "13",
                "nickName": "MemberNFSNEPTJ",
                "betAmount": 8.82,
                "amount": 17.64,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "11",
                "nickName": "MemberZJYISDDG",
                "betAmount": 98.00,
                "amount": 196.00,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "15",
                "nickName": "MemberIMQJCFRJ",
                "betAmount": 49.00,
                "amount": 98.00,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "19",
                "nickName": "MemberJYTYNNUB",
                "betAmount": 9.80,
                "amount": 75.26,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "7",
                "nickName": "MemberSWJQRMGX",
                "betAmount": 9.80,
                "amount": 19.60,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "18",
                "nickName": "MemberRBMQUVZX",
                "betAmount": 120.54,
                "amount": 241.08,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "6",
                "nickName": "MemberMADAJGCO",
                "betAmount": 19.60,
                "amount": 39.20,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "19",
                "nickName": "MemberYPCPYKYU",
                "betAmount": 9.80,
                "amount": 19.60,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "14",
                "nickName": "MemberIVKANXVR",
                "betAmount": 98.00,
                "amount": 196.00,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "9",
                "typeName": "K3_1min",
                "userPhoto": "18",
                "nickName": "MemberSNAMUXKW",
                "betAmount": 29.40,
                "amount": 75.26,
                "winTime": "2025-02-18 14:21:57",
                "showType": 9,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101053ntrf.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "19",
                "nickName": "MemberPYLLMBNZ",
                "betAmount": 50.00,
                "amount": 97.02,
                "winTime": "2025-02-18 14:21:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "11",
                "nickName": "MemberHDGHPWTY",
                "betAmount": 19.60,
                "amount": 39.20,
                "winTime": "2025-02-18 14:21:56",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "7",
                "nickName": "MemberWLQYKISO",
                "betAmount": 49.00,
                "amount": 98.00,
                "winTime": "2025-02-18 14:21:56",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "3",
                "nickName": "MemberEEQGGKGH",
                "betAmount": 9.80,
                "amount": 19.60,
                "winTime": "2025-02-18 14:21:56",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "10",
                "nickName": "MemberISIMMQFV",
                "betAmount": 49.00,
                "amount": 98.00,
                "winTime": "2025-02-18 14:21:56",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "19",
                "nickName": "MemberGWQTHOBY",
                "betAmount": 49.00,
                "amount": 98.00,
                "winTime": "2025-02-18 14:21:56",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "3",
                "nickName": "MemberQFPGLVRP",
                "betAmount": 49.00,
                "amount": 98.00,
                "winTime": "2025-02-18 14:21:56",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "8",
                "nickName": "MemberZYJJPJDY",
                "betAmount": 5.88,
                "amount": 11.76,
                "winTime": "2025-02-18 14:21:56",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "14",
                "nickName": "MemberKTDMXSDH",
                "betAmount": 9.80,
                "amount": 88.20,
                "winTime": "2025-02-18 14:21:56",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "8",
                "nickName": "MemberZRRZUWCX",
                "betAmount": 44.10,
                "amount": 88.20,
                "winTime": "2025-02-18 14:21:56",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "6",
                "nickName": "MemberGARNGYVH",
                "betAmount": 68.60,
                "amount": 137.20,
                "winTime": "2025-02-18 14:21:56",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "3",
                "nickName": "MemberBRDGSOKJ",
                "betAmount": 147.00,
                "amount": 294.00,
                "winTime": "2025-02-18 14:21:56",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "19",
                "nickName": "MemberWOLOYBQW",
                "betAmount": 19.60,
                "amount": 39.20,
                "winTime": "2025-02-18 14:21:56",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "18",
                "nickName": "MemberFEWLGCOA",
                "betAmount": 9.80,
                "amount": 19.60,
                "winTime": "2025-02-18 14:21:08",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "7",
                "nickName": "MemberMIJCIOJK",
                "betAmount": 49.00,
                "amount": 98.00,
                "winTime": "2025-02-18 14:21:08",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "13",
                "nickName": "MemberQPQGNOQY",
                "betAmount": 7.00,
                "amount": 13.58,
                "winTime": "2025-02-18 14:21:08",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "6",
                "typeName": "D5_3min",
                "userPhoto": "7",
                "nickName": "MemberWKIZUFBB",
                "betAmount": 2.00,
                "amount": 17.64,
                "winTime": "2025-02-18 14:21:08",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "5",
                "nickName": "MemberARQNNBLA",
                "betAmount": 196.00,
                "amount": 392.00,
                "winTime": "2025-02-18 14:21:08",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "13",
                "nickName": "MemberNUBHZJCK",
                "betAmount": 9.80,
                "amount": 19.60,
                "winTime": "2025-02-18 14:21:08",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "1",
                "nickName": "MemberGIZHICMA",
                "betAmount": 147.00,
                "amount": 294.00,
                "winTime": "2025-02-18 14:21:08",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "17",
                "nickName": "MemberRHPBASDM",
                "betAmount": 20.00,
                "amount": 38.81,
                "winTime": "2025-02-18 14:21:08",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "13",
                "nickName": "MemberGNFUZMLL",
                "betAmount": 19.60,
                "amount": 39.20,
                "winTime": "2025-02-18 14:21:08",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "4",
                "nickName": "MemberWSCSQGQQ",
                "betAmount": 49.00,
                "amount": 98.00,
                "winTime": "2025-02-18 14:21:08",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "13",
                "typeName": "TrxWin_1min",
                "userPhoto": "1",
                "nickName": "MemberOBEEDSCL",
                "betAmount": 58.80,
                "amount": 117.60,
                "winTime": "2025-02-18 14:21:08",
                "showType": 8,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101104jtse.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "17",
                "nickName": "MemberZUHVPTEQ",
                "betAmount": 200.00,
                "amount": 388.08,
                "winTime": "2025-02-18 14:21:08",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "15",
                "nickName": "MemberMMCCLBRZ",
                "betAmount": 10.00,
                "amount": 88.20,
                "winTime": "2025-02-18 14:20:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "4",
                "nickName": "MemberRLJINMPB",
                "betAmount": 10.00,
                "amount": 16.00,
                "winTime": "2025-02-18 14:20:30",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "1",
                "nickName": "MemberCRYGWYKD",
                "betAmount": 2.00,
                "amount": 14.40,
                "winTime": "2025-02-18 14:20:30",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "17",
                "nickName": "MemberHYYFWDTE",
                "betAmount": 5.00,
                "amount": 15.00,
                "winTime": "2025-02-18 14:20:30",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "6",
                "nickName": "MemberXICSTIAE",
                "betAmount": 8.00,
                "amount": 76.80,
                "winTime": "2025-02-18 14:20:30",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "1",
                "nickName": "MemberOVPPVHXR",
                "betAmount": 2.00,
                "amount": 12.00,
                "winTime": "2025-02-18 14:20:30",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "1",
                "nickName": "MemberNLJOYOMV",
                "betAmount": 20.00,
                "amount": 100.00,
                "winTime": "2025-02-18 14:20:30",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "10",
                "nickName": "MemberQJRXGPQM",
                "betAmount": 10.00,
                "amount": 11.00,
                "winTime": "2025-02-18 14:20:29",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "16",
                "nickName": "MemberZZERWXOG",
                "betAmount": 5.00,
                "amount": 15.00,
                "winTime": "2025-02-18 14:20:29",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "18",
                "nickName": "MemberRHUWHMUI",
                "betAmount": 50.00,
                "amount": 50.00,
                "winTime": "2025-02-18 14:20:29",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "3",
                "nickName": "MemberEUKWIHLH",
                "betAmount": 2.00,
                "amount": 21.60,
                "winTime": "2025-02-18 14:20:29",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "18",
                "nickName": "MemberKRGBTXBT",
                "betAmount": 1.00,
                "amount": 22.00,
                "winTime": "2025-02-18 14:20:29",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "7",
                "nickName": "MemberRPDQIUPW",
                "betAmount": 100.00,
                "amount": 40.00,
                "winTime": "2025-02-18 14:20:29",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "12",
                "nickName": "MemberDNUXDMQO",
                "betAmount": 3.00,
                "amount": 15.40,
                "winTime": "2025-02-18 14:20:29",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "G9",
                "typeName": "G9",
                "userPhoto": "19",
                "nickName": "MemberGPOWSQKS",
                "betAmount": 10.00,
                "amount": 60.00,
                "winTime": "2025-02-18 14:20:29",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101325vpri.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "8",
                "nickName": "MemberSEFGLOUV",
                "betAmount": 24.00,
                "amount": 14.00,
                "winTime": "2025-02-18 14:20:29",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "2",
                "nickName": "MemberVEFJKJGE",
                "betAmount": 53.40,
                "amount": 62.10,
                "winTime": "2025-02-18 14:20:29",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "9",
                "nickName": "MemberMXZTGVKQ",
                "betAmount": 90.00,
                "amount": 48.00,
                "winTime": "2025-02-18 14:20:29",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "11",
                "nickName": "MemberOQSPVFAZ",
                "betAmount": 1.00,
                "amount": 16.00,
                "winTime": "2025-02-18 14:20:29",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "6",
                "nickName": "MemberYKKROJEM",
                "betAmount": 12.60,
                "amount": 23.50,
                "winTime": "2025-02-18 14:20:29",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "19",
                "nickName": "MemberRXETXITF",
                "betAmount": 13.40,
                "amount": 162.00,
                "winTime": "2025-02-18 14:20:29",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "14",
                "nickName": "MemberNVAODRKP",
                "betAmount": 140.00,
                "amount": 200.00,
                "winTime": "2025-02-18 14:20:29",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "8",
                "nickName": "MemberMCFUAPPB",
                "betAmount": 8.00,
                "amount": 24.00,
                "winTime": "2025-02-18 14:20:28",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "18",
                "nickName": "MemberLVRMAZUO",
                "betAmount": 1.00,
                "amount": 16.50,
                "winTime": "2025-02-18 14:20:28",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "17",
                "nickName": "MemberGTYPAZDT",
                "betAmount": 5.00,
                "amount": 24.00,
                "winTime": "2025-02-18 14:20:28",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "9",
                "nickName": "MemberTJFJUZLM",
                "betAmount": 2.00,
                "amount": 16.00,
                "winTime": "2025-02-18 14:20:28",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "3",
                "nickName": "MemberWUKKUEEQ",
                "betAmount": 30.00,
                "amount": 35.00,
                "winTime": "2025-02-18 14:20:28",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "7",
                "nickName": "MemberKORJCZUW",
                "betAmount": 70.00,
                "amount": 65.00,
                "winTime": "2025-02-18 14:20:28",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "11",
                "nickName": "MemberMXNZMYUZ",
                "betAmount": 170.00,
                "amount": 200.00,
                "winTime": "2025-02-18 14:20:28",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "8",
                "nickName": "MemberFOZQTHEM",
                "betAmount": 1.60,
                "amount": 28.00,
                "winTime": "2025-02-18 14:20:28",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "15",
                "nickName": "MemberOJQHDRTZ",
                "betAmount": 10.00,
                "amount": 30.00,
                "winTime": "2025-02-18 14:20:27",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "2",
                "nickName": "MemberJTUBFPNS",
                "betAmount": 2.00,
                "amount": 74.00,
                "winTime": "2025-02-18 14:20:27",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "13",
                "nickName": "MemberULAXXOMA",
                "betAmount": 1.50,
                "amount": 72.00,
                "winTime": "2025-02-18 14:20:27",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "4",
                "nickName": "MemberSWFZSYWB",
                "betAmount": 1.00,
                "amount": 16.00,
                "winTime": "2025-02-18 14:20:27",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "5",
                "nickName": "MemberDHOXVZSK",
                "betAmount": 1.00,
                "amount": 32.00,
                "winTime": "2025-02-18 14:20:27",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JDB",
                "typeName": "JDB",
                "userPhoto": "19",
                "nickName": "MemberWRFBPVEO",
                "betAmount": 12.00,
                "amount": 28.80,
                "winTime": "2025-02-18 14:20:27",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101414n2wm.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "6",
                "nickName": "MemberGWNNSFQF",
                "betAmount": 2.00,
                "amount": 45.00,
                "winTime": "2025-02-18 14:20:27",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "10",
                "nickName": "MemberAGRJDJXG",
                "betAmount": 36.00,
                "amount": 180.00,
                "winTime": "2025-02-18 14:20:27",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "12",
                "nickName": "MemberSYBEXRSO",
                "betAmount": 3.00,
                "amount": 100.00,
                "winTime": "2025-02-18 14:20:27",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "2",
                "nickName": "MemberCFDALZZV",
                "betAmount": 1.20,
                "amount": 20.00,
                "winTime": "2025-02-18 14:20:27",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "5",
                "nickName": "MemberZHQDAGMG",
                "betAmount": 8.00,
                "amount": 14.40,
                "winTime": "2025-02-18 14:20:27",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "16",
                "nickName": "MemberITCACUHI",
                "betAmount": 1.00,
                "amount": 18.00,
                "winTime": "2025-02-18 14:20:26",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "13",
                "nickName": "MemberAFYFHGZE",
                "betAmount": 39.00,
                "amount": 39.50,
                "winTime": "2025-02-18 14:20:26",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "5",
                "nickName": "MemberDCMTNUJA",
                "betAmount": 90.00,
                "amount": 54.00,
                "winTime": "2025-02-18 14:20:26",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "15",
                "nickName": "MemberYWJXTUNN",
                "betAmount": 2.40,
                "amount": 12.00,
                "winTime": "2025-02-18 14:20:26",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "18",
                "nickName": "MemberQTDMEHZW",
                "betAmount": 11.00,
                "amount": 20.00,
                "winTime": "2025-02-18 14:20:26",
                "showType": 5,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "18",
                "nickName": "MemberROEFONUL",
                "betAmount": 88.20,
                "amount": 182.00,
                "winTime": "2025-02-18 14:20:25",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "11",
                "nickName": "MemberHIFBYXQH",
                "betAmount": 10.00,
                "amount": 16.00,
                "winTime": "2025-02-18 14:20:25",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "18",
                "nickName": "MemberUUMSNOHK",
                "betAmount": 3.00,
                "amount": 80.00,
                "winTime": "2025-02-18 14:20:25",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "13",
                "nickName": "MemberJESLYOWC",
                "betAmount": 2.00,
                "amount": 38.40,
                "winTime": "2025-02-18 14:20:25",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "12",
                "nickName": "MemberKEMQUOVE",
                "betAmount": 10.00,
                "amount": 60.00,
                "winTime": "2025-02-18 14:20:25",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "13",
                "nickName": "MemberXJHCFYGV",
                "betAmount": 5.00,
                "amount": 48.00,
                "winTime": "2025-02-18 14:20:25",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "2",
                "nickName": "MemberEDGLSWPS",
                "betAmount": 36.00,
                "amount": 21.00,
                "winTime": "2025-02-18 14:20:25",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "2",
                "nickName": "MemberWLDZJHRK",
                "betAmount": 20.00,
                "amount": 40.00,
                "winTime": "2025-02-18 14:20:25",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "G9",
                "typeName": "G9",
                "userPhoto": "17",
                "nickName": "MemberHOBZDUNU",
                "betAmount": 10.00,
                "amount": 16.00,
                "winTime": "2025-02-18 14:20:25",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101325vpri.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "15",
                "nickName": "MemberBNGFAOMV",
                "betAmount": 5.00,
                "amount": 120.00,
                "winTime": "2025-02-18 14:20:24",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "5",
                "nickName": "MemberYVYRKYME",
                "betAmount": 8.00,
                "amount": 437.60,
                "winTime": "2025-02-18 14:20:23",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "14",
                "nickName": "MemberFVQIDHAH",
                "betAmount": 10.00,
                "amount": 44.00,
                "winTime": "2025-02-18 14:20:23",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JDB",
                "typeName": "JDB",
                "userPhoto": "4",
                "nickName": "MemberSFANUMZJ",
                "betAmount": 10.00,
                "amount": 30.00,
                "winTime": "2025-02-18 14:20:23",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101414n2wm.png"
            },
            {
                "type": "G9",
                "typeName": "G9",
                "userPhoto": "13",
                "nickName": "MemberGKHRFGYL",
                "betAmount": 4.00,
                "amount": 14.80,
                "winTime": "2025-02-18 14:20:23",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101325vpri.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "7",
                "nickName": "MemberTXEVZKHS",
                "betAmount": 3.00,
                "amount": 12.00,
                "winTime": "2025-02-18 14:20:22",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "13",
                "nickName": "MemberAJQXZXEW",
                "betAmount": 5.00,
                "amount": 25.00,
                "winTime": "2025-02-18 14:20:22",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "5",
                "nickName": "MemberXTDRNINK",
                "betAmount": 50.00,
                "amount": 250.00,
                "winTime": "2025-02-18 14:20:22",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "7",
                "nickName": "MemberTPKKTLQV",
                "betAmount": 30.00,
                "amount": 20.00,
                "winTime": "2025-02-18 14:20:22",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "7",
                "nickName": "MemberOQOKATTN",
                "betAmount": 50.00,
                "amount": 50.00,
                "winTime": "2025-02-18 14:20:22",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "19",
                "nickName": "MemberAKGVSSSC",
                "betAmount": 4.50,
                "amount": 36.00,
                "winTime": "2025-02-18 14:20:22",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "3",
                "nickName": "MemberCUWULDDT",
                "betAmount": 100.00,
                "amount": 1010.00,
                "winTime": "2025-02-18 14:20:21",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "10",
                "nickName": "MemberSEBJZHIJ",
                "betAmount": 20.00,
                "amount": 20.00,
                "winTime": "2025-02-18 14:20:21",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "3",
                "nickName": "MemberYSEMUPTY",
                "betAmount": 10.00,
                "amount": 15.00,
                "winTime": "2025-02-18 14:20:21",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "15",
                "nickName": "MemberGIHHDPJU",
                "betAmount": 0.0,
                "amount": 102.50,
                "winTime": "2025-02-18 14:20:21",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "19",
                "nickName": "MemberOFISGWEE",
                "betAmount": 7.50,
                "amount": 45.00,
                "winTime": "2025-02-18 14:20:21",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "JILI",
                "typeName": "JILI",
                "userPhoto": "16",
                "nickName": "MemberWMMIXHPF",
                "betAmount": 1.00,
                "amount": 21.00,
                "winTime": "2025-02-18 14:20:20",
                "showType": 4,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "10",
                "nickName": "MemberLKFYBCWO",
                "betAmount": 50.00,
                "amount": 97.02,
                "winTime": "2025-02-18 14:19:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "2",
                "nickName": "MemberCJRKWTOE",
                "betAmount": 30.00,
                "amount": 58.21,
                "winTime": "2025-02-18 14:19:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "8",
                "typeName": "D5_10min",
                "userPhoto": "2",
                "nickName": "MemberIPAJEZDC",
                "betAmount": 100.00,
                "amount": 194.04,
                "winTime": "2025-02-18 14:19:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "8",
                "typeName": "D5_10min",
                "userPhoto": "4",
                "nickName": "MemberUTMHEXTP",
                "betAmount": 10.00,
                "amount": 19.40,
                "winTime": "2025-02-18 14:19:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "10",
                "nickName": "MemberQZHHZDDC",
                "betAmount": 97.00,
                "amount": 200.00,
                "winTime": "2025-02-18 14:19:17",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "12",
                "nickName": "MemberRMVJKNOG",
                "betAmount": 100.00,
                "amount": 200.00,
                "winTime": "2025-02-18 14:19:00",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "19",
                "nickName": "MemberJVDNYEYE",
                "betAmount": 500.00,
                "amount": 970.20,
                "winTime": "2025-02-18 14:18:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "18",
                "nickName": "MemberHIWVXULN",
                "betAmount": 40.00,
                "amount": 77.62,
                "winTime": "2025-02-18 14:18:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "11",
                "nickName": "MemberUFUCTZGO",
                "betAmount": 10.00,
                "amount": 19.40,
                "winTime": "2025-02-18 14:18:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "6",
                "typeName": "D5_3min",
                "userPhoto": "11",
                "nickName": "MemberJKARYPLM",
                "betAmount": 2.00,
                "amount": 17.64,
                "winTime": "2025-02-18 14:17:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "6",
                "typeName": "D5_3min",
                "userPhoto": "10",
                "nickName": "MemberNLZBJSPY",
                "betAmount": 2.00,
                "amount": 17.64,
                "winTime": "2025-02-18 14:17:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "17",
                "nickName": "MemberXYOKHBKS",
                "betAmount": 30.00,
                "amount": 58.21,
                "winTime": "2025-02-18 14:17:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "16",
                "nickName": "MemberCEYVATTY",
                "betAmount": 10.00,
                "amount": 19.40,
                "winTime": "2025-02-18 14:16:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "18",
                "nickName": "MemberIKNGYGJU",
                "betAmount": 10.00,
                "amount": 19.40,
                "winTime": "2025-02-18 14:16:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "19",
                "nickName": "MemberMWTGGEAR",
                "betAmount": 90.00,
                "amount": 174.64,
                "winTime": "2025-02-18 14:15:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "5",
                "typeName": "D5_1min",
                "userPhoto": "7",
                "nickName": "MemberSEOPXLVT",
                "betAmount": 302.00,
                "amount": 586.00,
                "winTime": "2025-02-18 14:15:57",
                "showType": 7,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20250210101042iwui.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "6",
                "nickName": "MemberNMFTMYRU",
                "betAmount": 100.00,
                "amount": 185.00,
                "winTime": "2025-02-18 14:15:04",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "8",
                "nickName": "MemberCSOZRFPT",
                "betAmount": 40.00,
                "amount": 80.00,
                "winTime": "2025-02-18 14:14:13",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "MG_Video",
                "typeName": "MG_Video",
                "userPhoto": "12",
                "nickName": "MemberZPHQXOHX",
                "betAmount": 600.00,
                "amount": 600.00,
                "winTime": "2025-02-18 14:13:50",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_202405081133481rmp.png"
            },
            {
                "type": "MG_Video",
                "typeName": "MG_Video",
                "userPhoto": "9",
                "nickName": "MemberFTZVQCOZ",
                "betAmount": 30.00,
                "amount": 90.00,
                "winTime": "2025-02-18 14:13:39",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_202405081133481rmp.png"
            },
            {
                "type": "MG_Video",
                "typeName": "MG_Video",
                "userPhoto": "11",
                "nickName": "MemberVZQWYMJP",
                "betAmount": 100.00,
                "amount": 100.00,
                "winTime": "2025-02-18 14:12:47",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_202405081133481rmp.png"
            },
            {
                "type": "MG_Video",
                "typeName": "MG_Video",
                "userPhoto": "3",
                "nickName": "MemberTLJIFZMR",
                "betAmount": 30.00,
                "amount": 90.00,
                "winTime": "2025-02-18 14:12:29",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_202405081133481rmp.png"
            },
            {
                "type": "MG_Video",
                "typeName": "MG_Video",
                "userPhoto": "16",
                "nickName": "MemberNWLSXJUC",
                "betAmount": 300.00,
                "amount": 585.00,
                "winTime": "2025-02-18 14:12:15",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_202405081133481rmp.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "9",
                "nickName": "MemberDLUTIYML",
                "betAmount": 1000.00,
                "amount": 2000.00,
                "winTime": "2025-02-18 14:12:04",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "EVO_Video",
                "typeName": "EVO_Video",
                "userPhoto": "11",
                "nickName": "MemberCUTCVFAG",
                "betAmount": 20.00,
                "amount": 30.00,
                "winTime": "2025-02-18 14:11:53",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "type": "EVO_Video",
                "typeName": "EVO_Video",
                "userPhoto": "11",
                "nickName": "MemberQUEDHGIM",
                "betAmount": 40.00,
                "amount": 30.00,
                "winTime": "2025-02-18 14:11:53",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "type": "EVO_Video",
                "typeName": "EVO_Video",
                "userPhoto": "13",
                "nickName": "MemberOTGELSUV",
                "betAmount": 50.00,
                "amount": 30.00,
                "winTime": "2025-02-18 14:11:53",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "type": "EVO_Video",
                "typeName": "EVO_Video",
                "userPhoto": "16",
                "nickName": "MemberSWMVVEEU",
                "betAmount": 50.00,
                "amount": 100.00,
                "winTime": "2025-02-18 14:11:49",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "type": "EVO_Video",
                "typeName": "EVO_Video",
                "userPhoto": "14",
                "nickName": "MemberNKPMRCQR",
                "betAmount": 150.00,
                "amount": 100.00,
                "winTime": "2025-02-18 14:11:48",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "type": "EVO_Video",
                "typeName": "EVO_Video",
                "userPhoto": "17",
                "nickName": "MemberRYJQWLLV",
                "betAmount": 300.00,
                "amount": 325.92,
                "winTime": "2025-02-18 14:11:42",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "type": "EVO_Video",
                "typeName": "EVO_Video",
                "userPhoto": "14",
                "nickName": "MemberIOKXPWDX",
                "betAmount": 40.00,
                "amount": 360.00,
                "winTime": "2025-02-18 14:11:38",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "type": "EVO_Video",
                "typeName": "EVO_Video",
                "userPhoto": "18",
                "nickName": "MemberXAHXXKGM",
                "betAmount": 50.00,
                "amount": 40.00,
                "winTime": "2025-02-18 14:11:38",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "type": "EVO_Video",
                "typeName": "EVO_Video",
                "userPhoto": "12",
                "nickName": "MemberOLWJBWUN",
                "betAmount": 20.00,
                "amount": 30.00,
                "winTime": "2025-02-18 14:11:38",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "type": "EVO_Video",
                "typeName": "EVO_Video",
                "userPhoto": "13",
                "nickName": "MemberICFCRWHO",
                "betAmount": 100.00,
                "amount": 390.00,
                "winTime": "2025-02-18 14:11:38",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "17",
                "nickName": "MemberDBJORNYH",
                "betAmount": 20.00,
                "amount": 40.00,
                "winTime": "2025-02-18 14:11:33",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "MG_Video",
                "typeName": "MG_Video",
                "userPhoto": "12",
                "nickName": "MemberVFKUJIDH",
                "betAmount": 900.00,
                "amount": 600.00,
                "winTime": "2025-02-18 14:11:26",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_202405081133481rmp.png"
            },
            {
                "type": "EVO_Video",
                "typeName": "EVO_Video",
                "userPhoto": "12",
                "nickName": "MemberZEUOYPIU",
                "betAmount": 300.00,
                "amount": 600.00,
                "winTime": "2025-02-18 14:11:26",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "11",
                "nickName": "MemberEXYYFLGV",
                "betAmount": 442.30,
                "amount": 834.00,
                "winTime": "2025-02-18 14:11:24",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "EVO_Video",
                "typeName": "EVO_Video",
                "userPhoto": "17",
                "nickName": "MemberRVTHEUYS",
                "betAmount": 50.00,
                "amount": 100.00,
                "winTime": "2025-02-18 14:11:23",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "type": "EVO_Video",
                "typeName": "EVO_Video",
                "userPhoto": "11",
                "nickName": "MemberUJYNFMNU",
                "betAmount": 60.00,
                "amount": 100.00,
                "winTime": "2025-02-18 14:11:23",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "type": "MG_Video",
                "typeName": "MG_Video",
                "userPhoto": "8",
                "nickName": "MemberENXIONJP",
                "betAmount": 30.00,
                "amount": 90.00,
                "winTime": "2025-02-18 14:11:21",
                "showType": 1,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_202405081133481rmp.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "10",
                "nickName": "MemberPDERJOFF",
                "betAmount": 203.70,
                "amount": 414.00,
                "winTime": "2025-02-18 14:09:20",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "5",
                "nickName": "MemberBXTSUPSY",
                "betAmount": 56.00,
                "amount": 112.00,
                "winTime": "2025-02-18 14:09:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "3",
                "nickName": "MemberRIYIJMRY",
                "betAmount": 100.00,
                "amount": 200.00,
                "winTime": "2025-02-18 14:09:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "12",
                "nickName": "MemberZORNAVWZ",
                "betAmount": 60.00,
                "amount": 120.00,
                "winTime": "2025-02-18 14:09:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "4",
                "nickName": "MemberHJMSWVTX",
                "betAmount": 100.00,
                "amount": 200.00,
                "winTime": "2025-02-18 14:09:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "13",
                "nickName": "MemberSYVCFKQX",
                "betAmount": 1000.00,
                "amount": 2000.00,
                "winTime": "2025-02-18 14:09:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "3",
                "nickName": "MemberOTYJETMK",
                "betAmount": 100.00,
                "amount": 200.00,
                "winTime": "2025-02-18 14:09:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "6",
                "nickName": "MemberVIQAFLCJ",
                "betAmount": 90.00,
                "amount": 190.00,
                "winTime": "2025-02-18 14:09:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "14",
                "nickName": "MemberBQIYNCEE",
                "betAmount": 56.00,
                "amount": 112.00,
                "winTime": "2025-02-18 14:09:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "7",
                "nickName": "MemberOIXVHGRW",
                "betAmount": 100.00,
                "amount": 200.00,
                "winTime": "2025-02-18 14:09:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "4",
                "nickName": "MemberYVPVDSSE",
                "betAmount": 110.00,
                "amount": 220.00,
                "winTime": "2025-02-18 14:09:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "3",
                "nickName": "MemberDNTZYBOG",
                "betAmount": 125.00,
                "amount": 250.00,
                "winTime": "2025-02-18 14:09:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "11",
                "nickName": "MemberVREBQUVG",
                "betAmount": 60.00,
                "amount": 120.00,
                "winTime": "2025-02-18 14:09:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "17",
                "nickName": "MemberDPIQMLQX",
                "betAmount": 200.00,
                "amount": 400.00,
                "winTime": "2025-02-18 14:09:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "14",
                "nickName": "MemberRSSWSEOA",
                "betAmount": 17.40,
                "amount": 38.00,
                "winTime": "2025-02-18 14:05:13",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "2",
                "nickName": "MemberUXIMKKVB",
                "betAmount": 1786.70,
                "amount": 3012.00,
                "winTime": "2025-02-18 14:05:07",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "7",
                "nickName": "MemberIPZIMNXL",
                "betAmount": 56.00,
                "amount": 112.00,
                "winTime": "2025-02-18 14:03:25",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "6",
                "nickName": "MemberBAJSGPVH",
                "betAmount": 100.00,
                "amount": 225.00,
                "winTime": "2025-02-18 14:02:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "11",
                "nickName": "MemberZXDRJUZZ",
                "betAmount": 288.00,
                "amount": 547.20,
                "winTime": "2025-02-18 14:02:02",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "15",
                "nickName": "MemberNTIMDGZS",
                "betAmount": 907.90,
                "amount": 1662.00,
                "winTime": "2025-02-18 13:57:46",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Wickets9",
                "typeName": "Wickets9",
                "userPhoto": "18",
                "nickName": "MemberGIHLBXOD",
                "betAmount": 100.00,
                "amount": 200.00,
                "winTime": "2025-02-18 13:54:14",
                "showType": 2,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "18",
                "nickName": "MemberFVZSHTFY",
                "betAmount": 337.50,
                "amount": 486.00,
                "winTime": "2025-02-18 13:53:19",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "4",
                "nickName": "MemberLSDPSTZJ",
                "betAmount": 97.00,
                "amount": 200.00,
                "winTime": "2025-02-18 13:52:42",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "11",
                "nickName": "MemberUIETZVFF",
                "betAmount": 737.20,
                "amount": 1310.00,
                "winTime": "2025-02-18 13:52:38",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "8",
                "nickName": "MemberUBNPQGMP",
                "betAmount": 48.50,
                "amount": 100.00,
                "winTime": "2025-02-18 13:52:16",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "10",
                "nickName": "MemberCNENBEHC",
                "betAmount": 48.50,
                "amount": 100.00,
                "winTime": "2025-02-18 13:51:43",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "14",
                "nickName": "MemberBUGQQMZI",
                "betAmount": 3162.20,
                "amount": 4510.00,
                "winTime": "2025-02-18 13:50:59",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "4",
                "nickName": "MemberGZIEVBSD",
                "betAmount": 97.00,
                "amount": 200.00,
                "winTime": "2025-02-18 13:50:14",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "1",
                "nickName": "MemberBXQEFFAG",
                "betAmount": 97.00,
                "amount": 200.00,
                "winTime": "2025-02-18 13:49:38",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "12",
                "nickName": "MemberPSCSILXA",
                "betAmount": 97.00,
                "amount": 200.00,
                "winTime": "2025-02-18 13:48:46",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "17",
                "nickName": "MemberIINSOALP",
                "betAmount": 97.00,
                "amount": 200.00,
                "winTime": "2025-02-18 13:47:49",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            },
            {
                "type": "Card365",
                "typeName": "Card365",
                "userPhoto": "14",
                "nickName": "MemberUCJRLGVR",
                "betAmount": 111.80,
                "amount": 230.60,
                "winTime": "2025-02-18 13:39:49",
                "showType": 3,
                "imgUrl": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            }
        ],
        "penarikanList": [
            {
                "userID": 13547625,
                "userPhoto": "1",
                "nickName": "MemberNNGPGYBD",
                "price": 27487040.00,
                "time": "2025-02-18",
                "typeName": "Penarikan",
                "winTime": "2025-02-18"
            },
            {
                "userID": 6725010,
                "userPhoto": "8",
                "nickName": "MemberNNGEKAOG",
                "price": 23792440.00,
                "time": "2025-02-18",
                "typeName": "Penarikan",
                "winTime": "2025-02-18"
            },
            {
                "userID": 12532176,
                "userPhoto": "1",
                "nickName": "MemberNNGXYUHB",
                "price": 8424000.00,
                "time": "2025-02-18",
                "typeName": "Penarikan",
                "winTime": "2025-02-18"
            },
            {
                "userID": 7173294,
                "userPhoto": "https://api.lightspacecdn.com/img/avatar.cfa8dd9d.svg",
                "nickName": "MemberNNG6K6PA",
                "price": 5191618.60,
                "time": "2025-02-18",
                "typeName": "Penarikan",
                "winTime": "2025-02-18"
            },
            {
                "userID": 782988,
                "userPhoto": "1",
                "nickName": "Rushi rathod ",
                "price": 3841045.32,
                "time": "2025-02-18",
                "typeName": "Penarikan",
                "winTime": "2025-02-18"
            },
            {
                "userID": 14560619,
                "userPhoto": "1",
                "nickName": "MemberNNGNOF1F",
                "price": 3724000.00,
                "time": "2025-02-18",
                "typeName": "Penarikan",
                "winTime": "2025-02-18"
            },
            {
                "userID": 16092671,
                "userPhoto": "7",
                "nickName": "MemberNNGVFXTK",
                "price": 2366817.00,
                "time": "2025-02-18",
                "typeName": "Penarikan",
                "winTime": "2025-02-18"
            },
            {
                "userID": 16442616,
                "userPhoto": "1",
                "nickName": "Arpit mishra",
                "price": 2066527.96,
                "time": "2025-02-18",
                "typeName": "Penarikan",
                "winTime": "2025-02-18"
            },
            {
                "userID": 7651295,
                "userPhoto": "1",
                "nickName": "Shivam yadav",
                "price": 1906198.00,
                "time": "2025-02-18",
                "typeName": "Penarikan",
                "winTime": "2025-02-18"
            },
            {
                "userID": 16202433,
                "userPhoto": "1",
                "nickName": "MemberNNGGWSSN",
                "price": 1620289.36,
                "time": "2025-02-18",
                "typeName": "Penarikan",
                "winTime": "2025-02-18"
            }
					]
				  },
				  "code": 0,
				  "msg": "Succeed",
				  "msgCode": 0,
				  "serviceNowTime": "$shnunc"
				}';
			}
			else{
				$res['code'] = 5;
				$res['msg'] = 'Wrong signature';
				$res['msgCode'] = 3;
				http_response_code(200);
				echo json_encode($res);
			}
		}
		else{
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