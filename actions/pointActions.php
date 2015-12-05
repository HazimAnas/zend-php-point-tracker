<?php
	include $_SERVER['DOCUMENT_ROOT'].'/actions/db.php';

	session_start();

	$tableName = 'point';

	$point = mysqli_real_escape_string($conn, $_POST['point']);
	$teamId = mysqli_real_escape_string($conn, $_POST['team']);
	$activityId = mysqli_real_escape_string($conn, $_POST['activity']);

	$sql = "SELECT id, amount FROM point WHERE teamId = '". $teamId . "' AND activityId ='" . $activityId . "' LIMIT 1";
	$result = mysqli_query($conn, $sql);

	if($result->num_rows == 0)
	{
		$sql = "INSERT INTO $tableName (amount, teamId, activityId) VALUES ('$point', '$teamId', '$activityId')";
		mysqli_query($conn, $sql);
		header("Location: /program/view-activity.php?id=" . $activityId, true, 301);
	}
	else{
		$row = $result->fetch_assoc();
		$point = $point + $row['amount'];
		$sql = "UPDATE  $tableName SET amount = '".$point."' WHERE id=" . $row['id'];
		mysqli_query($conn, $sql);
		header("Location: /program/view-activity.php?id=" . $activityId, true, 301);
	}
	mysqli_close($conn);