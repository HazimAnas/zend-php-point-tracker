<?php
	include '../config.php';

	$conn = mysqli_connect($host, $username, $password, $db);

	if (mysqli_connect_errno()) {
	       echo "Failed to connect to MySQL: " . mysqli_connect_error();
	       echo "<br>";
	}
	else{
	        echo "Successfully connected to MySQL...<br>";
	}