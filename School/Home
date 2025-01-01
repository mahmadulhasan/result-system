<?php
include "../config.php";

$table = $_SESSION['sid']."_class_details";


if(isset($_POST['class_no'])) {
    $class_no = $_POST['class_no'];
    $query = "SELECT DISTINCT `session` FROM `$table` WHERE `class_no` = '$class_no'";
    $result = $conn->query($query);

    echo '<option value="">--Select--</option>';
    while($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row['session'].'">'.$row['session'].'</option>';
    }
}
?>
