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
						if($typeId == 13){
							$data['typeID'] = $typeId;
							$data['gamePresentation'] = '
								<p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">The last digit of the Block hash is used as the lottery result.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">Example:</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">The Hash value is **b569, the lottery result is 9.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">The Hash value is **d14c, the lottery result is 4.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">3 minutes 1 period, 2 minutes and 55 seconds to order, 5 seconds waiting for the draw. It opens all day, the total number of purchases in a day is 480 times.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">All the single bets will be have handling fee 2%.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">For example bet 100 Rs after deduct the fee the exact betting amount will be 98 Rs.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">Odds:</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">1. Select Green: if the result shows 1,3,7,9 the pay out is (98*2)=196 ; If the result shows 5, the pay out is (98*1.5) 147</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">2. Select Red: if the result shows 2,4,6,8 the pay out is (98*2)=196 ; If the result shows 0, the pay out is (98*1.5) 147</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">3. Select Violet: if the result shows 0 or 5, the pay out is (98*4.5)=441</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">4. Select Number: if the result is the same as the number you selected, the pay out is (98*9)=882</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">5. Select Big: if the result shows 5,6,7,8,9 the pay out is (98*2)=196</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">6. Select Small: if the result shows 0,1,2,3,4 the pay out is (98*2)=196</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">GAME RULES:</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">- It is not allowed to make 2-sided bets in 1 game period (For example: choosing green and red or big and small in the same period)</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">- To bet on numbers: the maximum total number that can be selected is 7 in 1 period (No more)</font></p><div><br></div>
							';
						} else if($typeId == 14){
							$data['typeID'] = $typeId;
							$data['gamePresentation'] = '
								<p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">The last digit of the Block hash is used as the lottery result.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">Example:</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">The Hash value is **b569, the lottery result is 9.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">The Hash value is **d14c, the lottery result is 4.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">3 minutes 1 period, 2 minutes and 55 seconds to order, 5 seconds waiting for the draw. It opens all day, the total number of purchases in a day is 480 times.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">All the single bets will be have handling fee 2%.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">For example bet 100 Rs after deduct the fee the exact betting amount will be 98 Rs.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">Odds:</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">1. Select Green: if the result shows 1,3,7,9 the pay out is (98*2)=196 ; If the result shows 5, the pay out is (98*1.5) 147</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">2. Select Red: if the result shows 2,4,6,8 the pay out is (98*2)=196 ; If the result shows 0, the pay out is (98*1.5) 147</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">3. Select Violet: if the result shows 0 or 5, the pay out is (98*4.5)=441</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">4. Select Number: if the result is the same as the number you selected, the pay out is (98*9)=882</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">5. Select Big: if the result shows 5,6,7,8,9 the pay out is (98*2)=196</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">6. Select Small: if the result shows 0,1,2,3,4 the pay out is (98*2)=196</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">GAME RULES:</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">- It is not allowed to make 2-sided bets in 1 game period (For example: choosing green and red or big and small in the same period)</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">- To bet on numbers: the maximum total number that can be selected is 7 in 1 period (No more)</font></p><div><br></div>
							';
						} else if($typeId == 15){
							$data['typeID'] = $typeId;
							$data['gamePresentation'] = '
								<p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">The last digit of the Block hash is used as the lottery result.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">Example:</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">The Hash value is **b569, the lottery result is 9.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">The Hash value is **d14c, the lottery result is 4.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">3 minutes 1 period, 2 minutes and 55 seconds to order, 5 seconds waiting for the draw. It opens all day, the total number of purchases in a day is 480 times.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">All the single bets will be have handling fee 2%.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">For example bet 100 Rs after deduct the fee the exact betting amount will be 98 Rs.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">Odds:</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">1. Select Green: if the result shows 1,3,7,9 the pay out is (98*2)=196 ; If the result shows 5, the pay out is (98*1.5) 147</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">2. Select Red: if the result shows 2,4,6,8 the pay out is (98*2)=196 ; If the result shows 0, the pay out is (98*1.5) 147</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">3. Select Violet: if the result shows 0 or 5, the pay out is (98*4.5)=441</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">4. Select Number: if the result is the same as the number you selected, the pay out is (98*9)=882</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">5. Select Big: if the result shows 5,6,7,8,9 the pay out is (98*2)=196</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">6. Select Small: if the result shows 0,1,2,3,4 the pay out is (98*2)=196</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">GAME RULES:</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">- It is not allowed to make 2-sided bets in 1 game period (For example: choosing green and red or big and small in the same period)</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">- To bet on numbers: the maximum total number that can be selected is 7 in 1 period (No more)</font></p><div><br></div>
							';
						} else if($typeId == 16){
							$data['typeID'] = $typeId;
							$data['gamePresentation'] = '
								<p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">The last digit of the Block hash is used as the lottery result.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">Example:</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">The Hash value is **b569, the lottery result is 9.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">The Hash value is **d14c, the lottery result is 4.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">3 minutes 1 period, 2 minutes and 55 seconds to order, 5 seconds waiting for the draw. It opens all day, the total number of purchases in a day is 480 times.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">All the single bets will be have handling fee 2%.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">For example bet 100 Rs after deduct the fee the exact betting amount will be 98 Rs.</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">Odds:</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">1. Select Green: if the result shows 1,3,7,9 the pay out is (98*2)=196 ; If the result shows 5, the pay out is (98*1.5) 147</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">2. Select Red: if the result shows 2,4,6,8 the pay out is (98*2)=196 ; If the result shows 0, the pay out is (98*1.5) 147</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">3. Select Violet: if the result shows 0 or 5, the pay out is (98*4.5)=441</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">4. Select Number: if the result is the same as the number you selected, the pay out is (98*9)=882</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">5. Select Big: if the result shows 5,6,7,8,9 the pay out is (98*2)=196</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">6. Select Small: if the result shows 0,1,2,3,4 the pay out is (98*2)=196</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">GAME RULES:</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\"><br></font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">- It is not allowed to make 2-sided bets in 1 game period (For example: choosing green and red or big and small in the same period)</font></p><p><font face=\"Helvetica Neue, Helvetica, Arial, sans-serif\">- To bet on numbers: the maximum total number that can be selected is 7 in 1 period (No more)</font></p><div><br></div>
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
