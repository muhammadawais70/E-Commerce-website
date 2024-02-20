<?php 
include('conn.php'); 
session_start(); 
if(!$_SESSION['user']) 
{ 
  header('location:login.php?msg="Please login first and then add to cart product..."'); 
  } 
  else 
  { 
    $user_id = $_SESSION['id']; 
  if(isset($_POST['sub'])) 
  { 
      $qty = $_POST['qty']; 
      $id = $_POST['id']; 
      $sql = "SELECT * FROM product WHERE id ='".$id."'"; 
      $result = mysqli_query($connection, $sql); 
      $row = mysqli_fetch_assoc($result); 
      $name = $row['name']; 
      $price = $row['price'] * $qty; 
      $image = $row['Image']; 
      $check_query = "SELECT * FROM cart WHERE product_id = '$id'"; 
      $check_result = mysqli_query($connection, $check_query); 
  
      if(mysqli_num_rows($check_result) > 0) 
  
      { 
        $update_query = "UPDATE cart SET qty = '".$qty."' WHERE product_id = '$id' and user_id = '$user_id'"; 
        mysqli_query($connection, $update_query); 
  
      } 
  
      else 
      { 
  
        $insert = "insert into cart(product_name,image,price,qty,user_id,product_id) values('$name','$image','$price','$qty','$user_id','$id')"; 
  
        mysqli_query($connection, $insert); 
  
      } 
    } 
  
      else 
      { 
        $id = $_GET['id'];
        $sql = "SELECT * FROM product WHERE id = '$id'"; 
        $result = mysqli_query($connection, $sql); 
        $row = mysqli_fetch_assoc($result); 
        
        $name = $row['name']; 
        $price = $row['price']; 
        $qty = 1; 
        $image = $row['Image'];

        $check_query = "SELECT * FROM cart WHERE product_id = '$id' and user_id = '$user_id'"; 
        $check_result = mysqli_query($connection, $check_query); 
      
      if(mysqli_num_rows($check_result) > 0) 
      {   
        $row1 = mysqli_fetch_assoc($check_result);
        $qty1 = $row1['qty']+1; 
        $update_query = "UPDATE cart SET qty = '$qty1' WHERE product_id = '$id' and user_id = '$user_id'"; 
        mysqli_query($connection, $update_query); 
      } 
      else 
      { 
        $insert = "insert into cart(product_name,image,price,qty,user_id,product_id) values('$name','$image','$price','$qty','$user_id','$id')"; 
        mysqli_query($connection, $insert); 
      } 
    } 
        header('location: index.php?msg=product added into cart...'); 
    
    } 
    ?>