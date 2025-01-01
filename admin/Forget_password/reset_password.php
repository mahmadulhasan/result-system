<?php
include("../../config.php");
include "header.php";

// Check if email and security key are set in the session (to ensure user has passed OTP verification)
if (!isset($_SESSION['email']) || !isset($_SESSION['security_key'])) {
    echo "<script>alert('Session expired. Please request a new OTP.');</script>";
    echo "<script>window.location.href = 'otp.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_SESSION['email'];

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the password in the database
    $update_query = "UPDATE admin SET password = ?, reset_token = NULL WHERE email = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ss", $hashed_password, $email);

    if ($stmt->execute()) {
        // Unset session variables related to OTP and email
        unset($_SESSION['email']);
        unset($_SESSION['security_key']);

        echo "<script>alert('Password updated successfully.');</script>";
        echo "<script>window.location.href = '../index.php';</script>"; // Redirect to login page
        exit();
    } else {
        echo "<script>alert('Error updating password. Please try again.');</script>";
    }
}
?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="col-md-6 p-5 bg-light" style="border-radius:15px;">
        <form id="resetForm" role="form" method="POST" onsubmit="return validatePassword();">
            <div class="form-group">
                <label>Enter New Password</label><br><br>
                <small id="passwordHelp" class="form-text text-muted" style="font-size:0.8rem !imprtant; color:red !important;">Password must be at least 8 characters long, contain one uppercase letter, one lowercase letter, one number, and one special character.</small>
                <input type="password" class="form-control my-2" id="new_password" name="new_password" placeholder="New Password" required>
                <br><input type="checkbox" onclick="togglePasswordVisibility('new_password')"> Show Password
            </div>
            <div class="form-group">
                <label>Confirm New Password</label><br><br>
                <input type="password" class="form-control my-2 mb-4" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Update Password</button>
        </form>
    </div>
</div>

<script>
function validatePassword() {
    const newPassword = document.getElementById("new_password").value;
    const confirmPassword = document.getElementById("confirm_password").value;
    const passwordHelp = document.getElementById("passwordHelp");

    // Regular expressions for validation
    const minLength = /.{8,}/;
    const upperCase = /[A-Z]/;
    const lowerCase = /[a-z]/;
    const number = /[0-9]/;
    const specialChar = /[\W_]/;

    // Validation conditions
    let isValid = true;
    let errorMessage = "Password must be at least 8 characters long, contain one uppercase letter, one lowercase letter, one number, and one special character.";

    if (!minLength.test(newPassword)) {
        isValid = false;
        errorMessage = "Password must be at least 8 characters long.";
    } else if (!upperCase.test(newPassword)) {
        isValid = false;
        errorMessage = "Password must contain at least one uppercase letter.";
    } else if (!lowerCase.test(newPassword)) {
        isValid = false;
        errorMessage = "Password must contain at least one lowercase letter.";
    } else if (!number.test(newPassword)) {
        isValid = false;
        errorMessage = "Password must contain at least one number.";
    } else if (!specialChar.test(newPassword)) {
        isValid = false;
        errorMessage = "Password must contain at least one special character.";
    } else if (newPassword !== confirmPassword) {
        isValid = false;
        errorMessage = "Passwords do not match.";
    }

    if (!isValid) {
        passwordHelp.innerText = errorMessage;
        passwordHelp.style.color = "red";
    } else {
        passwordHelp.innerText = "Password meets all requirements.";
        passwordHelp.style.color = "green";
    }

    return isValid;
}

function togglePasswordVisibility(fieldId) {
    const field = document.getElementById(fieldId);
    field.type = field.type === "password" ? "text" : "password";
}
</script>

<?php
include "footer.php";
?>
