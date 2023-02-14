<?php
$FName = $_POST['FName'];
$LName = $_POST['LName'];
$Age = $_POST['Age'];
$Email = $_POST['Email'];
$Detail = $_POST['Detail'];

$servername = "localhost";
$username = "myadmin";
$password = "myadmin";
$dbname = "joveres-j2s";

//create connection
$conn = new mysqli($servername, $username,$password,$dbname);

//check connection

if ($conn->connect_error) {
die("Connection Failed: " . $conn->connect_error);
}

$sql = " INSERT INTO user (FName, LName, Age, Email, Detail)
VALUES ('".$FName."','".$LName."','".$Age."','".$Email."','".$Detail."')";


if($conn->query($sql) == TRUE ) {

echo " new record created successfully";
} else {
	echo "Error: " .$sql ."<br>" .$conn->error;
}
$conn->close();
?>