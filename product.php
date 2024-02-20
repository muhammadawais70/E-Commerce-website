<?php
session_start();
include('header.php');
include('conn.php');
$query = "select * from product where category = 'laptop'";
$result = mysqli_query($connection, $query);
$query1 = "select * from product where category = 'computer'";
$result1 = mysqli_query($connection, $query1);
$query2 = "select * from product where category = 'accessories'";
$result2 = mysqli_query($connection, $query2);
?>



<section id="aa-product-category">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                <div class="aa-product-catg-content">
                <div id="content1" class="content">    
                <h2>Laptop</h2>
                        <div class="aa-product-catg-body">
                            <ul class="aa-product-catg">
                                <!-- start single product item -->
                                <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                        ?>
                                <!-- start single product item -->
                                <li>
                                    <figure>
                                        <a class="aa-product-img"
                                            href="product_detail.php?id=<?php echo @$row['id'];?>"><img
                                                src="admin/images/<?php echo $row['Image']; ?>" height="220px"
                                                width="265px" title="Click to view a larger version"></a>
                                        <a class="aa-add-card-btn"
                                            href="add_cart.php?id=<?php echo @$row['id'];?>"><span
                                                class="fa fa-shopping-cart"></span>Add To Cart</a>
                                        <figcaption>
                                            <h4 class="aa-product-title">
                                                <a href="#"><?php echo $row['manufacture'];?></a>
                                            </h4>
                                            <span class="aa-product-price">PKR:<?php echo $row['price'];?></span></span>
                                        </figcaption>
                                    </figure>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                        </div>
                        <div id="content2" class="content">
                        <h2>Computer</h2>
                        <div class="aa-product-catg-body">
                            <ul class="aa-product-catg">
                                <!-- start single product item -->
                                <?php
                        while($rows = mysqli_fetch_assoc($result1))
                        {
                        ?>
                                <!-- start single product item -->
                                <li>
                                    <figure>
                                        <a class="aa-product-img"
                                            href="product_detail.php?id=<?php echo @$rows['id'];?>"><img
                                                src="admin/images/<?php echo $rows['Image']; ?>" height="220px"
                                                width="265px" title="Click to view a larger version"></a>
                                        <a class="aa-add-card-btn"
                                            href="add_cart.php?id=<?php echo @$rows['id'];?>"><span
                                                class="fa fa-shopping-cart"></span>Add To Cart</a>
                                        <figcaption>
                                            <h4 class="aa-product-title"><a
                                                    href="#"><?php echo $rows['manufacture'];?></a>
                                            </h4>
                                            <span class="aa-product-price">PKR:
                                                <?php echo $rows['price'];?></span></span>
                                        </figcaption>
                                    </figure>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                        </div>

                    <div class="aa-product-catg-body">
                    <div id="content3" class="content">
                            <h2>Accessories</h2>
                            <ul class="aa-product-catg">
                                <?php
                        while($row1 = mysqli_fetch_assoc($result2))
                        {
                        ?>

                                <li>
                                    <figure>
                                        <a class="aa-product-img"
                                            href="product_detail.php?id=<?php echo @$row1['id'];?>"><img
                                                src="admin/images/<?php echo $row1['Image']; ?>" height="220px"
                                                width="270px" title="Click to view a larger version"></a>
                                        <a class="aa-add-card-btn"
                                            href="add_cart.php?id=<?php echo @$row1['id'];?>"><span
                                                class="fa fa-shopping-cart"></span>Add To Cart</a>
                                        <figcaption>
                                            <h4 class="aa-product-title"><a
                                                    href="#"><?php echo $row1['manufacture'];?></a>
                                            </h4>
                                            <span class="aa-product-price">PKR:
                                                <?php echo $row1['price'];?></span></span>
                                        </figcaption>
                                    </figure>
                                </li>

                                <?php }?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                <aside class="aa-sidebar">
                    <!-- single sidebar -->
                    <div class="aa-sidebar-widget">
                        <h3>Category</h3>
                        <ul class="aa-catg-nav">
                            <li><span class="button" onclick="showAll()">All-Products</span></li>
                            <li><span class="button" onclick="showContent(1)">Laptop</span></li>
                            <li><span class="button" onclick="showContent(2)">Compute</span></li>
                            <li><span class="button" onclick="showContent(3)">Accessories</span></li>
                        </ul>
                    </div>

</section>

<?php
include('footer.php');
?>