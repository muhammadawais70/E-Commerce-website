<?php
session_start();
if(isset($_GET['msg']))
{
  echo "<script>alert('".$_GET['msg']."');</script>";
}
 
 if(isset($_POST['logout'])) 
 {
 session_unset();
 session_destroy();
 header("Location: login.php");
 }

 
 
include('header.php');
include('conn.php');
$query = "select * from product where category = 'laptop'";
$result = mysqli_query($connection, $query);
$query1 = "select * from product where category = 'computer'";
$result1 = mysqli_query($connection, $query1);
$query2 = "select * from product where category = 'accessories'";
$result2 = mysqli_query($connection, $query2);
$query3 = mysqli_query($connection,"select * from slider");
?>
<section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <?php
            while($slider = mysqli_fetch_assoc($query3))
            {
            ?>
            <li>
              
              <div class="seq-model">
                <img data-seq src="admin/images/<?php echo $slider['image'];?>" alt="laptop slide img" />
              </div>
              <div class="seq-title">                               
                <p data-seq><?php echo $slider['description'];?></p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
</li>        
<?php }?>                    
</ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="#laptop" data-toggle="tab">Laptop</a></li>
                    <li><a href="#computer" data-toggle="tab">Computer</a></li>
                    <li><a href="#accessories" data-toggle="tab">Accessories</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start laptop product category -->
                    <div class="tab-pane fade in active" id="laptop">
                      <ul class="aa-product-catg">
                      <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                        ?>
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="product_detail.php?id=<?php echo @$row['id'];?>"><img src="admin/images/<?php echo $row['Image']; ?>" height="220px" width="265px" title="Click to view a larger version"></a>
                            <a class="aa-add-card-btn"href="add_cart.php?id=<?php echo @$row['id'];?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#"><?php echo $row['manufacture'];?></a></h4>
                              <span class="aa-product-price"><?php echo $row['price'];?></span></span>
                            </figcaption>
                          </figure>  
                          <div class="aa-product-hvr-content">
                            <a href="add_fav.php?id=<?php echo @$row['id'];?>" data-toggle="tooltip" data-placement="top" title="Add to Favourite"><span class="fa fa-heart-o"></span></a>                       
                          </div>                                               
                        </li>  
                        <?php }?>                              
                      </ul>
                    </div> 
                    <!-- / laptop product category -->
                    <!-- start computer product category -->
                    <div class="tab-pane fade" id="computer">
                    <ul class="aa-product-catg">
                      <?php
                        while($rows = mysqli_fetch_assoc($result1))
                        {
                        ?>
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="product_detail.php?id=<?php echo @$rows['id'];?>"><img src="admin/images/<?php echo $rows['Image']; ?>" height="220px" width="265px" title="Click to view a larger version"></a>
                            <a class="aa-add-card-btn"href="add_cart.php?id=<?php echo @$rows['id'];?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#"><?php echo $rows['manufacture'];?></a></h4>
                              <span class="aa-product-price"><?php echo $rows['price'];?></span></span>
                            </figcaption>
                          </figure> 
                          <div class="aa-product-hvr-content">
                            <a href="add_fav.php?<?php echo @$row['id'];?>" data-toggle="tooltip" data-placement="top" title="Add to favourite"><span class="fa fa-heart-o"></span></a>                       
                          </div>                                                
                        </li>  
                        <?php }?>                              
                      </ul>
                    </div>
                    <!-- / computer product category -->
                    <!-- start accessories product category -->
                    <div class="tab-pane fade" id="accessories">
                    <ul class="aa-product-catg">
                      <?php
                        while($row1 = mysqli_fetch_assoc($result2))
                        {
                        ?>
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="product_detail.php?id=<?php echo @$row1['id'];?>"><img src="admin/images/<?php echo $row1['Image']; ?>" height="220px" width="270px" title="Click to view a larger version"></a>
                            <a class="aa-add-card-btn"href="add_cart.php?id=<?php echo @$row1['id'];?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#"><?php echo $row1['manufacture'];?></a></h4>
                              <span class="aa-product-price"><?php echo $row1['price'];?></span></span>
                            </figcaption>
                          </figure>  
                          <div class="aa-product-hvr-content">
                            <a href="add_fav.php?<?php echo @$row['id'];?>" data-toggle="tooltip" data-placement="top" title="Add to Favourite"><span class="fa fa-heart-o"></span></a>                       
                          </div>                                               
                        </li>  
                        <?php }?>                              
                      </ul>
                    </div>
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
 
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
                <li><a href="#featured" data-toggle="tab">Featured</a></li>
                <li><a href="#latest" data-toggle="tab">Latest</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start laptop popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-2.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                     <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/computer/girl-2.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                          <span class="aa-product-price">$45.50</span>
                        </figcaption>
                      </figure>                      
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                       <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/man/t-shirt-1.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      </figure>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                        <span class="aa-product-price">$45.50</span>
                      </figcaption>
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                       <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/computer/girl-3.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-1.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                      
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/computer/girl-4.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                    </li>    
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-4.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                    </li> 
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/computer/girl-1.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>                                                                                   
                  </ul>
                </div>
                <!-- / popular product category -->
                
                <!-- start featured product category -->
                <div class="tab-pane fade" id="featured">
                 <ul class="aa-product-catg aa-featured-slider">
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-2.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                     <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/computer/girl-2.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                          <span class="aa-product-price">$45.50</span>
                        </figcaption>
                      </figure>                      
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                       <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/man/t-shirt-1.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      </figure>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                        <span class="aa-product-price">$45.50</span>
                      </figcaption>
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                       <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/computer/girl-3.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-1.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                      
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/computer/girl-4.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                    </li>    
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-4.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                    </li> 
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/computer/girl-1.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>                                                                                   
                  </ul>
                </div>
                <!-- / featured product category -->

                <!-- start latest product category -->
                <div class="tab-pane fade" id="latest">
                  <ul class="aa-product-catg aa-latest-slider">
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-2.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                     <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/computer/girl-2.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                          <span class="aa-product-price">$45.50</span>
                        </figcaption>
                      </figure>                      
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                       <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/man/t-shirt-1.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      </figure>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                        <span class="aa-product-price">$45.50</span>
                      </figcaption>
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                       <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                    </li>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/computer/girl-3.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-1.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                      
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                    </li>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/computer/girl-4.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                    </li>    
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-4.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                    </li> 
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="img/computer/girl-1.png" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                          <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placelaptopt="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placelaptopt="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>                                                                                   
                  </ul>
                </div>
                <!-- / latest product category -->              
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
  <section id="aa-testimonial">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-testimonial-area">
            <ul class="aa-testimonial-slider">
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/testimonial-img-2.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Allison</p>
                    <span>Designer</span>
                    <a href="#">Dribble.com</a>
                  </div>
                </div>
              </li>
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/testimonial-img-1.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>KEVIN MEYER</p>
                    <span>CEO</span>
                    <a href="#">Alphabet</a>
                  </div>
                </div>
              </li>
               <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/testimonial-img-3.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Luner</p>
                    <span>COO</span>
                    <a href="#">Kinatic Solution</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Testimonial -->

 

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              <?php
              $query = "select * from b_slider";
              $result = mysqli_query($connection, $query);
              while ($roww=mysqli_fetch_assoc($result)){?>
              <li><a href="#"><img src="admin/images/<?php echo $roww['image'];?>" alt="java img" style="width:120px; height:80px;"></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->

 

<?php
include('footer.php');
?>