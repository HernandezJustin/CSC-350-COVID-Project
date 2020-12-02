<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- <link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet"> -->
    <title>Login Form Design One | Fazt</title>
    <link rel="stylesheet" href="/CSC-350-COVID-Project/css/master.css">
    <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
  <?php
    require 'db.php';
    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    $servername = $sn;
    $username = $un;
    $password = $pw;
    $dbname = $dbn;
    /* Attempt to connect to MySQL database */
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
  ?>

  <?php require 'navbar.php';?>

  <div class="container">
    <div class="login-box">
    <!-- <img src="logo.png" class="avatar" alt="Avatar Image">-->      
      <h1>Login</h1>
      <form>
        <!-- USERNAME INPUT -->

        <label for="email">Email</label>
        <input type="text" placeholder="Enter Email">
        <!-- PASSWORD INPUT -->
        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password">
        <input type="submit" value="Log In">
        <a href="Register.php">Don't have An account?</a>

      </form>

    </div>
  </div>
  </body>
</html>
