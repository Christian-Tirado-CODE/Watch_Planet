<?php
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
	<title>Watch Planet | Register</title>
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

	<!--================Login Box Area =================-->
	<section class="register_box_area section_gap mt-5">
		<div class="container">
			<div class="row pt-5">
				<div class="col-lg-6">
					<div class="register_form_inner pt-3">
						<?php
							if (isset($_GET['error']))
							 	echo '<h3 class="mb-1">Create an account</h3>';
							 else
							 	echo '<h3>Create an account</h3>';

						    if (isset($_GET['error'])) {
						    	if ($_GET['error'] == "invalidinputs") {
						            echo '<div class="alert alert-danger p-0 pt-1 m-0" role="alert"><h4 class="alert-heading text-center">Fields written in an invalid format!</h4></div>';
						        }
						        else if ($_GET['error'] == "invalidemail") {
						            echo '<div class="alert alert-danger p-0 pt-1 m-0" role="alert"><h4 class="alert-heading text-center">Email written in invalid format!</h4></div>';
						        }
						        else if ($_GET['error'] == "invalidname") {
						            echo '<div class="alert alert-danger p-0 pt-1 m-0" role="alert"><h4 class="alert-heading text-center">Name has invalid characters!</h4></div>';
						        }
						        else if ($_GET['error'] == "invalidlast_name") {
						            echo '<div class="alert alert-danger p-0 pt-1 m-0" role="alert"><h4 class="alert-heading text-center">Last name has invalid characters!</h4></div>';
						        }
						        else if ($_GET['error'] == "passwordcheck") {
						            echo '<div class="alert alert-danger p-0 pt-1 m-0" role="alert"><h4 class="alert-heading text-center">Passwords do not match!</h4></div>';
						        }
						        else if ($_GET['error'] == "emailalreadyregistered") {
						            echo '<div class="alert alert-danger p-0 pt-1 m-0" role="alert"><h4 class="alert-heading text-center">Email is already registered!</h4></div>';
						        }
						    }
						?>
						<form class="row register_form" action="includes/signup.inc.php" method="post" id="contactForm">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="pass" name="pass" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="pass_confirm" name="pass_confirm" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
							</div>
							<div class="col-md-12 form-group mb-0">
								<button type="submit" name="signup-submit" value="signup-submit" class="primary-btn">Create Account</button>
								<a href="#">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="register_box_img">
						<img class="img-fluid" src="img/fall_watch.jpg" alt="">
						<div class="hover">
							<h4>Already have an account?</h4>
							<p>Watch Planet has a great variety of watches to browse, so go ahead and</p>
							<a class="primary-btn" href="login.php">Login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

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