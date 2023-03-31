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
  // Get user account details from database
  $sql = "SELECT * FROM user WHERE username='{$_SESSION['user']}'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  if (isset($_POST['submit'])) {
    // Get updated user details from form
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Update user details in database
    $sql = "UPDATE user SET firstname='$firstname', lastname='$lastname', age='$age', birthday='$birthday', address='$address' WHERE username='{$_SESSION['user']}'";
    mysqli_query($conn, $sql);

    // Redirect to profile page
    header("Location: login.php");
    exit();
  }

  // Display update form with current user details
  echo '<div class="formcontainer">';
  echo '<form action="update.php" method="post">';
  echo '<div class="formgroup">';
  echo '<label for="firstname">First Name:</label>';
  echo '<input type="text" name="firstname" id="firstname" value="' . $row['firstname'] . '"><br>';
  echo '</div><div class="formgroup">';
  echo '<label for="lastname">Last Name:</label>';
  echo '<input type="text" name="lastname" id="lastname" value="' . $row['lastname'] . '"><br>';
  echo '</div><div class="formgroup">';
  echo '<label for="age">Age:</label>';
  echo '<input type="number" name="age" id="age" value="' . $row['age'] . '"><br>';
  echo '</div><div class="formgroup">';
  echo '<label for="birthday">Birthday:</label>';
  echo '<input type="date" name="birthday" id="birthday" value="' . $row['birthday'] . '"><br>';
  echo '</div><div class="formgroup">';
  echo '<label for="address">Address:</label>';
  echo '<input type="text" name="address" id="address" value="' . $row['address'] . '"><br>';
  echo '</div>';
  echo '<input type="submit" name="submit" value="Update">';
  echo '</form>';
  echo '</div>';

  // Display logout button
  echo '<form action="logout.php" method="post">';
  echo '<input type="submit" name="logout" value="Logout">';
  echo '</form>';
} else {
  // Redirect to login page if user is not logged in
  header("Location: login.php");
  exit();
}

mysqli_close($conn);
?>