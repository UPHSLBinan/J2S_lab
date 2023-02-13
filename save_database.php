<?php
$Fname = $_POST['Fname']; 
$Lname= $_POST['Lname'];
$Age= $_POST['Age'];
$Email= $_POST['Email']; 
$Detail = $_POST['Detail'];

$servername = "localhost";
$username = "user";
$password = "useruser1";
$dbname = "delossantos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

if ($conn->connect_error) {
// Check connection
die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (Fname, Lname, Age, Email, Detail) 
VALUES ('".$Fname."','".$Lname."','".$Age."','".$Email."','".$Detail."')";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>". $conn->error; 
}
$conn->close();

?>