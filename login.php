<?php //session_start(); ?>
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
  <?php require 'navbar.php';?>
  <?php
    require 'db.php';

    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    $email = $customerpw = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = $_POST["email"];
      $customerpw = $_POST["password"];
      
      $encrypted_pw = hash("sha256", $customerpw);

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

      $sql = "SELECT * FROM Customer WHERE Customer.email = \"$email\" AND Customer.password = \"$encrypted_pw\"";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // login found
        while($row = $result->fetch_assoc())
        {
          session_start();
          $_SESSION["email"] = $email;
          //$_SESSION["encrypted_pw"] = $encrypted_pw;
          //setcookie($email, $encrypted_pw, time() + (86400), "/");
          //header("Location: http://localhost/CSC-350-COVID-Project/index.php");
          header("refresh:5;url=http://localhost/CSC-350-COVID-Project/index.php");
          echo '<div class="alert alert-success" role="alert">Logged in, Redirecting to Home Page...</div>';
        }
      } else {
        //login not found
        //invalid username or password
        echo '<div class="alert alert-danger" role="alert">Invalid username or password</div>';
      }
    }
  ?>

 

  <div class="container">
    <div class="login-box">
    <!-- <img src="logo.png" class="avatar" alt="Avatar Image">-->      
      <h1>Login</h1>
      <form name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <!-- USERNAME INPUT -->

        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Enter Email">
        <!-- PASSWORD INPUT -->
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter Password">
        <input type="submit" name="submit" value="Log In">
        <a href="Register.php">Don't have An account?</a>
      </form>

    </div>
  </div>
  </body>
</html>
