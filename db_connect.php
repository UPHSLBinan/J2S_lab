<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "battung";

$conn = new mysqli ($servername, $username, $password, $dbname);
if ($conn->connect_error) {
   die("connection failed: ". $conn->connect_error);
}

$FirstName = $_POST['fname'];
$LastName = $_POST['lname'];
$Age = $_POST['age'];
$Email = $_POST['email'];
$Detail = $_POST['detail'];


$sql = "INSERT INTO user (FirstName, LastName, Age, Email, Detail)
VALUES ('".$FirstName."', '".$LastName."', '".$Age."', '".$Email."', '".$Detail."')";

if ($conn->query($sql) === TRUE) {
   echo "New record created sucessfully";
} else {
  echo "Error:". $sql . "<br>" .$conn->error;
}

$conn->close();

?> 