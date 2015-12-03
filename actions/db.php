<?php
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';

	$conn = mysqli_connect($host, $username, $password, $db);

	if (mysqli_connect_errno()) {
	       echo "Failed to connect to MySQL: " . mysqli_connect_error();
	       echo "<br>";
	}
	else{
	       ;
	}