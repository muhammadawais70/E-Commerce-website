<?php 
include('conn.php');
$id=$_GET['id'];
$query = "delete from favourite where id ='$id'";
if(mysqli_query($connection,$query))
{
    header('location: index.php');
}
else{
    echo "<script>alert('Delete Error');</script>";
}

?>