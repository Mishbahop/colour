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
			$pageNo = isset($shonupost['pageNo']) ? intval($shonupost['pageNo']) : 1; // Default to 1 if not set
			$pageSize = isset($shonupost['pageSize']) ? intval($shonupost['pageSize']) : 10; // Default page size
			
			// Ensure $pageNo is at least 1
			if ($pageNo < 1) {
				$pageNo = 1;
			}
			
			$shonustr = '{"language":'.$language.',"pageNo":'.$pageNo.',"pageSize":'.$pageSize.',"random":"'.$random.'"}';
			if($pageNo > 9){
				$shonustr = '{"language":'.$language.',"pageNo":"'.$pageNo.'","pageSize":'.$pageSize.',"random":"'.$random.'"}';
			}
			$shonusign = strtoupper(md5($shonustr));
			if($shonusign == $signature){
				$bearer = explode(" ", $_SERVER['HTTP_AUTHORIZATION']);
				$author = $bearer[1];				
				$is_jwt_valid = is_jwt_valid($author);
				$data_auth = json_decode($is_jwt_valid, 1);
				if($data_auth['status'] === 'Success') {
					$sesquery = "SELECT akshinak FROM shonu_subjects WHERE akshinak = '$author'";
					$sesresult=$conn->query($sesquery);
					$sesnum = mysqli_num_rows($sesresult);
					if($sesnum == 1){
						// Calculate offset for pagination
						$offset = ($pageNo - 1) * $pageSize;
						
						// Fetch notifications ordered by created_at DESC
						$userId = $data_auth['payload']['id'];
						$notificationQuery = "SELECT * FROM notification WHERE user_id = $userId AND state = 1 ORDER BY created_at DESC LIMIT $offset, $pageSize";
						$notificationResult = $conn->query($notificationQuery);
						
						$data = [];
						$data['list'] = [];
						while ($notificationRow = $notificationResult->fetch_assoc()) {
							$data['list'][] = [
								'messageID' => $notificationRow['id'],
								'addTime' => $notificationRow['created_at'],
								'state' => $notificationRow['state'],
								'stateName' => $notificationRow['state'] == 1 ? 'have read' : 'unread',
								'title' => $notificationRow['title'],
								'messages' => "Your account was just logged in on {$notificationRow['created_at']}. If you have any questions, please feel free to contact online customer service! I wish you happy gaming and lots of ₹ profits!",
							];
						}
						
						// Get total count for pagination
						$countQuery = "SELECT COUNT(*) AS total_notifications FROM notification WHERE user_id = $userId AND state = 1";
						$countResult = $conn->query($countQuery);
						$countRow = $countResult->fetch_assoc();
						$totalCount = $countRow['total_notifications'];
						
						$data['pageNo'] = $pageNo;
						$data['totalPage'] = ceil($totalCount / $pageSize);
						$data['totalCount'] = $totalCount;
						
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
