<?php
require_once ('./php/cartF.php');
require_once('./php/cartTesterDB.php');
require_once ('./php/headerFunctions.php');
session_start();
$productQuery = "SELECT * FROM watch";
$productTable = mysqli_query($conn, $productQuery);

$confirm_date = date("d-m-Y");
$confirm_date = str_replace("-","/", $confirm_date);

// VALUES OBTAINED FROM FORM
//$firstName = $_SESSION['first_name'];
$lastName = $_SESSION['last_name'];
$email = $_SESSION['email'];
$country = $_SESSION['bill_country'];
$address = $_SESSION['bill_address'];
$city = $_SESSION['bill_city'];
$zip = $_SESSION['bill_zip'];
$shipFirstName = $_SESSION['ship_first_name'];
$shipLastName = $_SESSION['ship_last_name'];
$shipAddress = $_SESSION['ship_address'];
$shipCity = $_SESSION['ship_city'];
$shipZip = $_SESSION['ship_zip'];
$shipCountry = $_SESSION['ship_country'];
$total = $_SESSION['total'];
$subTotal = $_SESSION['subtotal'];
$taxes = $_SESSION['tax'];

//SESSION VARIABLES $_SESSION[]
// $_SESSION['clickID'] -> Variable that saves ID of product clicked
// $_SESSION['cart'] -> Array that saves item IDs from database table to be used with cart and checkout
// $_SESSION['qty'] -> Array that saves quantity of cart items (SHARES INDEX WITH CART ARRAY!!!)
// $_SESSION['subtotal'] -> Variable that saves cart subtotal
// $_SESSION['tax'] -> Variable that saves cart tax
// $_SESSION['total'] -> Variable that saves cart total

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
	<title>Watch Planet | Confirmation</title>
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

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Confirmation</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="cart.php">Cart<span class="lnr lnr-arrow-right"></span></a>
						<a href="checkout.php">Checkout<span class="lnr lnr-arrow-right"></span></a>
						<a href="confirmation.php">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation">Thank you. Your order has been received.</h3>
			<div class="row order_d_inner">
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Order Info</h4>
						<ul class="list" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
							<li><a href="#"><span>Order number</span> : 321</a></li>
							<li><a href="#"><span>Date</span> : <?php echo $confirm_date?></a></li>
							<li><a href="#"><span>Total</span> : $<?php echo number_format($total,2)?></a></li>
							<li><a href="#"><span>Payment method</span> : Paypal</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Billing Address</h4>
						<ul class="list" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
							<li><a href="#"><span>Street</span> : <?php echo $address?></a></li>
							<li><a href="#"><span>City</span> : <?php echo $city?></a></li>
							<li><a href="#"><span>Country</span> : <?php echo $country?></a></li>
							<li><a href="#"><span>Postcode </span> : <?php echo $zip?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Shipping Address</h4>
						<ul class="list" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
							<li><a href="#"><span>Street</span>: <?php echo $shipAddress?></a></li>
							<li><a href="#"><span>City</span>: <?php echo $shipCity?></a></li>
							<li><a href="#"><span>Country</span>: <?php echo $shipCountry?></a></li>
							<li><a href="#"><span>Postcode </span>: <?php echo $shipZip?></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<h2>Order Details</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
								

							<tr>
								<th scope="col">Product</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							
                                $subtotal = 0; //stores subtotal

                                //fetch all products in our table
                                while ($row = mysqli_fetch_assoc($productTable))
                                {
									$cartIndex = 0; //stores index for every cart item on session list (used for item removal)
                                    //fetch all of our ID's stored in our cart array
                                    foreach (array_column($_SESSION['cart'], "prodID") as $currentID){
                                        //Only display products with ID's in our cart array.
                                        if ($currentID == $row['watch_id']){
                                            $price =  (int)$row['price'];
                                            //fetches item quantity from quantity arrray using the same index of our cart array
                                            $quantity = (int)$_SESSION['qty'][$cartIndex]; 
                                            $qtyPrice = $price * $quantity;
                                           // cartItem($row['name'], $qtyPrice, $row['image'], $cartIndex, $quantity);
                                            $subtotal = $subtotal + $qtyPrice;
                                             echo "<tr>
												   <td>
													  $row[name]
												   	</td>
												   	<td>
														 $quantity
												   	</td>
												   	<td>
														 $".number_format($qtyPrice, 2)."
												   	</td>
											   </tr>";


										}
										else{
											$cartIndex++;
										}
                                    }
                                }
                                ?>
							<tr>
								<td>
									<h4>Subtotal</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p><?php echo "$".number_format($subTotal, 2)?></p>
								</td>
							</tr>
														<tr>
								<td>
									<h4>Taxes</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p><?php echo "$".number_format($taxes, 2)?></p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Shipping</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Free Shipping</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p><?php echo "$".number_format($total, 2)?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

                               <?php
                                   $sql = "SELECT invoice_id FROM invoice WHERE invoice_id=(SELECT max(invoice_id) FROM invoice);";
                                   $result = mysqli_query($conn, $sql);
                                   $row = mysqli_fetch_assoc($result);
                                   $invoice_id = $row['invoice_id'];
                                   echo "

											     <a href='invoice.php?invoice_id={$invoice_id}' class='submit_btn text-white btn-block text-center mt-3'>Print Invoice</a>

                                   ";
                               ?>

						        

		</div>

	</section>

	<!--================End Order Details Area =================-->

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

<?php
//CLEARING CART
	unset($_SESSION['cart']);
	unset($_SESSION['qty']);
?>