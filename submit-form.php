<?php
// Connect to MySQL database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mejarito1";

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user input from form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$age = $_POST['age'];
$email = $_POST['email'];
$detail = $_POST['detail'];

// Insert user input into database
$sql = "INSERT INTO users (first_name, last_name, age, email, detail) VALUES ('$first_name', '$last_name', '$age', '$email', '$detail')";
if (mysqli_query($conn, $sql)) {
    echo "Record added successfully";
} else {
    echo "Error adding record: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
