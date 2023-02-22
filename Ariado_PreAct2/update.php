<?php
// Establish a connection to the database
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "userprofile";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Get the current username and password from the form submission
$current_username = $_POST['username'] ?? ' ';
$current_password = $_POST['password'] ?? ' ';
// Check if the current username and password are correct
$sql = "SELECT * FROM users WHERE username='$current_username' AND password='$current_password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
	// The current username and password are correct, so show the form to update the username and password
	echo '
		<html>
		<head>
			<title>Update Account</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- Load Bootstrap CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<!-- Load jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<!-- Load Bootstrap JS -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<h2>Update My Account</h2>
				<form method="post" action="update.php">
					<div class="form-group">
						<label for="new_username">New Username:</label>
						<input type="text" class="form-control" id="username" name="new_username" required>
					</div>
					<div class="form-group">
						<label for="new_password">New Password:</label>
						<input type="password" class="form-control" id="password" name="new_password" required>
						<input type="hidden" name="current_username" value="'.$current_username.'">
						<input type="hidden" name="current_password" value="'.$current_password.'">
					</div>
					<form method="post">
					<button type="submit" name="update" class="btn btn-primary">Submit</button><br><br>
					</form>
				</form>
			</div>
		</div>
	</div>
</body>
</html>';
}

// If the user submitted the form to update the username and password, update the database
if (isset($_POST['update'])) {
	$new_username = $_POST['new_username'];
	$new_password = $_POST['new_password'];
	$current_username = $_POST['current_username'];
	$current_password = $_POST['current_password'];

	$sql = "UPDATE users SET username='$new_username', password='$new_password' WHERE username='$current_username' AND password='$current_password'";

	if ($conn->query($sql) === TRUE) {
		echo "Username and password updated successfully.";
		echo '<form action="login.php">
			   <button type="submit" name="update" class="btn btn-primary">Go back to Login</button><br><br>
			  </form>';
	} else {
		echo "Error updating username and password: " . $conn->error;
	}
}

$conn->close();
?>