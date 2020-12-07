<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CSC 350 COVID-19 Store</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php require 'navbar.php';?>
  <?php require 'db.php';?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Categories</h1>
        <div class="list-group">
          <a href="#" class="list-group-item" data-target="all">All Products</a>
          <?php
            //session_start(); 
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

            $sql = "SELECT * FROM type";
            $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc())
                {
                  echo '<a href="#" class="list-group-item" data-target="multi-collapse' .$row["type_id"].  '">' . $row["name"] . '</a>';
                }
                //data-toggle="collapse"
              } else {
                //no data
              }

          ?>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <h1 class="my-4" style="text-align: center;">COVID-19 Supply Store</h1>

        <div class="row">
          <?php 
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

              $sql = "SELECT Item.item_id, Item.type_id, Item.name, Item.quantity,Item.price,Item.description,Type.name type, Item.image FROM Item INNER JOIN Type ON Type.type_id = Item.type_id";
              //echo '<div class="card-deck">';
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row

                while($row = $result->fetch_assoc())
                {
                  echo '<div class="col-lg-4 col-md-6 mb-4">';
                  echo '<div class="card h-100 collapse show multi-collapse' . $row["type_id"] . '">';
                  echo '<a href="#"><img class="card-img-top" src="/CSC-350-COVID-Project/images/'. $row["image"] .'" alt=""></a>';
                  echo '<div class="card-body" style="height:140px;">';
                  echo '<h4 class="card-title">';
                  echo '<a href="product.php?productID='. $row["item_id"] . '">' . $row["name"] . '</a></h4>';
                  echo '<p class="card-text">' . $row["description"] . '</p>';
                  if(isset($_SESSION["email"])){
                    $regPrice = $row["price"];
                    $discPrice = $regPrice - (number_format(($regPrice/10), 2));
                    echo '<h5>$' . $discPrice . '</h5>';
                  } else {
                    echo '<h5>$' . $row["price"] . '</h5>';
                  }        
                  echo '</div></div></div>';
                  // echo "Name: " . $row["name"]. " - Quantity: " . $row["quantity"]. " - Price: " . $row["price"]. " - Type: " . $row["type"]. "<br>";
                }
              } else {
                echo "0 results";
              }
              $conn->close();
          ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

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
  
  <script type="text/javascript">
    //toggle list item visibility by category
    $('.list-group-item').on('click', function(){
      var targetAttr = $(this).attr("data-target");
      
      if(targetAttr == "all"){
        $('.card').fadeIn("slow", function(){
          $('.card').parent().removeClass("d-none");
        });
        return;
      } else {
        $('.card').each(function(index){
          if (!$(this).hasClass(targetAttr)){
            $(this).fadeOut("slow", function(){
              $(this.parentNode).addClass("d-none");
            });  
          } else {
            $(this).fadeIn("slow", function(){
              $(this.parentNode).removeClass("d-none");
            });
          }
        });
      }
    });
  </script>

</body>

</html>
