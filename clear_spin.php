<?php
include("serive/samparka.php");
if (isset($conn)) {
    $updateSpinQuery = "UPDATE shonu_kaichila SET spin = 0 WHERE spin != 0";
    $updateResult = $conn->query($updateSpinQuery);

    if ($updateResult) {
        echo "Rows updated successfully!";
    } else {
        echo "Error: Unable to update rows. " . $conn->error;
    }
} else {
    echo "Database connection not found.";
}
?>