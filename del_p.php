<?php
include('conn.php');
$id = $_GET['id'];
$del = "delete from cart where id = $id";
if(mysqli_query($connection, $del))
{
    header('location: cart.php');
}
else {
    echo "<script>alert('Error');</script>";
}
?>