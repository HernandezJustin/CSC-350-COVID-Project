<?php session_start(); ?>
<?php 
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["id"])) {
      $price = $_POST["price"];
      $itemId = $_POST["itemID"];

	$servername = $sn;
      $username = $un;
      $password = $pw;
      $dbname = $dbn;

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }else{}

      if(isset($_POST["addToCart"])){
            $quantity = $_POST["quantity"];
            $price *= $quantity;

            $sql_check_order = "SELECT * FROM CustOrder WHERE customer_id=" . $_SESSION["id"] . " AND ship_date IS NULL LIMIT 1";
            $result = $conn->query($sql_check_order);
            
            if ($result->num_rows > 0) {
                  //found something
                  $row =  $result->fetch_assoc();
                  $order_id = $row["order_id"];
                  
                  $sql_add_item = "INSERT INTO cartedItem (order_id, item_id, quantity, carted_price) VALUES ( " . $order_id . ", " . $itemId . ", " . $quantity . ", " . $price . ")";
                  if($conn->query($sql_add_item) === TRUE) echo '<h1>Item added to cart</h1>';
                  
            } else {

                  $sql_add_order = "INSERT INTO CustOrder (customer_id) VALUES (" . $_SESSION["id"] . ")";
                  if($conn->query($sql_add_order) === TRUE) echo '<h1>ORDER CREATED</h1>';
                  $sql_get_orderid = "SELECT CustOrder.order_id FROM CustOrder WHERE customer_id=" . $_SESSION["id"];
                  $result = $conn->query($sql_get_orderid);
                  if($result->num_rows > 0){
                        $row = $result->fetch_assoc(); 
                        $order_id = $row["order_id"];
                        
                  } else {

                  }
                  $sql_add_item = "INSERT INTO cartedItem (order_id, item_id, quantity, carted_price) VALUES ( " . $order_id . ", " . $itemId . ", " . $quantity . ", " . $price . ")";
                  if($conn->query($sql5) === TRUE) echo '<h1>Item added to cart</h1>';

            }

      } elseif (isset($_POST["updateCart"])) {

            $updateQuantity = $_POST["updateQuantity"];
            $price *= $updateQuantity;
            echo $price;
            $sql_update_cart = "UPDATE cartedItem SET quantity=" . $updateQuantity . ", carted_price=" . $price . "WHERE order_id=" . $_SESSION["order_id"] . " AND item_id=" . $itemId;
            if($conn->query($sql_update_cart) === FALSE) echo '<h1>Something went wrong</h1>';


      } elseif (isset($_POST["removeFromCart"])) {

            $sql_remove_cart = "DELETE FROM cartedItem WHERE order_id=" . $_SESSION["order_id"] . " AND item_id=" . $itemId;
            if($conn->query($sql_remove_cart) === FALSE) '<h1>Something went wrong</h1>';


      }
      
      $conn->close();
      header("Location:index.php");
} else {
	echo '<h1>Log in to add to cart</h1>';
	header("refresh:3;url=index.php");
}
?>