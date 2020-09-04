<?php
require_once('./php/cartTesterDB.php');
require_once ('./php/categoryTemp.php');
$categoryName = $_GET['categoryName'];
$categoryValue = $_GET['categoryValue'];
$typeAlreadyChosen = $_GET['typeAlreadyChosen'];
$bandAlreadyChosen = $_GET['bandAlreadyChosen'];
$materialAlreadyChosen = $_GET['materialAlreadyChosen'];
$lowerBoundPriceAlreadyChosen = (int)$_GET['priceAlreadyChosen'];
$upperBoundPriceAlreadyChosen =  $lowerBoundPriceAlreadyChosen + 1000;
$sortByPriceMethodAlreadyChosen = empty($_GET['sortByPriceMethodAlreadyChosen']) ? NULL : $_GET['sortByPriceMethodAlreadyChosen'];
$genderAlreadyChosen = empty($_GET['genderAlreadyChosen']) ? NULL : $_GET['genderAlreadyChosen'];

// ****Append the rest of the conditions(if they don't have null value) to $query.*******

$categories = array("type"=>$typeAlreadyChosen, "band"=>$bandAlreadyChosen, "material"=>$materialAlreadyChosen,
	"price_range"=>$lowerBoundPriceAlreadyChosen, "gender"=>$genderAlreadyChosen, "sortByPriceMethod"=>$sortByPriceMethodAlreadyChosen);

	$count = 0;
	$appendToQuery = '';
    $query = '';
foreach($categories as $category => $val) {
	if($categoryName == "sortByPriceMethod"){
		     $appendToQuery = '';
		if(($val != NULL) AND ($category != $categoryName)AND($category != "sortByPriceMethod")){
			if($category == "price_range"){
				if($val >= 10000){
					if($count == 0)
						$query = "SELECT * FROM watch WHERE price >= $lowerBoundPriceAlreadyChosen";
					else 
						$appendToQuery.= " AND price >= $lowerBoundPriceAlreadyChosen";


				} else {
					if($count == 0)
						$query = "SELECT * FROM watch WHERE price BETWEEN $lowerBoundPriceAlreadyChosen AND $upperBoundPriceAlreadyChosen";
					else
						$appendToQuery.=" AND price BETWEEN $lowerBoundPriceAlreadyChosen AND $upperBoundPriceAlreadyChosen";

					
				} 
			} else {
				if($count == 0)
				$query = "SELECT * FROM watch WHERE $category = '$val'";
				else 
				$appendToQuery.= " AND $category = '$val'";

			}
		} 
		$count++;
		$query.=$appendToQuery;

		
	} else {
		if(($val != NULL) AND ($category != $categoryName)AND($category != "sortByPriceMethod")){
			if($category == "price_range")
				if($val >= 10000)
					$appendToQuery.= " AND price >= $lowerBoundPriceAlreadyChosen";
				else
					$appendToQuery.= " AND price BETWEEN $lowerBoundPriceAlreadyChosen AND $upperBoundPriceAlreadyChosen";
				else 
					$appendToQuery.= " AND $category = '$val'";

			}
           
		}
		
	}

    if($query == NULL){
    	$query = "SELECT * FROM watch";
    }

	switch ($categoryName) {
		case "type":
		$query = "SELECT * FROM watch WHERE type = '".$categoryValue."'".$appendToQuery;


		break;
		case "band":
		$query = "SELECT * FROM watch WHERE band = '".$categoryValue."'".$appendToQuery;



		break;
		case "material":
		$query = "SELECT * FROM watch WHERE material = '".$categoryValue."'".$appendToQuery;


		break;
		case "price_range":
		if($lowerBoundPriceAlreadyChosen >= 10000)
			$query = "SELECT * FROM watch WHERE price >= $lowerBoundPriceAlreadyChosen".$appendToQuery;
		else
			$query = "SELECT * FROM watch WHERE price BETWEEN $lowerBoundPriceAlreadyChosen AND $upperBoundPriceAlreadyChosen".$appendToQuery;

		break;
		case "sortByPriceMethod":
				if($categoryValue == "highTolow")
					$query.=" ORDER BY price DESC";
				else
					$query.=" ORDER BY price ASC";
			break;
		default:


		return;
	}

       if($categoryName != "sortByPriceMethod"){
       		if($categories['sortByPriceMethod'] == "highTolow")
       			$query.=" ORDER BY price DESC";
       		else
       			$query.=" ORDER BY price ASC";  
       }

	$productTable = mysqli_query($conn, $query);
	$resultCheck = mysqli_num_rows($productTable);



	if($resultCheck > 0){
		echo '
		<form action="single-product.php" method="post">
		<div class="row">';

		while ($row = mysqli_fetch_assoc($productTable))
		{
			if (($row["quantity"] > 0) AND ($row["status"] == "active")) {

				getCatgElement($row["name"], $row["image"], $row["price"], $row["watch_id"]);
			}
		}
		echo '
		</div>
		</form>';


	} else {

		echo '<h1 class="text-center py-5">No results found.</h1>';
	} 

?>