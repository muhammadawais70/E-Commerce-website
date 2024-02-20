<?php
include('conn.php');
$id = $_GET['id'];
 $status = "1";
 $update = "UPDATE register SET status = '$status' WHERE id = '$id'";
 $result1 = mysqli_query($connection,$update);
 header('location:login.php');

?>