<?php
    session_start();
    require 'includes/connection.inc.php';
	require_once ('./php/categoryTemp.php');
	require_once ('./php/headerFunctions.php');

	

    timeout();



//define a query to get product information
$productQuery = "SELECT * FROM watch WHERE watch_id = 39";
$productTable = mysqli_query($conn, $productQuery);
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Watch Planet | Home</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/brand/watch_planet.png" width="200px" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="category.php">Shop</a></li>
							<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                                    <?php
                                    if (isset($_SESSION['id'])){
									   echo    '<li class="nav-item"><a class="nav-link" href="includes/logout.inc.php">Log Out <i class="fa fa-sign-out"></i></a></li>';
                                    }
                                    else {
									   echo    '<li class="nav-item"><a class="nav-link" href="login.php"><i class="fa fa-sign-in"></i> Log in</a></li>';
                                        }
                                        ?>
                            <li class="nav-item"><a href="cart.php" class="nav-link"><span class="ti-bag">
                                <?php
									//if session cart array holds items, display the amount of items stored next to the cart icon
									if(isset($_SESSION['cart'])){
										$count = count($_SESSION['cart']);
										echo '<span class="badge badge-light poppins">'.$count.'</span>';
									}else{
										echo '<span class="badge badge-light poppins">0</span>';
									}
										

                                ?></span></a></li>
							</ul>
						<ul class="nav navbar-nav navbar-right">
							
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
							<?php 
								settings()
							?>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<?php //Search Function
		search() ?>
	</header>
	<!-- End Header Area -->

	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5">
								<div class="banner-content">
									<?php
										$row = mysqli_fetch_assoc($productTable);
										echo '
											<h1>'.$row['brand'].' '.$row['name'].'<br></h1>
											<p>'.$row['description'].'</p>';
									?>
								</div>
							</div>
							<div class="col-lg-7 text-center">
								<div class="banner-img mx-auto">
									<?php
										echo'<img class="img" src="'.$row['image'].'" alt="">;';

									?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon1.png" alt="">
						</div>
						<h6>Free Shipping</h6>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon2.png" alt="">
						</div>
						<h6>Return Policy</h6>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon3.png" alt="">
						</div>
						<h6>24/7 Support</h6>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon4.png" alt="">
						</div>
						<h6>Secure Payment</h6>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	<!-- start product Area -->
	<section>
		<!-- single product slide -->
		<div class="single-product">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Best Sellers</h1>
						</div>
					</div>
				</div>
				<div class="row">
                        <!-- single product -->
                    <?php
	                    $productQuery = "SELECT * FROM watch WHERE quantity > 0 AND status = 'active' AND watch_id IN (47, 38, 41, 36)";
						$productTable = mysqli_query($conn, $productQuery);
						while ($row = mysqli_fetch_assoc($productTable))
						{
							echo '<div class="col-lg-3 col-md-6">
									<div class="single-product text-center">
										<img class="img-fluid" src="'.$row['image'].'" alt="">
										<div class="product-details text-center">
											<h6 style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">'.$row['name'].'</h6>
											<div class="price">$'.$row['price'].'</h6>
											</div>
										</div>
									</div>
								</div>';
						}
						?>
                        
				</div>
			</div>
		</div>
		<!-- single product slide -->
		
	</section>
	<!-- end product Area -->

	<!-- start footer Area -->
	<footer class="footer-area">
		<div class="container">
			<div class="row">
			 <div class="col">
				<div class="single-footer-widget">
					<img class="img-fluid pb-5" width="75%" src="img/brand/watch_planet.png">
				</div>
			</div>
			<div class="col-lg-5">
				<div class="single-footer-widget">
					<h6>About Us</h6>
					<p>
						We are a watch e-commerce centered on giving our costumers the best experience possible.
					</p>
				</div>
			</div>
               
				
			</div>	
             <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap mt-5">
				<p class="mx-auto">Copyright &copy; 2020 All rights reserved  |  <a class="a-color disabled" href="">Privacy Policy</a> &middot; <a class="a-color disabled" href="">Terms &amp; Conditions</a></p>
             </div>
		</div>
	</footer>
	<!-- End footer Area -->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>