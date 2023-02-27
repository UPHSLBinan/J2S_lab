<?php
// submit_post.php

// start session to access session data
session_start();
// Change these values to match your MySQL server settings
$servername = "localhost";
$username = "Tundra";
$password = "akositundra123";
$dbname = "Tundra";

// Create a connection to the MySQL server
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// check if form has been submitted
if (isset($_POST['submit'])) {
  // get user's username from session data
  $username = $_SESSION['username'];

  // get blog post details from form submission
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);
  $created_at = date("Y-m-d H:i:s");

  // insert blog post details into database
  $query = "INSERT INTO blog_posts (title, body, created_at, username) VALUES ('$title', '$body', '$created_at', '$username')";
  mysqli_query($conn, $query);

  // redirect user back to blog page
  header("Location: blog.php");
  exit();
}
?>