<?php
	include $_SERVER['DOCUMENT_ROOT'].'/actions/db.php';

	session_start();

	$tableName = 'team';

	if(isset($_POST['save'])) {

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$initial = '';
		$programId = $_SESSION['programId'];

		foreach (explode(' ', $name) as $word) {
		    $initial .= strtoupper($word[0]);
		}

	    $id = $initial . rand(10, 9999);

		if(mysqli_query($conn,"INSERT INTO $tableName (id, name, programId) VALUES ('$id', '$name', '$programId')"))
		{
			echo "Successfully Inserted data<br>";
			header("Location: /program/view-program.php?id=".$_SESSION['programId'], true, 301);
		}
		else{
			echo "Data not Inserted";
			echo mysqli_error($conn);
		}
		mysqli_close($conn);
	}