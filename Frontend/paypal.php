<?php
require_once ('./php/cartF.php');
require_once('./php/cartTesterDB.php');
session_start();
$productQuery = "SELECT * FROM watches";
$productTable = mysqli_query($conn, $productQuery);

// VALUES OBTAINED FROM FORM
$_SESSION['bill_first_name'] = $_POST['firstName'];;
$_SESSION['bill_last_name'] = $_POST['lastName'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['bill_country']= $_POST['country'];
$_SESSION['bill_address'] = $_POST['addressLine1'].$_POST['addressLine2'];
$_SESSION['bill_address_line_1'] = $_POST['addressLine1'];
$_SESSION['bill_address_line_2'] = $_POST['addressLine2'];
$_SESSION['bill_city'] = $_POST['city'];
$_SESSION['bill_zip'] = $_POST['zip'];

$_SESSION['ship_first_name'] = $_POST['shipFirstName'];
$_SESSION['ship_last_name'] = $_POST['shipLastName'];
$_SESSION['ship_address'] = $_POST['shipAddressLine1'].$_POST['shipAddressLine2'];
$_SESSION['ship_address_line_1'] = $_POST['shipAddressLine1'];
$_SESSION['ship_address_line_2'] = $_POST['shipAddressLine2'];
$_SESSION['ship_city'] = $_POST['shipCity'];
$_SESSION['ship_zip'] = $_POST['shipZip'];
$_SESSION['ship_country'] = $_POST['shipCountry'];


//SESSION VARIABLES $_SESSION[]
// $_SESSION['clickID'] -> Variable that saves ID of product clicked
// $_SESSION['cart'] -> Array that saves item IDs from database table to be used with cart and checkout
// $_SESSION['qty'] -> Array that saves quantity of cart items (SHARES INDEX WITH CART ARRAY!!!)
// $_SESSION['subtotal'] -> Variable that saves cart subtotal
// $_SESSION['tax'] -> Variable that saves cart tax
// $_SESSION['total'] -> Variable that saves cart total
?>



<!DOCTYPE html>
<html lang="en">
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
	<title>Watch Planet | Paypal</title>
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
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="text-center mt-4">
                                    <img class="my-5" src="img/watch-images/paypal_logo.png" width="auto" height="300px" />
                                    <a class="primary-btn text-white" href="includes/insertOrderIntoDB.inc.php">Place Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
