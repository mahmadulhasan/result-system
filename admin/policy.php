<?php
include "../config.php";
include "header.php";

// Ensure that only admin users can access this page
if ($_SESSION['admin-login'] != true || $_SESSION['position'] != 'super_admin') {
    echo "<script>window.location.href = 'index.php';</script>";
    echo "<script>alert('Login first please.');</script>";
    exit();
}


// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['terms_submit'])) {
        $heading = $_POST['terms_heading'];
        $body = $_POST['terms_body'];
        $stmt = $conn->prepare("INSERT INTO terms_and_condition (heading, body) VALUES (?, ?)");
        $stmt->bind_param("ss", $heading, $body);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Terms & Conditions added successfully!');</script>";
    } elseif (isset($_POST['privacy_submit'])) {
        $heading = $_POST['privacy_heading'];
        $body = $_POST['privacy_body'];
        $stmt = $conn->prepare("INSERT INTO privacy_policy (heading, body) VALUES (?, ?)");
        $stmt->bind_param("ss", $heading, $body);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Privacy Policy added successfully!');</script>";
    } elseif (isset($_POST['disclaimer_submit'])) {
        $heading = $_POST['disclaimer_heading'];
        $body = $_POST['disclaimer_body'];
        $stmt = $conn->prepare("INSERT INTO disclaimer (heading, body) VALUES (?, ?)");
        $stmt->bind_param("ss", $heading, $body);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Disclaimer added successfully!');</script>";
    }
}

// Handle delete action
if (isset($_GET['delete_id']) && isset($_GET['table'])) {
    $delete_id = intval($_GET['delete_id']);
    $table = $_GET['table'];
    $stmt = $conn->prepare("DELETE FROM $table WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    echo "<script>alert('Deleted successfully!'); window.location.href = 'policy.php';</script>";
}
?>

<style>
    .section-wrapper { display: flex; justify-content: center; gap: 1rem; font-weight:700;font-size:1.5rem;}
    .box { background: #f57b42; color: white; padding: 20px; border-radius: 10px; text-align: center; cursor: pointer; }
    .box:hover { background: #fc585e; }
    .bx {font-size: 3rem;}
</style>
<div style="height:50px;"></div>
<section class="section-wrapper mt-5 p-3 ">
    <div class="box" data-bs-toggle="modal" data-bs-target="#termsModal"><i class="bx bx-book-content" style="color:#8ffbf3"></i><br>Add+ Terms <br>& Conditions</div>
    <div class="box" data-bs-toggle="modal" data-bs-target="#privacyModal"><i class="bx bxs-lock bx-tada bx-flip-horizontal" style="color:#8ffbf3"></i><br>Add+ Privacy <br>Policy</div>
    <div class="box" data-bs-toggle="modal" data-bs-target="#disclaimerModal"><i class="bx bxs-hand" style="color:#8ffbf3"></i><br>Add+ Disclaimer</div>
</section>

<!-- Modals -->
<?php
$modals = [
    ['id' => 'termsModal', 'title' => 'Terms & Conditions', 'heading' => 'terms_heading', 'body' => 'terms_body', 'submit' => 'terms_submit'],
    ['id' => 'privacyModal', 'title' => 'Privacy Policy', 'heading' => 'privacy_heading', 'body' => 'privacy_body', 'submit' => 'privacy_submit'],
    ['id' => 'disclaimerModal', 'title' => 'Disclaimer', 'heading' => 'disclaimer_heading', 'body' => 'disclaimer_body', 'submit' => 'disclaimer_submit']
];
foreach ($modals as $modal): ?>
<div class="modal fade" id="<?= $modal['id'] ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add <?= $modal['title'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label>Heading</label>
                        <input type="text" class="form-control" name="<?= $modal['heading'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Body</label>
                        <textarea class="form-control" name="<?= $modal['body'] ?>" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="<?= $modal['submit'] ?>">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Display Sections -->
<?php
$sections = [
    ['title' => 'Terms & Conditions', 'table' => 'terms_and_condition'],
    ['title' => 'Privacy Policy', 'table' => 'privacy_policy'],
    ['title' => 'Disclaimer', 'table' => 'disclaimer']
];
foreach ($sections as $section): ?>
<section class="m-5">
    <h3><?= $section['title'] ?></h3>
    <table class="table table-bordered">
        <thead>
            <tr><th>Sl. No.</th><th>Content</th><th>Action</th></tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT id, heading, body FROM {$section['table']}");
        $sl_no = 1;
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $sl_no++ ?></td>
                <td><b><?= $row['heading'] ?></b><br><?= $row['body'] ?></td>
                <td><a href="?delete_id=<?= $row['id'] ?>&table=<?= $section['table'] ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</section>
<?php endforeach; ?>


<?php include "footer.php"; ?>
