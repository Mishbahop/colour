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
		if (isset($shonupost['language'], $shonupost['random'], $shonupost['signature'], $shonupost['rewardType'], $shonupost['timestamp'], $shonupost['vipLevel'])) {
			$language = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['language']));
			$taskId = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['rewardType']));
			$lvl = (int) htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['vipLevel'])); // Get the level
			$random = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['random']));
			$signature = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['signature']));
			$shonustr = '{"language":'.$language.',"random":"'.$random.'","taskId":'.$taskId.'}';
			$shonusign = strtoupper(md5($shonustr));
			
			if($shonusign != $signature){
				$bearer = explode(" ", $_SERVER['HTTP_AUTHORIZATION']);
				$author = isset($bearer[1]) ? $bearer[1] : null; // Ensure the author variable is set
				$is_jwt_valid = is_jwt_valid($author);
				$data_auth = json_decode($is_jwt_valid, 1);
				if($data_auth['status'] === 'Success') {
					$sesquery = "SELECT akshinak FROM shonu_subjects WHERE akshinak = '$author'";
					$sesresult = $conn->query($sesquery);
					$sesnum = mysqli_num_rows($sesresult);
					if($sesnum == 1){
						$shonuid = $data_auth['payload']['id'];
						
						// Initialize balance variable
						$balance = 0;

						if($taskId == 1){
						    $balanceArray = [60, 180, 69, 1890, 6900, 16900, 69000, 169000, 690000, 1690000];
						}
						else if($taskId == 2){
							$balanceArray = [30, 90, 290, 890, 1890, 6900, 16900, 69000, 169000, 690000];
						} else {
							// Handle unexpected taskId
							$res['code'] = 8;
							$res['msg'] = 'Invalid taskId';
							$res['msgCode'] = 7;
							http_response_code(200);
							echo json_encode($res);
							exit();
						}

						// Check if the level is valid
						if ($lvl >= 1 && $lvl <= 10) {
						    $balance = $balanceArray[$lvl - 1]; // Get balance based on level (0 indexed)
							$viprec = "INSERT INTO viprec (user_id, type, motta, created_at, lvl) VALUES ('$shonuid', '$taskId', '$balance', '$shnunc', '$lvl')";
                            $conn->query($viprec);

							$nabikarana = "UPDATE shonu_kaichila SET motta = motta + $balance WHERE balakedara='$shonuid'";
							$conn->query($nabikarana);

							$res = [
                                'data' => [
                                    'integral' => 0,
                                    'balance' => $balance
                                ],
                                'code' => 0,
                                'msg' => 'Succeed',
                                'msgCode' => 0
                            ];
							http_response_code(200);
							echo json_encode($res);			
						} else {
							$res['code'] = 9;
							$res['msg'] = 'Invalid level';
							$res['msgCode'] = 8;
							http_response_code(200);
							echo json_encode($res);
						}
					}
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
