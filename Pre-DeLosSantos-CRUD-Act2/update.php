<?php
require_once "database.php";

    // Connect to database
    $db = mysqli_connect('localhost', 'root', '', 'userprofile');

// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
  // Get the user's ID from the session
  $user_id = $_SESSION['user_id'];

  // Check if the form was submitted
  if (isset($_POST['save'])) {
    // Get the updated details from the form
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $age = mysqli_real_escape_string($db, $_POST['age']);
    $birthday = mysqli_real_escape_string($db, $_POST['birthday']);
    $address = mysqli_real_escape_string($db, $_POST['address']);

    // Update the user's details in the database
    $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', age='$age', birthday='$birthday', address='$address' WHERE id=$user_id";
    $result = mysqli_query($db, $sql);

    // Check if the update was successful
    if ($result) {
      // Redirect the user back to the details page
      header("Location: index.php");
      exit();
    } else {
      echo "Error updating record: " . mysqli_error($db);
    }
  }

  // Get the user's details from the database
  $sql = "SELECT * FROM users WHERE id=$user_id";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);

  // Display the form
}
  ?>