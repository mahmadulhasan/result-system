<?php
include "../config.php";
if(($_SESSION['admin-login'] != true)&&($_SESSION['position'] == 'super_admin')){
    echo "<script>window.location.href = 'index.php';</script>";
    echo "<script>alert('Login first please.');</script>";
    exit();
}


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "UPDATE `new_pages` SET `action` = 'inactive' WHERE `id` = '$id'";
    $result = $conn->query($sql);
    if($result){
        echo "<script>alert('page deleted successfully');</script> ";
        echo "<script>window.location.href = 'new-pages.php';</script>";
    }
    else{
        echo "<script>alert('Some error occur. please try again latter');</script> ";
        echo "<script>window.location.href = 'new-pages.php';</script>";
    }
}



?>