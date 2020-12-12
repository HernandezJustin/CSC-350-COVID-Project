<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>CSC 350 COVID-19 Store - Checkout</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/shop-homepage.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<style>
		.img-thumbnail{
			height: 100px;
			width: 100px;
		}
	</style>
</head>
<body>
<?php 
	require 'navbar.php';
	require'db.php';

	$servername = $sn;
    $username = $un;
    $password = $pw;
    $dbname = $dbn;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
      //echo("Connected successfully");
    }

    if(isset($_SESSION["order_id"])){
    	echo '<br/><h1 style="text-align: center;">Your Cart:</h1><br/>';
    	$order_id = $_SESSION["order_id"];
    	//cart has items;
    	$sql_retrieve_current_order = "SELECT CustOrder.customer_id, Item.image, Item.name, CartedItem.quantity, CartedItem.carted_price, Item.stock_quantity, Item.item_id, Item.price FROM ((CartedItem INNER JOIN Item ON CartedItem.item_id = Item.item_id)
			INNER JOIN CustOrder ON CartedItem.order_id = CustOrder.order_id) WHERE CartedItem.order_id=" . $_SESSION["order_id"];
		$result = $conn->query($sql_retrieve_current_order);
		if($result->num_rows > 0){
			echo '<table class="table"><thead><tr>
					<th scope="col">Icon</th>
				      <th scope="col">Item Name</th>
				      <th scope="col">Quantity</th>
				      <th scope="col">Cost</th>
				    </tr></thead><tbody>'; 
			echo '<form name="addCart" method="post" action="addCart.php">';
			while ($row = $result->fetch_assoc()) {
				//Dynamic Data using SQL SELECT
				$regPrice = $row["price"];
				$price = $regPrice- (number_format(($regPrice/10), 2));
				echo '<input type="hidden" name="itemID" value="' . $row["item_id"] . '">';
              	echo '<input type="hidden" name="price" value="' . $price . '">';
				echo '<tr><th scope="row"><img class="img-thumbnail" src="images/' . $row["image"]  .'"/></th>';
				echo '<td>' . $row['name'] . '</td>';
				echo '<td>' . $row['quantity'] . '</td>';
				// echo '<td><input type="number" id="updateQuantity" name="updateQuantity" value="'. $row['quantity'] . '" min="1" max="' . $row['stock_quantity'] . '"> <button type="submit" name="updateCart" style="font-size:12px">Update Cart</button><button type="submit" name="removeFromCart" style="font-size:12px"><i class="fa fa-remove"></i></button></td>';
				
				echo '<td>$ ' . $row['carted_price'] . '</td></tr>';
			}
			echo '</form>';	
		} else {

			echo '<br/><br/><h1 style="text-align: center;">Your Cart is empty</h1><br/>';
		}
    } else {
    	//empty cart
    	echo 'orderid not set';
    	echo '<br/><br/><h1 style="text-align: center;">Your Cart is empty</h1><br/>';
    }
?>

</tbody>
</table>
</body>

</html>
