<?php
session_start();

// Redirect to login page if user is not logged in
if(!isset($_SESSION['Name'])) {
  header('location: Login.php');
}

// Get the logged in user's name from the session
$Name = $_SESSION['Name'];

if(isset($_POST['change_name'])) {
  // Redirect to the change name page
  header('location: ChangeName.php');
}

if(isset($_POST['change_password'])) {
  // Redirect to the change password page
  header('location: ChangePassword.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to My Website</title>
</head>
<body>
	<h1>Welcome, <?php echo $Name; ?>!</h1>
	<p>Thank you for logging in. This is the landing page of my website.</p>

	<form method="post" action="">
		<button type="submit" name="change_name">Change Name</button>
		<button type="submit" name="change_password">Change Password</button>
	</form>

	<form method="post" action="Logout.php">
  		<button type="submit" name="logout">Logout</button>
	</form>
</body>
</html>