<?php 
include './config/constant.php';

session_destroy();
header('location: ' . './index.php');
die();
?>