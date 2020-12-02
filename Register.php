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

// require('db.php');
// // If form submitted, insert values into the database.
// if (isset($_REQUEST['username'])){
//         // removes backslashes
// 	$username = stripslashes($_REQUEST['username']);
//         //escapes special characters in a string
// 	$username = mysqli_real_escape_string($con,$username); 
// 	$email = stripslashes($_REQUEST['email']);
// 	$email = mysqli_real_escape_string($con,$email);
// 	$password = stripslashes($_REQUEST['password']);
// 	$password = mysqli_real_escape_string($con,$password);
// 	$trn_date = date("Y-m-d H:i:s");
//         $query = "INSERT into `users` (username, password, email, trn_date)
// VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
//         $result = mysqli_query($con,$query);
//         if($result){
// // 301 Moved Permanently
// exit(); }
//          else{
//  echo "<div class='form'> <h3>You are registered successfully.</h3>
// <br/>Click here to <a href='index.html'>Login</a></div>";
//     }
?>
  
<div class="container">
  <div class="login-box">
<h1>Registration</h1>
<form name="registration" action="" method="post">
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