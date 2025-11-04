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
						$data['playingGuide'] = '<p><img src="https://mishbahop.github.io/91club/editor/editor_202403081456351tsp.png" style=\"width: 461px;\"></p><p><b>1. How to Register<br>- Fill Your Phone Number<br>- Set Your Own Password ( 8 min with big-small letters and number ）<br>- Confirm The Password<br>- Invitation code<br>- Click I Have Read And Agree<br>- Click Register<br><br></b><img src="https://mishbahop.github.io/91club/editor/editor_202403081501377yr6.png" style=\"width: 461px;\"><b><br></b></p><p><b>2. How to betting on WINGO game<br></b><b>- Enter Wingo game&nbsp;<br></b><b>- Select the duration of the game (1 minute, 3 minutes, 5 minutes, 10 minutes)<br></b><b>Green&nbsp; : if the result shows 1,3,7,9<br></b><b>Red&nbsp; &nbsp; : if the result shows 2,4,6,8<br></b><b>Violet&nbsp; : if the result shows 0 or 5<br></b><b>Small&nbsp; : if the result shows 0,1,2,3,4<br></b><b>Big&nbsp; &nbsp; : if the result shows 5,6,7,8,9<br></b><b>This company not allowed to place Illegal betting<br></b><b>Exp ：Betting (Big and small together) or (Red and Green together) or (bet more than 7 number) in the same time.<br><br></b><img src="https://mishbahop.github.io/91club/editor/editor_20240308150224e2vu.png" style=\"width: 413px;\"><br></p><p><b>3.How to recharge<br></b><b>Click Wallet Icon, Click The Recharge Button, and we have 5 ways to make a recharge (UPIPAY-APP,UPIPAY,UPI-TRANSFER, USDT, TRX )<br><br></b><img src="https://mishbahop.github.io/91club/editor/editor_20240308150628pv6u.png" style=\"width: 413px;\"><br></p><p><b>4. How to Withdraw<br></b><b>Click Wallet menu, click Withdraw Button.<br></b><b>- Enter withdraw amount<br></b><b>- Make Sure Your Total Bet already 0<br></b><b>- Select Your Bank Account Or Add Your Bank Account<br></b><b>- Input Amount You Want To Withdraw<br></b><b>- Input Your Login Password<br><br></b><img src="https://mishbahop.github.io/91club/editor/editor_20240308151024u3vh.png" style=\"width: 413px;\"><br></p><p><b>5. Betting History<br></b><b>When The Betting Complete You Can Click My History to see Your Bet Record, You Can Check The Chart Trend for helping you decide the next bet you do also game history showing the previous result.<br><br></b><img src="https://mishbahop.github.io/91club/editor/editor_20240308151041xmqq.png" style=\"width: 413px;\"><br></p><p><b>6. Transaction<br></b><b>You can check all the transaction or activity you do inside the account on transaction, that you can find on account menu<br><br></b><img src="https://mishbahop.github.io/91club/editor/editor_20240308154102esl7.png" style=\"width: 413px;\"><br></p><p><b>7.Promotion<br></b><b>- If you have a downline or referral member use your own link to register and if they make a recharge you can claim a reward. The agent will get a minimum commission of 0.7 % (level 1) and 0.75% (level 2) from each transaction that is done by the referral (Added every day at 01:00 AM), each game having different percentage you can check it on Promotion menu to check and sport not count on rebate.<br></b><b>- You Can Click The Sharing Invitation Poster To See The Barcode<br><br></b><img src="https://mishbahop.github.io/91club/editor/editor_20240308154118c5ry.png" style=\"width: 413px;\"><br></p><p><b>8. Change Password<br></b><b>Follow the guide below to change password<br></b><b>- Login to 91CLUB account<br></b><b>- Press Account<br></b><b>- Press Setting menu<br></b><b>- Press Login Password.<br></b><b>- Fill your login password.<br></b><b>- Filll new login password&nbsp;<br></b><b>- Re-fill new login password&nbsp;<br></b><b>- Press Save Changes<br><br></b><img src="https://mishbahop.github.io/91club/editor/editor_20240308154139rjgt.png" style=\"width: 413px;\"><br></p><p><b>9. Binding Bank Account<br></b><b>- Login to 91CLUB account<br></b><b>- Press Wallet menu<br></b><b>- Press Withdraw menu<br></b><b>- Press Add Bank<br></b><b>- Fill all the collumn&nbsp;<br></b><b>- Press Save<br><br></b><img src="https://mishbahop.github.io/91club/editor/editor_20240308154159lbsi.png" style=\"width: 403px;\"><br></p><p><b>10. Forgot Password<br></b><b>- Go to 91CLUB website<br></b><b>- Press Account menu<br></b><b>- Press Forgot Password<br></b><b>- Fill phone number you register&nbsp;<br></b><b>- Press Send to receive OTP&nbsp;<br></b><b>- Fill the OTP&nbsp;<br></b><b>- Fill new password<br></b><b>- Refill new password<br></b><b>- Press i have read and agree privacy agreement<br></b><b>- Press Reset<br><br></b><img src="https://mishbahop.github.io/91club/editor/editor_20240308154404k1uj.jpg\" style=\"width: 403px;\"><br></p><p><b>11. App Download<br></b><b>To download the Apps you can go to Home page on the right top side you will see the download button<br><br></b><img src="https://mishbahop.github.io/91club/editor/editor_20240308154415qqwl.png" style=\"width: 403px;\"><br></p><p><b>12. About<br></b><b>Press about for more details regarding Privacy Policy and Risk Disclosure Agreement<br><br><br></b></p><p><img src="https://mishbahop.github.io/91club/editor/editor_20240308154429od9s.png" style=\"width: 403px;\"><br></p><p><b>13. Gift<br></b><b>- Login to 91CLUB account<br></b><b>- Press Account<br></b><b>- Press gift menu<br></b><b>- Fill the gift codes&nbsp;<br></b><b>- Press receive<br></b><b>Notes: To get gift codes you can ask with your superior agent</b></p><p><b><br></b></p>';
						
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