<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page
header("location: login.php");
exit;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>
	<h1>You have been logged out!</h1>
	<form method="get" action="Login.php">
		<input type="submit" name="login" value="Login">
	</form>
</body>
</html>