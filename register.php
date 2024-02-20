<?php
include('header.php');
include('conn.php');
?>

<section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>Register Page</h2>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Register</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section id="aa-myaccount">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-myaccount-area">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="aa-myaccount-register">
                                <h4>Register</h4>
                                <form action="register.php" class="aa-login-form" method="post">
                                    <label for="">First Name</label>
                                    <input type="text" placeholder="First Name" name="fname">
                                    <label for="">Last Name</label>
                                    <input type="text" placeholder="Last Name" name="lname">
                                    <label for="">Username or Email address<span>*</span></label>
                                    <input type="text" placeholder="Username or email" name="username">
                                    <label for="">Password<span>*</span></label>
                                    <input type="password" placeholder="Password" name="password">
                                    <label for="">Confirm Password<span>*</span></label>
                                    <input type="password" placeholder="Confirm Password" name="pass">
                                    <button type="submit" class="aa-browse-btn" name="sub">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

	if (isset($_POST['sub'])) {
		$first = $_POST['fname'];
		$last = $_POST['lname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$pass = $_POST['pass'];

	if($password == $pass)
	{
		$password1 = password_hash($password, PASSWORD_DEFAULT);
		$insert = "insert into register(first_name,last_name,username,password,status) values('$first','$last','$username','$password1','0')";
		$sql = "select * from register where username = '$username'";
		$result = mysqli_query($connection,$sql);
		$row  = mysqli_num_rows($result);
				if($row > 0)
				{
					echo "<script>alert('Email already exsist.....');</script>";
				}
				else
				{
					mysqli_query($connection,$insert);
					$sql1 = "select * from register where username = '$username'";
					$result1 = mysqli_query($connection,$sql1);
					$data = mysqli_fetch_assoc($result1);
					$id = $data['id'];
					
						// header('location: ../login.php');
						require 'phpmailer/src/Exception.php';
					require 'phpmailer/src/PHPMailer.php';
					require 'phpmailer/src/SMTP.php';
					$mail = new PHPMailer(true);
					$mail->isSMTP();                                            //Send using SMTP
					$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
					$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
					$mail->Username   = 'awaismohammad70@gmail.com';                     //SMTP username
					$mail->Password   = 'cazw nkid iyxv dtig';                               //SMTP password
					$mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
					$mail->Port       = 587;

					$mail->SMTPOptions = array(
					'ssl' =>array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					)
				);                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//Recipients
				$mail->setFrom('awaismohammad70@gmail.com');
				$mail->addAddress($_POST['username']);

				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = "$first";
				$mail->Body    = "<h1>Hello ".$_POST['fname']."</h1><p>Please Click Above Link For Actiave Your Account</p> <a href='localhost/project/verify.php?id=".$id."'>Activate Account</a>";
				$mail->send();
				// echo 'Message has been sent';
				echo "<script> alert('verify your email'); </script>";
				// echo "<script> alert('Data has been inserted'); </script>";

				}
	}	
			
	else
	{
		echo "<script> alert('Password and Confirm Password Does not Match'); </script>"; 
	}
}
    ?>

























<?php
include('footer.php');
?>