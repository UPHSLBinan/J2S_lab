<!-- HTML code for registration and login form -->
<!DOCTYPE html>
<html>
<head>
	<title>Login and Registration Form</title>
</head>
<body>

	<h2>Login</h2>
	<form method="post" action="login.php">
		<label>Username:</label>
		<input type="text" name="username" required><br><br>
		<label>Password:</label>
		<input type="password" name="password" required><br><br>
		<input type="submit" name="login" value="Login">
		<a href ="register.php"> Register </a>
	</form>
</body>

<?php

// Create connection to MySQL database
$servername = "localhost";
$username = "user";
$password = "useruser1";
$dbname = "act3";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connect to database
$db = mysqli_connect('localhost', 'user', 'useruser1', 'act3');

// Check if the login form has been submitted
if (isset($_POST['login'])) {
	// Get the user input
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	// Check if the user exists in the database
	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($db, $sql);

	// If the user exists, check their password
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
		if ($password == $row['password']) {
			// If password is correct, print their details
			echo "Welcome, " . $row['fname'] . " " . $row['lname'] . "<br>";
			echo "Age: " . $row['age'] . "<br>";
			echo "Birthday: " . $row['bday'] . "<br>";
			echo "Address: " . $row['address'] . "<br>";
		} else {
			echo "Invalid password";
		}
	} else {
		echo "Invalid username or password";
	}
}
?>

</html>