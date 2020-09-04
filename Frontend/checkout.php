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
require_once ('./php/checkoutF.php');
require_once ('./php/cartF.php');
require_once ('./php/headerFunctions.php');


//define a query to get product information
$productQuery = "SELECT * FROM watch";
$productTable = mysqli_query($conn, $productQuery);

$user_id = $_SESSION['id'];

$shipQuery = "SELECT * FROM shipping WHERE user_id = $user_id ORDER BY ship_id DESC LIMIT 1";

$shipResult = mysqli_query($conn, $shipQuery);
$shipResultCheck = mysqli_num_rows($shipResult);

$billQuery = "SELECT * FROM billing WHERE user_id = $user_id ORDER BY bill_id DESC LIMIT 1";
$billResult = mysqli_query($conn, $billQuery);
$billResultCheck = mysqli_num_rows($billResult);

//Billing
$first_name = '';
$last_name = '';
$email = '';
$bill_address_line_1 = '';
$bill_address_line_2 = '';
$bill_country = '';
$bill_city = '';
$bill_zip = '';
//Shipping

$ship_address_line_1 = '';
$ship_address_line_2 = '';
$ship_country = '';
$ship_city = '';
$ship_zip = '';


if($shipResultCheck > 0 && $billResultCheck > 0){
$ship_row = mysqli_fetch_assoc($shipResult);
$bill_row = mysqli_fetch_assoc($billResult);

$userQuery = "SELECT first_name, last_name, email FROM user WHERE user_id = $user_id;";

$userResult = mysqli_query($conn,$userQuery);
$userRow = mysqli_fetch_assoc($userResult);

$first_name = $userRow['first_name'];
$last_name = $userRow['last_name'];
$email = $userRow['email'];
$bill_address_line_1 = $bill_row['bill_address_line_1'];
$bill_address_line_2 = $bill_row['bill_address_line_2'];
$bill_country = $bill_row['bill_country'];
$bill_city = $bill_row['bill_city'];
$bill_zip = $bill_row['bill_zip'];


$ship_address_line_1 = $ship_row['ship_address_line_1'];
$ship_address_line_2 = $ship_row['ship_address_line_2'];
$ship_country = $ship_row['ship_country'];
$ship_city = $ship_row['ship_city'];
$ship_zip = $ship_row['ship_zip'];
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
    <title>Watch Planet | Checkout</title>
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
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="cart.php">Cart<span class="lnr lnr-arrow-right"></span></a>
                        <a class="disabled" href="checkout.php">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->


    <?php
            echo "
                 <section class='checkout_area section_gap'>
        <div class='container'>
            <div class='billing_details'>
                <div class='row'>
                    <div class='col-lg-8'>
                        <h3>Billing Details</h3>
                        <form class='row contact_form' id='addressForm' action='paypal.php' method='post'>
                            <div class='col-md-6 form-group p_star'>
                                <input type='text' class='form-control' id='first' name='firstName' placeholder='First Name' value='$first_name' required >
                            </div>
                            <div class='col-md-6 form-group p_star'>
                                <input type='text' class='form-control' id='last' name='lastName' value='$last_name' placeholder='Last Name' required>
                            </div>
                            
                            
                            <div class='col-md-12 form-group p_star'>
                                <input type='text' class='form-control' id='last' name='email' value='$email' placeholder='E-mail' required>
                            </div>
                            <div class='col-md-12 form-group p_star' required>
                                <select class='country_select' name='country'>
                                    <option value='Puerto Rico'>Puerto Rico</option>
                                    <option value='United States'>United States</option>
                                </select>
                            </div>
                            <div class='col-md-12 form-group p_star'>
                                <input type='text' class='form-control' id='address1' name='addressLine1' value='$bill_address_line_1' placeholder='Address Line 1' required >
                            </div>
                            <div class='col-md-12 form-group p_star'>
                                <input type='text' class='form-control' id='address2' name='addressLine2'  value='$bill_address_line_2' placeholder='Address Line 2'>
                            </div>
                            <div class='col-md-12 form-group p_star'>
                                <input type='text' class='form-control' id='city' name='city' placeholder='Town/City'  value='$ship_city' required>
                            </div>
                            <div class='col-md-12 form-group'>
                                <input type='text' class='form-control' id=''zip' name='zip' placeholder='Postcode/ZIp'  value='$bill_zip' required>
                            </div>



                            <!-- ==============SHIPPING DETAILS==================== -->



                            <div class='col-md-12 mb-0 mt-4 form-group'>
                                <h3>Shipping Details</h3>
                            </div>
                            <div class='col-md-6 form-group p_star'>
                                <input type='text' class='form-control' id='first' name='shipFirstName' value='$first_name' placeholder='First Name' required>
                            </div>
                            <div class='col-md-6 form-group p_star'>
                                <input type='text' class='form-control' id='last' name='shipLastName' value='$last_name' placeholder='Last Name' required>
                            </div>
                            
                            
                            <div class='col-md-12 form-group p_star'>
                                <input type='text' class='form-control' id='address1' name='shipAddressLine1' value='$ship_address_line_1' placeholder='Address Line 1' required>
                            </div>
                            
                            <div class='col-md-12 form-group p_star'>
                                <input type='text' class='form-control' id='address2' name='shipAddressLine2' value='$ship_address_line_2' placeholder='Address Line 2' >
                            </div> 
                             <div class='col-md-12 form-group p_star'>
                                <input type='text' class='form-control' id='city' name='shipCity' placeholder='Town/City' value='$ship_city' required>
                            </div>
                             <div class='col-md-12 form-group p_star'>
                                <select class='country_select' name='shipCountry' >
                                    <option value='Puerto Rico'>Puerto Rico</option>
                                    <option value='United States'>United States</option>
                                </select>
                            </div>
                            <div class='col-md-12 form-group'>
                                <input type='text' class='form-control' id='zip' name='shipZip' placeholder='Postcode/ZIP' value='$ship_zip'  required>
                            </div>                         
                        </form>
                    </div>
                    <div class='col-lg-4'>
                        <div class='order_box'>
                            <h2>Your Order</h2>
                            <ul class='list'>

                                <li><a href='#'>Product <span>Quantity</span><span>Total</span></a></li>";
                                

                                //fetch all cart items using cart session array
                                if(isset($_SESSION['cart'])){
                                    
                                    while ($row = mysqli_fetch_assoc($productTable))
                                    {
                                        $cartIndex = 0;
                                        foreach (array_column($_SESSION['cart'], "prodID") as $currentID){
                                            if ($currentID == $row['watch_id']){
                                                checkoutItem($row['name'], $row['price'], $cartIndex);
                                                
                                            }
                                            else
                                            {
                                                $cartIndex++;
                                            }
                                        }
                                    }
                                }else{
                                    echo "<h5>No items to checkout</h5>";
                                }
                                echo "
                                
                            </ul>
                            <ul class='list list_2'>
                            <!-- Display pricing information using session variables -->
                                <li><a href='#'>SubTotal <span>$".number_format($_SESSION['subtotal'],2)."</span></a></li>
                                <li><a href='#'>Taxes <span>$".number_format($_SESSION['tax'],2)."</span></a></li>
                                <li><a href='#'>Shipping <span>FREE</span></a></li>
                                <li><a href='#'>Total <span>$".number_format($_SESSION['total'],2)."</span></a></li>
                            </ul>
                  <!--            <div class='payment_item'>
                                <div class='radion_btn'>
                                    <input type='radio' id='f-option5' name='selector'>
                                    <label for='f-option5'>Check payments</label>
                                    <div class='check'></div>
                                </div>
                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                    Store Postcode.</p>
                            </div> -->
                            <div class='payment_item active'>
                                <div class='radion_btn'>
                                    <input type='radio' id='f-option6' name='selector' checked>
                                    <label for='f-option6'>Paypal </label>
                                    <img src='img/product/card.jpg' alt=''>
                                    <div class='check'></div>
                                </div>
<!--                                 <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                    account.</p> -->
                            </div>
                            <!--  <div class='creat_account'>
                                <input type='checkbox' id='f-option4' name='selector'>
                                <label for='f-option4'>I’ve read and accept the </label>
                                <a href='#'>terms & conditions*</a>
                            </div> -->
                            <button class='primary-btn btn-block' form='addressForm'>Proceeed to Paypal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


            ";



    ?>
    <!--
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" id="addressForm" action="paypal.php" method="post">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" name="firstName" placeholder="First Name" required >
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="lastName" placeholder="Last Name" required>
                            </div>
                            
                            
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="last" name="email" placeholder="E-mail" required>
                            </div>
                            <div class="col-md-12 form-group p_star" required>
                                <select class="country_select" name="country">
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="United States">United States</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="address1" name="addressLine1" placeholder="Address Line 1" required >
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="address2" name="addressLine2" placeholder="Address Line 2">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="city" name="city" placeholder="Town/City" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" required>
                            </div>



                            ==============SHIPPING DETAILS==================== 



                            <div class="col-md-12 mb-0 mt-4 form-group">
                                <h3>Shipping Details</h3>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" name="shipFirstName" placeholder="First Name" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="shipLastName" placeholder="Last Name" required>
                            </div>
                            
                            
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="address1" name="shipAddressLine1" placeholder="Address Line 1" required>
                            </div>
                            
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="address2" name="shipAddressLine2" placeholder="Address Line 2" >
                            </div> 
                             <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="city" name="shipCity" placeholder="Town/City" required>
                            </div>
                             <div class="col-md-12 form-group p_star">
                                <select class="country_select" name="shipCountry" >
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="United States">United States</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="zip" name="shipZip" placeholder="Postcode/ZIP"  required>
                            </div>                         
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a href="#">Product <span>Total</span></a></li>
                                <?php
                                 /*
                                //fetch all cart items using cart session array
                                if(isset($_SESSION['cart'])){
                                    
                                    while ($row = mysqli_fetch_assoc($productTable))
                                    {
                                        $cartIndex = 0;
                                        foreach (array_column($_SESSION['cart'], "prodID") as $currentID){
                                            if ($currentID == $row['watch_id']){
                                                checkoutItem($row['name'], $row['price'], $cartIndex);
                                                
                                            }
                                            else
                                            {
                                                $cartIndex++;
                                            }
                                        }
                                    }
                                }else{
                                    echo "<h5>No items to checkout</h5>";
                                }
                                */
                                ?>
                            </ul>
                            <ul class="list list_2">
                             Display pricing information using session variables 
                                <li><a href="#">SubTotal <span>$<?php// echo number_format($_SESSION['subtotal'],2) ?></span></a></li>
                                <li><a href="#">Taxes <span>$<?php //echo number_format($_SESSION['tax'],2) ?></span></a></li>
                                <li><a href="#">Shipping <span>FREE</span></a></li>
                                <li><a href="#">Total <span>$<?php //echo number_format($_SESSION['total'],2) ?></span></a></li>
                            </ul>
                           <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector">
                                    <label for="f-option5">Check payments</label>
                                    <div class="check"></div>
                                </div>
                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                    Store Postcode.</p>
                            </div> 
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector" checked>
                                    <label for="f-option6">Paypal </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                        </div>
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                    account.</p> -->
                            </div>
                            <!--  <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div> 
                            <button class="primary-btn btn-block" form="addressForm">Proceeed to Paypal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--================End Checkout Area =================-->

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