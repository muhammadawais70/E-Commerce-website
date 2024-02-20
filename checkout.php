<?php
session_start();
include('header.php');
include('conn.php');
$user_id = @$_SESSION['id'];
$query = "select * from cart where user_id = '$user_id'";
$result = mysqli_query($connection, $query);



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


if (isset($_POST['sub'])) {
    
    $dt = date("Y-m-d H:i:s");
    $querys = "insert into `orders` (user_id, date_time) values ('$user_id', '$dt')";

    if (mysqli_query($connection, $querys)) {
        $order_id = mysqli_insert_id($connection); // Get the last inserted order ID

        // Retrieve additional information for the order (you may need to modify this part)
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $district = $_POST['district'];
        $zip = $_POST['zip'];

        // Loop through all products in the cart
        $moeen = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $qty = $row['qty'];
            $price = $row['price'];
            $d_t = date("Y-m-d H:i:s");
            $insert = "insert into items(order_id, product_id, qty,price,name, email, phone, address, district, zip_code, date_time) 
                 values ('$order_id', '$product_id', '$qty','$price', '$name', '$email', '$phone', '$address', '$district', '$zip', '$d_t')";
            mysqli_query($connection, $insert);
            $moeen = $moeen + 1;
        }

        if ($moeen > 0) {
            
            
            require 'phpmailer/src/Exception.php';
            require 'phpmailer/src/PHPMailer.php';
            require 'phpmailer/src/SMTP.php';
            $mail = new PHPMailer(true);
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'awaismohammad70@gmail.com'; //SMTP username
            $mail->Password = 'cazw nkid iyxv dtig'; //SMTP password
            $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
            $mail->Port = 587;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            ); //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('awaismohammad70@gmail.com');
            $mail->addAddress($email);            



            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = "Here's your Order Mail";

            $car = "select * from cart where user_id = '$user_id'";
            $res = mysqli_query($connection, $car);

            $mail->Body = "<h1><strong>Order Confirmation<strong></h1>
            <h1><strong>$name<strong></h1>
            <p>Thank you for your order! Your order has been successfully placed.</p>
            <p>Your order details:</p>
            <table border='2' style='border: 2px solid black; width: 100%; border-collapse: collapse; margin-top: 20px;'>
                <tr style='background-color: #f2f2f2;'>
                    <th style='border: 2px solid black; padding: 10px; text-align: left;'>Name</th>
                    <th style='border: 2px solid black; padding: 10px; text-align: left;'>Image</th>
                    <th style='border: 2px solid black; padding: 10px; text-align: left;'>Qty</th>
                    <th style='border: 2px solid black; padding: 10px; text-align: left;'>Price</th>
                </tr>";
            
            // Loop through each product
            while ($rows = mysqli_fetch_assoc($res)) {
                $imagePath = 'C:\xampp\htdocs\project\admin\images\\' . $rows['image'];
                $uniqueCid = md5(uniqid()); // Generate a unique Content-ID for each image
                $mail->addEmbeddedImage($imagePath, $uniqueCid, $rows['image']);
            
                // Concatenate product details to the email body
                $mail->Body .= "<tr>
                    <td style='border: 2px solid black; padding: 10px; text-align: left;'>" . $rows['product_name'] . "</td>
                    <td style='border: 2px solid black; padding: 10px; text-align: left;'>
                        <img src='cid:$uniqueCid' alt='Embedded Image' style='display: block; margin: 0 auto; max-width: 100px; max-height: 100px;'>
                    </td>
                    <td style='border: 2px solid black; padding: 10px; text-align: left;'>" . $rows['qty'] . "</td>
                    <td style='border: 2px solid black; padding: 10px; text-align: left;'>" . $rows['price'] . "</td>
                </tr>";
            
                // Calculate total amount for each product
                $totalAmount += ($rows['price'] * $rows['qty']);
            }
            
            // Add a table row for the total
            $mail->Body .= "<tr>
                <td colspan='2' style='border: 2px solid black; padding: 10px; text-align: left;'><strong>Total</strong></td>
                <td style='border: 2px solid black; padding: 10px; text-align: left;'></td>
                <td style='border: 2px solid black; padding: 10px; text-align: left;'><strong>$totalAmount</strong></td>
            </tr>";
            
            // Close the table and add the remaining email content
            $mail->Body .= "</table>
            <p>If you have any questions or concerns, please contact our customer support.</p>
            <p>Thank you for shopping with us!</p>";
            
            $mail->send();

            $delete = "delete from cart where user_id = '$user_id'";
            mysqli_query($connection, $delete);

            echo "<script>alert('Your Order Has Been Placed......')</script>";
            

        } else {
            echo "<script>alert('Your Order Has not Been Placed......')</script>";
        }




    } else {
        echo "<script>alert('Error in Order Creation!')</script>";
    }

}

?>

<form action="checkout.php" method="post">
<section id="checkout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="checkout-area">
                    <form action="">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="checkout-left">
                                    <div class="panel-group" id="accordion">
                                        <!-- Shipping Address -->
                                            <div class="panel panel-default aa-checkout-billaddress">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                            href="#collapseFour">
                                                            Shippping Address
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseFour" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="text" placeholder="First Name*"
                                                                        name="name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="text" placeholder="Last Name*" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="email" placeholder="Email Address*"
                                                                        name="email" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="tel" placeholder="Phone*" name="phone" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="aa-checkout-single-bill">
                                                                    <textarea cols="8" rows="3"
                                                                        name="address" placeholder="Address" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="text" placeholder="District*"
                                                                        name="district" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="text" placeholder="Postcode / ZIP*"
                                                                        name="zip" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="checkout-right">
                                    <h4>Order Summary</h4>
                                    <div class="aa-order-summary-area">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                        $total = 0;
                        while($row = mysqli_fetch_assoc($result))
                        {?>
                        <tr>
                            <td><?php echo $row['product_name'];?> <strong>x
                                    <?php echo $row['qty'];?></strong></td>
                            <td><?php echo $row['price']*$row['qty'];?></td>
                        </tr>
                        <?php 
                        $total = $total + ($row['qty']*$row['price']);
                        }?>
                                                <tr>
                                                    <th>Total</th>
                                                    <td><?php echo $total;?></td>
                                                </tr>
                                                </tfoot>
                                        </table>
                                        <input type="submit" name="sub" value="Place Order" class="aa-browse-btn"
                                            style="width:361px;">
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </div>

    </div>
    </div>
</section>
</form>





<?php
include('footer.php');
?>