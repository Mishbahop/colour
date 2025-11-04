<?php
	$conn = mysqli_connect('localhost', 'numbergu_Freegame', 'numbergu_Freegame', 'numbergu_Freegame');
	
	if (!$conn) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}
	
	date_default_timezone_set("Asia/Kolkata"); 
?>