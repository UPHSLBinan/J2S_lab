<?php
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Age = $_POST['Age'];
$Email = $_POST['Email'];
$Detail = $_POST['Detail'];

$servername = "localhost";
$username = "Marcus";
$password = "Marcus";
$db = "cosico";

$conn=new mysqli ($servername,$username,$password,$db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql= "INSERT INTO users (FirstName, LastName, Age, Email, Detail)
VALUES ('".$FirstName."','".$LastName."','".$Age."','".$Email."','".$Detail."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>