<?php
include('conn.php');
if(isset($_POST['clear']))
{
 $del = "delete from cart";
 if(mysqli_query($connection, $del))
 {
  header('location: cart.php');
 }
 else
 {
  die("Error: ".mysqli_error($connection));

 }
}
session_start();
include('header.php');
$user_id = @$_SESSION['id'];
$query = "select * from cart where user_id = '$user_id'";
$result = mysqli_query($connection, $query);


?>


 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="cart.php" method="post">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Delete</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $total = 0;
                      while ($row = mysqli_fetch_assoc($result)){
                        ?>
                      <tr>
                        <td><a class="remove" href="del_p.php?id=<?php echo $row['id']?>"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="admin/images/<?php echo $row['image'];?>" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#"><?php echo $row['product_name'];?></a></td>
                        <td><?php echo $row['price'];?></td>
                        <td><input class="aa-cart-quantity" type="number" value="<?php echo $row['qty'];?>"></td>
                        <td><?php echo $row['price']*$row['qty']?></td>
                      </tr>
                      <?php 
                    $total = $total + ($row['qty']*$row['price']);
                    } ?>
                    <tr>
                      <td  colspan="6">
                        <button name="clear" class="aa-cart-view-btn" style="margin-top:20px; ;">Clear Cart</button>
                        <a href="index.php" class="aa-cart-view-btn" style="margin-top: 20px; float:left;">Continue Shoping</a>
                    </td>
                    </tr>
                   
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total" style=" float:right;">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td><?php echo $total?></td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td><?php echo $total?></td>
                   </tr>
                 </tbody>
               </table>
               <a href="checkout.php" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

<?php
include('footer.php');
?>