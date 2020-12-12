<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CSC 350 COVID-19 Store - View Product</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">
  <style>
    .img-thumbnail{
      height: 252px;
      width: 252px;
      margin: auto;
    }

    .card-body{
      text-align: center;
    }
  </style>

</head>

<body>

  <?php require 'navbar.php';?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4">COVID-19 Supply Store</h1>
      </div>
      <!-- /.col-lg-3 -->
      
        <div class="col-md-6">
          <form name="addCart" method="post" action="addCart.php">
          <div class="card mt-4">

            <?php 
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "csc350_covid_store";

              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);

              // Check connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }else{
                //echo("Connected successfully");
              }

              //product id from GET request
              if(isset($_GET['productID'])){
                $productID = $_GET['productID'];
                //retrieve product information
                $sql_select_product = "SELECT Item.item_id, Item.name, Item.stock_quantity, Item.price,Item.description, Item.image,Type.name type FROM Item INNER JOIN Type ON Type.type_id = Item.type_id WHERE Item.item_id=" . $productID;
                $result = $conn->query($sql_select_product);

                //if the item was found
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  echo '<img class="card-img-top img-thumbnail" src="images/' . $row['image'] . '" alt="">';
                  echo '<div class="card-body">';
                  echo '<h3 class="card-title">' .$row['name'] . '</h3>';

                  //if the user is logged in, show the discounted price; otherwise show the regular price
                  if(isset($_SESSION["email"])){
                    $regPrice = $row["price"];
                    $finalPrice = $regPrice - (number_format(($regPrice/10), 2));
                    echo '<h4>$' . $finalPrice . '</h4>';
                  } else {
                    $finalPrice = $row["price"];
                    echo '<h4>$' . $row["price"] . '</h4>';
                  }
                  echo '<h4>Units in Stock: ' . $row['stock_quantity'] . '</h4>';
                  //hidden fields to post item_id and price information
                  echo '<input type="hidden" name="itemID" value="' . $row["item_id"] . '">';
                  echo '<input type="hidden" name="price" value="' . $finalPrice . '">';
                  echo '<div class="card card-outline-secondary my-4">';
                  echo '<div class="card-header">Product Description</div>';
                  if($row['description']) echo '<div class="card-body">' . $row['description'] . '</div></div>';
                  if(isset($_SESSION["order_id"])){
                    //pending order exists
                    $sql_carted_quantity = "SELECT CartedItem.quantity FROM CartedItem WHERE CartedItem.item_id=" . $productID . " AND CartedItem.order_id=" . $_SESSION["order_id"];
                    $result2 = $conn->query($sql_carted_quantity);
                    if($result2->num_rows > 0){
                      //item is in cart
                      $row2 = $result2->fetch_assoc();
                      echo '<div><label for="quantity">Quantity:</label>&nbsp&nbsp';
                      echo '<input type="number" id="updateQuantity" name="updateQuantity" value="'. $row2['quantity'] . '" min="1" max="' . $row['stock_quantity'] . '">';
                      echo '&nbsp&nbsp<input class="btn btn-primary" type="submit" name="updateCart" value="Update Cart"></div><br/><br/>';
                      echo '<input class="btn btn-danger" type="submit" name="removeFromCart" style="margin-right:15px;" value="Remove from Cart">';
                    } else {
                      //item is not in cart
                      echo '<label for="quantity">Quantity:</label>&nbsp&nbsp';
                      echo '<input type="number" id="quantity" name="quantity" value="1" min="1" max="' . $row['stock_quantity'] . '"><br/><br/>';
                      if($row['stock_quantity'] > 0){
                        echo '<input class="btn btn-success" type="submit" name="addToCart" value="Add to Cart">';
                      } else {
                        echo '<input class="btn btn-success" type="submit" name="addToCart" value="Add to Cart" disabled>';
                      }
                    }
                  } else {
                    //New order (last order was complete or first )
                    echo '<label for="quantity">Quantity:</label>&nbsp&nbsp';
                    echo '<input type="number" id="quantity" name="quantity" value="1" min="1" max="' . $row['stock_quantity'] . '"><br/><br/>';
                    if($row['stock_quantity'] > 0){
                        echo '<input class="btn btn-success" type="submit" name="addToCart" value="Add to Cart">';
                      } else {
                        echo '<input class="btn btn-success" type="submit" name="addToCart" value="Add to Cart" disabled>';
                      }
                  }
                
                }
              } else die("URL Query Param Failed");
              $conn->close();
            ?>
          </div>
          </form>
       </div>
        
      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Fall 2020 <br/> By: Group 1 CSC-350 </p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>