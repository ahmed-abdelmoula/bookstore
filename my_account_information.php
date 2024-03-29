<?php
session_start();
require_once('PHP/Model/Class/books.php');
$b=new books();	
$res=$b->afficher_client($_GET['id']);
$rows=$res->fetch();
$tab1=explode(",",$rows[4]);
?>

<html class="no-js" lang="zxx">
<head>

	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>My Account | Bookshop Responsive Bootstrap4 Template</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="css/custom.css">

	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
		
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-7 col-lg-2">
						<div class="logo">
							<a href="index.html">
								<img src="images/logo/logo.png" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="index.php">Home</a></li>
								<li><a href="my_account.php">VISITOR SPACE</a></li>
								<li class="drop"><a href="shop.php">Books</a>
									<div class="megamenu mega03">
										<ul class="item item03">
											<li class="title">Categories</li>
											<li><a >Fantasy </a></li>
											<li><a >Science </a></li>
											<li><a >Romance </a></li>
											<li><a >Cookbooks </a></li>
											<li><a >History </a></li>
										</ul>
									</div>
								</li>
								<!--<li><a href="adminlog.php">ADMINSTRATION SPACE</a></li>-->
								<li><a href="about.php">About Page</a></li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</nav>
					</div>
					<?php 

					if(isset($_SESSION['cart']))
						{		require_once('PHP/Model/Class/produit.php');

								$i=1;
										$whereIn="";
										$som=0;
										foreach($_SESSION['prix'] as $val)
										{
											$som+=$val;
										}


							foreach($_SESSION['cart'] as $val)
							{
								$whereIn.="'".$val."'".",";

							}
							$whereIn=substr($whereIn, 1, -2);

							$p=new produit();	
							$res1=$p->ajoutepanier($whereIn);
							$tab=array();
							foreach($res1 as $row)
							{
								array_push($tab,$row);
							}
				 		
				
								
								
								?>
								<div class="col-md-8 col-sm-8 col-5 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun"><?php echo sizeof($_SESSION['cart'])?></span></a>
								<!-- Start Shopping Cart -->
								     <div class="block-minicart minicart__active">
									<div class="minicart-content-wrapper">
										<div class="micart__close">
											<span>close</span>
										</div>

										<div class="items-total d-flex justify-content-between">
											<span><?php echo sizeof($_SESSION['cart'])?> items</span>
											<span>Cart Subtotal</span>
										</div>
										<div class="total_amount text-right">
											<span>$<?php	echo $som; ?></span>
										</div>
										<div class="mini_action checkout">
											<a class="checkout__btn" href="cart.html">Go to Checkout</a>
										</div>
										<!-- ici-->
										<?php 	foreach($tab as $r)		
									
											{
										
										?>
										 <div class="single__items">
											<div class="miniproduct">
												<div class="item01 d-flex">
													<div class="thumb">
														<a href="#"><img src="images/books/<?php echo $r['img'];?>" alt="product img" width="75" height="94" ></a>
													</div>
													 
													<div class="content">
														<h6><a href="product-details.html"><?php	echo $r[1];?></a></h6>
														<span class="prize"><?php	echo $r[2];?>$</span>
														<div class="product_prize d-flex justify-content-between">
															<span class="qun">Qty: 0<?php	echo $i;?></span>
															<ul class="d-flex justify-content-end">
																<li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
																<li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
										
											<?php 	}} else {?>
												
							
									
										<div class="col-md-8 col-sm-8 col-5 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shop_search"><a class="search__active" href="#"></a></li>
							<li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">0</span></a>
								<!-- Start Shopping Cart -->
								<div class="block-minicart minicart__active">
									<div class="minicart-content-wrapper">
										<div class="micart__close">
											<span>close</span>
										</div>
										<div class="items-total d-flex justify-content-between">
											<span>0 items</span>
											<span>Cart Subtotal</span>
										</div>
										<div class="total_amount text-right">
											<span>$0.00</span>
										</div>
										
										<div class="single__items">
											<div class="miniproduct">
												
												<div class="mini_action checkout">
											<a class="checkout__btn" href="carte.php">Go to Checkout</a>
										</div>
												
											</div>
										</div>
										
									</div>
								</div>
								</li>
								<?php  }  ?>
								</li>
										<!-- End Shopping Cart -->
							</li>
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										
										
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>My Account</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														
														<span><a href="#">My Account Information</a></span>
														<span><a href="#">Sign In</a></span>
														<span><a href="#">Create An Account</a></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="index.html">Home</a></li>
								<li><a href="#">Pages</a>
									<ul>
										<li><a href="about.html">About Page</a></li>
										<li><a href="portfolio.html">Portfolio</a>
											<ul>
												<li><a href="portfolio.html">Portfolio</a></li>
												<li><a href="portfolio-details.html">Portfolio Details</a></li>
											</ul>
										</li>
										<li><a href="my-account.html">My Account</a></li>
										<li><a href="cart.html">Cart Page</a></li>
										<li><a href="checkout.html">Checkout Page</a></li>
										<li><a href="wishlist.html">Wishlist Page</a></li>
										<li><a href="error404.html">404 Page</a></li>
										<li><a href="faq.html">Faq Page</a></li>
										<li><a href="team.html">Team Page</a></li>
									</ul>
								</li>
								<li><a href="shop-grid.html">Shop</a>
									<ul>
										<li><a href="shop-grid.html">Shop Grid</a></li>
										<li><a href="single-product.html">Single Product</a></li>
									</ul>
								</li>
								<li><a href="blog.html">Blog</a>
									<ul>
										<li><a href="blog.html">Blog Page</a></li>
										<li><a href="blog-details.html">Blog Details</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
		</header>
		<!-- //Header -->
		<!-- Start Search Popup -->
		<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">My Account</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">My Account</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
		<!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Vos Coordonnées</h3>
							<form action="PHP/Controller/controlmodifform.php" method="post">
								<div class="account__form">
								
								<div class="input__box">
									
										<label> UserID <span>*</span></label>
										<input type="text" name="ID" value= "<?php	echo $rows[0];?>" readonly >
									</div>
								<div class="input__box">
								
									
										<label> Your Name <span>*</span></label>
										<input type="text" name="NomU" value= "<?php	echo $rows[1] ;?>">
									</div>
									<div class="input__box">
									
										<label> Password <span>*</span></label>
										<input type="password" name="password" value= "<?php	echo $rows[2];?>" readonly  >
									</div>
									<div class="input__box">
										<label> Email address  <span>*</span></label>
										<input type="text" name="EmailU" value= "<?php	echo $rows[6] ;?>">
									</div>
									
									<div class="input__box">
										<label> Address <span>*</span></label>
										<input type="text" name="AdressU" value= "<?php	echo $rows[3] ;?>">
									</div>
									
									<div class="input__box">
										<label> Tel  <span>*</span></label>
										<input type="tel" name="PhoneU" value= "<?php	echo $rows[5] ;?>"/>
									</div>
									
									<div class="input__box">
										<label> Center of Interest  <span>*</span></label>
										</div>
										<fieldset>
										<?php

foreach($tab1 as $i)
echo"<label > $i <input type=checkbox name=booksinteret[] value='$i' checked/>	</label>";
$toutloisir=array("Fantasy","Science","Romance","Cookbooks","History");
$resttab=array_diff($toutloisir,$tab1);
foreach($resttab as $h)
{
	echo"<label>$h <input type=checkbox name=booksinteret[] value='$h' /></label>";
	
}
?>
									</fieldset>
										
    					 			
								
									<style>
									input[type=checkbox] {
							margin: 4px 3px 3px 8px;
											}
									</style>
									<div class="form__btn">
										<br>
									<!-- <input type="submit" value="REGISTER"> -->

										<center><button>Confirmer Vos Données</button></center>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						
					</div>
				</div>
			</div>
		</section>
		<!-- End My Account Area -->
		<!-- Footer Area -->
		<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
			<div class="footer-static-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__widget footer__menu">
								<div class="ft__logo">
									<a href="index.html">
										<img src="images/logo/3.png" alt="logo">
									</a>
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered duskam alteration variations of passages</p>
								</div>
								<div class="footer__content">
									<ul class="social__net social__net--2 d-flex justify-content-center">
										<li><a href="#"><i class="bi bi-facebook"></i></a></li>
										<li><a href="#"><i class="bi bi-google"></i></a></li>
										<li><a href="#"><i class="bi bi-twitter"></i></a></li>
										<li><a href="#"><i class="bi bi-linkedin"></i></a></li>
										<li><a href="#"><i class="bi bi-youtube"></i></a></li>
									</ul>
									<ul class="mainmenu d-flex justify-content-center">
										<li><a href="index.html">Trending</a></li>
										<li><a href="index.html">Best Seller</a></li>
										<li><a href="index.html">All Product</a></li>
										<li><a href="index.html">Wishlist</a></li>
										<li><a href="index.html">Blog</a></li>
										<li><a href="index.html">Contact</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright__wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="copyright">
								<div class="copy__right__inner text-left">
									<p>Copyright <i class="fa fa-copyright"></i> <a href="https://freethemescloud.com/">Free themes Cloud.</a> All Rights Reserved</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="payment text-right">
								<img src="images/icons/payment.png" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- //Footer Area -->
		
	</div>
	<!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>
	
</body>
</html>