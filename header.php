<?php
include('conn.php');
$user_id = @$_SESSION['id'];
$query = "select * from cart where user_id = '$user_id'";
$result = mysqli_query($connection, $query);
$count = mysqli_num_rows($result);
$query1 = "select * from contact";
$result1 = mysqli_query($connection, $query1);
$row = mysqli_fetch_assoc($result1);
$query2 = "select * from favourite";
$favourites = mysqli_query($connection,$query2);
$coun = mysqli_num_rows($favourites);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Home</title>
    
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .content {
            display: block;
        }

        .hidden {
            display: none;
        }
        .button{
          cursor: pointer;
        }
    </style>
  

  </head>
  <body> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="img/flag/english.jpg" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="img/flag/french.jpg" alt="">FRENCH</a></li>
                      <li><a href="#"><img src="img/flag/english.jpg" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>+<?php echo $row['phone_no'];?></p>
                </div>
                <!-- / cellphone -->
              </div>
              <form action="index.php" method="post">
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <!-- <li><a href="account.php">My Account</a></li> -->
                  <li class="hidden-xs"><a href=""><?php echo @$_SESSION['first']; ?></a></li>
                  <li class="hidden-xs"><a href="cart.php">My Cart</a></li>
                  <li class="hidden-xs"><a href="checkout.php">Checkout</a></li>
                  <li><?php if(!isset($_SESSION['user'])) { ?><a href='login.php'>Login</a><?php } ?></li>
                  <li><?php if(!isset($_SESSION['user'])) { ?><a href='register.php'>Register</a><?php } ?></li>
                  <li class="hidden-xs">
                  <?php
                  if(isset($_SESSION['user'])) {
                      ?>
                      <form method="post" action="logout.php">
                          <input type="submit" name="logout" value="Logout" class="btn btn-danger">
                      </form>
                      <?php
                  }
                  ?>
              </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.php">
                  <span class="fa fa-shopping-cart"></span>
                  <p>AL-Karam<strong>Electronics</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title"><b>SHOPPING CART</b></span>
                  <span class="aa-cart-notify"><?php echo $count; ?></span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                    <?php
                    $total = 0;
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="admin/images/<?php echo $row['image']?>" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#"><?php echo $row['product_name']?></a></h4>
                        <p><?php echo $row['qty']."x".$row['price']."=".$row['price']*$row['qty']; ?></p>
                      </div>
                      <a class="aa-remove-product" href="del_cp.php?id=<?php echo $row['id']?>"><span class="fa fa-times"></span></a>
                    </li>                    
                    <?php
                    $total = $total + ($row['qty']*$row['price']);
                    }
                    ?>
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                      <?php echo $total?>
                      </span>
                    </li>
                    
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="cart.php">My Cart</a>&nbsp&nbsp<a class="aa-cartbox-checkout aa-primary-btn" href="checkout.php">Checkout</a>
                </div>
              </div>
              <div class="aa-cartbox">
              <a class="aa-cart-link" href="#">
                  <span class="fa fa-heart"></span>
                  <span class="aa-cart-title"><b>FAVOURITE</b></span>
                  <span class="aa-cart-notify"><?php echo $coun;?></span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                    <?php
                    while($rows = mysqli_fetch_assoc($favourites))
                    {
                    ?>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="admin/images/<?php echo $rows['image']?>" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#"><?php echo $rows['name'];?></a></h4>
                        <p>Price: <?php echo $rows['price'];?>&nbspPKR</p> 
                      </div>
                      <a class="aa-remove-product" href="del_fav.php?id=<?php echo $rows['id']?>"><span class="fa fa-times"></span></a>
                    </li>  
                                     
                    <?php
                    }
                    ?>
                    <li>
                    </li>
                    
                  </ul></div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Search here ex. 'man' ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="product.php#" onclick="showAll()">Products</a></li>
              <li><a href="product.php#" onclick="showContent(1)">Laptop</a></li>
              <li><a href="product.php#" onclick="showContent(2)">Computer</a></li>
              <li><a href="product.php#" onclick="showContent(3)">Accessories</a></li>
              
               
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>