<?php
    session_start();
    require 'includes/connection.inc.php';
	require_once ('./php/categoryTemp.php');
	require_once ('./php/headerFunctions.php');
	
	timeout();
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
	<title>Watch Planet | Contact</title>
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
							<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="category.php">Shop</a></li>
							<li class="nav-item active"><a class="nav-link" href="contact.php">Contact</a></li>
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

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Contact</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="contact.php">Contact</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Contact Area =================-->
	<section class="contact_area section_gap_bottom">
		<div class="container">
			<div class="mapouter text-center py-5"><div class="gmap_canvas"><iframe height="500" width="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=University%20of%20puerto%20rico%20at%20arecibo&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.enable-javascript.net/blog/divi-discount/"></a></div></div>
			<div class="row text-center">
				<div class="col-lg">
					<div class="contact_info">
						<div class="info_item">
							<!-- <i class="lnr lnr-apartment"></i> -->
							<h6>Arecibo, Puerto Rico</h6>
							<p>Carr. 653 Km. 0.8 Sector Las Dunas, Arecibo P.R. 00614</p>
						</div>
						<div class="info_item">
							<!-- <i class="lnr lnr-phone-handset"></i> -->
							<h6>787-815-0000</h6>
							<p>Mon to Fri 8am to 4pm</p>
						</div>
						<div class="info_item">
							<!-- <i class="lnr lnr-envelope"></i> -->
							<h6>contact@watch-planet.com</h6>
							<p>Send us your questions anytime!</p>
						</div>
					</div>
				</div>
			<!--	<div class="col-lg-9">
					<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"></textarea>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button type="submit" value="submit" class="primary-btn">Send Message</button>
						</div>
					</form>
				</div>-->
			</div>
		</div>
	</section>
	<!--================Contact Area =================-->

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
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>