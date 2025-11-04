<?php
// Include the database connection file
include("serive/samparka.php");

// Get the phone parameter from the query string
$phone = $_GET['userId'] ?? null;

if (!$phone) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing userid']);
    exit;
}

// Step 1: Query `shonu_subjects` to get the id where phone = $phone
$sql_subject = "SELECT id FROM shonu_subjects WHERE mobile = '$phone'";
$result_subject = $conn->query($sql_subject);

if ($result_subject->num_rows === 0) {
    http_response_code(404);
    echo json_encode(['error' => 'User not found']);
    exit;
}

$row_subject = $result_subject->fetch_assoc();
$user_id = $row_subject['id'];

// Log the user details to log.txt
$logMessage = "User found: Phone = $phone, User ID = $user_id\n";
file_put_contents("log.txt", $logMessage, FILE_APPEND);  // Append to log.txt

// Step 2: Use the extracted id to query `shonu_kaichila` for balance
$sql_kaichila = "SELECT motta AS balance FROM shonu_kaichila WHERE balakedara = $user_id";
$result_kaichila = $conn->query($sql_kaichila);

if ($result_kaichila->num_rows === 0) {
    http_response_code(404);
    echo json_encode(['error' => 'User data not found in shonu_kaichila']);
} else {
    $row_kaichila = $result_kaichila->fetch_assoc();

    // Send the JSON response without any logs
    echo json_encode(['balance' => $row_kaichila['balance']]);
}

// Close the connection
$conn->close();
?>
