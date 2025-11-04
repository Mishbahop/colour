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
						$data['protocols'] = '<div class="content" style="padding: 16px;"><h3 class="text-xs-center" style="box-sizing: inherit; 
						font-family: Futura; margin: 0px 0px 12px; background-repeat: no-repeat; padding: 0px; text-align: center !important;">
						<p style="box-sizing: inherit; margin-bottom: 16px; background-repeat: no-repeat; padding: 0px; font-size: 14px; text-align: start;">
						<font color="#000" style="">This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when 
						You use the Service and tells You about Your privacy rights and how the law protects You.</font></p>
						</h3><h1 style="box-sizing: inherit; margin-top: 0px; margin-bottom: 0px; font-family: Futura; background-repeat: no-repeat; padding: 0px;">
						<font color="#000" style="">Interpretation and Definitions</font></h1>
						<h2 style="box-sizing: inherit; font-family: Futura; margin: 0px; background-repeat: no-repeat; padding: 0px;"><font color="#000" style="">Interpretation</font>
						</h2><h3 class="text-xs-center" style="box-sizing: inherit; font-family: Futura; margin: 0px 0px 12px; background-repeat: no-repeat; padding: 0px; 
						text-align: center !important;"><p style="box-sizing: inherit; margin-bottom: 16px; background-repeat: no-repeat; padding: 0px; font-size: 14px; 
						text-align: start;"><font color="#000" style="">The words of which the initial letter is capitalized have 
						meanings defined under the following conditions.</font></p><p style="box-sizing: inherit; margin-bottom: 16px; background-repeat: no-repeat; 
						padding: 0px; font-size: 14px; text-align: start;"><font color="#000" style="">The following definitions shall have the same meaning regardless 
						of whether they appear in singular or in plural.</font></p></h3><h2 style="box-sizing: inherit; font-family: Futura; margin: 0px; 
						background-repeat: no-repeat; padding: 0px;"><font color="#000" style="">Definitions</font></h2><h3 class="text-xs-center" style="box-sizing: inherit; 
						font-family: Futura; margin: 0px 0px 12px; background-repeat: no-repeat; padding: 0px; text-align: center !important;">
						<p style="box-sizing: inherit; margin-bottom: 16px; background-repeat: no-repeat; padding: 0px; font-size: 14px; text-align: start;">
						<font color="#000" style="">For the purposes of this Privacy Policy:</font></p><ul style="box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; 
						margin-left: 0px; background-repeat: no-repeat; padding: 0px 0px 0px 24px; font-size: 14px; text-align: start;">
						<li style="box-sizing: inherit; background-repeat: no-repeat; padding: 0px; margin: 0px;"><p style="box-sizing: inherit; margin-bottom: 16px; 
						background-repeat: no-repeat; padding: 0px;"><font color="#000" style=""><span style="box-sizing: inherit; background-repeat: 
						no-repeat; padding: 0px; margin: 0px; font-weight: bolder;">You</span>means the individual accessing or using the Service, or the company, 
						or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.</font></p></li><li style="box-sizing: 
						inherit; background-repeat: no-repeat; padding: 0px; margin: 0px;"><p style="box-sizing: inherit; margin-bottom: 16px; background-repeat: 
						no-repeat; padding: 0px;"><font color="#000" style=""><span style="box-sizing: inherit; background-repeat: no-repeat; padding: 0px; margin: 0px; 
						font-weight: bolder;">Company</span>(referred to as either "the Company", "We", "Us" or "Our" in this Agreement) refers to<a href="https://numberguest.shop" 
						target="_blank">91club Game</a>.</font></p></li><li style="box-sizing: inherit; background-repeat: no-repeat; padding: 0px; margin: 0px;"><font color="#000" 
						style=""><span style="box-sizing: inherit; background-repeat: no-repeat; padding: 0px; margin: 0px; font-weight: bolder;">Affiliate</span>
						means an entity that controls, is controlled by or is under common control with a party, where "control" means ownership of 50% or more of the shares, 
						equity interest or other securities entitled to vote for election of directors or other managing authority.</font></li><li style="box-sizing: inherit; 
						background-repeat: no-repeat; padding: 0px; margin: 0px;"><font color="#000" style=""><span style="box-sizing: inherit; background-repeat: no-repeat; 
						padding: 0px; margin: 0px; font-weight: bolder;">Account</span>means a unique account created for You to access our Service or parts of our Service.</font>
						</li><li style="box-sizing: inherit; background-repeat: no-repeat; padding: 0px; margin: 0px;"><font color="#000" style="">
						<span style="box-sizing: inherit; background-repeat: no-repeat; padding: 0px; margin: 0px; font-weight: bolder;">Website</span>
						refers to<a href="https://numberguest.shop" target="_blank">91club Game</a>, accessible from<a href="https://numberguest.shop" 
						target="_blank">91club Game</a></font></li><li style="box-sizing: inherit; background-repeat: no-repeat; padding: 0px; margin: 0px;">
						<font color="#000" style=""><span style="box-sizing: inherit; background-repeat: no-repeat; padding: 0px; margin: 0px; font-weight: bolder;">
						Service</span>refers to the Website.</font></li><li style="box-sizing: inherit; background-repeat: no-repeat; padding: 0px; margin: 0px;">';
						
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