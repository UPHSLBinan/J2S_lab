<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h2>Login</h2>
	<form action="login.php" method="POST">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br>

		<input type="submit" value="Login">
	</form>
</body>
</html>

<?php
// Get the user's name, username, and password from the form
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to the database
$host = 'localhost'; // Change this to your database host
$user = 'admin'; // Change this to your database username
$pass = 'admin123'; // Change this to your database password
$db = 'sarmientologin'; // Change this to your database name
$conn = mysqli_connect($host, $user, $pass, $db);

// Insert the user's information into the database
$sql = "INSERT INTO register (name, username, password) VALUES ('$name', '$username', '$password')";
$result = mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);
?>