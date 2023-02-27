<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$email = $_POST['email'];
$detail = $_POST['detail'];

$servername = "localhost";
$username = "Act2";
$password = "joveres123";
$dbname = "act2-joveres";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Users (fname, lname, age, email, detail)
VALUES ('$fname ','$lname','$age','$email','$detail')";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "
" . $conn->error;
}

$conn->close();

?>