<?php

// Get form data
$title = $_POST['title'];
$body = $_POST['body'];
$username = $_POST['username'];
$timestamp = date('Y-m-d H:i:s');

// Connect to database (replace DB_HOST, DB_USERNAME, DB_PASSWORD, and DB_NAME with your own database information)
$conn = mysqli_connect('localhost', 'admin', 'admin123', 'userprofile');

// Insert new blog post into database
$query = "INSERT INTO posts (title, body, username, timestamp) VALUES ('$title', '$body', '$username', '$timestamp')";
mysqli_query($conn, $query);

// Redirect user to the blog post they just created
$query = "SELECT * FROM posts ORDER BY timestamp DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Close database connection
mysqli_close($conn);

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<form method="POST" action="view.php">
<button type="submit" class="btn btn-primary">View Blogs</button>