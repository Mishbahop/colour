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
						if($typeId == 4){
							$data['typeID'] = $typeId;
							$data['gamePresentation'] = '
								<p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">30 sec 1 issue, 25 seconds to order, 5 seconds waiting for the draw. It opens all day. The total number of trade is 1440 issues.</font><br></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">If you spend 100 to trade, after deducting 2 service fee, your contract amount is 98:</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">1.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAE软雅黑&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">green: if the result shows 1,3,7,9 you will get (98*2) 196;If the result shows 5, you will get (98*1.5) 147</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">2.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAE软雅黑&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">red: if the result shows 2,4,6,8 you will get (98*2) 196;If the result shows 0, you will get (98*1.5) 147</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">3.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAE软雅黑&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">violet:if the result shows 0 or 5, you will get (98*4.5) 441</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">4. Select number:if the result is the same as the number you selected, you will get (98*9) 882</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">5. Select big: if the result shows 5,6,7,8,9 you will get (98 * 2) 196</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">6. Select small: if the result shows 0,1,2,3,4 you will get (98 * 2) 196</font></p>
   
							';
						} else if($typeId == 1){
							$data['typeID'] = $typeId;
							$data['gamePresentation'] = '
								<p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">1 minutes 1 issue, 45 seconds to order, 15 seconds waiting for the draw. It opens all day. The total number of trade is 1440 issues.</font><br></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">If you spend 100 to trade, after deducting 2 service fee, your contract amount is 98:</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">1.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAE软雅黑&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">green: if the result shows 1,3,7,9 you will get (98*2) 196;If the result shows 5, you will get (98*1.5) 147</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">2.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAE软雅黑&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">red: if the result shows 2,4,6,8 you will get (98*2) 196;If the result shows 0, you will get (98*1.5) 147</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">3.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAE软雅黑&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">violet:if the result shows 0 or 5, you will get (98*4.5) 441</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">4. Select number:if the result is the same as the number you selected, you will get (98*9) 882</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">5. Select big: if the result shows 5,6,7,8,9 you will get (98 * 2) 196</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">6. Select small: if the result shows 0,1,2,3,4 you will get (98 * 2) 196</font></p>
   
							';
						} else if($typeId == 2){
							$data['typeID'] = $typeId;
							$data['gamePresentation'] = '
								<p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">3 minutes 1 issue, 45 seconds to order, 15 seconds waiting for the draw. It opens all day. The total number of trade is 1440 issues.</font><br></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">If you spend 100 to trade, after deducting 2 service fee, your contract amount is 98:</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">1.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAE软雅黑&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">green: if the result shows 1,3,7,9 you will get (98*2) 196;If the result shows 5, you will get (98*1.5) 147</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">2.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAE软雅黑&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">red: if the result shows 2,4,6,8 you will get (98*2) 196;If the result shows 0, you will get (98*1.5) 147</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">3.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAE软雅黑&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">violet:if the result shows 0 or 5, you will get (98*4.5) 441</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">4. Select number:if the result is the same as the number you selected, you will get (98*9) 882</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">5. Select big: if the result shows 5,6,7,8,9 you will get (98 * 2) 196</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">6. Select small: if the result shows 0,1,2,3,4 you will get (98 * 2) 196</font></p>
   
   
							';
						} else if($typeId == 3){
							$data['typeID'] = $typeId;
							$data['gamePresentation'] = '
								<p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">5 minutes 1 issue, 45 seconds to order, 15 seconds waiting for the draw. It opens all day. The total number of trade is 1440 issues.</font><br></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">If you spend 100 to trade, after deducting 2 service fee, your contract amount is 98:</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">1.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAE软雅黑&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">green: if the result shows 1,3,7,9 you will get (98*2) 196;If the result shows 5, you will get (98*1.5) 147</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">2.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAE软雅黑&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">red: if the result shows 2,4,6,8 you will get (98*2) 196;If the result shows 0, you will get (98*1.5) 147</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">3.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAE软雅黑&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">violet:if the result shows 0 or 5, you will get (98*4.5) 441</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">4. Select number:if the result is the same as the number you selected, you will get (98*9) 882</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">5. Select big: if the result shows 5,6,7,8,9 you will get (98 * 2) 196</font></p><p style=\"\"><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">6. Select small: if the result shows 0,1,2,3,4 you will get (98 * 2) 196</font></p>
   
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
