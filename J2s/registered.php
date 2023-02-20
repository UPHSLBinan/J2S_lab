<?php
$servername = "localhost";
$username = "myadmin";
$password = "myadmin";
$dbname = "salandanan";

$Username = $_POST ['Username'];
$Password = $_POST ['Password'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO login (Username, Password)
VALUES ('".$Username."', '".$Password."')";

if ($conn->query($sql) === TRUE) {
  echo "Registered successfully";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>