<?php
include "../config.php";
include "header.php";
if(($_SESSION['admin-login'] != true)&&($_SESSION['position'] == 'super_admin')){
    echo "<script>window.location.href = 'index.php';</script>";
    echo "<script>alert('Login first please.');</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data as text
    $home_heading = $_POST['home_heading'];
    $home_body = $_POST['home_body'];
    $about_c1_heading = $_POST['about_c1_heading'];
    $about_c1_body = $_POST['about_c1_body'];
    $about_c2_heading = $_POST['about_c2_heading'];
    $about_c2_body = $_POST['about_c2_body'];
    $about_c3_heading = $_POST['about_c3_heading'];
    $about_c3_body = $_POST['about_c3_body'];

    // SQL update query
    $sql = "UPDATE pages SET home_heading=?, home_body=?, about_c1_heading=?, about_c1_body=?, about_c2_heading=?, about_c2_body=?, about_c3_heading=?, about_c3_body=? WHERE id=1";

    // Prepare and bind
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssss", $home_heading, $home_body, $about_c1_heading, $about_c1_body, $about_c2_heading, $about_c2_body, $about_c3_heading, $about_c3_body);

        // Execute
        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Record updated successfully');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }
}



// Fetch current values from the database
$id = 1;
$sql2 = "SELECT home_heading, home_body, about_c1_heading, about_c1_body, about_c2_heading, about_c2_body, about_c3_heading, about_c3_body FROM pages WHERE id = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("i", $id);
$stmt2->execute();
$stmt2->bind_result($home_heading, $home_body, $about_c1_heading, $about_c1_body, $about_c2_heading, $about_c2_body, $about_c3_heading, $about_c3_body);
$stmt2->fetch();
$stmt2->close();
?>
<style>
    textarea{
        background: white !important;
        border: 1px solid black !important;
    }
    input{
        background: white !important;
        border: 1px solid black !important;
    }
</style>

<section class="m-5" style="background:none !important;">
    <form action="" method="post">
        <div style="display: flex; justify-content: space-between; align-items: center; ">
            <h3 style="font-weight:700;">Home Page</h3>
        </div>
        <hr>
        <div class="container">
            <h4>1. Content 1</h4>
            <div class="row mb-3">
                <label for="home_heading" class="col-md-4 col-form-label">Heading:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="home_heading" value="<?php echo htmlspecialchars($home_heading); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="home_body" class="col-md-4 col-form-label">Body:</label>
                <div class="col-md-6">
                    <textarea class="form-control" name="home_body" rows="6"><?php echo htmlspecialchars($home_body); ?></textarea>
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h3 style="font-weight:700;">About Page</h3>
        </div>
        <hr>
        <div class="container">
            <h4>1. Content 1</h4>
            <div class="row mb-3">
                <label for="about_c1_heading" class="col-md-4 col-form-label">Heading:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="about_c1_heading" value="<?php echo htmlspecialchars($about_c1_heading); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="about_c1_body" class="col-md-4 col-form-label">Body:</label>
                <div class="col-md-6">
                    <textarea class="form-control" name="about_c1_body" rows="6"><?php echo htmlspecialchars($about_c1_body); ?></textarea>
                </div>
            </div>
        </div>
        <div class="container">
            <h4>1. Content 2</h4>
            <div class="row mb-3">
                <label for="about_c2_heading" class="col-md-4 col-form-label">Heading:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="about_c2_heading" value="<?php echo htmlspecialchars($about_c2_heading); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="about_c2_body" class="col-md-4 col-form-label">Body:</label>
                <div class="col-md-6">
                    <textarea class="form-control" name="about_c2_body" rows="6"><?php echo htmlspecialchars($about_c2_body); ?></textarea>
                </div>
            </div>
        </div>
        <div class="container">
            <h4>1. Content 3</h4>
            <div class="row mb-3">
                <label for="about_c3_heading" class="col-md-4 col-form-label">Heading:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="about_c3_heading" value="<?php echo htmlspecialchars($about_c3_heading); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="about_c3_body" class="col-md-4 col-form-label">Body:</label>
                <div class="col-md-6">
                    <textarea class="form-control" name="about_c3_body" rows="6"><?php echo htmlspecialchars($about_c3_body); ?></textarea>
                </div>
            </div>
        </div>
        <div><button type="submit" class="btn btn-primary btn-lg">Update</button></div>
    </form>
</section>


<?php
include "footer.php";
?>
