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
			$typeId = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['typeId']));
			$shonustr = '{"language":'.$language.',"random":"'.$random.'","typeId":'.$typeId.'}';
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
						if($typeId == 5){
							$data['typeID'] = $typeId;
							$data['gamePresentation'] = '
								<p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">5Dlotterygamerules</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Draw instructions</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">5-digit number (00000-99999) will be drawn randomly in each period</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">For example: The draw number for this period is 12345</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">A = 1</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">B = 2</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">C = 3</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">D = 4</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">E = 5</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">SUM = A + B + C + D + E = 15</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">How to play</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Players can specify six outcomes of betting: A, B, C, D, E and the sum.</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">A, B, C, D, E can be purchased</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Number (0123456789)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Low (01234)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">High (56789)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Odd (13579)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Even (02468)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Sum = A + B + C + D + E can be purchased</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Low (0-22)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">High (23-45)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Odd (13, 15, 17... 43, 45)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Even (02, 04, 06... 42, 44)</p>

                                ';
						} else if($typeId == 6){
							$data['typeID'] = $typeId;
							$data['gamePresentation'] = '
								<p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">5Dlotterygamerules</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Draw instructions</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">5-digit number (00000-99999) will be drawn randomly in each period</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">For example: The draw number for this period is 12345</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">A = 1</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">B = 2</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">C = 3</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">D = 4</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">E = 5</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">SUM = A + B + C + D + E = 15</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">How to play</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Players can specify six outcomes of betting: A, B, C, D, E and the sum.</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">A, B, C, D, E can be purchased</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Number (0123456789)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Low (01234)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">High (56789)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Odd (13579)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Even (02468)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Sum = A + B + C + D + E can be purchased</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Low (0-22)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">High (23-45)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Odd (13, 15, 17... 43, 45)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Even (02, 04, 06... 42, 44)</p>

							';
						} else if($typeId == 7){
							$data['typeID'] = $typeId;
							$data['gamePresentation'] = '
							<p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">5Dlotterygamerules</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Draw instructions</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">5-digit number (00000-99999) will be drawn randomly in each period</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">For example: The draw number for this period is 12345</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">A = 1</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">B = 2</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">C = 3</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">D = 4</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">E = 5</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">SUM = A + B + C + D + E = 15</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">How to play</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Players can specify six outcomes of betting: A, B, C, D, E and the sum.</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">A, B, C, D, E can be purchased</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Number (0123456789)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Low (01234)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">High (56789)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Odd (13579)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Even (02468)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Sum = A + B + C + D + E can be purchased</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Low (0-22)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">High (23-45)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Odd (13, 15, 17... 43, 45)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Even (02, 04, 06... 42, 44)</p>

   
							';
						} else if($typeId == 8){
							$data['typeID'] = $typeId;
							$data['gamePresentation'] = '
								<p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">5Dlotterygamerules</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Draw instructions</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">5-digit number (00000-99999) will be drawn randomly in each period</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">For example: The draw number for this period is 12345</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">A = 1</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">B = 2</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">C = 3</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">D = 4</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">E = 5</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">SUM = A + B + C + D + E = 15</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">How to play</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Players can specify six outcomes of betting: A, B, C, D, E and the sum.</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">A, B, C, D, E can be purchased</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Number (0123456789)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Low (01234)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">High (56789)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Odd (13579)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Even (02468)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Sum = A + B + C + D + E can be purchased</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Low (0-22)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">High (23-45)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Odd (13, 15, 17... 43, 45)</p><p style="margin-bottom:0pt; margin-top:0pt; font-size:10.5pt; font-family:Calibri;">Even (02, 04, 06... 42, 44)</p>

							';
						} else {
							$res['code'] = 8;
							$res['msg'] = 'Invalid typeId';
							$res['msgCode'] = 7;
							http_response_code(400);
							echo json_encode($res);
							exit;
						}
						
						$res['data'] = $data;
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
