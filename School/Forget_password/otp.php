<?php
include("../../config.php");
include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_otp = $_POST['otp'];

    // Check if email and security key are set in the session
    if (isset($_SESSION['email']) && isset($_SESSION['security_key'])) {
        $email = $_SESSION['email'];
        $security_key = $_SESSION['security_key'];
        
        // Fetch the reset token from the database
        $query = "SELECT reset_token FROM school_details WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($db_reset_token);
        $stmt->fetch();
        $stmt->close();

        // Verify if the entered OTP matches the security key and reset token matches
        if ($user_otp == $security_key && $user_otp == $db_reset_token) {
            // OTP and reset token match, proceed to reset password page
            echo "<script>alert('OTP and reset token verified successfully.');</script>";
            echo "<script>window.location.href = 'reset_password.php';</script>";
            exit();
        } else {
            // OTP or reset token does not match
            echo "<script>alert('Invalid OTP or reset token. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Session expired. Please request a new OTP.');</script>";
        echo "<script>window.location.href = 'otp.php';</script>";
        exit();
    }
}
?>



<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="col-md-6 p-5 bg-light" style="border-radius:15px;">
        <form role="form" method="POST">
            <div class="form-group">
                <label>Please enter the OTP sent to your email</label><br><br>
                <input type="text" class="form-control my-2 mb-4" id="otp" name="otp" placeholder="Enter OTP" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Verify OTP</button>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>
