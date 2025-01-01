<?php
include "config.php";
require 'Mailer.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $page = $_POST['page'];

    // Create Mailer instance
    $mailer = new Mailer();

    // Send thank-you email to the sender
    $thankYouBody = "
        <h2>Hello $name,</h2>
        <p>Thank you for reaching out. Here is a copy of your message:</p>
        <p><em>$message</em></p>
        <p>We will get back to you as soon as possible.</p>
    ";
    if (!$mailer->sendMail($email, $name, "Welcome to Ikeworld Private Limited", $thankYouBody)) {
        echo "<script>alert('Error: Could not send your thank-you email.');</script>";
        exit();
    }

    // Send notification email to admin
    $adminBody = "
        <h2>New Contact Information Received</h2>
        <p><strong>From:</strong> $email</p>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Message:</strong></p>
        <p>$message</p>
    ";
    if (!$mailer->sendMail('info@ikeworld.co.in', 'Admin', "Contact Information from result.demoikeworld.com", $adminBody)) {
        echo "<script>alert('Error: Could not send admin notification email.');</script>";
        exit();
    }

    // Insert data into database
    try {
        $stmt = $conn->prepare("INSERT INTO contact_form (name, email, message,status, date) VALUES (?, ?, ?,?, NOW())");
        $stmt->execute([$name, $email, $message,'active']);
    } catch (Exception $e) {
        error_log("Database Error: " . $e->getMessage(), 3, "mail_errors.log");
        echo "<script>alert('Database Error: Could not save your message.');</script>";
        exit();
    }

    echo "<script>alert('Your message has been sent successfully.');</script>";

    // Redirect based on the 'page' parameter
    if ($page == "index") {
        echo '<script>window.location.href = "contact-us.php";</script>';
    } else if ($page == "contact") {
        echo '<script>window.location.href = "contact-us.php";</script>';
    }
}
?>
