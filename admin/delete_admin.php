<?php
include "../config.php"; // Database connection

// Check if the `id` parameter is provided
if (isset($_GET['id'])) {
    $adminId = intval($_GET['id']); // Get the notice ID from the URL parameter

    // Prepare the DELETE query
    $query = "DELETE FROM `admin` WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $adminId);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        echo "<script>alert('Admin deleted successfully'); window.location.href = 'user.php';</script>";
    } else {
        echo "<script>alert('Error deleting admin'); window.location.href = 'user.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href = 'user.php';</script>";
}
?>
