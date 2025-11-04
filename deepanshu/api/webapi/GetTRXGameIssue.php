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
							$samasye = "SELECT atadaaidi, dinankavannuracisi
							  FROM gelluonduhogu_trx
							  ORDER BY kramasankhye DESC LIMIT 1";
							$samasyephalitansa=$conn->query($samasye);
							$samasyesreni = mysqli_fetch_array($samasyephalitansa);
							
							$data['predraw']['issueNumber'] = $samasyesreni['atadaaidi'];
							$data['predraw']['startTime'] = $samasyesreni['dinankavannuracisi'];
							$ondusamaya = strtotime('+1 minute', strtotime($samasyesreni['dinankavannuracisi']));
							$data['predraw']['endTime'] = date('Y-m-d H:i:s', $ondusamaya);
							$data['predraw']['serviceTime'] = date('Y-m-d H:i:s');
							$data['predraw']['intervalM'] = 1;
                          
						    $samasye = "SELECT kalaparichaya, bh, hash, dinankavannuracisi
							  FROM gellaluhogiondu_trx
							  ORDER BY shonu DESC LIMIT 1";
							$samasyephalitansa=$conn->query($samasye);
							$samasyesreni = mysqli_fetch_array($samasyephalitansa);
                          
							$data['settled']['issueNumber'] = $samasyesreni['kalaparichaya'];
							$data['settled']['sumCount'] = null;
							$data['settled']['premium'] = 1;
							$data['settled']['blockID'] = $samasyesreni['hash'];
							$data['settled']['number'] = $samasyesreni['bh'];
							
							
						}else if($typeId == 14){
							$samasye = "SELECT atadaaidi, dinankavannuracisi
							  FROM gelluonduhogu_trx3
							  ORDER BY kramasankhye DESC LIMIT 1";
							$samasyephalitansa=$conn->query($samasye);
							$samasyesreni = mysqli_fetch_array($samasyephalitansa);
							
							$data['predraw']['issueNumber'] = $samasyesreni['atadaaidi'];
							$data['predraw']['startTime'] = $samasyesreni['dinankavannuracisi'];
							$ondusamaya = strtotime('+1 minute', strtotime($samasyesreni['dinankavannuracisi']));
							$data['predraw']['endTime'] = date('Y-m-d H:i:s', $ondusamaya);
							$data['predraw']['serviceTime'] = date('Y-m-d H:i:s');
							$data['predraw']['intervalM'] = 1;
                          
                            $samasye = "SELECT kalaparichaya, bh, hash, dinankavannuracisi
							  FROM gellaluhogiondu_trx3
							  ORDER BY shonu DESC LIMIT 1";
							$samasyephalitansa=$conn->query($samasye);
							$samasyesreni = mysqli_fetch_array($samasyephalitansa);
                          
							$data['settled']['issueNumber'] = $samasyesreni['kalaparichaya'];
							$data['settled']['sumCount'] = null;
							$data['settled']['premium'] = 1;
							$data['settled']['blockID'] = $samasyesreni['hash'];
							$data['settled']['number'] = $samasyesreni['bh'];
						}else if($typeId == 15){
							$samasye = "SELECT atadaaidi, dinankavannuracisi
							  FROM gelluonduhogu_trx5
							  ORDER BY kramasankhye DESC LIMIT 1";
							$samasyephalitansa=$conn->query($samasye);
							$samasyesreni = mysqli_fetch_array($samasyephalitansa);
							
							$data['predraw']['issueNumber'] = $samasyesreni['atadaaidi'];
							$data['predraw']['startTime'] = $samasyesreni['dinankavannuracisi'];
							$ondusamaya = strtotime('+1 minute', strtotime($samasyesreni['dinankavannuracisi']));
							$data['predraw']['endTime'] = date('Y-m-d H:i:s', $ondusamaya);
							$data['predraw']['serviceTime'] = date('Y-m-d H:i:s');
							$data['predraw']['intervalM'] = 1;	
                          
                            $samasye = "SELECT kalaparichaya, bh, hash, dinankavannuracisi
							  FROM gellaluhogiondu_trx5
							  ORDER BY shonu DESC LIMIT 1";
							$samasyephalitansa=$conn->query($samasye);
							$samasyesreni = mysqli_fetch_array($samasyephalitansa);
                          
							$data['settled']['issueNumber'] = $samasyesreni['kalaparichaya'];
							$data['settled']['sumCount'] = null;
							$data['settled']['premium'] = 1;
							$data['settled']['blockID'] = $samasyesreni['hash'];
							$data['settled']['number'] = $samasyesreni['bh'];
						}else if($typeId == 16){
							$samasye = "SELECT atadaaidi, dinankavannuracisi
							  FROM gelluonduhogu_trx10
							  ORDER BY kramasankhye DESC LIMIT 1";
							$samasyephalitansa=$conn->query($samasye);
							$samasyesreni = mysqli_fetch_array($samasyephalitansa);
							
							$data['predraw']['issueNumber'] = $samasyesreni['atadaaidi'];
							$data['predraw']['startTime'] = $samasyesreni['dinankavannuracisi'];
							$ondusamaya = strtotime('+1 minute', strtotime($samasyesreni['dinankavannuracisi']));
							$data['predraw']['endTime'] = date('Y-m-d H:i:s', $ondusamaya);
							$data['predraw']['serviceTime'] = date('Y-m-d H:i:s');
							$data['predraw']['intervalM'] = 1;	
                            
                            $samasye = "SELECT kalaparichaya, bh, hash, dinankavannuracisi
							  FROM gellaluhogiondu_trx10
							  ORDER BY shonu DESC LIMIT 1";
							$samasyephalitansa=$conn->query($samasye);
							$samasyesreni = mysqli_fetch_array($samasyephalitansa);
                          
							$data['settled']['issueNumber'] = $samasyesreni['kalaparichaya'];
							$data['settled']['sumCount'] = null;
							$data['settled']['premium'] = 1;
							$data['settled']['blockID'] = $samasyesreni['hash'];
							$data['settled']['number'] = $samasyesreni['bh'];
						}
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
