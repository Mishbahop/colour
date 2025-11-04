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
			$shonustr = '{"language":'.$language.',"random":"'.$random.'"}';
			$shonusign = strtoupper(md5($shonustr));
			if($shonusign == $signature){
				$bearer = explode(" ", $_SERVER['HTTP_AUTHORIZATION']);
				$author = $bearer[1];				
				$is_jwt_valid = is_jwt_valid($author);
				$data_auth = json_decode($is_jwt_valid, 1);
				if($data_auth['status'] === 'Success') {
					$sesquery = "SELECT akshinak
					  FROM shonu_subjects
					  WHERE akshinak = '$author'";
					$sesresult=$conn->query($sesquery);
					$sesnum = mysqli_num_rows($sesresult);
					if($sesnum == 1){
						$data['typelist'][0]['payID'] = 2;
						$data['typelist'][0]['payTypeID'] = 0;
						$data['typelist'][0]['payName'] = 'Wake UP-APP';
						$data['typelist'][0]['paySysName'] = 'Online Pay';
						$data['typelist'][0]['payNameUrl'] = 'https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/payNameIcon/payNameIcon_20240324160846bfy7.png';
						$data['typelist'][0]['payNameUrl2'] = 'https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/payNameIcon/payNameIcon2_20240324160846gdbv.png';
						$data['typelist'][0]['minPrice'] = 0;
						$data['typelist'][0]['maxPrice'] = 0;
						$data['typelist'][0]['scope'] = null;
						$data['typelist'][0]['typeName'] = 'Wake UP-APP';
						$data['typelist'][0]['typeNameCode'] = 0;
						$data['typelist'][0]['maxRechargeRifts'] = 0.00;
						$data['typelist'][0]['sort'] = 9; 
						  
						$data['typelist'][1]['payID'] = 1;
						$data['typelist'][1]['payTypeID'] = 0;
						$data['typelist'][1]['payName'] = 'UPI-QRpay';
						$data['typelist'][1]['paySysName'] = 'Online Pay';
						$data['typelist'][1]['payNameUrl'] = 'https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/payNameIcon/payNameIcon_20240324160932wef3.png';
						$data['typelist'][1]['payNameUrl2'] = 'https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/payNameIcon/payNameIcon_20240324160932wef3.png';
						$data['typelist'][1]['minPrice'] = 0;
						$data['typelist'][1]['maxPrice'] = 0;
						$data['typelist'][1]['scope'] = null;
						$data['typelist'][1]['typeName'] = 'UPI-QRpay';
						$data['typelist'][1]['typeNameCode'] = 0;
						$data['typelist'][1]['maxRechargeRifts'] = 0.00;
						$data['typelist'][1]['sort'] = 9;
						
						
						$data['typelist'][2]['payID'] = 13;
						$data['typelist'][2]['payTypeID'] = 0;
						$data['typelist'][2]['payName'] = 'UPI-PayTM';
						$data['typelist'][2]['paySysName'] = 'USDT';
						$data['typelist'][2]['payNameUrl'] = 'https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/payNameIcon/payNameIcon_20241001160501fwkx.png';
						$data['typelist'][2]['payNameUrl2'] = 'https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/payNameIcon/payNameIcon_20241001160501fwkx.png';
						$data['typelist'][2]['minPrice'] = 0;
						$data['typelist'][2]['maxPrice'] = 0;
						$data['typelist'][2]['scope'] = null;
						$data['typelist'][2]['typeName'] = 'UPI-PayTM';
						$data['typelist'][2]['typeNameCode'] = 9205;
						$data['typelist'][2]['maxRechargeRifts'] = 0.00;
						$data['typelist'][2]['sort'] = 5;
                      
                      
                        $data['typelist'][3]['payID'] = 11;
                        $data['typelist'][3]['payTypeID'] = 0;
						$data['typelist'][3]['payName'] = 'USDT';
						$data['typelist'][3]['paySysName'] = 'USDT';
						$data['typelist'][3]['payNameUrl'] = 'https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/payNameIcon/payNameIcon_20240323192848q2ac.png';
						$data['typelist'][3]['payNameUrl2'] = 'https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/payNameIcon/payNameIcon_20240323192848q2ac.png';
						$data['typelist'][3]['minPrice'] = 0;
						$data['typelist'][3]['maxPrice'] = 0;
						$data['typelist'][3]['scope'] = null;
						$data['typelist'][3]['typeName'] = 'USDT';
						$data['typelist'][3]['typeNameCode'] = 9205;
						$data['typelist'][3]['maxRechargeRifts'] = 0.02;
						$data['typelist'][3]['sort'] = 5;

                        
						
						$res['data'] = $data;
						$res['code'] = 0;
						$res['msg'] = 'Succeed';
						$res['msgCode'] = 0;
						http_response_code(200);
						echo json_encode($res);					
					}
					else{
						$res['code'] = 4;
						$res['msg'] = 'No operation permission';
						$res['msgCode'] = 2;
						http_response_code(401);
						echo json_encode($res);
					}					
				}
				else{					
					$res['code'] = 4;
					$res['msg'] = 'No operation permission';
					$res['msgCode'] = 2;
					http_response_code(401);
					echo json_encode($res);					
				}
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