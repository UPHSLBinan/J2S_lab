<?php
// Connect to the database
$host = 'localhost';
$username = 'admin';
$password = 'admin';
$dbname = 'userprofile';
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the username and password were submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
	// Sanitize the input values to prevent SQL injection attacks
	$username = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string($_POST['password']);
	// Hash the password for security
	$hashed_password = hash('sha256', $password);
	
	// Check if the username and password match a row in the database
	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = $conn->query($query);
	if ($result->num_rows == 1) {
		// The user is authenticated
		$row = $result->fetch_assoc();
		session_start();
		$_SESSION['username'] = $row['username'];
		header('Location: blog.php');
		exit();
	} else {
		// The username or password is incorrect
		echo "Invalid username or password.";
	}
}

// Close the database connection
$conn->close();
?>
