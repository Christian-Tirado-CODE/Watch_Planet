<?php

function checkoutItem($name, $price, $index){
    $quantity = (int)$_SESSION['qty'][$index];
    $qtyPrice = $price * $quantity;
    $item = "<li><a href=\"#\">$name <span class=\"last\">\$".number_format($qtyPrice,2)."</span></a></li>";

    echo $item;
}




?>