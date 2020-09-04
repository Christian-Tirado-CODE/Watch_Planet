<?php

function getCatgElement($name, $image, $price, $id){
    $inflation = $price + ($price * .2);
    $price = number_format($price, 2);

    echo '
    	<button class=" btn mx-auto px-4 bg-white col-lg-4" type="submit" name="prodSelect" value="'.$id.'">
			<div class="single-product text-center">
				<img class="img-fluid" src="'.$image.'">
				<div class="product-details">
					<h6 style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">'.$name.'</h6>
					<div class="price">
						<h6>$ '.$price.'</h6>
					</div>
				</div>
			</div>
		</button>';


}

?>