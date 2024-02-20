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
                    <li class="active">Recover Password</li>
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
                                <h4>Recover Password</h4>
                                <form action="forgotpass.php" class="aa-login-form" method="post">
                                    <label for="">Username or Email address<span>*</span></label>
                                    <input type="text" placeholder="Username or email" name="email" require>
                                    <button type="submit" class="aa-browse-btn" name="sub">Send Recover Email</button>
                                </form>
                            </div>
                        </div>
</section>

<?php
    

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;



    if(isset($_POST['sub']))
    {
        include('conn.php');
        $username = $_POST['email'];
        $sql1 = "select * from register where username = '$username'";
		$result1 = mysqli_query($connection,$sql1);
		$data = mysqli_fetch_assoc($result1);
		$id = $data['id'];
        
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
    $mail->addAddress($_POST['email']);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "reset password";
    $mail->Body    = "<h1>Click below link to change the password...</h1><a href='localhost/project/resetpass.php?id=".$id."'>Change your password.</a>";
    $mail->send();
    echo "<script>alert('Reset link sent to your Gmail Account');</script>";
    

    }


    
       
   
?>











<?php
include('footer.php');
?>