<?php
include('header.php');
include('conn.php');
@$id = $_GET['id'];
$query = "select * from product where id = '$id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$query1 = "select * from images where product_id = '$id'";
$result1 = mysqli_query($connection,$query1);
?>
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2></h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>         
          <li><a href="#">Product</a></li>
          <li class="active">T-shirt</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="admin/images/<?php echo $row['Image'];?>" class="simpleLens-lens-image"><img src="admin/images/<?php echo $row['Image'];?>"  class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                      <?php  
                      while($row1 = mysqli_fetch_assoc($result1))
                      {
                      ?>
                          <a data-big-image="admin/images/<?php echo $row1['image'];?>" data-lens-image="admin/images/<?php echo $row1['image'];?>" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="admin/images/<?php echo $row1['image'];?>" style:width="30px" height="30px";>
                          </a>
                      <?php
                      }
                      ?>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>
                      <?php echo $row['name'];?>
                      </h3>
                      <div class="aa-price-block">
                      <span class="aa-product-view-price">
                        <?php echo $row['price'];?>
                      </span>
                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                    </div>
                    <p>
                      <?php echo $row['short_des'];?>
                    </p>
                    
                    <div class="aa-prod-quantity">
                      <form action="add_cart.php" method="post">
                        <input type="number" name="qty" style="width:60px;">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </div>
                    <div class="aa-prod-view-bottom">
                      <button type="submit" name="sub" class="aa-add-to-cart-btn">Add To Cart</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
              <p>
                      <?php echo $row['long_des'];?>
              </p>  
              </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>2 Reviews for T-Shirt</h4> 
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                   </ul>
                   <h4>Add a review</h4>
                   <div class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->

  <!-- <script>alert('');</script> -->
  
<?php
include('footer.php');
?>
