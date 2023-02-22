<?php
// Connect to the database (replace with your own details)
$host = "localhost";
$username = "admin";
$password = "admin";
$database = "userprofile";
$conn = new mysqli($host, $username, $password, $database);

// Check if connection was successful
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Get username and password from form submission
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare SQL query to check if username and password match a record in the database
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// If the query returns a row, redirect the user to the home page
if ($result->num_rows > 0) {
	session_start();
	$_SESSION['username'] = $username;
	header("Location: home.php");
	exit();
} else {
	// If the query returns no rows, display an error message
	echo "Username and password do not exist. Please try again.";
}
?>
