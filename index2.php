<?php
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$Age = $_POST['Age'];
$Email = $_POST['Email'];
$Detail = $_POST['Detail'];






$servername = "localhost";
$username = "VoidAdmin";
$password = "Admin";
$dbname = "singhid";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (Fname, Lname, Age, Email, Detail)
VALUES ('".$Fname."','".$Lname."','".$Age."','".$Email."','".$Detail."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>


// view needed