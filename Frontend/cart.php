<?php
//SESSION VARIABLES $_SESSION[]
// $_SESSION['clickID'] -> Variable that saves ID of product clicked
// $_SESSION['cart'] -> Array that saves item IDs from database table to be used with cart and checkout
// $_SESSION['qty'] -> Array that saves quantity for each of the cart items (SHARES INDEX WITH CART ARRAY!!!)
// $_SESSION['subtotal'] -> Variable that saves cart subtotal to be used in cart and checkout
// $_SESSION['tax'] -> Variable that saves cart tax to be used in cart and checkout
// $_SESSION['total'] -> Variable that saves cart total to be used in cart and checkout

//start session
session_start();

require_once ('./php/cartF.php');
require_once('./php/cartTesterDB.php');
require_once ('./php/headerFunctions.php');


//define a query to get product information
$productQuery = "SELECT * FROM watch";
$productTable = mysqli_query($conn, $productQuery);


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
    <title>Watch Planet | Cart</title>
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
                            <li class="nav-item active"><a href="cart.php" class="nav-link"><span class="ti-bag">
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
                    <h1>Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="cart.php">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "incart") {
                            echo '<div class="alert alert-warning" role="alert"><h4 class="alert-heading text-center">Product is already in the cart!</h4></div>';
                        }
                    }
                ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            if(!empty($_SESSION['cart'])){
                                $cartIndex = 0; //stores index for every cart item on session list (used for item removal)
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
                                            cartItem($row['brand'], $row['name'], $qtyPrice, $row['price'], $row['image'], $cartIndex, $quantity);
                                            $subtotal = $subtotal + $qtyPrice;
                                        }
                                        else
                                        {
                                            $cartIndex++;
                                        }
                                            
                                    }
                                }
                            }else{
                                echo "<h5>Your Shopphing Cart is Empty</h5>";
                            }
                            
                            //if remove button is pressed, remove the desired cart item using the stored index
                            //also affects quantity array
                            if(isset($_POST['remove'])){
                                $rmvIndex = $_POST['cartIndex'];
                                //$rmvId = $_POST['rmvId'];
                                unset($_SESSION['cart'][$rmvIndex]);
                                unset($_SESSION['qty'][$rmvIndex]);
                                $_SESSION['cart'] = array_values($_SESSION['cart']);
                                $_SESSION['qty'] = array_values($_SESSION['qty']);
                                //echo "<script>alert('Removing cart item $rmvIndex')</script>";
                                echo "<script>window.location = 'cart.php'</script>";
                            }

                            //if quantity button is increased, increase the quantity of the item in the cart array
                            if(isset($_POST['qty-up'])){
                                $qtyIndex = $_POST['cartIndex'];
                                $currentQty = (int)$_SESSION['qty'][$qtyIndex];
                                $currentQty++;
                                $_SESSION['qty'][$qtyIndex] = $currentQty;
                                echo "<script>window.location = 'cart.php'</script>";
                            }

                            //if quantity button is decreased, decrease the quantity of the item in the cart array
                            if(isset($_POST['qty-down'])){
                                $qtyIndex = $_POST['cartIndex'];
                                $currentQty = (int)$_SESSION['qty'][$qtyIndex];
                                if ($currentQty > 1){
                                    $currentQty--;
                                    $_SESSION['qty'][$qtyIndex] = $currentQty;
                                    echo "<script>window.location = 'cart.php'</script>";
                                }
                                else{
                                    echo "<script>alert('Cannot Decrease Shopping Cart Item: $qtyIndex')</script>";
                                }
                            }
                            ?>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <?php
                                    if(!empty($_SESSION['cart'])){
                                        //Display and save subtotal in session
                                        $_SESSION['subtotal'] = $subtotal;
                                        echo "<h5>$".number_format($subtotal,2)."</h5>";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Taxes (11.5%)</h5>
                                </td>
                                <td>
                                    
                                    <?php
                                    if(!empty($_SESSION['cart'])){
                                        //calculate tax and save it to the session
                                        $tax = $subtotal * .115;
                                        $_SESSION['tax'] = $tax;
                                        echo "<h5>$".number_format($tax,2)."</h5>";
                                    }
                                    ?>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    
                                    <h5>FREE</h5>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Total</h5>
                                </td>
                                <td>
                                    <?php
                                    if(!empty($_SESSION['cart'])){
                                        //calculate subtotal and save it to the session
                                        $total = $subtotal + $tax;
                                        $_SESSION['total'] = $total;
                                        echo "<h5>$".number_format($total,2)."</h5>";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-10 mx-auto d-flex justify-content-center">
                    <div class="d-flex">
                    <a class="gray_btn mr-3" href="category.php">Continue Shopping</a>
                    <?php
                    if(!empty($_SESSION['cart'])){
                        if (isset($_SESSION['id'])) {
                            echo '
                                <form action="cart.php" method="post">
                                    <button name="checkout" type="submit" class="submit_btn ml-3">Proceed to checkout</button>
                                </form>';
                        }
                        else
                            echo '<a class="submit_btn text-white ml-3" href="login.php">Login to continue</a>';
                        
                    
                        if(isset($_POST['checkout'])){
                            echo "<script>window.location = 'checkout.php'</script>";
                        }
                    }
                    ?>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

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