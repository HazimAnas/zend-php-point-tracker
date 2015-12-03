<?php 
	session_start();
	$_SESSION['username'] = "test";
	$_SESSION['userId'] = "test123";
	header("Location: ../../home.php", true, 301);
	die();