<?php
	session_start();
	session_unset();
	session_destroy();
	header("Location: http://localhost/CSC-350-COVID-Project/login.php");
?>