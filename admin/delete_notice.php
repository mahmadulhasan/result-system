<?php
include "../config.php"; // Database connection

// Check if the `id` parameter is provided
if (isset($_GET['id'])) {
    $noticeId = intval($_GET['id']); // Get the notice ID from the URL parameter

    // Prepare the DELETE query
    $query = "DELETE FROM `notice` WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $noticeId);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        echo "<script>alert('Notice deleted successfully'); window.location.href = 'notice.php';</script>";
    } else {
        echo "<script>alert('Error deleting notice'); window.location.href = 'notice.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request'); window.location.href = 'notice.php';</script>";
}
?>
