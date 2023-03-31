<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userprofile";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if user is logged in
if (isset($_SESSION['user'])) {
  $username = $_SESSION['user'];

  // Delete user account from database
  $sql = "DELETE FROM user WHERE username='$username'";
  mysqli_query($conn, $sql);

  // Logout user and redirect to login page
  session_destroy();
  header("Location: login.php");
  exit();
} else {
  // Redirect to login page if user is not logged in
  header("Location: login.php");
  exit();
}

mysqli_close($conn);
?>