<?php
	$servername = "localhost";
	$username = "admin";
	$password = "admin";
	$dbname = "userprofile";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Get the input data from the form
	$title = $_POST['title'];
	$content = $_POST['content'];
	$username = $_POST['username'];
	$date_time = date('Y-m-d H:i:s');

	// Prepare and execute SQL statement to insert data into the database
	$stmt = $conn->prepare("INSERT INTO blogs (title, content, username, date_time) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssss", $title, $content, $username, $date_time);
	$stmt->execute();

	// Close the database connection
	$stmt->close();
	$conn->close();

	// Redirect back to the blog page
	header('Location: index.html');
	exit;
?>
