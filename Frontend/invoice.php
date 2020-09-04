<?php
session_start();
require_once ('./php/cartF.php');
require_once('./php/cartTesterDB.php');
require_once ('./php/headerFunctions.php');

require_once('includes/connection.inc.php');

$user_id = $_SESSION['id'];
$invoice_id = $_GET['invoice_id'];


$sql = "SELECT invoice_id, first_name, last_name, email, ship_address_line_1, ship_address_line_2, order_date  
FROM invoice 
JOIN orders ON invoice.order_id = orders.order_id
JOIN user ON user.user_id = orders.user_id
JOIN shipping ON shipping.ship_id = orders.ship_id
WHERE invoice.invoice_id = $invoice_id;";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 
$invoice_date =  getdate(strtotime($row['order_date']));
$invoice_date = $invoice_date['month'].' '.$invoice_date['mday'].', '.$invoice_date['year'];




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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Planet | Invoice</title>
    <link rel="stylesheet" href="css/invoice.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>



    <header>
        <div class="row mx-auto d-flex">
            <div class="col">
                <a href="index.php">
                    <img src="img/brand/watch_planet.png"  width="300px"/>
                </a>
            </div>
            <div class="col-6 align-self-center company-details">
                <h2 class="name">
                    <a target="_blank" href="https://lobianijs.com">
                    </a>
                </h2>
                <div class="text-right">Carr. 653 Km. 0.8 Sector Las Dunas, Arecibo P.R. 00614</div>
                <div class="text-right">(787) 815-0000</div>
                <div class="text-right">contact@watch-planet.com</div>
            </div>
        </div>
    </header>
    <div id="invoice">
        <div class="invoice mx-auto overflow-auto">
            <div style="min-width: 600px">

                <main>
                    <div class="row contacts">
                        <div class="col-8 invoice-to">
                            <div class="text-gray-light">INVOICE TO:</div>
                            <h2 class="to"><?php echo $row['first_name'].' '.$row['last_name']?></h2>
                            <div class="address"><?php echo $row['ship_address_line_1'].$row['ship_address_line_2']?></div>
                            <div class="email"><a href="mailto:john@example.com"><?php echo $row['email']?></a></div>
                        </div>
                        <div class="col invoice-details">
                            <h1 class="invoice-id">INVOICE: #<?php echo $row['invoice_id']?></h1>
                            <div class="date">Date of Invoice: <?php echo $invoice_date?></div>
                            <!--<div class="date">Due Date: 30/10/2018</div>-->
                        </div>
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>

                                <th class="text-left">DESCRIPTION</th>
                                <th class="text-right">PRICE</th>
                                <th class="text-right">QUANTITY</th>
                                <th class="text-right">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            $user_id = $_SESSION['id'];
                            $sql = "SELECT invoice_id, first_name, last_name, email, ship_address_line_1, ship_address_line_2, order_date,  watch.name, brand, description, details.quantity, watch.price, details.quantity * watch.price AS total_price_per_item_quantity
                            FROM invoice 
                            JOIN orders ON invoice.order_id = orders.order_id
                            JOIN user ON user.user_id = orders.user_id
                            JOIN shipping ON shipping.ship_id = orders.ship_id
                            JOIN details ON details.order_id = orders.order_id
                            JOIN watch ON watch.watch_id = details.watch_id
                            WHERE invoice.invoice_id = $invoice_id";


                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            $total_price_of_items = 0;
                            if($resultCheck > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                 echo "
                                 <tr>
                                 <td><h2>{$row['name']}</h2>
                                 {$row['description']}
                                 </td>
                                 <td>{$row['price']}</td>
                                 <td>{$row['quantity']}</td>
                                 <td>{$row['total_price_per_item_quantity']}</td>
                                    <tr>

                                 ";
                                 $total_price_of_items += $row['price'] * $row['quantity'];

                             }
                         }
                           $tax = 0.115 * $total_price_of_items;
                           $total_pricing = $total_price_of_items + $tax;
                         ?>


                     </tbody>
                     <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>$<?php echo number_format($total_price_of_items,2)?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 11.5%</td>
                            <td>$<?php echo number_format($tax,2)?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>$<?php echo number_format($total_pricing,2)?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you for your purchase!</div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
</body>
<script>
   $('#printInvoice').click(function(){
    Popup($('.invoice')[0].outerHTML);
    function Popup(data) 
    {
        window.print();
        return true;
    }
});
</script>
</html>

