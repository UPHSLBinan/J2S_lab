<?php
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$age = $_POST['age'];
$email = $_POST['email'];
$detail = $_POST['detail'];

$servername = "localhost";
$username = "Tundra";
$password = "akositundra123";
$dbname = "romey";

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