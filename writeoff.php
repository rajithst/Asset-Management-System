<?php include 'core/init.php';

$id = $_GET['id'];
writeoff_data($con,$id);
header('location:home.php');