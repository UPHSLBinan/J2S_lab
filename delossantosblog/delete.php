<?php
require_once "database.php";

// Connect to database
$db = mysqli_connect('localhost', 'root', '', 'userprofile');


// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];

  // Delete the user's details from the database
  $sql = "DELETE FROM users WHERE id=$user_id";
  mysqli_query($db, $sql);

  // Unset the session variable and destroy the session
  unset($_SESSION['user_id']);
  session_destroy();

  // Redirect the user to the login page
  header("Location: login.php");
  exit;
}
?>