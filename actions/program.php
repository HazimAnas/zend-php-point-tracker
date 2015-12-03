<?php
	include 'db.php';

	session_start();

	$tableName = 'program';

	if(isset($_POST['save'])) {

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$dateAdded = time();
		$initial = '';
		$userId = $_SESSION['userId'];

		foreach (explode(' ', $name) as $word) {
		    $initial .= strtoupper($word[0]);
		}

	    $id = $initial . rand(10, 9999);

		if(mysqli_query($conn,"INSERT INTO $tableName (id, name, description, dateAdded, userId) VALUES ('$id', '$name', '$description', '$dateAdded', '$userId')"))
		{
			echo "Successfully Inserted data<br>";
			header("Location: ../program.php", true, 301);
		}
		else{
			echo "Data not Inserted";
			echo mysqli_error($conn);
		}
		mysqli_close($conn);
	}