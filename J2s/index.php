<?php

$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$Age = $_POST['Age'];
$Email = $_POST['Email'];
$Detail = $_POST['Detail'];

$servername = "localhost";
$username = "Salandanan";
$password = "@14Salandanan";
$dbname = "Salandanan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("connection failed: " .$conn->connect_error);
}

$sql = "INSERT INTO users (Fname, Lname, Age, Email, Detail)
VALUES ('".$Fname."','".$Lname."','".$Age."','".$Email."','".$Detail."')";

if ($conn->query($sql) === TRUE) {
	echo "New record created succesfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();