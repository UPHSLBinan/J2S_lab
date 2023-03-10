<?php
session_start();

// Redirect to login page if user is not logged in
if(!isset($_SESSION['Name'])) {
  header('location: Login.php');
}

// Get the logged in user's name from the session
$Name = $_SESSION['Name'];


if(isset($_POST['change_password'])) {
  // Redirect to the change password page
  header('location: Changepwform.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to My Website</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="jumbotron text-center">
		<h1>Welcome, <?php echo $Name; ?>!</h1>
		<p>Thank you for logging in. This is the landing page of my website.</p>
	</div>

	<div class="container">
		<form method="post" action="">
			
			<button type="submit" name="change_password" class="btn btn-primary">Change Password</button>
		</form>

		<form method="post" action="Logout.php" class="mt-3">
			<button type="submit" name="logout" class="btn btn-danger">Logout</button>
		</form><br>
	<form method="post" action="blogtest2.php">
  <button type="submit" class="btn btn-dark">Home</button>
	</form>
	</div>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>