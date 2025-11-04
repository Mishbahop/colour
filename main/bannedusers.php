<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banned Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .message.info {
            padding: 15px;
            background-color: #e7f3fe;
            border-left: 5px solid #2196F3;
            color: #31708f;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<?php
include("conn.php");

$query = "SELECT * FROM banned_users ORDER BY created_at DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<thead><tr><th>ID</th><th>User ID</th><th>Reason</th><th>Banned At</th></tr></thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['user_id']}</td>
                <td>{$row['reason']}</td>
                <td>{$row['created_at']}</td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='message info'>No banned users found.</div>";
}
?>

</body>
</html>
