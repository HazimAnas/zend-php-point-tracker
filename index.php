<?php 
	include 'views/partials/header.php';
	session_start();
	if(isset($_SESSION['username'])) {
		header("Location: home.php", true, 301);
		die();
	}

	include 'views/forms/login.php'; 
	include 'views/partials/footer.php';