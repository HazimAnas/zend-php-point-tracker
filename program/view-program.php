<?php
	include $_SERVER['DOCUMENT_ROOT'].'/views/partials/session_redirect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/views/partials/header.php';
?>
<div class="container-fluid">
	 <div class="row">
	 	<div class="panel panel-default">
			<div class="panel-heading"><h2>Program Details</h2></div>
			<div class="panel-body">
			    <table class="table">
					<?php	
						include $_SERVER['DOCUMENT_ROOT'].'/actions/db.php';

						$sql = "SELECT id, name, description, dateAdded FROM program WHERE id ='". $_GET['id']."' LIMIT 1";
						$result = mysqli_query($conn,$sql);

						if ($result->num_rows> 0) {

							$row = $result->fetch_assoc();
							$_SESSION['programId'] = $row['id'];
						 	echo "<tr><td>ID</td><td>".$row["id"]."</td></tr><tr><td>Name</td><td>". $row["name"]. "</td></tr><tr><td>Description</td><td>".$row["description"]."</td></tr><tr><td>Date Added</td><td> " . date("d-m-Y",$row["dateAdded"]). "</td></tr>";

						}
					?>
				</table>
			</div>
		</div>
	</div>
	<div class-"row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading clearfix"><h2 class="panel-title">Team List</h2><a class="btn btn-success pull-right" href="/program/create-team.php">Add Team</a></div>
			    	<table class="table">
						<?php	
							include $_SERVER['DOCUMENT_ROOT'].'/actions/db.php';

							$sql = "SELECT id, name FROM team WHERE programId ='". $_SESSION['programId']."'";
							$result = mysqli_query($conn,$sql);

							if ($result->num_rows > 0) {
							    // output data of each row
							    echo "<tr><td>ID</td><td>Name</td></tr>";
							    while($row = $result->fetch_assoc()) {
							        echo "<tr><td><a href='/program/view-team.php?id=".$row["id"]."'>" . $row["id"]."</a></td><td>". $row["name"]. "</td></tr>";
							    } 
							}
						?>
					</table>
			</div>
		</div>
			
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading clearfix"><h2 class="panel-title">Activity List</h2><a class="btn btn-success col-md-3" href="/program/create-activity.php">Add Activity</a></div>
					<table class="table">
						<?php	

							$sql = "SELECT id, name FROM activity WHERE programId ='". $_SESSION['programId']."'";
							$result = mysqli_query($conn,$sql);

							if ($result->num_rows > 0) {
							    // output data of each row
							    echo "<tr><td>ID</td><td>Name</td></tr>";
							    while($row = $result->fetch_assoc()) {
							        echo "<tr><td><a href='/program/view-activity.php?id=".$row["id"]."'>" . $row["id"]."</a></td><td>". $row["name"]. "</td></tr>";
							    } 
							}
						?>
					</table>
				</div>
			</div>
		</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Leaderboard</h2>
		</div>
	</div>
</div>
<?php	include $_SERVER['DOCUMENT_ROOT'].'/views/partials/footer.php'; ?>