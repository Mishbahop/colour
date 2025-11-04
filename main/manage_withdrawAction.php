<?php 
	include('conn.php');
	
	if(isset($_POST['type'])){
		$id=$_POST['id'];
        $remark=$_POST['remark'];
		$today=date( 'Y-m-d H:i:s' );
		
		$finduid=mysqli_query($conn,"select * from `hintegedukolli` where `shonu`='".$id."'");
		$finduidArray = mysqli_fetch_array($finduid);
		$userid = $finduidArray['balakedara'];
		$serial = $finduidArray['dharavahi'];
		$amount = $finduidArray['motta'];
		$bid = $finduidArray['khateshonu'];
		
		$sql_d = "SELECT * FROM tbl_pg WHERE status = '1'";		
		$run_d = mysqli_query($conn, $sql_d);
		$rund_f = mysqli_fetch_array($run_d);
		$gateway = $rund_f['value'];
		
		if($_POST['type']=='accept'){
			if($gateway == 'indianpay'){
				$date = date("Ymd");
				$time = time();
				//$serial = 'W' . $date . $time . rand(1000,9999);
				
				$inamt = $amount;
				
				$samasye = "SELECT khatehesaru, khatesankhye, kod, phalanubhavi
				  FROM khate WHERE byabaharkarta = $userid
				  AND shonu = $bid";
				$samasyephalitansa = $conn->query($samasye);
				$row = mysqli_fetch_array($samasyephalitansa);								
				
				$url = "https://indianpay.co.in/admin/single_transaction";
				
				$salt = '';
	
				$merchant_id = 'INDIANPAY10045';
				$merchant_token = 'KFDZW5BHD2y8kzj8cW3t6yFV3jAX3iNS';
				$account_no = $row['khatesankhye'];
				$ifsccode = $row['kod'];
				$amount = $amount;
				$bankname = $row['khatehesaru'];
				$remark = 'remark';
				$orderid = $serial;
				$name = $row['phalanubhavi'];
				
				$findmob=mysqli_query($conn,"select mobile from `shonu_subjects` where `id`='".$userid."'");
				$findmobArray = mysqli_fetch_array($findmob);
				$moble = $findmobArray['mobile'];				
				$contact = $moble;
				
				$email = 'withgateway@91appy.in';
				
				$data_enc = array(
					'merchant_id' => $merchant_id,
					'merchant_token' => $merchant_token,
					'account_no' => $account_no,
					'ifsccode' => $ifsccode,
					'amount' => $amount,
					'bankname' => $bankname,
					'remark' => $remark,
					'orderid' => $orderid,
					'name' => $name,
					'contact' => $contact,
					'email' => $email
				);
				
				$jsonData_enc = json_encode($data_enc);
				$encoded = base64_encode($jsonData_enc);
				
				$data = array(
					'salt' => $encoded,
					'merchant_id' => $merchant_id,
					'merchant_token' => $merchant_token,
					'account_no' => $account_no,
					'ifsccode' => $ifsccode,
					'amount' => $amount,
					'bankname' => $bankname,
					'remark' => $remark,
					'orderid' => $orderid,
					'name' => $name,
					'contact' => $contact,
					'email' => $email
				);
				
				$jsonData = json_encode($data);
				
				$ch = curl_init($url);
	
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, [
					'Content-Type: application/json',
					'Content-Length: ' . strlen($jsonData)
				]);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
				
				$response = curl_exec($ch);
				
				$un = json_decode($response, true);
				
				if($un['status'] == 200){
					$sqlA = mysqli_query($conn,"Update `hintegedukolli` set sthiti = '1',tike = 'Completed',dinankavannuracisi = '".$today."' where `shonu`='".$id."' ");
				}
			}			
			else if($gateway == 'manual'){
				$sqlA = mysqli_query($conn,"Update `hintegedukolli` set sthiti = '1',tike = 'Completed',remarks = '".$remark."',dinankavannuracisi = '".$today."' where `shonu`='".$id."' ");
			}
			//$sqlA = mysqli_query($conn,"Update `hintegedukolli` set sthiti = '1',remarks = 'Completed',tike = 'Completed',dinankavannuracisi = '".$today."' where `shonu`='".$id."' ");
			echo 1;
		}
		else if($_POST['type']=='reject'){
			$sqlA = mysqli_query($conn, "UPDATE `hintegedukolli` 
                             SET sthiti = '2', 
                                 tike = 'Rejected', 
                                 dinankavannuracisi = '".$today."', 
                                 remarks = '".$remark."' 
                             WHERE `shonu`='".$id."'");

$sqlwallet = mysqli_query($conn, "UPDATE `shonu_kaichila` 
                                  SET `motta` = ROUND((motta + '$amount'), 2) 
                                  WHERE `balakedara`= '$userid'");
			echo 2;
		}
	}
?>