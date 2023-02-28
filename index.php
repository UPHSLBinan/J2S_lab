<?php
include 'process.php';

if(isset($_POST['proceed']))
{
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
}
?> 