<?php
include "../config.php";
include "header.php";
if(($_SESSION['admin-login'] != true)&&($_SESSION['position'] == 'super_admin')){
    echo "<script>window.location.href = 'index.php';</script>";
    echo "<script>alert('Login first please.');</script>";
    exit();
}


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
    .bgc{
        background: radial-gradient(circle at center, rgba(245, 109, 39) 20%, rgba(250, 218, 143) 100%);
        background-size: cover;
    }
</style>


<section class="bgc">
    <div class="px-5 pt-5 pb-0" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Pages</h3>
        <div>
            <a href="all-pages.php"><button type="button" class="btn btn-primary" data-bs-toggle="" data-bs-target="">
                Page creation history
            </button></a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pagemodel">
                Create New Page +
            </button>
            
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="pagemodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Pages</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="col-form-label" style="color:red;">Every field is compulsory</label>
                <form method="POST" action="add_page.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="heading1" class="col-form-label">Page Name:</label>
                        <input type="text" class="form-control" id="page_name" name="page_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="heading1" class="col-form-label">Heading 1:</label>
                        <input type="text" class="form-control" id="heading1" name="heading1" required>
                    </div>
                    <div class="mb-3">
                        <label for="body1" class="col-form-label">Body 1:</label>
                        <textarea class="form-control" id="body1" name="body1" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image_1" class="col-form-label">Image 1:</label>
                        <input type="file" name="image_1" class="form-control" accept="image/png, image/jpeg" required>
                    </div>
                    <div class="mb-3">
                        <label for="heading2" class="col-form-label">Heading 2:</label>
                        <input type="text" class="form-control" id="heading2" name="heading2" required>
                    </div>
                    <div class="mb-3">
                        <label for="body2" class="col-form-label">Body 2:</label>
                        <textarea class="form-control" id="body2" name="body2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image_2" class="col-form-label">Image 2:</label>
                        <input type="file" name="image_2" class="form-control" accept="image/png, image/jpeg" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit_page">Add Page</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<?php
// Handle form submission for updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = htmlspecialchars($conn->real_escape_string($_POST['id']));
    $heading1 = htmlspecialchars($conn->real_escape_string($_POST['heading1']));
    $body1 = htmlspecialchars($conn->real_escape_string($_POST['body1']));
    $heading2 = htmlspecialchars($conn->real_escape_string($_POST['heading2']));
    $body2 = htmlspecialchars($conn->real_escape_string($_POST['body2']));

    // Base directories
    $upload_dir = 'upload/image/';
    $absolute_upload_dir = '../' . $upload_dir;

    if (!is_dir($absolute_upload_dir)) {
        mkdir($absolute_upload_dir, 0777, true);
    }

    $unique_id = uniqid();

    // Handle Image 1 upload
    if (!empty($_FILES['image1']['name'])) {
        $image1_tmp = $_FILES['image1']['tmp_name'];
        $image1_ext = strtolower(pathinfo($_FILES['image1']['name'], PATHINFO_EXTENSION));
        if (in_array($image1_ext, ['jpg', 'jpeg', 'png'])) {
            $image1_filename = $unique_id . '_1.' . $image1_ext;
            $image1_path = $upload_dir . $image1_filename; // For database
            $image1_full_path = $absolute_upload_dir . $image1_filename; // For relocation
            move_uploaded_file($image1_tmp, $image1_full_path);
        } else {
            die("Invalid file type for Image 1. Only JPG, JPEG, and PNG are allowed.");
        }
    } else {
        $image1_path = htmlspecialchars($_POST['existing_image1']); // Retain existing image
    }

    // Handle Image 2 upload
    if (!empty($_FILES['image2']['name'])) {
        $image2_tmp = $_FILES['image2']['tmp_name'];
        $image2_ext = strtolower(pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION));
        if (in_array($image2_ext, ['jpg', 'jpeg', 'png'])) {
            $image2_filename = $unique_id . '_2.' . $image2_ext;
            $image2_path = $upload_dir . $image2_filename; // For database
            $image2_full_path = $absolute_upload_dir . $image2_filename; // For relocation
            move_uploaded_file($image2_tmp, $image2_full_path);
        } else {
            die("Invalid file type for Image 2. Only JPG, JPEG, and PNG are allowed.");
        }
    } else {
        $image2_path = htmlspecialchars($_POST['existing_image2']); // Retain existing image
    }

    // Update query
    $stmt = $conn->prepare("
        UPDATE new_pages 
        SET heading1 = ?, body1 = ?, image1 = ?, heading2 = ?, body2 = ?, image2 = ? 
        WHERE id = ?
    ");
    $stmt->bind_param("ssssssi", $heading1, $body1, $image1_path, $heading2, $body2, $image2_path, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Page updated successfully');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Fetch data from the database where action = 'active'
$sql = "SELECT id, page_name, heading1, body1, image1, heading2, body2, image2 FROM new_pages WHERE action = 'active'";
$result = $conn->query($sql);

?>


<section class="mx-5" style="background:none !important;">
    <form action="" method="post" enctype="multipart/form-data">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 style="font-weight:700;"><?php echo htmlspecialchars($row['page_name']); ?></h3>
                <div>
                    <button type="button" class="btn btn-danger" onclick="deletePage(<?php echo $row['id']; ?>)">Delete</button>
                </div>
            </div>
            <hr>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="container">
                <h4>1. Content 1</h4>
                <div class="row mb-3">
                    <label for="heading1" class="col-md-4 col-form-label">Heading:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="heading1" value="<?php echo htmlspecialchars($row['heading1']); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="body1" class="col-md-4 col-form-label">Body:</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="body1" rows="6"><?php echo htmlspecialchars($row['body1']); ?></textarea>
                    </div>
                </div>
                <h4>Image 1</h4>
                <div class="row mb-3">
                    <label for="image1" class="col-md-4 col-form-label">Image:</label>
                    <div class="col-md-6">
                        <div class="mb-1" style="height:200px; width:200px; border:1px solid black;">
                            <img src="../<?php echo htmlspecialchars($row['image1']); ?>" style="max-width: 100%; max-height: 100%;">
                        </div>
                        <input type="file" name="image1" class="form-control">
                        <input type="hidden" name="existing_image1" value="<?php echo htmlspecialchars($row['image1']); ?>">
                    </div>
                </div>
            </div>
            <div class="container">
                <h4>2. Content 2</h4>
                <div class="row mb-3">
                    <label for="heading2" class="col-md-4 col-form-label">Heading:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="heading2" value="<?php echo htmlspecialchars($row['heading2']); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="body2" class="col-md-4 col-form-label">Body:</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="body2" rows="6"><?php echo htmlspecialchars($row['body2']); ?></textarea>
                    </div>
                </div>
                <h4>Image 2</h4>
                <div class="row mb-3">
                    <label for="image2" class="col-md-4 col-form-label">Image:</label>
                    <div class="col-md-6">
                        <div class="mb-1" style="height:200px; width:200px; border:1px solid black;">
                            <img src="../<?php echo htmlspecialchars($row['image2']); ?>" style="max-width: 100%; max-height: 100%;">
                        </div>
                        <input type="file" name="image2" class="form-control">
                        <input type="hidden" name="existing_image2" value="<?php echo htmlspecialchars($row['image2']); ?>">
                    </div>
                </div>
            </div>
            <hr>
        <?php endwhile; ?>
        <div><button type="submit" class="btn btn-primary btn-lg">Update</button></div>
    </form>
</section>

<script>
function deletePage(id) {
    if (confirm("Are you sure you want to delete this page?")) {
        window.location.href = "delete_page.php?id=" + id;
    }
}
</script>


<?php
include "footer.php";
?>
