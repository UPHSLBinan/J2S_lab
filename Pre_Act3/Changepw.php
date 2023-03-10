<?php
session_start();

$servername = "localhost";
$username = "VoidAdmin";
$password = "Admin";
$dbname = "singhid";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['changepw'])) {
  $Name = $_SESSION['Name'];
  $oldPassword = $_POST['oldPassword'];
  $newPassword = $_POST['newPassword'];
  $confirmPassword = $_POST['confirmPassword'];

  if ($newPassword !== $confirmPassword) {
    echo "New password and confirm password do not match";
    exit();
  }

  $stmt = $conn->prepare("SELECT * FROM user2 WHERE Name=? AND Password=?");
  $stmt->bind_param("ss", $Name, $oldPassword);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $stmt = $conn->prepare("UPDATE user2 SET Password=? WHERE Name=?");
    $stmt->bind_param("ss", $newPassword, $Name);
    if ($stmt->execute()) {
      echo "Password changed successfully";
      header("Location: Test_Layout.php");
      exit();
    } else {
      echo "Error updating password: " . $conn->error;
    }
  } else {
    echo "Incorrect old password";
  }

  $stmt->close();
}

$conn->close();
?>