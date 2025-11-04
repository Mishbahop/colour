<?php
// Include database connection
include("serive/samparka.php");

// Get yesterday's date
$yesterday = date('Y-m-d', strtotime('-1 day'));
$today = date('Y-m-d'); 
$created_timestamp = $today . " 00:00:00";

// Prepare the SELECT query to fetch and sum yesterday's data for each balakedara
$selectQuery = $conn->prepare("
    SELECT 
        balakedara, 
        SUM(ayoga) as total_commission 
    FROM 
        vyavahara 
    WHERE 
        DATE(tiarikala) = ?
    GROUP BY 
        balakedara
");

if ($selectQuery === false) {
    // If preparation fails, output the error
    echo "Error in preparing select query: " . $conn->error;
    exit;
}

// Bind the parameter for the SELECT query
$selectQuery->bind_param("s", $yesterday);

// Execute the SELECT query
$selectQuery->execute();

// Get the result
$result = $selectQuery->get_result();

if ($result->num_rows > 0) {
    // Prepare the insert query with placeholders for inserting into the commission table
    $insertQuery = $conn->prepare("
        INSERT INTO commission (rebateAmount_Last, user_id, created_at, created_timestamp) 
        VALUES (?, ?, ?, ?)
    ");
    
    if ($insertQuery === false) {
        // If preparation fails, output the error
        echo "Error in preparing insert query: " . $conn->error;
        exit;
    }

    // Iterate through the results and execute the insert queries
    while ($row = $result->fetch_assoc()) {
        $balakedara = $row['balakedara'];
        $total_commission = $row['total_commission'];

        // Check if a record with the same user_id and created_at already exists
        $checkQuery = $conn->prepare("
            SELECT 1 FROM commission 
            WHERE user_id = ? AND created_at = ?
        ");
        $checkQuery->bind_param("ss", $balakedara, $today);
        $checkQuery->execute();
        $checkQuery->store_result();

        if ($checkQuery->num_rows == 0) {
            // Bind values for the insert query only if no record exists
            $insertQuery->bind_param("dsss", $total_commission, $balakedara, $today, $created_timestamp);
            if (!$insertQuery->execute()) {
                echo "Error in insert query execution: " . $insertQuery->error;
            }
        } else {
            // Optionally log duplicate entries if needed
            echo "Duplicate entry found for user_id: $balakedara on $today. Skipping insert.\n";
        }

        $checkQuery->close();
    }

    // Close the prepared statement for insert
    $insertQuery->close();
} else {
    echo "No records found for yesterday's date.";
}

// Close connection
$conn->close();

echo "Commission table updated successfully!";
?>
