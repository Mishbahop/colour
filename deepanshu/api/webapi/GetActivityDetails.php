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
		if (isset($shonupost['bannerId']) && isset($shonupost['language']) && isset($shonupost['random']) && isset($shonupost['signature']) && isset($shonupost['timestamp'])) {
			$bannerId = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['bannerId']));
			$language = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['language']));
			$random = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['random']));
			$signature = htmlspecialchars(mysqli_real_escape_string($conn, $shonupost['signature']));
			$shonustr = '{"bannerId":'.$bannerId.',"language":'.$language.',"random":"'.$random.'"}';
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
						if($bannerId == 71){
							$data['title'] = 'Member Recharge Benefits';
							$data['img'] = '[{"Id":"17225024498060d979egil58","Url":"https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/banner/rechargebenifet.png"}]';
							$data['coverUrl'] = 'https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/banner/rechargebenifetposter.png';
							$data['jumpType'] = 3;
						}
						else if($bannerId == 53){
							$data['title'] = "Win Streak\t";
							$data['img'] = '<h3 style="text-align: center; color: #000000;"><strong>Bonus Rules</strong></h3><div style="text-align: center;"><img src="https://battery247.in/assets/notification.jpg" alt="Bonus Image" style="width: 100%; max-width: 1080px; border-radius: 8px;"></div><h4 style="text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #ffcc00;"><strong>1. Minimum Bet Amount:</strong> ₹10</h4><h4 style="text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #ffcc00;"><strong>2. Win Streak:</strong> The win streak should continue without any period skipped.</h4><h4 style="text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #ffcc00;"><strong>3. Applicable Game:</strong> This bonus is only available on <strong>WINGO</strong>!</h4><h4 style="text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #ffcc00;"><strong>4. Contact Your Tutor:</strong> To claim the bonus, please reach out to your Tutor.</h4>';
                          $data['coverUrl'] = 'https://ossimg.91admin123admin.com/91club/editor/editor_20241129214224thw2.jpg';
						  $data['jumpType'] = 1;
						}
                      	else if($bannerId == 69){
							$data['title'] = "Join Telegram\t";
							$data['img'] = '<h3 style="text-align: center; color: #000000;"></h3><div style="text-align: center;"></div><h4 style="text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #ffcc00;"><strong> Bonus is waiting for you, join our telegram channel and get the bonus. </strong></h4><h4 style="text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #ffcc00;"><strong> To join our official Telegram channel, click on the link given below.</strong> </h4><h4 style="text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #ffcc00;"><strong> <a style="color:#5a5af1;" href="https://t.me/91clubsofficial">
								
								https://t.me/91clubsofficial
								</a>
								</strong> </h4>';
                          $data['coverUrl'] = 'https://ossimg.91admin123admin.com/91club/editor/editor_20241129214224thw2.jpg';
						  $data['jumpType'] = 1;
						}
						else if($bannerId == 59){
							$data['title'] = 'LUCKY SPIN TO WIN IPHONE 16 PRO MAX';
							$data['img'] = '<p><br></p><h1 style="font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-stretch: normal; line-height: normal; font-family: &quot;Microsoft YaHei&quot;, ΢���ź�, SimSun, ����, Arial, Helvetica, sans-serif; color: rgb(51, 51, 51); text-align: center;"><span style="text-align: left;"><font face="Helvetica Neue"><span style="font-size: 13px;"><font color="#ffff00">Click link to apply bonus ➡️ ➡️➡️</font><a href="https://t.me/150Rupya_official/wap/indexFDetail.jsp?applyId=20240502001" target="_blank"><font color="#000000" style="background-color: rgb(255, 255, 0);"><b>[link]</b></font></a></span></font></span></h1><p><img src="https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/banner/aviator89.jpg" style="width: 1080px;"><br></p>';
							$data['coverUrl'] = 'https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/banner/avitorgameimage.png';
							$data['jumpType'] = 1;
						}
						else if($bannerId == 47){
							$data['title'] = "91 Club Support Funds\t";
							$data['img'] = '<p><img src="https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/banner/vip8585.jpg" style="width: 658px;"><br></p>';
							$data['img'] = '<h3 style="text-align: center; color: #000000;"><strong>Bonus Rules</strong></h3><div style="text-align: center;"></div><h4 style="text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #ffcc00;"><strong>1. Support Fund is given only on the amount of recharge you loose</strong></h4><h4 style="text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #ffcc00;"><strong>2. Contact your Tutor to claim support fund</h4><h4 style="text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #ffcc00;"></h4>';
                            $data['coverUrl'] = 'https://ossimg.91admin123admin.com/91club/editor/editor_20241129214224thw2.jpg';
							$data['jumpType'] = 1;
						}
						else if($bannerId == 66){
							$data['title'] = "91 Club RECRUITING AGENTS\t";
                            $data['img'] = '<h3 style="text-align: center; color: #000000;"><strong>Bonus Rules</strong></h3><div style="text-align: center;"></div><h4 style="text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #ffcc00;"><strong>1. Contact your Official Tutor for more information</strong></h4><h4 style="text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #ffcc00;"><strong>  </h4><h4 style="text-align: center; font-family: Arial, sans-serif; font-size: 14px; color: #ffcc00;"></h4>';
                          
							$data['coverUrl'] = 'https://pub-628304d7b25d454abf303bfafba6a2e0.r2.dev/ALADDINN/banner/Banner_20240514165423npjh.png';
							$data['jumpType'] = 1;
						}
						
						$res['data'] = $data;
						$res['code'] = 0;
						$res['msg'] = 'Succeed';
						$res['msgCode'] = 0;
						http_response_code(200);
						echo json_encode($res);			
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