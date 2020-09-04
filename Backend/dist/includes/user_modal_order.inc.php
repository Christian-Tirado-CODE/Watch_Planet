<?php
require 'connection.inc.php';
session_start();
if(isset($_POST['idNewId'])){
	$_SESSION['user_id'] = $_POST['idNewId'];
}
$user_id = $_SESSION['user_id'];


$sql = "SELECT invoice_id, order_date, orders.status, orders.order_id AS o_id, SUM(details.quantity) AS items_ordered 
FROM invoice 
JOIN orders ON orders.order_id = invoice.order_id
JOIN user ON orders.user_id = user.user_id 
JOIN details ON orders.order_id = details.order_id
WHERE user.user_id = $user_id
GROUP BY invoice_id;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);




if(isset($_GET['order_id'])){

	$order_id = (int)$_GET['order_id'];
	if(isset($_GET['cancel_order']) && ($_GET['cancel_order'] == 'yes')){
		$sql = "UPDATE orders SET status = 'Cancelled' WHERE order_id = $order_id";
		echo $sql;
	} elseif(isset($_GET['mark_shipped']) && $_GET['mark_shipped'] == 'yes'){
		$sql = "UPDATE orders SET status = 'Shipped' WHERE order_id = $order_id";


	} elseif(isset($_GET['delivered']) && $_GET['delivered'] == 'yes'){
		$sql = "UPDATE orders SET status = 'Delivered' WHERE order_id = $order_id";

	} else {

	}
	// do nothing

	$result = mysqli_query($conn, $sql);

	header('Location: ../user.php');
}





if($resultCheck > 0){
	echo '
	<div class="card-body">
	<div class="table-responsive">
	<table class="table table-bordered text-center" id"dataTable" width="100%" cellspacing="0">
	<thead>
	<tr>
	<th>Invoice</th>
	<th>Order date</th>
	<th>Items ordered</th>
	<th>View order</th>
	<th>Status</th>
	<th>Change status</th>
	
	</tr>
	</thead>

	<tbody>';
	
	while($row = mysqli_fetch_assoc($result)){
		echo "
		<tr>
		<td>{$row['invoice_id']}</td>
		<td>{$row['order_date']}</td>
		<td>{$row['items_ordered']}</td>
		<td><a href='invoice.php?invoice_id={$row['invoice_id']}' class='view-invoice'>View</a></td>
		<td>{$row['status']}</td>";
		if($row['status'] == 'Cancelled' OR $row['status']=="Delivered"){
				// disable all buttons
			echo "<td><div class='text-center d-flex justify-content-around'>

			<a href='includes/user_modal_order.inc.php?order_id={$row['o_id']}&mark_shipped=yes'><button class='btn btn-info' disabled>Shipped</button></a>
			<a href='includes/user_modal_order.inc.php?order_id={$row['o_id']}&delivered=yes'><button class='btn btn-success' disabled>Delivered</button></a>
			<a href='includes/user_modal_order.inc.php?order_id={$row['o_id']}&cancel_order=yes'><button class='btn btn-danger ' disabled>Cancel</button></a></div></td>
			</tr>";


		}elseif($row['status'] == 'Shipped'){
            // Disable ship and cancel buttons
			echo "
			<td><div class='text-center d-flex justify-content-around'>

			<a href='includes/user_modal_order.inc.php?order_id={$row['o_id']}&mark_shipped=yes'><button class='btn btn-info ' disabled>Shipped</button></a>
			<a href='includes/user_modal_order.inc.php?order_id={$row['o_id']}&delivered=yes'><button class='btn btn-success'>Delivered</button></a>
			<a href='includes/user_modal_order.inc.php?order_id={$row['o_id']}&cancel_order=yes'><button class='btn btn-danger' disabled>Cancel</button></a></div></td>
			</tr>";

		} else {
         	// Disable delivered button
			echo "	<td><div class='text-center d-flex justify-content-around'>

			<a href='includes/user_modal_order.inc.php?order_id={$row['o_id']}&mark_shipped=yes'><button class='btn btn-info '>Shipped</button></a>
			<a href='includes/user_modal_order.inc.php?order_id={$row['o_id']}&delivered=yes'><button class='btn btn-success' disabled>Delivered</button></a>
			<a href='includes/user_modal_order.inc.php?order_id={$row['o_id']}&cancel_order=yes'><button class='btn btn-danger '>Cancel</button></a></div></td>
			</tr>";
		}

		
	}
	echo '
	</tr>
	</tbody>
	</table>
	</div>

	</div>';


	} else {
		echo "<h1 class='text-center m-5'>No orders have been placed by this user.</h1>";
	}

	?>

