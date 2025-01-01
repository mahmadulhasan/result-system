<?php
include "../config.php"; 

if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $status = $conn->real_escape_string($_POST['status']);

    // Update the status in the database
    $query = "UPDATE `notice` SET `status` = '$status' WHERE `id` = $id";
    if ($conn->query($query) === TRUE) {
        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>