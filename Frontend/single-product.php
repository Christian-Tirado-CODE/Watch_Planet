<?php
//SESSION VARIABLES $_SESSION[]
// $_SESSION['clickID'] -> Variable that saves ID of product clicked
// $_SESSION['cart'] -> Array that saves item IDs from database table to be used with cart and checkout
// $_SESSION['qty'] -> Array that saves quantity of cart items (SHARES INDEX WITH CART ARRAY!!!)
// $_SESSION['subtotal'] -> Variable that saves cart subtotal
// $_SESSION['tax'] -> Variable that saves cart tax
// $_SESSION['total'] -> Variable that saves cart total


//start session
session_start();

require_once('./php/cartTesterDB.php');
require_once ('./php/single-productF.php');
require_once ('./php/headerFunctions.php');

//checks if there was a product ID saved in session, if not use placeholder
if(isset($_POST['prodSelect'])){
	$productID = $_POST['prodSelect'];
	$_SESSION['clickID'] = $_POST['prodSelect'];
}else{
	$productID = 0;
}

// //checks if there was a product ID saved in session, if not use placeholder
// if(isset($_SESSION['clickID'])){
// 	$productID = $_SESSION['clickID'];
// }else{
// 	$productID = 0;
// }

srand($productID);


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
	<title>Watch Planet | Product Details</title>
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
							<li class="nav-item active"><a class="nav-link" href="category.php">Shop</a></li>
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

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.php">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.php">Product Details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<?php 

			//moved Single Product Area to function singleItem()
			//using productID to define a query to get product information
			$idQuery = "SELECT * FROM watch WHERE watch_id = $productID ";
			$getProd = mysqli_query($conn, $idQuery);
			$myProduct = mysqli_fetch_assoc($getProd);
			
			$prodBrand = $myProduct['brand'];
			$prodName = $myProduct['name'];
			$prodBandMat = $myProduct['material'];
			$caseWidth = rand(30, 55);
			$caseHeight = rand(30, 55);
			$caseDepth = rand(8, 15);
			$bandWidth = rand(15, 25);
			$bandLength = rand(8, 12);
			$weight = rand(3, 6);






			
			?>

			<form action=single-product.php method=post>
				<?php
				//single item retrieves infomation from database outputs it in website's HTML format
				singleItem($myProduct['name'], $myProduct['price'], $myProduct['description'], $myProduct['image'], $myProduct['watch_id'], $myProduct['quantity'], $myProduct['gender']); 
				?>
			</form>

			<?php
			//Adding a product to the cart using a session variable to store an array with all the items added during the session
			if(isset($_POST['add'])){
				//print_r($_POST['prodID']);
				if(isset($_SESSION['cart'])){

					$item_array_id = array_column($_SESSION['cart'], "prodID");
					print_r($item_array_id);

					//print_r($_SESSION['cart']);
					
					//if product is in session cart array, dont add it again. else add the product to the session cart array
					if(in_array($_POST['prodID'], $item_array_id)){
						//echo "<script>alert('Product is already added in the cart')</script>";
						echo "<script>window.location = 'cart.php?error=incart'</script>";
					}else{
						$count = count($_SESSION['cart']); //returns number of elements in array
						$item_array = array(
							'prodID' => $_POST['prodID']
						);

						$qty_array = array(
							'qty' => 1
						);

						$_SESSION['cart'][$count] = $item_array;

						$_SESSION['qty'][$count] = $qty_array;

						print_r($_SESSION['cart']);
						echo "<script>window.location = 'cart.php'</script>";
					}
				}
				else{
					$item_array = array(
						'prodID' => $_POST['prodID']
					);

					$qty_array = array(
						'qty' => 1
					);

					//create new session variables
					$_SESSION['cart'][0] = $item_array;
					$_SESSION['qty'][0] = $qty_array;
					print_r($_SESSION['cart']);
					echo "<script>window.location = 'cart.php'</script>";

				}

			}
			elseif (isset($_POST['return']))
			{
				echo "<script>window.location = 'category.php'</script>";
			}
						
			
			?>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area pb-4">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<button class="primary-btn rounded" style="line-height: 40px;" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="true">Specification</button>
				</li>
				<!-- Removed comments and reviews tabs -->
			</ul>
			<div class="tab-content border-0" id="myTabContent">
				
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Brand</h5>
									</td>
									<td>
										<h5><?php echo $prodBrand?></h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Name</h5>
									</td>
									<td>
										<h5><?php echo $prodName?></h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Case Width</h5>
									</td>
									<td>
										<h5><?php echo $caseWidth?>mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Case Height</h5>
									</td>
									<td>
										<h5><?php echo $caseHeight?>mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Depth</h5>
									</td>
									<td>
										<h5><?php echo $caseDepth?>mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Weight</h5>
									</td>
									<td>
										<h5><?php echo $weight?>oz</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Band Width</h5>
									</td>
									<td>
										<h5><?php echo $bandWidth?>mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Band Length</h5>
									</td>
									<td>
										<h5><?php echo $bandLength?>in</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Band Material</h5>
									</td>
									<td>
										<h5><?php echo $prodBandMat?></h5>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
			<!-- Removed Comments and Reviews Code -->
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->
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