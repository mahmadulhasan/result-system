<?php
include "../config.php";
include "header.php";

if(($_SESSION['admin-login'] != true)&&($_SESSION['position'] == 'super_admin')){
    echo "<script>window.location.href = 'index.php';</script>";
    echo "<script>alert('Login first please.');</script>";
    exit();
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Variables to hold form input
    $facebook = isset($_POST['facebook']) ? htmlspecialchars($_POST['facebook']) : '';
    $instagram = isset($_POST['instagram']) ? htmlspecialchars($_POST['instagram']) : '';
    $linkedin = isset($_POST['linkedin']) ? htmlspecialchars($_POST['linkedin']) : '';
    $copy_right = isset($_POST['copy_right']) ? htmlspecialchars($_POST['copy_right']) : '';
    $upload_dir = '../upload/image/';
    $logo_path = '';

    // Check if logo file is uploaded
    if (isset($_FILES['home_image_1']) && $_FILES['home_image_1']['error'] == 0) {
        $file = $_FILES['home_image_1'];
        $file_name = basename($file['name']);
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Validate that the file is a PNG
        if ($file_ext == 'png') {
            $new_file_name = 'logo.png'; // You can generate a unique name if needed
            $target_file = $upload_dir . $new_file_name;

            // Move the file to the upload directory
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            if (move_uploaded_file($file['tmp_name'], $target_file)) {
                $logo_path = 'upload/image/' . $new_file_name; // Path to store in the database
            } else {
                echo "<script>alert('Failed to move the uploaded file.');</script>";
            }
        } else {
            echo "<script>alert('Only PNG files are allowed for the logo.');</script>";
        }
    }

    // Update the database with the new values
    if ($logo_path) {
        $query = "UPDATE `pages` SET `logo` = ?, `facebook` = ?, `instagram` = ?, `linkedin` = ?, `copy_right`=? WHERE `id` = 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssss', $logo_path, $facebook, $instagram, $linkedin, $copy_right);
    } else {
        $query = "UPDATE `pages` SET `facebook` = ?, `instagram` = ?, `linkedin` = ?, `copy_right`=? WHERE `id` = 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssss', $facebook, $instagram, $linkedin, $copy_right);
    }
    
    if ($stmt->execute()) {
        echo "<script>alert('Data updated successfully.');</script>";
    } else {
        echo "<script>alert('Error updating data.');</script>";
    }
}


// Fetch current values from the database
$id = 1;
$sql2 = "SELECT `logo`, `facebook`, `instagram`, `linkedin`, `copy_right` FROM pages WHERE `id` = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("i", $id);
$stmt2->execute();
$stmt2->bind_result($logo, $facebook, $instagram, $linkedin, $copy_right);
$stmt2->fetch();
$stmt2->close();
?>

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
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Logo</h3>
    </div>
    <hr>
    <form method="POST" enctype="multipart/form-data">
        <div class="container">
            <h4>Logo</h4>
            <div class="row mb-3">
                <label for="home_image_1" class="col-md-4 col-form-label">Image:</label>
                <div class="col-md-6">
                    <div class="mb-1" style="height:100px; width:200px; border:1px solid black; display: flex; justify-content: center; align-items: center;">
                        <img src="../<?php echo htmlspecialchars($logo); ?>" alt="Logo" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    </div>
                    <p style="color:red;">Only PNG file support</p>
                    <input type="file" name="home_image_1" class="form-control" accept="image/png">
                </div>
            </div>
        </div>
        
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h4>Copy right</h4>
        </div>
        <hr>

        <div class="container">
            <div class="row mb-3">
                <label for="facebook" class="col-md-4 col-form-label">Copy right:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="copy_right" value="<?php  echo htmlspecialchars($copy_right); ?>">
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h4>Links</h4>
        </div>
        <hr>

        <div class="container">
            <div class="row mb-3">
                <label for="facebook" class="col-md-4 col-form-label">Facebook:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="facebook" value="<?php  echo htmlspecialchars($facebook); ?>">
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row mb-3">
                <label for="instagram" class="col-md-4 col-form-label">Instagram:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="instagram" value="<?php  echo htmlspecialchars($instagram); ?>">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mb-3">
                <label for="linkedin" class="col-md-4 col-form-label">LinkedIn:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="linkedin" value="<?php  echo htmlspecialchars($linkedin); ?>">
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</section>

<?php
include "footer.php";
?>
