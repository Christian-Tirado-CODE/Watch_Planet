<?php

//receives image, name, and price
function cartItem($productBrand, $productName, $productPrice, $totalPrice, $image, $index, $qty){
    
    $productName = strtolower($productName);
    $productName = ucwords($productName);

    $cartItem = '
    <form action="cart.php" method="post">
    <tr>
    <td class="py-4">
        <div class="media">
            <div class="d-flex col-lg-2 px-1">
                <img class="img-fluid" src="'.$image.'">
            </div>
            <div class="media-body px-4">
                <p class="pt-2 pb-1">'.$productBrand.' '.$productName.'</p>
                <input type="hidden" name="cartIndex" value="'.$index.'">
                <button name="remove" type="submit" class="genric-btn danger-border circle">Remove Item</button>
            </div>
            
        </div>
    </td>
    <td>
        <h5>$'.number_format($totalPrice,2).'</h5>
    </td>
    <td>
        <div class="product_count">
            <input type="text" name="qty'.$index.'" id="sst'.$index.'" maxlength="12" value="'.$qty.'" title="Quantity:"
                class="input-text qty">
            <button name="qty-up" class="increase items-count" type="submit"><i class="lnr lnr-chevron-up"></i></button>
            <button name="qty-down" class="reduced items-count" type="submit"><i class="lnr lnr-chevron-down"></i></button>
        </div>
    </td>
    <td>
        <h5>$'.number_format($productPrice,2).'</h5>
    </td>
    </tr>
    </form>
    ';
    echo $cartItem;
}

function cartHeader(){
    //if session cart array holds items, display the amount of items stored next to the cart icon
    if(isset($_SESSION['cart'])){
        $count = count($_SESSION['cart']);
        echo "<span>$count</span>";
    }else{
        echo "<span>0</span>";
    }
}


// <button name=\"qty-up\" onclick=\"var result = document.getElementById('sst$index'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;\"
//                 class=\"increase items-count\" type=\"button\"><i class=\"lnr lnr-chevron-up\"></i></button>
//             <button name=\"qty-down\" onclick=\"var result = document.getElementById('sst$index'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;\"
//                 class=\"reduced items-count\" type=\"button\"><i class=\"lnr lnr-chevron-down\"></i></button>
?>
    

