<?php
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$Age = $_POST['Age'];
$email = $_POST['email'];
$Detail = $_POST['Detail'];

$servername = "localhost";
$username = "gabgallano"; //21
$password = "gabrielgallano";
$dbname = "gallano";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
//31
$sql = "INSERT INTO users (Fname, Lname, Age, Email, Detail)
VALUES ('".$Fname."','".$Lname."', '".$Age."', '".$email."','".$Detail."')";

if($conn->query($sql) === TRUE) {
	echo "New record created successfully";
}	else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); //42