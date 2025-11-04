<?php
include("serive/samparka.php");
date_default_timezone_set('Asia/Kolkata');


$currentHour = date('G'); 
$currentMinute = date('i'); 
$currentTime = date('Y-m-d H:i:s'); 


if ($currentMinute == '30' && in_array($currentHour, [5, 11, 17, 23])) {

    $tables = [
        'gellaluhogiondu_trx',
        'gellaluhogiondu_trx3',
        'gellaluhogiondu_trx5',
        'gellaluhogiondu_trx10'
    ];

    foreach ($tables as $table) {
      
        $query = "SELECT bh FROM $table ORDER BY shonu DESC LIMIT 1";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $bhValue = $row['bh'];

          
            $modifiedBhValue = $bhValue - 2;

           
            $updateQuery = "UPDATE $table SET bh = $modifiedBhValue WHERE bh = $bhValue";
            if ($conn->query($updateQuery) === TRUE) {
                echo "Table: $table\n";
                echo "Original bh Value: $bhValue\n";
                echo "Modified bh Value (bh - 2): $modifiedBhValue\n";
                echo "Table updated successfully.\n";
            } else {
                echo "Error updating table $table: " . $conn->error . "\n";
            }
        } else {
            echo "No records found in $table table.\n";
        }
    }
} else {
    echo "Current time is not within the specified update schedule. Current server time: $currentTime\n";
}



?>
