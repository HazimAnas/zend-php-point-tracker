<?php
	include $_SERVER['DOCUMENT_ROOT'].'/views/partials/session_redirect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/views/partials/header.php';
?>
	 <div class="container-fluid">
	 	<div class="row">
		 	<h2>Activity Details</h2>
		 	<table class="table table-striped">
				<?php	
					include $_SERVER['DOCUMENT_ROOT'].'/actions/db.php';

					$sql = "SELECT id, name, description, description FROM activity WHERE id ='". $_GET['id']."' LIMIT 1";
					$result = mysqli_query($conn,$sql);

					if ($result->num_rows> 0) {

					    echo "<tr><td>ID</td><td>Name</td><td>Description</td></tr>";
						$row = $result->fetch_assoc();
					 	echo "<tr><td>".$row["id"]."</td><td>". $row["name"]. "</td><td> " . $row["description"] . "</td></tr>";
					}
				?>
			</table>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Scoreboard</h2>
					<table class="table">
						<?php	

							$sql = "SELECT id, name FROM team WHERE programId ='". $_SESSION['programId'] ."'";
							$result = mysqli_query($conn,$sql);
							if ($result->num_rows > 0) {

							    echo "<tr><td>Name</td><td>Points</td><td></td></tr>";
							    while($row = $result->fetch_assoc()) {
							    	$sql = "SELECT amount FROM point WHERE activityId ='" . $_GET["id"] . "' AND teamId ='" . $row["id"] . "'";
									$pointResult = mysqli_query($conn,$sql);
									if ($pointResult->num_rows > 0) {
										$point = $pointResult->fetch_assoc();
									}
									else {
										$point["amount"] = 0;
									}
									$leaderboard[$row['name']] = $point['amount'];
									echo "<tr><td>". $row["name"]. "</td><td>" . $point['amount'] . "</td><td><form method='POST' action='/actions/pointActions.php'><input type='text' name='point'/><input type='hidden' name='team' value='". $row["id"] . "'/><input type='hidden' name='activity' value='". $_GET["id"] . "'/><button class='btn btn-success' type='submit'>Add Point</button></form></td></tr>";
							    } 
							}
						?>
					</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Leaderboard</h2>
				<table class="table">
					<?php	
						arsort($leaderboard);
						$i = 1;
						echo "<tr><td>Rank</td><td>Name</td><td>Points</td></tr>";
						foreach ($leaderboard as $name => $point) {
							echo "<tr><td>$i</td><td>$name</td><td>$point</td></tr>";
						$i++;
						} 
					?>
				</table>
			</div>
		</div>
	</div>
<?php	include $_SERVER['DOCUMENT_ROOT'].'/views/partials/footer.php'; ?>

