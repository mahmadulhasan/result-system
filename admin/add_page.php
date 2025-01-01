<?php
include "../config.php";

if (isset($_POST['submit_page'])) {
    // Input sanitization
    $page_name = htmlspecialchars($conn->real_escape_string($_POST['page_name']));
    $heading1 = htmlspecialchars($conn->real_escape_string($_POST['heading1']));
    $body1 = htmlspecialchars($conn->real_escape_string($_POST['body1']));
    $heading2 = htmlspecialchars($conn->real_escape_string($_POST['heading2']));
    $body2 = htmlspecialchars($conn->real_escape_string($_POST['body2']));
    $date = date("Y-m-d");

    // File upload logic
    $upload_dir = 'upload/image/';
    $absolute_upload_dir = '../' . $upload_dir; // Path for relocating files
    $allowed_extensions = ['jpg', 'jpeg', 'png'];

    if (!is_dir($absolute_upload_dir)) {
        mkdir($absolute_upload_dir, 0777, true);
    }

    $unique_id = uniqid();

    // Handle Image 1
    $image1_path = ''; // Path to be stored in the database
    if (!empty($_FILES['image_1']['name'])) {
        $image1_name = $_FILES['image_1']['name'];
        $image1_tmp = $_FILES['image_1']['tmp_name'];
        $image1_ext = strtolower(pathinfo($image1_name, PATHINFO_EXTENSION));

        if (!in_array($image1_ext, $allowed_extensions)) {
            die("Invalid file type for Image 1. Only JPG, JPEG, and PNG are allowed.");
        }

        $image1_filename = $unique_id . '_1.' . $image1_ext;
        $image1_path = $upload_dir . $image1_filename; // Relative path for the database
        $image1_full_path = $absolute_upload_dir . $image1_filename; // Absolute path for relocation

        if (!move_uploaded_file($image1_tmp, $image1_full_path)) {
            die("Failed to upload Image 1.");
        }
    }

    // Handle Image 2
    $image2_path = ''; // Path to be stored in the database
    if (!empty($_FILES['image_2']['name'])) {
        $image2_name = $_FILES['image_2']['name'];
        $image2_tmp = $_FILES['image_2']['tmp_name'];
        $image2_ext = strtolower(pathinfo($image2_name, PATHINFO_EXTENSION));

        if (!in_array($image2_ext, $allowed_extensions)) {
            die("Invalid file type for Image 2. Only JPG, JPEG, and PNG are allowed.");
        }

        $image2_filename = $unique_id . '_2.' . $image2_ext;
        $image2_path = $upload_dir . $image2_filename; // Relative path for the database
        $image2_full_path = $absolute_upload_dir . $image2_filename; // Absolute path for relocation

        if (!move_uploaded_file($image2_tmp, $image2_full_path)) {
            die("Failed to upload Image 2.");
        }
    }

    // Insert data
    $stmt = $conn->prepare("INSERT INTO new_pages (page_name, heading1, body1, image1, heading2, body2, image2, date, action) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $action = 'active';
    $stmt->bind_param("sssssssss", $page_name, $heading1, $body1, $image1_path, $heading2, $body2, $image2_path, $date, $action);

    if ($stmt->execute()) {
        echo "<script>alert('Page added successfully');</script>";
        echo "<script>window.location.href = 'new-pages.php';</script>";
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
