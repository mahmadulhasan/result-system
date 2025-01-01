<?php
include "../config.php";
include "header.php";

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['admin-login']) || $_SESSION['admin-login'] != true) {
    echo "<script>window.location.href = 'index.php';</script>";
    echo "<script>alert('Login first please.');</script>";
    exit();
}

// Check if admin_id is set
if (!isset($_SESSION['admin_id'])) {
    echo "<script>alert('Login first please.');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
}

$id = $_SESSION['admin_id'];


$sql2 = "SELECT `id`, `user_id`, `name`, `email`, `phone`, `address`,`dob` FROM `admin` WHERE `id` = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("i", $id);
    $stmt2->execute();
    $stmt2->bind_result($id,$user_id, $name, $email, $phone, $address, $dob);
    $stmt2->fetch();
    $stmt2->close();
    
    
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $dob = htmlspecialchars($_POST['dob']);

    // Save the data to the database or perform desired operations
    // Example: Update query
    $sql = "UPDATE admin SET phone = ?, address = ?, dob = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $phone, $address, $dob, $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Details updated successfully!";
    } else {
        echo "Failed to update details.";
    }
}

?>

<section class="m-5" style="background:none !important;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Profile</h3>
    </div>
    <hr>

    <div class="container">
        <div class="row mb-3">
            <label for="home_heading" class="col-md-4 col-form-label">Name:</label>
            <div class="col-md-6">
                <p ><?php echo htmlspecialchars($name); ?></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mb-3">
            <label for="home_heading" class="col-md-4 col-form-label">User ID:</label>
            <div class="col-md-6">
                <p ><?php echo htmlspecialchars($user_id); ?></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mb-3">
            <label for="home_heading" class="col-md-4 col-form-label">Email:</label>
            <div class="col-md-6">
                <p ><?php echo htmlspecialchars($email); ?></p>
            </div>
        </div>
    </div>

   <form method="POST" action="">
    <div class="container">
        <div class="row mb-3">
            <label for="phone" class="col-md-4 col-form-label">Phone no.:</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mb-3">
            <label for="address" class="col-md-4 col-form-label">Address:</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mb-3">
            <label for="dob" class="col-md-4 col-form-label">Date of Birth:</label>
            <div class="col-md-6">
                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo htmlspecialchars($dob); ?>">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
    </form>


<?php



include "footer.php";
?>
