<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'numbergu_Freegame');
define('DB_PASSWORD', 'numbergu_Freegame');
define('DB_NAME', 'numbergu_Freegame');

function getDBConnection() {
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>
