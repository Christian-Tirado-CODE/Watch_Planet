<?php
session_start();
require 'includes/connection.inc.php';
require_once ('./php/headerFunctions.php');

if (!isset($_SESSION['id'])) {
	header("Location: 401.html");
}
$user_id = $_SESSION['id'];

$sql = "SELECT * FROM billing
        JOIN orders ON billing.bill_id = orders.bill_id
        JOIN shipping ON shipping.ship_id = orders.order_id
        WHERE orders.user_id = $user_id;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if($resultCheck > 0){
	$phone_number = 
	$street = $row['bill_address_line_1'].' '.$row['bill_address_line_2'];
	$city = $row['bill_city'];
	$country = $row['bill_country'];
	$zip = $row['bill_zip'];

	$ship_street = $row['ship_address_line_1'].' '.$row['ship_address_line_2'];
	$ship_city = $row['ship_city'];
	$ship_country = $row['ship_country'];
	$ship_zip = $row['ship_zip'];
}

$sql = "SELECT * FROM user WHERE user.user_id = $user_id";
$user_result = mysqli_query($conn, $sql);
$user_resultCheck = mysqli_num_rows($user_result);
$user_row = mysqli_fetch_assoc($user_result);

if($user_resultCheck > 0){
	$name = $user_row['first_name'];
	$last_name = $user_row['last_name'];
	$email = $user_row['email'];
}

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
	<title>Watch Planet | Settings</title>
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

		<section class="login_box_area section_gap mt-5">
			<div class="container">
				<div class="row pb-3">
					<h3 class="pl-2 ml-1 my-auto text-left">&nbsp;<i class="fa fa-user"></i>&nbsp; Account</h3>
					<?php
							echo '<button class="btn btn-primary ml-auto mr-3 py-1" onclick="editId('.$_SESSION['id'].')" data-toggle="modal" data-target="#user-edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
					?>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="details_item">	
							<h4>User </h4>
							<ul class="list">
								<li><span>Name</span> : <?php echo $name?></li>
								<li><span>Last Name</span> : <?php echo $last_name?></li>
								<li><span>Email</span> : <?php echo $email?></li>
							</ul>
						</div>
					</div>
					<?php

					if ($resultCheck > 0) {	
					echo
					'<div class="col-lg-4">
					<div class="details_item">
					<h4>Shipping Address </h4>
					<ul class="list">
					<li><span>Street </span>: '.$ship_street.'</li>
					<li><span>City </span>: '.$ship_city.'</li>
					<li><span>Country </span>: '.$ship_country.'</li>
					<li><span>Postcode </span>: '.$ship_zip.'</li>
					</ul>
					</div>
					</div>
					<div class="col-lg-4">
					<div class="details_item">
					<h4>Billing Address </h4>
					<ul class="list">
					<li><span>Street </span>: '.$street.'</li>
					<li><span>City </span>: '.$city.'</li>
					<li><span>Country </span>: '.$country.'</li>
					<li><span>Postcode </span>: '.$zip.'</li>
					</ul>
					</div>
					</div>';
					}
					?>
				</div>
				<hr>
				<h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="fa fa-shopping-bag"></i> Orders</h3>
				<div class="row">
					<!-- ORDER HISTORY-->

					<div class="card mb-4 mt-4 w-100">
						

						<div class='card-header'><i class='fas fa-boxes'></i> Order History</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
									<thead>
										<tr>
											<th>Invoice</th>
											<th>Order date</th>
											<th>Items ordered</th>
											<th>Print</th>
											<th>Status</th>

										</tr>
									</thead>

									<tbody>
										<?php
										
										$sql = "SELECT invoice_id, order_date, orders.status, SUM(details.quantity) AS items_ordered
										FROM invoice 
										JOIN orders ON orders.order_id = invoice.order_id
										JOIN user ON orders.user_id = user.user_id 
										JOIN details ON orders.order_id = details.order_id
										WHERE user.user_id = $user_id
										GROUP BY invoice_id;";
										$result = mysqli_query($conn, $sql);
										$resultCheck = mysqli_num_rows($result);
										if($resultCheck > 0){
											while($row = mysqli_fetch_assoc($result)){
												echo "
												<tr>
												<td>{$row['invoice_id']}</td>
												<td>{$row['order_date']}</td>
												<td>{$row['items_ordered']}</td>
												<td><a href='invoice.php?invoice_id={$row['invoice_id']}' class='view-invoice'>View</a></td>
												<td>{$row['status']}</td>
												</tr>";
											}
										}


										?>
										
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>



			</div>
		</div>  

	</section>

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
		<div id="user-edit" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg py-4">
                <div class="modal-content border-5 mt-3">
                    <div class="modal-header bg-light text-center ">
                        <h3 class="font-weight-light my-2 w-100">Edit User</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="modal-edit">
                    </div>
                </div>
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
	<script>
            function editId(id) {
                jQuery("#modal-edit").load("includes/user_modal_edit.inc.php", {
                idNewId: id
            });
            }
    </script>
</body>


</html>




