<?php 
include('config.php');
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Sol-Tourism</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
<?php 
		 if(isUserLoggedIn()){
		 $checkrole = $loggedInUser->role;
		 if($checkrole == 'admin'){
		 ?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="header1">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="index.php" class="navbar-brand">Sol-Tourism</a> </div>
      <div class="navbar-collapse collapse pull-right" id="navbar">
        <ul class="nav navbar-nav">
          <!--<li><a href="index.php">Home</a></li> -->
          <li><a href="search_admin.php?p_cat=Mercury">Mercury</a></li>
          <li><a href="search_admin.php?p_cat=Venus">Venus</a></li>
          <li><a href="search_admin.php?p_cat=Luna">Luna</a></li>
          <li><a href="search_admin.php?p_cat=Mars">Mars</a></li>
          <li><a href="search_admin.php?p_cat=Jupiter">Jupiter</a></li>
          <li><a href="search_admin.php?p_cat=Saturn">Saturn</a></li>
          <li><a href="search_admin.php?p_cat=Uranus">Uranus</a></li>
          <li><a href="search_admin.php?p_cat=Neptune">Neptune</a></li>
          <li><a href="search_admin.php?p_cat=Inner Belt">Inner Belt</a></li>
          <li><a href="search_admin.php?p_cat=Kuiper Belt">Kuiper Belt</a></li>
          <li><a href="create_product.php">Create Destination</a></li>
          <li><a href="display_product.php">All Destinations</a></li>
          <li><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> </a></li>
            <?php
            include("search_result.php");
            ?>
        </ul>
      </div>
    </div>
  </div>
</nav>
<?php } else{
			 ?>
<!--<nav class="navbar navbar-default navbar-fixed-top">
  <div class="row header2">
    <div class="container">
      <ul class="list-inline pull-right">
        <li><a href="logout.php">Logout</a></li>
        <li><a href="shoppingcart.php"><i class="fa fa-cart-plus" aria-hidden="true"></i> </a></li>
        <li></li>
      </ul>
    </div>
  </div> -->
  <div class="header1">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="index.php" class="navbar-brand">Sol-Tourism</a> </div>
      <div class="navbar-collapse collapse pull-right" id="navbar">
        <ul class="nav navbar-nav">
          <!-- <li><a href="index.php">Home</a></li> -->
          <li><a href="search.php?p_cat=Mercury">Mercury</a></li>
          <li><a href="search.php?p_cat=Venus">Venus</a></li>
          <li><a href="search.php?p_cat=Luna">Luna</a></li>
          <li><a href="search.php?p_cat=Mars">Mars</a></li>
          <li><a href="search.php?p_cat=Jupiter">Jupiter</a></li>
          <li><a href="search.php?p_cat=Saturn">Saturn</a></li>
          <li><a href="search.php?p_cat=Uranus">Uranus</a></li>
          <li><a href="search.php?p_cat=Neptune">Neptune</a></li>
          <li><a href="search.php?p_cat=Inner Belt">Inner Belt</a></li>
          <li><a href="search.php?p_cat=Kuiper Belt">Kuiper Belt</a></li>
          <li><a href="main.php">All Destinations</a></li>
          <li><a href="cart_detail.php">Your Trips</a></li>
          <li><a href="logout.php">Logout</a></li>
          <li><a href="shoppingcart.php"><i class="fa fa-cart-plus" aria-hidden="true"></i> </a></li>
            <?php
            include("search_result.php");
            ?>
        </ul>
      </div>
    </div>
  </div>
</nav>
<?php }
		 
		 
		 }else{?>
             <!--      # Navbar
                   <nav class="navbar navbar-default navbar-fixed-top">
                     <div class="row header2">
                       <div class="container">
                         <ul class="list-inline pull-right">
                           <li><a href="login.php">Login</a></li>
                           <li><a href="shoppingcart.php"><i class="fa fa-cart-plus" aria-hidden="true"></i> </a></li>
        <li></li>
      </ul>
    </div>
  </div> -->
  <div class="header1">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="index.php" class="navbar-brand">Sol-Tourism</a> </div>
      <div class="navbar-collapse collapse pull-right" id="navbar">
        <ul class="nav navbar-nav">
          <!-- <li><a href="index.php">Home</a></li> -->
          <li><a href="search.php?p_cat=Mercury">Mercury</a></li>
          <li><a href="search.php?p_cat=Venus">Venus</a></li>
          <li><a href="search.php?p_cat=Luna">Luna</a></li>
          <li><a href="search.php?p_cat=Mars">Mars</a></li>
          <li><a href="search.php?p_cat=Jupiter">Jupiter</a></li>
          <li><a href="search.php?p_cat=Saturn">Saturn</a></li>
          <li><a href="search.php?p_cat=Uranus">Uranus</a></li>
          <li><a href="search.php?p_cat=Neptune">Neptune</a></li>
          <li><a href="search.php?p_cat=Inner Belt">Inner Belt</a></li>
          <li><a href="search.php?p_cat=Kuiper Belt">Kuiper Belt</a></li>
          <li><a href="main.php">All Destinations</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="shoppingcart.php"><i class="fa fa-cart-plus" aria-hidden="true"></i> </a></li>
            <?php
            include("search_result.php");
            ?>
          </div>
          <!-- end sidebar -->
        </ul>
      </div>
    </div>
  </div>
</nav>
<?php }?>
