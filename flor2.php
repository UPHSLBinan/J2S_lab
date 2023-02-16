<?php

// Get the user's information from the form
$FNAME = $_POST['FNAME'];
$LNAME = $_POST['LNAME'];
$AGE = $_POST['AGE'];
$EMAIL = $_POST['EMAIL'];
$DETAIL = $_POST['DETAIL'];

// Connect to the database

$servername ="localhost";
$username ="fadacma";
$password ="@ngelous61416141fada08";
$dbname ="act3";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for errors
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Insert the user's information into the database
$sql = "INSERT INTO user (FNAME, LNAME, AGE, EMAIL, DETAIL) VALUES ('$FNAME', '$LNAME', '$AGE', '$EMAIL', '$DETAIL')";

if ($conn->query($sql) === TRUE) {
	echo "Information submitted successfully!";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();

?>