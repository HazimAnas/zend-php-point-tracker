<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../assets/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css" /> 
	</head>
	<body>
		<header>
			<h1><a href="home.php">Point Tracker</a></h1>
			<?php 
				if(isset($_SESSION['username'])) { ?>
					<a href="actions/logout.php">Logout</a>
			<?php	} ?>
		</header>