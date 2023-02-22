<?php

date_default_timezone_set('Asia/Hong_Kong');

// Connect to the database
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "userprofile";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
session_start(); // Start the session to retrieve the username

// Retrieve the username from the session
$username = $_SESSION['username'];

// Retrieve the blog title and content from the form submission
$blog_title = $_POST['title'];
$blog_content = $_POST['content'];

// Create a timestamp for the blog post
$timestamp = date('Y-m-d H:i:s');
// Insert the blog post into the database

$sql = "INSERT INTO users_blog (username, blog_title, blog_content, timestamp)
        VALUES ('$username', '$blog_title', '$blog_content', '$timestamp')";

if ($conn->query($sql) === TRUE) {
		header('Location: show_blog.php');
		exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
