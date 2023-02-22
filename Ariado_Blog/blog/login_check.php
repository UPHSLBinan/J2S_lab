<?php
session_start(); // start the session to check if user is logged in

if(isset($_SESSION['username'])) { // check if user is logged in by checking if the 'user_id' session variable is set
  header('Location: blog.php'); // if user is logged in, redirect to blog.php
  exit;
} elseif(!isset($_SESSION['username'])) { // check if user is not logged in by checking if the 'user_id' session variable is not set
  header('Location: login.php'); // if user is not logged in, redirect to login.php
  exit;
}
?>
