<?php 
	include 'views/partials/header.php';
	session_start();
	if(isset($_SESSION['username'])) {
		header("Location: home.php", true, 301);
		die();
	}
?>

	<div id="header-image">
<?php include 'views/forms/login.php'; ?>
	</div>


<?php include 'views/partials/footer.php'; ?>