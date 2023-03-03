<?php session_start();
session_destroy();
header("Location: login.php"); // Redirect the user to the homepage after logout
exit();
?>