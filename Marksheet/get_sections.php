<?php
include "../config.php";

$table = $_SESSION['sid']."_class_details";

if(isset($_POST['class_no']) && isset($_POST['session'])) {
    $class_no = $_POST['class_no'];
    $session = $_POST['session'];
    $query = "SELECT DISTINCT `section` FROM $table WHERE `class_no` = '$class_no' AND `session` = '$session'";
    $result = mysqli_query($conn, $query);

    echo '<option value="">--Select--</option>';
    while($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row['section'].'">'.$row['section'].'</option>';
    }
}
?>
