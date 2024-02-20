<?php
include('header.php');
?>



<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>Forgot Password</h2>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Create New Password</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- / catg header banner section -->

<!-- Cart view section -->
<section id="aa-myaccount">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-myaccount-area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="aa-myaccount-login">
                                <h4>Create New Password</h4>
                                <form action="resetpass.php" class="aa-login-form" method="post">
                                    <label for="">Username or Email address<span>*</span></label>
                                    <input type="text" placeholder="Username or email" name="email" require>
                                    <label for="">Password<span>*</span></label>
                                    <input type="password" placeholder="Password" name="password" require>
                                    <label for="">Password<span>*</span></label>
                                    <input type="password" placeholder="Password" name="password1" require>
                                    <button type="submit" class="aa-browse-btn" name="sub">Reset Password</button>
                                </form>
                            </div>
                        </div>
</section>

<?php
    
    
    if(isset($_POST['sub']))
    {
        
        include('conn.php');
        $id = $_GET['id'];
        $password = $_POST['password'];
        $pass = $_POST['password1'];
        if($password == $pass)
        {
            $update = "UPDATE registeration SET password = '$password' WHERE id = '$id'";
            $result = mysqli_query($connection,$update);
             header('location: ../login.php?msg="Your password has been updated"');
        }
        else{
            echo "<script>alert('password does not match');</script>";
        }
        
        
        
    }
?>











<?php
include('footer.php');
?>