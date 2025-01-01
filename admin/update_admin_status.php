<?php
include "../config.php"; 

if (isset($_POST['id']) && isset($_POST['position'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $position = $conn->real_escape_string($_POST['position']);

    // Update the status in the database
    $query = "UPDATE `admin` SET `position` = '$position' WHERE `id` = $id";
    if ($conn->query($query) === TRUE) {
        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>