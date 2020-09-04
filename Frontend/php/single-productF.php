<?php
//require_once('./cartTesterDB.php');


function singleItem($productName, $productPrice, $productDesc, $productImg, $productID, $qty, $gender){
	if($qty > 0){
		$inStock = "<li style='color:green'><span>Availibility</span> : In Stock</li>";
		$addToCart = "<button name='add' type='submit' class='primary-btn'>Add to Cart</button>";
	}
	else{
		$inStock = "<li style='color:red'><span>Availibility</span> : Out of Stock</li>";
		$addToCart = "<button name='return' type='submit' class='primary-btn'>Return to Shop</button>";
		
	}

	if($gender == 'M'){
		$wGender = "Men";
	}
	else{
		$wGender = "Woman";
	}

	$productName = strtoupper($productName);
	$productPrice = number_format($productPrice, 2);

    $element="
				<div class='row s_product_inner'>
					<div class='col-lg-6'>
						<div class='s_Product_carousel'>
							<div class='single-prd-item'>
                                <img class='img-fluid mx-auto' src='$productImg'>
							</div>
							<div class='single-prd-item'>
								<img class='img-fluid mx-auto' src='$productImg'>
							</div>
						</div>
					</div>
					<div class='col-lg-5 offset-lg-1 pt-5'>
						<div class='s_product_text'>
							<h3>$productName</h3>
							<h2>$$productPrice</h2>
							<ul class='list'>
								<li><span>Category</span> : $wGender</li>
								$inStock
							</ul>
							<p>$productDesc
							</p>
                            <div class='card_area d-flex align-items-center'>
                                <input type='hidden' name='prodID' value='$productID'>
                                $addToCart
							</div>
						</div>
					</div>
				</div>   
    ";
    
    echo $element;
}

?>


