<?php
include "../config.php";

// Check if the form is submitted and the `id` is provided
if (isset($_POST['update_status']) && isset($_POST['id'])) {
    $contactId = intval($_POST['id']); // Get the contact ID from the form submission

    // Update the status to 'inactive'
    $query = "UPDATE `contact_form` SET `status` = 'inactive' WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $contactId);

    if ($stmt->execute()) {
        // Redirect back to the notices page after successful update
        echo "<script>alert('Status updated to inactive.'); window.location.href = 'message.php';</script>";
    } else {
        echo "<script>alert('Error updating status.'); window.location.href = 'message.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'message.php';</script>";
}
?>
