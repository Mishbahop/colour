<?php
include("conn.php");
$username = "";
$err = "";

// If request method is POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']);

    if (empty($err)) {
        // Update existing table
        mysqli_query($conn, "UPDATE hastacalita_phalitansa_funf_2 SET sthiti='0'");

        $sql = "UPDATE hastacalita_phalitansa_zehn SET sthiti='1' WHERE sankhye=$username";
        if ($conn->query($sql) === TRUE) {
            // Delete all rows from gelluonduhogu_zehn_zehn before inserting (optional, if needed)
            mysqli_query($conn, "DELETE FROM gelluonduhogu_zehn_zehn_2");

            // Insert the new value into gelluonduhogu_zehn_zehn
            $insertQuery = "INSERT INTO gelluonduhogu_zehn_zehn_2 (id, manual_number) VALUES (1, $username)
                            ON DUPLICATE KEY UPDATE manual_number = VALUES(manual_number)";

            if (mysqli_query($conn, $insertQuery)) {
                header("Location: wingo3min.php");
                exit();
            } else {
                echo '<h1 style="text-align: center;">Insertion Failed: ' . mysqli_error($conn) . '</h1>';
            }
        } else {
            echo '<h1 style="text-align: center;">Update Failed: ' . mysqli_error($conn) . '</h1>';
        }
    }
}
?>
