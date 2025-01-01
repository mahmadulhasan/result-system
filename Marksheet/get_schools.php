<?php
include "../config.php";

$pin = $_POST['pin'];

$query2 = "SELECT `school_name` FROM `school_details` WHERE `pin_code` = '$pin'";
$result2 = $conn->query($query2);
$options = "<option value=''>Select...</option>";
while($row2 = $result2->fetch_assoc()) {
    $options .= "<option value='" . $row2['school_name'] . "'>" . $row2['school_name'] . "</option>";
}
echo $options;
?>
