<?php
include("../../config.php");
include "header.php";


// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../../mail/vendor/autoload.php'; // Update the path as per your structure

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    
    // Query to check if the email exists
    $query = "SELECT * FROM school_details WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if the email exists in the database
    if ($result->num_rows > 0) {
        // Generate a 6-digit numeric security key
        $security_key = mt_rand(100000, 999999);  // Generates a number between 100000 and 999999
        
        // Optionally store the security key in the database to verify later
        $update_query = "UPDATE school_details SET reset_token = ? WHERE email = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ss", $security_key, $email);
        $stmt->execute();

        // Send the security key to the user's email via PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'result.demoikeworld.com';         // Set the SMTP server to send through (replace with your SMTP server)
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'info@result.demoikeworld.com';         // SMTP username (your email address)
            $mail->Password   = 'WCS8U@82@xpf';                         // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
            $mail->SMTPSecure = 'tls';
                $mail->Port = 587;                                   

            // Recipients
            $mail->setFrom('no-reply@result.demoikeworld.com', 'result.demoikeworld.com'); // Sender's email and name
            $mail->addAddress($email);                                  // Add a recipient (the user's email)

            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "<p>Here is your security key: <strong>" . $security_key . "</strong></p><p>Use this key to reset your password. It will expire in 10 min.</p>";
            $mail->AltBody = "Here is your security key:\n" . $security_key . "\nUse this key to reset your password. It will expire in 1o minute."; // Plain-text version

            $mail->send();
            
            // Store email and security key in session
            $_SESSION['email'] = $email;
            $_SESSION['security_key'] = $security_key;
            
            echo "<script>alert('OTP sent to your email.');</script>";
            // Redirect to the reset password page without passing the key and email in the URL
            echo "<script>window.location.href = 'otp.php';</script>";
            exit(); // Make sure to exit after redirection

        } catch (Exception $e) {
            // Display PHPMailer error
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
        }
        
    } else {
        echo "<script>alert('Email may be wrong.');</script>";
    }
}
?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="col-md-6 p-5 bg-light" style="border-radius:15px;">
        <form role="form" method="POST">
            <div class="form-group">
                <label>Please enter your email to recover your password</label><br><br>
                <input class="form-control my-2 mb-4" id="email" name="email" placeholder="Email">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Send Email</button>
        </form>
    </div>
</div>



<?php
include "footer.php";
?>
