<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banned User Dtails</title>
    <style>
        /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #E3F2FD; /* Light Blue Background */
    margin: 0;
    padding: 0;
    color: #fff;
}

/* Container */
.container {
    width: 90%;
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
    background: linear-gradient(135deg, #0D47A1, #1976D2); /* Dark to Light Blue */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    text-align: center;
}

/* Header */
h1 {
    font-size: 40px;
    color: #FFF;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 20px;
}

/* Messages */
.message {
    padding: 15px;
    margin: 20px auto;
    border-radius: 5px;
    text-align: center;
    font-weight: bold;
    max-width: 80%;
}

.success {
    background-color: #1E88E5;
    color: white;
    border-left: 5px solid #1565C0;
}

.error {
    background-color: #D32F2F;
    color: white;
    border-left: 5px solid #B71C1C;
}

.warning {
    background-color: #FFA000;
    color: white;
    border-left: 5px solid #E65100;
}

/* Table */
.table-container {
    overflow-x: auto;
    margin-top: 30px;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #FFFFFF;
    color: #333;
    border-radius: 10px;
    overflow: hidden;
}

table th, table td {
    padding: 15px;
    text-align: left;
    border-bottom: 2px solid #BBDEFB;
}

table th {
    background-color: #1976D2;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
}

table tr:nth-child(even) {
    background-color: #E3F2FD;
}

table tr:hover {
    background-color: #BBDEFB;
}

/* Button Styles */
.button-container {
    text-align: center;
    margin-top: 20px;
}

button {
    padding: 12px 20px;
    font-size: 16px;
    font-weight: bold;
    background: linear-gradient(135deg, #1976D2, #42A5F5);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin: 5px;
}

button:hover {
    background: linear-gradient(135deg, #0D47A1, #1976D2);
    transform: translateY(-2px);
}

button:active {
    transform: translateY(1px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 95%;
        padding: 15px;
    }

    h1 {
        font-size: 32px;
    }

    table th, table td {
        font-size: 14px;
    }

    button {
        font-size: 14px;
        padding: 10px 16px;
    }
}
    </style>
</head>
<body>

    <div class="container">
        <h1>Banned User Dtails</h1>

        <!-- Success or Error Message -->
        <?php echo $message ?? ''; ?>

    </div>

<?php
include("conn.php");

// Function to check if any user has placed bets on different types in the same period
function checkIllegalBets($conn) {
    $query = "
        SELECT byabaharkarta, kalaparichaya, COUNT(DISTINCT ojana) as bet_type_count
        FROM (
            SELECT byabaharkarta, kalaparichaya, ojana FROM bajikattuttate_zehn
            UNION ALL
            SELECT byabaharkarta, kalaparichaya, ojana FROM bajikattuttate
            UNION ALL
            SELECT byabaharkarta, kalaparichaya, ojana FROM bajikattuttate_drei
            UNION ALL
            SELECT byabaharkarta, kalaparichaya, ojana FROM bajikattuttate_funf
            UNION ALL
            SELECT byabaharkarta, kalaparichaya, ojana FROM bajikattuttate_trx
            UNION ALL
            SELECT byabaharkarta, kalaparichaya, ojana FROM bajikattuttate_trx3
            UNION ALL
            SELECT byabaharkarta, kalaparichaya, ojana FROM bajikattuttate_trx5
            UNION ALL
            SELECT byabaharkarta, kalaparichaya, ojana FROM bajikattuttate_trx10
        ) AS all_bets
        GROUP BY byabaharkarta, kalaparichaya
        HAVING bet_type_count > 1
    ";

    // Execute the query
    if ($stmt = $conn->prepare($query)) {
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result; // Return result with users who have illegal bets
        } else {
            return false;
        }
    } else {
        echo "<div class='message error'>Error preparing check query: " . $conn->error . "</div>";
        return false;
    }
}

// Function to ban a user and insert into the banned_users table
function banUser($conn, $userid, $reason) {
    // Check if the user is already in the banned_users table
    $check_query = "SELECT id FROM banned_users WHERE user_id = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='message warning'>User with ID: $userid is already banned.</div>";
        return;
    }

    // Insert into the banned_users table
    $insert_query = "INSERT INTO banned_users (user_id, reason) VALUES (?, ?)";
    if ($stmt = $conn->prepare($insert_query)) {
        $stmt->bind_param("ss", $userid, $reason);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<div class='message success'>User with ID: $userid has been banned.</div>";
        } else {
            echo "<div class='message error'>Error banning user with ID: $userid.</div>";
        }
    } else {
        echo "<div class='message error'>Error preparing insert query for user ID: $userid.</div>";
    }
}

// Check for illegal bets by any user
$illegal_bets = checkIllegalBets($conn);

if ($illegal_bets) {
    // Loop through each row in the result
    while ($row = $illegal_bets->fetch_assoc()) {
        $userid = $row['byabaharkarta'];
        $reason = "Placed bets on multiple types in the same period (Period: " . $row['kalaparichaya'] . ")";
        // Ban the user and insert the reason into the banned_users table
        banUser($conn, $userid, $reason);
    }  
} else {
    echo "<div class='message success'>No users have placed bets on different types in the same period.</div>";
}
?>

</body>
</html>
