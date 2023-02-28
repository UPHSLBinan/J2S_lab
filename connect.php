<?php
include'connection.php';

if(isset($_POST['submit']))
{
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$age = $_POST['age'];
$email = $_POST['email'];
$detail = $_POST['detail'];
$sql = "INSERT INTO `users`(`fname`, `lname`, `age`, `email`, `details`) VALUES ('$firstname', '$lastname', '$age', '$email', '$detail')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>