<?php
	include $_SERVER['DOCUMENT_ROOT'].'/views/partials/session_redirect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/views/partials/header.php';
?>
	 <div id="content-wrap">
	 	<a class="btn btn-success" href="program/create-program.php">Create Program</a>
	 	<table class="table table-striped">
			<?php	
				include $_SERVER['DOCUMENT_ROOT'].'/actions/db.php';

				$sql = "SELECT id, name, dateAdded FROM program WHERE userId ='".$_SESSION['userId']."'";
				$result = mysqli_query($conn,$sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    echo "<tr><td>ID</td><td>Name</td><td>Date Created</td></tr>";
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td><a href='/program/view-program.php?id=".$row["id"]."'>" . $row["id"]."</a></td><td>". $row["name"]. "</td><td> " . date("d-m-Y",$row["dateAdded"]). "</td></tr>";
				    } 
				}
			?>
		</table>
	</div>
<?php	include $_SERVER['DOCUMENT_ROOT'].'/views/partials/footer.php'; ?>