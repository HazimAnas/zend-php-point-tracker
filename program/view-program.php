<?php
	include $_SERVER['DOCUMENT_ROOT'].'/views/partials/session_redirect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/views/partials/header.php';
?>
	 <div id="content-wrap">
	 	<table class="table-data">
			<?php	
				include $_SERVER['DOCUMENT_ROOT'].'/actions/db.php';

				$sql = "SELECT id, name, description, dateAdded FROM program WHERE id ='". $_GET['id']."' LIMIT 1";
				$result = mysqli_query($conn,$sql);

				if ($result->num_rows> 0) {

				    echo "<tr><td>ID</td><td>Name</td><td>Date Created</td></tr>";
					$row = $result->fetch_assoc();
					$_SESSION['programId'] = $row['id'];
				 	echo "<tr><td>".$row["id"]."</td><td>". $row["name"]. "</td><td> " . date("d-m-Y",$row["dateAdded"]). "</td></tr>";

				}
			?>
		</table>
		<a href="/program/create-team.php">Add Team</a>
		<a href="/program/create-activity.php">Add Activity</a>
	</div>
<?php	include $_SERVER['DOCUMENT_ROOT'].'/views/partials/footer.php'; ?>