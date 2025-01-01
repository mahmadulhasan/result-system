<?php
include_once "../config.php";


$conn->close();
session_destroy();

header("location:../index.php");

?>