<!DOCTYPE html>
<html>
<head>
	<title>Account Deletion</title>
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
				<h2>Delete My Account</h2>
				<form method="post">
					<div class="form-group">
						<label for="username">Username:</label>
						<input type="text" class="form-control" id="username" name="username" required>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<div class="form-group">
						<label for="confirm_password">Confirm Password:</label>
						<input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
					</div>
				<form>
				<button type="submit" name="action" value="delete" class="btn btn-primary">Delete</button><br><br>
				</form>
				<form action="check.php" method="POST">
				<button type="submit" class="btn btn-primary" formaction="index.php">Home</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>



<?php

// Database credentials
$host = "localhost";
$username = "admin";
$password = "admin";
$dbname = "userprofile";

// Create a new database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Check if the form has been submitted


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data

  $username = $_POST["username"] ?? ' ';
  $password = $_POST["password"] ?? ' ';
  $confirm_password = $_POST["confirm_password"] ?? ' ';
  $action = $_POST["action"] ?? ' ';

  // Check if the action is to delete the account
  if ($action == "delete") {
    $sql = "DELETE FROM users WHERE username = '$username' AND password = '$password'";
    
    if ($conn->query($sql) === TRUE) {
      	header("Location: delete_success_message.php");
		exit();

    } else {
      echo "Error deleting account: " . $conn->error;
    }

  } elseif ($action == "delete_confirm") {
    // Delete the user's account
    $sql = "DELETE FROM users WHERE username = '$username' AND password = '$password'";
    
    if ($conn->query($sql) === TRUE) {
		header("Location: delete_success_message.php");
		exit();

    } else {
      echo "Error deleting account: " . $conn->error;
    }
  }
    }

// Close the database connection
$conn->close();

?>
