<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h2>Login</h2>
	<form method="POST" action="login.php">
		<label>Username:</label>
		<input type="text" name="username"><br>
		<label>Password:</label>
		<input type="password" name="password"><br>
		<input type="submit" value="Login">
	</form>
</body>
</html>

<?php
// Check if the form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Connect to the database
	$host = 'localhost';  // replace with your database host
	$dbname = 'ariadologin'; // replace with your database name
	$username = 'admin'; // replace with your database username
	$password = 'admin'; // replace with your database password
	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

	// Get the user's entered username and password
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Query the database for the user's details
	$stmt = $db->prepare("SELECT * FROM register WHERE username=:username AND password=:password");
	$stmt->bindValue(':username', $username);
	$stmt->bindValue(':password', $password);
	$stmt->execute();

	// Check if the user exists
	if ($stmt->rowCount() > 0) {
		// User exists, set session variable and redirect to home page
		session_start();
		$_SESSION['username'] = $username;
		header('Location: home.php');
		exit();
	} else {
		// User does not exist, display error message
		echo "<p>Invalid username or password.</p>";
	}
}
?>