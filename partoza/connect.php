<?php
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Age = $_POST['Age'];
$Email = $_POST['Email'];
$Detail = $_POST['Detail'];

$servername = "localhost";
$username = "mark";
$password = "mark1";
$dbname = "partoza";


$conn = new mysqli ($servername, $username, $password, $dbname);
if ($conn->connect_error) {
   die("connection failed: ". $conn->connect_error);
}

$sql = "INSERT INTO user (FirstName, LastName, Age, Email, Detail)
VALUES ('".$FirstName."', '".$LastName."', '".$Age."', '".$Email."', '".$Detail."')";

if ($conn->query($sql) === TRUE) {
   echo "New record created sucessfully";
} else {
  echo "Error:". $sql . "<br>" .$conn->error;
}

$conn->close();
?> 