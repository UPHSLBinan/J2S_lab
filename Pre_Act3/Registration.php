<?php
$Name = $_POST['Name'];
$Password = $_POST['Password'];






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

$sql = "INSERT INTO user2 (Name, Password)
VALUES ('".$Name."','".$Password."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
   header("Location: Test_Layout.php");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>


