<?php
session_start();
$log=$_SESSION['log'];
$pass=$_SESSION['pass'];

require_once('PHP/Model/Class/produit.php');
require_once('PHP/Model/Class/admin.php');
require_once('PHP/Model/Class/books.php');

$a=new admin();




if (isset($_SESSION['log'])&& isset($_SESSION['pass']))
	{
	$a=new admin();
		$res2=$a->rechercher_admin($log,$pass);
		$n=$res2->fetchColumn(0);
	if($n==0)
	{
		?>
	<img src="images/books/32.png" alt="logo images">
	<?php
	}
		else
		{
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Shopping Cart | Bookshop Responsive Bootstrap4 Template</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="css/custom.css">

	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
	<!-- Jquery js -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	
</head>
<body>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<?php if (isset($_SESSION['log'])&& isset($_SESSION['pass'])) {	?>
								<script>
								$(document).ready(function(){
								$("#hide").hide();
								$(".shopcart").hide();
									$("#j1").hide();
									$("#j2").hide();
									$("#j3").hide();
								

									
									
								});

								</script>
								
								
							<?php	} ?>
							<?php if (isset($_SESSION['emailcl'])&& isset($_SESSION['passcl'])) {	?>
								<script>
								$(document).ready(function(){
								$("#h").hide();
									$("#j2").hide();
									$("#j3").hide();
								

									
									
								});

								</script>
								<?php	} ?>
									<?php if (empty($_SESSION['emailcl'])&& empty($_SESSION['passcl']) && empty($_SESSION['log'])&& empty($_SESSION['pass'])) {	?>
								<script>
								$(document).ready(function(){
									$("#j1").hide();
										$("#j4").hide();
								

									
									
								});

								</script>
								
								
							<?php	} ?>
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
								<!--<li><a href="my-account.html">VISITOR SPACE</a></li>-->
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
								<li><a href="adminlog.php">ADMINSTRATION SPACE</a></li>
								<li><a href="about.php">About Page</a></li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</nav>
					</div>
					
						<?php 

					if(isset($_SESSION['cart']))
						{				$i=1;
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
							$res=$p->ajoutepanier($whereIn);
							$tab=array();
							foreach($res as $row)
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
											<a class="checkout__btn" href="carte.php">Go to Checkout</a>
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
				
		
	
	
   											
   											
   											
   											
   											<li class="setting__bar__icon"><a  class="setting__active" href="#"></a>
							<div class="searchbar__content setting__block">
									<div class="content-inner">
										
										
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>My Account</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														
														<span id="j1"><a href="my_account_information.php" >My Account Information</a></span>
														<span id="j2"><a href="account_login.php">Sign In</a></span>
														<span id="j3"><a href="my_account.php">Create An Account</a></span>
														<span id="j4"><a href="PHP/Controller/logout.php">Logout</a></span>
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
				</div>        
   											
   											</div></div>	
								
								<!-- End Shopping Cart -->
					
	           
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
        <div class="ht__bradcaump__area bg-image--3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Shopping Cart</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Shopping Cart</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <form action="#">               
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Nb Suggestion </th>
                                            <th class="product-name">First Name </th>
                                            <th class="product-price">Last Name</th>
                                            <th class="product-quantity">Email</th>
                                            <th class="product-subtotal">Subject</th>
                                            <th class="product-remove">Message</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <?php 
				 $a=new admin();
					$res1=$a->get_contact();
						
				 
				 foreach($res1 as $row)
											 { 
									
									?> 
                               
                                    <tbody>
                                        <tr>     
                                            
                                             <td class="product-name"><a href="#"><?php	echo $row[0];?></a></td>
                                            <td class="product-name"><a href="#"><?php	echo $row[1];?></a></td>
                                            <td class="product-price"><span class="amount"><?php echo $row[2];?>$</span></td>
                                            <td class="product-name"><a href="#"><?php	echo $row[3];?></a></td>
                                            <td class="product-name"><a href="#"><?php	echo $row[4];?></a></td>
                                             <td class="product-name"><a href="#"><?php	echo $row[5];?></a></td>
                                             
                                             <td class="product-remove"><a href="PHP/Controller/suppcontact.php?id=<?php echo $row[0];?>">X</a></td> </tr>
                          
                                         <?php  }  ?>
	
	 									
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                           
                            <div class="cart__total__amount">
                                <span>Nombre Suggestion </span>
                                
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <!-- cart-main-area end -->
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
	<?php	}	}	
else
	//header('location:adminlog.html')
										
										?>