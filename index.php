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

</head>

<body>
  <?php require 'navbar.php';?>
  <?php require 'db.php';?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">COVID-19 Supply Store</h1>
        <div class="list-group">
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

            $sql = "SELECT Type.name FROM type";
            $result = $conn->query($sql);

             if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc())
                {
                  echo '<a href="#" class="list-group-item">' . $row["name"] . '</a>';
                }
              } else {
                //no data
              }

          ?>
          <!-- <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a> -->
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

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

              $sql = "SELECT Item.item_id,Item.name, Item.quantity,Item.price,Item.description,Type.name type, Item.image FROM Item INNER JOIN Type ON Type.type_id = Item.type_id";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc())
                {
                  echo '<div class="col-lg-4 col-md-6 mb-4">';
                  echo '<div class="card h-100">';
                  echo '<a href="#"><img class="card-img-top" src="/CSC-350-COVID-Project/images/'. $row["image"] .'" alt=""></a>';
                  echo '<div class="card-body" style="height:140px;">';
                  echo '<h4 class="card-title">';
                  echo '<a href="product.php?productID='. $row["item_id"] . '">' . $row["name"] . '</a></h4>';
                  echo '<p class="card-text">' . $row["description"] . '</p>';
                  echo '<h5>$' . $row["price"] . '</h5>';
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
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
