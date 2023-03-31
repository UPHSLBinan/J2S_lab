<html>
<body>
<div class="formcontainer">

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

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    // Login successful
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user'] = $row['username'];
  } else {
    // Print error message
    echo "<br>Invalid username or password. Please try again.";
  }
}

// Check if user is logged in
if (isset($_SESSION['user'])) {
  // Get user account details from database
  $sql = "SELECT * FROM user WHERE username='{$_SESSION['user']}'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  // Display user account details
  echo "<br><br>Welcome, " . $row['firstname'] . " " . $row['lastname'] . "<br>";
  echo "Age: " . $row['age'] . "<br>";
  echo "Birthday: " . $row['birthday'] . "<br>";
  echo "Address: " . $row['address'] . "<br>";

  // Display update button
  echo '<form action="update.php" method="post">';
  echo '<input type="submit" name="update" value="Update">';
  echo '</form>';

  // Display logout button
  echo '<form action="logout.php" method="post">';
  echo '<input type="submit" name="logout" value="Logout">';
  echo '</form>';


// Display delete account button
echo '<form action="delete.php" method="post">';
echo '<input type="submit" name="delete" value="Delete Account">';
echo '</form>';

} else {
  // Display login form
  echo '<div class="formcontainer">';
  echo '<form action="login.php" method="post">';
  echo '<div class="formgroup">';
  echo '<input type="text" name="username" id="firstname" placeholder="Enter your Username."><br>';
  echo '</div><div class="formgroup">';
  echo '<input type="password" name="password" id="password" placeholder="Enter your Password."><br>';
  echo '</div>';
  echo '<input type="submit" value="Login">';

  echo '</form>';
// Display register
echo '<p>Dont have an account?</p>';
echo '<form action="register.php" method="post">';
echo '<input type="submit" name="delete" value="Register">';
echo '</form>';

  echo '</div>';
}

mysqli_close($conn);
?>

</div>
</body>
</html>