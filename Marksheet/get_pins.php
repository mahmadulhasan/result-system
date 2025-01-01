<?php
include "../config.php";

$state = $_POST['state'];

$query = "SELECT DISTINCT `pin_code` FROM `school_details` WHERE `state` = '$state'";
$result = $conn->query($query);
$options = "<option value=''>Select...</option>";
while($row = $result->fetch_assoc()) {
    $options .= "<option value='" . $row['pin_code'] . "'>" . $row['pin_code'] . "</option>";
}
echo $options;
?>
