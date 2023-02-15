<?php

// Set up database connection
$host = 'localhost'; // Change this to your database host
$username = 'root'; // Change this to your database username
$password = ''; // Change this to your database password
$database = 'mejarito0'; // Change this to your database name
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Search the database for the username and password
  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

  // Check if the username and password are correct
  if (mysqli_num_rows($result) > 0) {
    // Display a success message
    echo "User found in database!";
  } else {
    // Display an error message
    echo "Username or password is incorrect!";
  }
}

// Close the database connection
mysqli_close($conn);

?>

<!-- HTML form for entering the username and password -->
<form method="post" action="">
  <label>Username:</label>
  <input type="text" name="username"><br>
  <label>Password:</label>
  <input type="password" name="password"><br>
  <input type="submit" name="submit" value="Login">
</form>
