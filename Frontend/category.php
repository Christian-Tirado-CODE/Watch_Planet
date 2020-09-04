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
	<title>Watch Planet | Shop</title>
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
				<h1>Shop</h1>
				<nav class="d-flex align-items-center">
					<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="#">Shop</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->

<div class="container">
	<div class="row">
		<div class="col-xl-3 col-lg-4 col-md-5">
			<form action="category.php" method = "POST">
				<div class="sidebar-categories">

					<!--  ==============               CATEGORIES              =============  -->

					<div class="head">Browse Categories</div>
					<ul class="main-categories">
						<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span
							class="lnr lnr-arrow-right"></span><span class="gender">Men</span></a>
							<ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
								<div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="type" value="Analog"onclick="filterProducts(this.name,this.value)"> Analog</div>
									<div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="type" value="Digital" onclick="filterProducts(this.name, this.value)"> Digital</div>
										<div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="type" value="Hybrid"onclick="filterProducts(this.name, this.value)"> Hybrid</div>
											<div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="type" value="Smart"onclick="filterProducts(this.name, this.value)"> Smart</div>
										</ul>
									</li>

									<li class="main-nav-list"><a class="border-bottom-0" data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span
										class="lnr lnr-arrow-right"></span><span class="gender">Women</span></a>
										<ul class="collapse" id="meatFish" data-toggle="collapse" aria-expanded="false" aria-controls="meatFish">
											<div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="type" value="Analog"
												onclick="filterProducts(this.name,this.value)"> Analog</div>
													<div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="type" value="Digital" onclick="filterProducts(this.name,this.value)"> Digital</div>
														<div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="type" value="Hybrid" onclick="filterProducts(this.name,this.value)"> Hybrid</div>
															<div class="pl-2 py-1 pb-3"><input type="radio" class="pixel-radio" name="type" value="Smart" onclick="filterProducts(this.name,this.value)"> Smart</div>
														</ul>
													</li>
												</ul>
											</div>
											<div class="sidebar-filter mt-50">
												<div class="top-filter-head">Product Filters</div>
												<div class="common-filter">
													<div class="head">Band/Strap</div>
													<ul>
														<li class="filter-list"><div class="pl-2 py-1"><input class="pixel-radio" type="radio" id="leather" name="band" value="Leather" onclick="filterProducts(this.name,this.value)"><label for="leather">Leather</label></div></li>
														<li class="filter-list"><div class="pl-2 py-1"><input class="pixel-radio" type="radio" id="metal" name="band" value="Metal" onclick="filterProducts(this.name,this.value)"><label for="metal" >Metal</label></div></li>
														<li class="filter-list"><div class="pl-2 py-1"><input class="pixel-radio" type="radio" id="nylon" name="band" value="Nylon" onclick="filterProducts(this.name,this.value)"><label for="nylon">Nylon</label></div></li>
														<li class="filter-list"><div class="pl-2 py-1"><input class="pixel-radio" type="radio" id="plastic" name="band" value="Plastic" onclick="filterProducts(this.name,this.value)"><label for="plastic">Plastic</label></div></li>
														<li class="filter-list"><div class="pl-2 py-1"><input class="pixel-radio" type="radio" id="rubber" name="band" value="Rubber" onclick="filterProducts(this.name,this.value)"><label for="rubber">Rubber</label></div></li>
														<li class="filter-list"><div class="pl-2 py-1"><input class="pixel-radio" type="radio" id="silicon" name="band" value="Silicon" onclick="filterProducts(this.name,this.value)"><label for="silicon">Silicon</label></div></li>
														<li class="filter-list"><div class="pl-2 py-1"><input class="pixel-radio" type="radio" id="wood" name="band" value="Wood" onclick="filterProducts(this.name,this.value)"><label for="wood">Wood</label></div></li>
													</ul>
												</div>
												<div class="common-filter">
													<div class="head">Material</div>
													<ul>
														<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="material" value="Metal" onclick="filterProducts(this.name,this.value)"> Metal</div></li>
														<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="material" value="Silicon" onclick="filterProducts(this.name,this.value)"> Silicon</div></li>
														<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="material" value="Wood" onclick="filterProducts(this.name,this.value)">Wood</div></li>



													</ul>
												</div>
					<!--
					<div class="common-filter">
						<div class="head">Price</div>
						<div class="price-range-area">
							<div id="price-range"></div>
							<div class="value-wrapper d-flex">
								<div class="price">Price:</div>
								<span>$</span>
								<div id="lower-value"></div>
								<div class="to">to</div>
								<span>$</span>
								<div id="upper-value"></div>
							</div>
						</div>
					</div>
				-->
				<div class="common-filter">
					<div class="head">Price</div>
					<ul>
						<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="price_range" value="0" onclick="filterProducts(this.name,this.value)">$0-$1000</div></li>
						<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="price_range" value="1000" onclick="filterProducts(this.name,this.value)">$1000-$2000</div></li>
						<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="price_range" value="2000" onclick="filterProducts(this.name,this.value)">$2000-$3000</div></li>
						<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="price_range" value="3000" onclick="filterProducts(this.name,this.value)">$3000-$4000</div></li>
						<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="price_range" value="4000" onclick="filterProducts(this.name,this.value)">$4000-$5000</div></li>
						<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="price_range" value="5000" onclick="filterProducts(this.name,this.value)">$5000-$6000</div></li>
						<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="price_range" value="6000" onclick="filterProducts(this.name,this.value)">$6000-$7000</div></li>
						<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="price_range" value="7000" onclick="filterProducts(this.name,this.value)">$7000-$8000</div></li>
						<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="price_range" value="8000"  onclick="filterProducts(this.name,this.value)">$8000-$9000</div></li>
						<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="price_range" value="9000" onclick="filterProducts(this.name,this.value)">$9000-$10000</div></li>
						<li class="filter-list"><div class="pl-2 py-1"><input type="radio" class="pixel-radio" name="price_range" value="10000" onclick="filterProducts(this.name,this.value)">$10000+</div></li>
					</ul>

				</div>

			</div>

			<!-- =======================  END OF FORM  ======================================-->
		</form>
	</div>
	<div class="col-xl-9 col-lg-8 col-md-7 pb-5">
		<!-- Start Filter Bar -->


		                 <!-- ================= SORT BY PRICING ===============================-->

		<div class="filter-bar d-flex flex-wrap justify-content-end">
			<div class="row pt-2 text-left">
				<span class="text-white lead align-middle my-auto">Sort by:</span>
				<select class="mx-2" id="sortByPriceMethod" aria-label="Sort by:" onchange="filterProducts(this.name,this.value)" name="sortByPriceMethod">
					<option value="highTolow" selected>Price: High to Low</option>
					<option value="lowTohigh">Price: Low to High</option>
				</select>
			</div>
		</div>
		<!-- End Filter Bar -->
		<!-- Start Best Seller -->
		<section class="lattest-product-area pb-40 category-list" id="watches">
			<form action="single-product.php" method="post">
				<div class="row">

					<!-- Displaying all products with product table -->
					<?php
					if(isset($_POST['search_input']))
					{
						$search = $_POST['search_input'];
						$productQuery = "SELECT * FROM watch WHERE name like '%$search%'";
					}
					else
					{
						$productQuery = "SELECT * FROM watch";
					}
					$productTable = mysqli_query($conn, $productQuery);


					while ($row = mysqli_fetch_assoc($productTable))
					{
						if (($row["quantity"] > 0) AND ($row["status"] == "active")) {
							getCatgElement($row["name"], $row["image"], $row["price"], $row["watch_id"]);
						}
					}
					?>


				</div>
			</form>
		</section>
		<!-- End Best Seller -->
		<!-- Start Filter Bar -->

		<!-- End Filter Bar -->
	</div>
</div>
</div >

<!-- start footer Area -->
<footer class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="single-footer-widget">
					<img class="img-fluid pb-5" width="75%" src="img/brand/watch_planet.png">
					<h1> Were inside the first template</h1>
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

<!-- Modal Quick Product View -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="container relative">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="product-quick-view">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="quick-view-carousel">
							<div class="item" style="background: url(img/organic-food/q1.jpg);">

							</div>
							<div class="item" style="background: url(img/organic-food/q1.jpg);">

							</div>
							<div class="item" style="background: url(img/organic-food/q1.jpg);">

							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="quick-view-content">
							<div class="top">
								<h3 class="head">Mill Oil 1000W Heater, White</h3>
								<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
								<div class="category">Category: <span>Household</span></div>
								<div class="available">Availibility: <span>In Stock</span></div>
							</div>
							<div class="middle">
								<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
									looking for something that can make your interior look awesome, and at the same time give you the pleasant
								warm feeling during the winter.</p>
								<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
							</div>
							<div class="bottom">
								<div class="color-picker d-flex align-items-center">Color:
									<span class="single-pick"></span>
									<span class="single-pick"></span>
									<span class="single-pick"></span>
									<span class="single-pick"></span>
									<span class="single-pick"></span>
								</div>
								<div class="quantity-container d-flex align-items-center mt-15">
									Quantity:
									<input type="text" class="quantity-amount ml-15" value="1" />
									<div class="arrow-btn d-inline-flex flex-column">
										<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
										<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
									</div>

								</div>
								<div class="d-flex mt-20">
									<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
									<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
									<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



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
<script type="text/javascript">

	var lowerValue = document.getElementById("lower-value").value;
	console.log(lowerValue);
	var one = 1;
</script>
<script>


	function filterProducts(categoryName, categoryValue) {
		if (categoryValue == "") {

			return;
		} else {
			if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest ();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {
        		document.getElementById("watches").innerHTML = this.responseText;

        	}
        };

        let typeAlreadyChosen = '';
        let bandAlreadyChosen = '';
        let materialAlreadyChosen = '';
        let priceAlreadyChosen = '';
        let genderAlreadyChosen = '';
        let sortByPriceMethodAlreadyChosen = '';

        let types = document.getElementsByName('type');
        types.forEach((type) => {
        	if (type.checked) {
        		typeAlreadyChosen = type.value;
        		 genderAlreadyChosen = type.parentElement.parentElement.parentElement.children[0].children[0].nextSibling.textContent[0];
        	}
        });

        let bands = document.getElementsByName('band');
        bands.forEach((band) => {
        	if (band.checked) {
        		bandAlreadyChosen = band.value;
        	}
        });

        let materials = document.getElementsByName('material');
        materials.forEach((material) => {
        	if (material.checked) {
        		materialAlreadyChosen = material.value;
        	}
        });
        let prices = document.getElementsByName('price_range');
        prices.forEach((price) => {
        	if (price.checked) {

        		priceAlreadyChosen = price.value;
        	}
        });

        Array.from(document.querySelector("#sortByPriceMethod").options).forEach(function(option) {
        		if(option.selected)
        			sortByPriceMethodAlreadyChosen = option.value;
        });

      




 console.log(categoryName, categoryValue);
        xmlhttp.open("GET","filter_products.php?categoryName=" + categoryName + "&categoryValue=" + categoryValue + "&typeAlreadyChosen=" + typeAlreadyChosen + "&materialAlreadyChosen=" + materialAlreadyChosen + "&bandAlreadyChosen=" + bandAlreadyChosen + "&priceAlreadyChosen=" + priceAlreadyChosen  + "&sortByPriceMethodAlreadyChosen=" + sortByPriceMethodAlreadyChosen + "&genderAlreadyChosen=" + genderAlreadyChosen, true);
        xmlhttp.send();
    }
}


</script>
</body>

</html>
























































