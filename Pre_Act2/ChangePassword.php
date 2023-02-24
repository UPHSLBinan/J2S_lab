<?php
session_start();

$servername = "localhost";
$username = "VoidAdmin";
$password = "Admin";
$dbname = "singhid";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
  // Get the old password and new password from the form
  $oldPassword = $_POST['oldPassword'];
  $newPassword = $_POST['newPassword'];

  // Get the logged in user's name from the session
  $Name = $_SESSION['Name'];

  // Check if the old password is correct
  $sql = "SELECT * FROM user2 WHERE Name='$Name' AND Password='$oldPassword'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) === 1) {
    // Update the user's password in the database
    $sql = "UPDATE user2 SET Password='$newPassword' WHERE Name='$Name'";
    mysqli_query($conn, $sql);

    // Redirect the user to the landing page
    header('location: Landing.php');
  } else {
    // If the old password is incorrect, show an error message
    $error = "Incorrect password";
  }
}

// Get the logged in user's name from the session
$Name = $_SESSION['Name'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
</head>
<body>
  <h1>Change Password</h1>
  <p>Welcome, <?php echo $Name; ?>! Please enter your old password and your new password.</p>

  <?php if(isset($error)) { echo '<p style="color:red;">' . $error . '</p>'; } ?>

  <form method="post" action="">
    <label for="oldPassword">Old Password:</label>
    <input type="password" name="oldPassword" required><br>

    <label for="newPassword">New Password:</label>
    <input type="password" name="newPassword" required><br>

    <input type="submit" name="submit" value="Change Password">
  </form>

  <a href="Landing.php">Go back to landing page</a>
  <a href="Logout.php">Log out</a>
</body>
</html>