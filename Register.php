<!DOCTYPE html>
<html>
<head>
<!-- <link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
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

require('db.php');

$email = $password = $full_name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $full_name = $_POST["full-name"];
  $customerpw = $_POST["password"];

  $encrypted_pw = hash("sha256", $customerpw);
  $space = strpos($full_name, " ");
  $first_name = substr($full_name, 0, $space);
  $last_name = substr($full_name, $space);
  // echo '<h1>Email: ' . $email . ' Full Name: ' . $full_name . 'Password: ' . $password .'</h1>';

  // echo $encrypted_pw;
  //echo $first_name . " " . $last_name;
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
    //check if the email exists
    $sql = "SELECT * FROM Customer WHERE Customer.email = \"$email\"";

    //echo $sql;

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc())
      {
        //Email Found
        //display alert
        echo '<div class="alert alert-danger" role="alert">Email already in use</div>';
      }
    } else {
      //Email not found
      //insert into db
      $sql2 = "INSERT INTO Customer (first_name, last_name, email, password) VALUES (\"$first_name\", \"$last_name\", \"$email\", \"$encrypted_pw\")";

      $result = $conn->query($sql2);

      //setcookie($email, $encrypted_pw, time() + (86400), "/");
      header("refresh:5;url=http://localhost/CSC-350-COVID-Project/login.php");
      echo '<div class="alert alert-success" role="alert">Account Created, Redirecting to Login Page...</div>';
      //header("Location: http://localhost/CSC-350-COVID-Project/index.php");
      //echo '<div class="alert alert-success" role="alert">Account Created</div>';
    }

    //$row = $result->fetch_assoc();

    
    //if the email doesnt exist, add the Customer
   

    //echo '<div class="card-deck">';
    
    $conn->close();
}
?>
  
<div class="container">
  <div class="login-box">
<h1>Registration</h1>
<form name="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 <label for="full-name">Full Name</label>
<input type="text" name="full-name" placeholder="Name" required />
 <label for="password">Email</label>
<input type="text" name="email" placeholder="Email" required />
 <label for="password">Password</label>
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div></div>
</body>
</html>