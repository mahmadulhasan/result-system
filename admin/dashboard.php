<?php
include "../config.php";
include "header.php";
if($_SESSION['admin-login'] != true){
    echo "<script>window.location.href = 'index.php';</script>";
    echo "<script>alert('Login first please.');</script>";
    exit();
}

include "data-box.php";

include "school_chart.php";
include "page_count.php";
include "login-chart.php";
include "data.php";
include "footer.php";
?>