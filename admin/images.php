<?php
include "../config.php";
include "header.php";

if (($_SESSION['admin-login'] != true)&&($_SESSION['position'] == 'super_admin')) {
    echo "<script>window.location.href = 'index.php';</script>";
    echo "<script>alert('Login first please.');</script>";
    exit();
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Define upload directory
    $uploadDir = "../upload/image/";

    // Initialize an array to store new paths
    $imagePaths = [
        'slider1' => '',
        'slider2' => '',
        'slider3' => '',
        'home_img' => '',
        'about_img_1' => '',
        'about_img_2' => '',
        'about_img_3' => ''
    ];

    // Process each file input
    $imageFields = [
        'slider1', 'slider2', 'slider3', 'home_image_1' => 'home_img', 
        'about_image_1' => 'about_img_1', 'about_image_2' => 'about_img_2', 'about_image_3' => 'about_img_3'
    ];

    foreach ($imageFields as $field => $dbField) {
        // Adjust for associative array key-value pairs
        $formField = is_string($field) ? $field : $dbField;
        
        if (isset($_FILES[$formField]) && $_FILES[$formField]['error'] === UPLOAD_ERR_OK) {
            // Get file info
            $fileTmpPath = $_FILES[$formField]['tmp_name'];
            $fileName = basename($_FILES[$formField]['name']);
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

            // Set new file name with unique identifier
            $newFileName = uniqid($formField . "_") . '.' . $fileExtension;

            // Move the file to the upload directory
            $destPath = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // Store relative path (without ../) for database update
                $imagePaths[$dbField] = "upload/image/" . $newFileName;
            } else {
                echo "Error moving $formField to $destPath";
            }
        }
    }

    // Update the paths in the database
    $sql = "UPDATE `pages` SET 
            `slider1` = '{$imagePaths['slider1']}', 
            `slider2` = '{$imagePaths['slider2']}', 
            `slider3` = '{$imagePaths['slider3']}', 
            `home_img` = '{$imagePaths['home_img']}', 
            `about_img_1` = '{$imagePaths['about_img_1']}', 
            `about_img_2` = '{$imagePaths['about_img_2']}', 
            `about_img_3` = '{$imagePaths['about_img_3']}' 
            WHERE `id`=1";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Images uploaded and paths updated successfully.');</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
// Fetch current values from the database
$id = 1;
$sql2 = "SELECT `slider1`, `slider2`, `slider3`, `home_img`, `about_img_1`, `about_img_2`, `about_img_3` FROM pages WHERE id = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("i", $id);
$stmt2->execute();
$stmt2->bind_result($slider1, $slider2, $slider3, $home_img, $about_img_1, $about_img_2, $about_img_3);
$stmt2->fetch();
$stmt2->close();
?>

<style>
    textarea {
        background: white !important;
        border: 1px solid black !important;
    }
    input {
        background: white !important;
        border: 1px solid black !important;
    }
</style>

<section class="m-5" style="background:none !important;">
    <form action="" method="post" enctype="multipart/form-data">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h3 style="font-weight:700;">Home Page Slider</h3>
        </div>
        <hr>
        <div class="container">
            <h4>1. Slider 1</h4>
            <div class="row mb-3">
                <label for="slider1" class="col-md-4 col-form-label">Image:</label>
                <div class="col-md-6">
                    <div class="mb-1" style="height:150px; width:300px; border:1px solid black;"> <img src="../<?php echo htmlspecialchars($slider1); ?>"> </div>
                    <input type="file" name="slider1" class="form-control">
                </div>
            </div>
            <h4>2. Slider 2</h4>
            <div class="row mb-3">
                <label for="slider2" class="col-md-4 col-form-label">Image:</label>
                <div class="col-md-6">
                    <div class="mb-1" style="height:150px; width:300px; border:1px solid black;"><img src="../<?php echo htmlspecialchars($slider2); ?>"></div>
                    <input type="file" name="slider2" class="form-control">
                </div>
            </div>
            <h4>3. Slider 3</h4>
            <div class="row mb-3">
                <label for="slider3" class="col-md-4 col-form-label">Image:</label>
                <div class="col-md-6">
                    <div class="mb-1" style="height:150px; width:300px; border:1px solid black;"><img src="../<?php echo htmlspecialchars($slider3); ?>"></div>
                    <input type="file" name="slider3" class="form-control">
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h3 style="font-weight:700;">Home Page</h3>
        </div>
        <hr>
        <div class="container">
            <h4>Image 1</h4>
            <div class="row mb-3">
                <label for="home_image_1" class="col-md-4 col-form-label">Image:</label>
                <div class="col-md-6">
                    <div class="mb-1" style="height:200px; width:200px; border:1px solid black;"><img src="../<?php echo htmlspecialchars($home_img); ?>"></div>
                    <input type="file" name="home_image_1" class="form-control">
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h3 style="font-weight:700;">About Page</h3>
        </div>
        <hr>
        <div class="container">
            <h4>1. Image 1</h4>
            <div class="row mb-3">
                <label for="about_image_1" class="col-md-4 col-form-label">Image:</label>
                <div class="col-md-6">
                    <div class="mb-1" style="height:200px; width:200px; border:1px solid black;"><img src="../<?php echo htmlspecialchars($about_img_1); ?>"></div>
                    <input type="file" name="about_image_1" class="form-control">
                </div>
            </div>
            <h4>2. Image 2</h4>
            <div class="row mb-3">
                <label for="about_image_2" class="col-md-4 col-form-label">Image:</label>
                <div class="col-md-6">
                    <div class="mb-1" style="height:200px; width:200px; border:1px solid black;"><img src="../<?php echo htmlspecialchars($about_img_2); ?>"></div>
                    <input type="file" name="about_image_2" class="form-control">
                </div>
            </div>
            <h4>3. Image 3</h4>
            <div class="row mb-3">
                <label for="about_image_3" class="col-md-4 col-form-label">Image:</label>
                <div class="col-md-6">
                    <div class="mb-1" style="height:200px; width:200px; border:1px solid black;"><img src="../<?php echo htmlspecialchars($about_img_3); ?>"></div>
                    <input type="file" name="about_image_3" class="form-control">
                </div>
            </div>
        </div>
        <div><button type="submit" class="btn btn-primary btn-lg">Update</button></div>
    </form>
</section>

<?php
include "footer.php";
?>
