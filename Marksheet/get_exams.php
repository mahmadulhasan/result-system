<?php
include "../config.php";

$table = $_SESSION['sid']."_resulttablename";
$table2 = $_SESSION['sid']."_class_details";

if(isset($_POST['class_no']) && isset($_POST['session']) && isset($_POST['section']) && isset($_POST['s_id'])) {
    $class_no = $_POST['class_no'];
    $session = $_POST['session'];
    $section = $_POST['section'];
    $sid = $_POST['s_id'];
    
    $sql = "SELECT `exam_name` FROM `published_result` WHERE `school_id`= '$sid' AND `class`= '$class_no' AND `section`= '$section' AND `session` = '$session'";

    // $query = "SELECT `r`.`exam_name` 
    //           FROM $table `r` 
    //           JOIN $table2 `c` 
    //           ON `r`.`class_id` = `c`.`id` 
    //           WHERE `c`.`class_no` = '$class_no' AND `c`.`session` = '$session' AND `c`.`section` = '$section'";
    $result = mysqli_query($conn, $sql);

    echo '<option value="">--Select--</option>';
    while($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row['exam_name'].'">'.$row['exam_name'].'</option>';
    }
}
?>
