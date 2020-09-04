<?php

require_once('connection.inc.php');
session_start();

/*
  STEPS TO INSERT ORDER, ORDERDETAILS AND INVOICE INTO DATABASE.

1.When user clicks button on paypal.php it will take you to insertOrdersIntoDatabase.php.
2.Inside the file, store the user’s id and date on two variables: $user_id and $order_date.
3.Create query to insert values into orders table and execute mysqli_query.
4.Create query to obtain id and price from watches table. Execute mysqli_query.
5.Create query to obtain the last order_id in the orders table. Execute mysqli_query.
6. Iterate items on the cart. Get their id, quantity, order_id. Insert every item on the orderdetails table.  
7. insert invoice into table.
8. Redirect to confirmation.php
*/


// GET WATCH ID
$productQuery = "SELECT * FROM watch";
$productTable = mysqli_query($conn, $productQuery);

 $user_id = $_SESSION['id'];



 // INSERT SHIPPING 
  $sql = "INSERT INTO shipping(user_id, ship_address_line_1, ship_address_line_2, ship_city, ship_country, ship_zip) 
          VALUES($user_id, '".$_SESSION['ship_address_line_1']."','".$_SESSION['ship_address_line_2']."', 
          '".$_SESSION['ship_city']."', '".$_SESSION['ship_country']."', '".$_SESSION['ship_zip']."');";
        echo $sql;
        mysqli_query($conn, $sql);

  // GET SHIPPING ID
$sql = "SELECT * FROM shipping WHERE ship_id=(SELECT max(ship_id) FROM shipping);"; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$ship_id = $row['ship_id'];


       

 // INSERT BILLING

   $sql = "INSERT INTO billing(user_id, bill_address_line_1, bill_address_line_2, bill_city, bill_country, bill_zip) 
          VALUES($user_id, '".$_SESSION['bill_address_line_1']."','".$_SESSION['bill_address_line_2']."', 
           '".$_SESSION['bill_city']."', '".$_SESSION['bill_country']."', '".$_SESSION['bill_zip']."');";
        echo $sql;
        mysqli_query($conn, $sql);

// GET BILLING ID
$sql = "SELECT * FROM billing WHERE bill_id=(SELECT max(bill_id) FROM billing);"; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$bill_id = $row['bill_id'];





date_default_timezone_set("America/Puerto_Rico");
$order_date = date("Y-m-d");

echo "<h1>$user_id and $order_date</h1>";

$sql = "INSERT INTO orders(user_id, status, order_date, ship_id, bill_id) VALUES($user_id, 'Confirmed', '".$order_date."', $ship_id,$bill_id);";
mysqli_query($conn, $sql);


// INSERT ORDER DETAIL
// GET ORDER ID
$sql = "SELECT * FROM orders WHERE order_id=(SELECT max(order_id) FROM orders);"; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$order_id = $row['order_id'];


// GET WATCH ID
$productQuery = "SELECT * FROM watch";
$productTable = mysqli_query($conn, $productQuery);
 //stores index for every cart item on session list (used for item removal)
 $subtotal = 0; //stores subtotal

                                //fetch all products in our table
 while ($row = mysqli_fetch_assoc($productTable))
 {
    $cartIndex = 0;
                                    //fetch all of our ID's stored in our cart array
    foreach (array_column($_SESSION['cart'], "prodID") as $currentID){
                                        //Only display products with ID's in our cart array.
        if ($currentID == $row['watch_id']){
            $watch_id = $row['watch_id'];
            $price =  (int)$row['price'];
                                            //fetches item quantity from quantity arrray using the same index of our cart array
            $quantity = (int)$_SESSION['qty'][$cartIndex]; 
            $qtyPrice = $price * $quantity;
                                           // cartItem($row['name'], $qtyPrice, $row['image'], $cartIndex, $quantity);

            $subtotal = $subtotal + $qtyPrice;

            $sql = "INSERT INTO details(order_id, watch_id, quantity, price) VALUES($order_id, $watch_id, $quantity, $qtyPrice);";
            mysqli_query($conn, $sql);

            //UPDATING QUANTITIES IN DATABASE
            $storeQty = (int)$row['quantity'];
            $updateQty = $storeQty - $quantity;
                                     
            $sql = "UPDATE watch SET quantity=$updateQty WHERE watch_id=$currentID";
            mysqli_query($conn, $sql);

        }
        else
        {
          $cartIndex++;
        }
          
    }
 }

// INSERT INVOICE
    $sql = "INSERT INTO invoice(order_id) VALUES($order_id);";
    mysqli_query($conn, $sql);

$sql = "SELECT * FROM invoice WHERE invoice_id=(SELECT max(invoice_id) FROM invoice);"; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$_SESSION['invoice_id'] = $row['invoice_id'];




 header('Location: ../confirmation.php');
























 ?>