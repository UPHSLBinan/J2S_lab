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

if(isset($_POST['login'])) {
  $Name = $_POST['Name'];
  $Password = $_POST['Password'];

  $sql = "SELECT * FROM user2 WHERE Name='$Name' AND Password='$Password'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) === 1) {
    $_SESSION['Name'] = $Name;
    header('location: Landing.php');
  } else {
    echo "Incorrect username or password";
  }
}

?>

<form method="post" action="">
  <input type="text" name="Name" placeholder="Name" required><br>
  <input type="password" name="Password" placeholder="Password" required><br>
  <input type="submit" name="login" value="Login">
</form>