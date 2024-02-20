<?php
include('conn.php');
session_start();
if(@$_SESSION['user'])
{
	header('location:index.php');
	exit();
}
if(isset($_POST['login']))
{
$user = $_POST['email'];
$pass = $_POST['password'];
$sql = "Select * from register where username='$user'";
$res = mysqli_query($connection, $sql);
$data = mysqli_fetch_assoc($res);


if(password_verify($pass, $data['password']))
{
	
	if($data['status'] == 1)
	{

		if(isset($_POST['rememberMe'])){
			setcookie('username', $user, ( time() + 86400 ));
			setcookie('password', $pass, ( time() + 86400 ));
		 }
    else{
			/**
				* Delete Login Credential
				*/
			setcookie('username', $_POST['email'], ( time() - 86400 ));
			setcookie('password', $_POST['password'], ( time() - 86400 ));
		}
  
	$_SESSION['user'] = $user;
	$_SESSION['id'] = $data['id'];
	$_SESSION['first'] = @$data['first_name'];
	header('location: index.php');
	}
	else
	{
		echo "<script> alert('Please Activate Your Account...')</script>";
	}
}
else
{
	echo "<script> alert('Your Username or Password is Invalid')</script>";
}

}

?>
<?php
include('header.php');
?>




<!-- / catg header banner section -->

<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> <?php echo @$_GET['msg']; ?>.
</div>
<!-- Cart view section -->
<section id="aa-myaccount">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-myaccount-area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="aa-myaccount-login">
                                <h4>Login</h4>
                                <form action="login.php" class="aa-login-form" method="post">
                                    <label for="">Username or Email address<span>*</span></label>
                                    <input type="text" placeholder="Username or email" name="email"
                                        value="<?php echo @$_COOKIE['username'];?>" require>
                                    <label for="">Password<span>*</span></label>
                                    <input type="password" placeholder="Password" name="password"
                                        value="<?php echo @$_COOKIE['password'];?>" require>
                                    <button type="submit" class="aa-browse-btn" name="login">Login</button>
                                    <label class="rememberme" for="rememberme"><input type="checkbox" name="rememberMe">
                                        Remember me </label>
                                    <p class="aa-lost-password"><a href="forgotpass.php">Lost your password?</a></p>
                                </form>
                            </div>
                        </div>
</section>












<?php
include('footer.php');
?>