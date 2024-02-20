<?php
include('conn.php'); 
session_start(); 
if(!$_SESSION['user']) 
{ 
  header('location:login.php?msg="Please login first and then add to cart product..."'); 
  } 
  else 
  {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id ='".$product_id."'"; 
    $result = mysqli_query($connection, $sql); 
    $row = mysqli_fetch_assoc($result); 

    $image = $row['Image'];
    $name = $row['name'];
    $price = $row['price'];

    $insert = "INSERT INTO favourite (image, name, price) VALUES ('$image', '$name', '$price')";
    if(mysqli_query($connection, $insert))
    {
        header('location: index.php');
    }
    else
    {
        echo "<script>alert('Error');</script>";
    }

    
  }
?>