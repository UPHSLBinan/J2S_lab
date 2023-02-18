<!-- HTML code for registration and login form -->
<!DOCTYPE html>
<html>
<head>
	<title>Login and Registration Form</title>
</head>


<body>
	<h2>Register</h2>
	<form method="post" action="register.php">
		<label>Username:</label>
		<input type="text" name="username" required><br><br>
		<label>Password:</label>
		<input type="password" name="password" required><br><br>
		<label>Confirm Password:</label>
		<input type="password" name="confirm_password" required><br><br>
		<label>First Name:</label>
		<input type="text" name="fname" required><br><br>
		<label>Last Name:</label>
		<input type="text" name="lname" required><br><br>
		<label>Age:</label>
		<input type="number" name="age" required><br><br>
		<label>Birthday:</label>
		<input type="date" name="bday" required><br><br>
		<label>Address:</label>
		<textarea name="address" required></textarea><br><br>
		<input type="submit" name="register" value="Register">
		<a href ="login.php"> Login </a>
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

// Check if the registration form has been submitted
if (isset($_POST['register'])) {
	// Get the user input
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
	$fname = mysqli_real_escape_string($db, $_POST['fname']);
	$lname = mysqli_real_escape_string($db, $_POST['lname']);
	$age = mysqli_real_escape_string($db, $_POST['age']);
	$bday = mysqli_real_escape_string($db, $_POST['bday']);
	$address = mysqli_real_escape_string($db, $_POST['address']);

	// Check if the passwords match
	if ($password != $confirm_password) {
		echo "Passwords do not match";
		exit();
	}

	// Insert the user details into the database
	$sql = "INSERT INTO users (username, password, confirm_password, fname, lname, age, bday, address) 
			VALUES ('$username', '$password', '$confirm_password', '$fname', '$lname', '$age', '$bday', '$address')";
	mysqli_query($db, $sql);

	echo "Registration successful";
}
?>

</html>