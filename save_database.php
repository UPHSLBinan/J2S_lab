<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age =  $_POST['age'];
$email = $_POST['email'];
$detail = $_POST['detail'];

$servername = "localhost";
$username = "admin";
$password = "krm1094";
$dbname = "millar";

// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);
// Check Connection
if ($conn->connect_error) {
    die("connection failed: " . $conn-connect_error);
}

$sql = "INSERT INTO users(Fname, Lname, Age, Email,Detail)
VALUES ('".$fname."','".$lname."','".$email."','".$detail."')";

if ($conn->query($sql) === TRUE) {
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
