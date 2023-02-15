<?php
// Get the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to the database
$host = 'localhost'; // Change this to your database host
$user = 'admin'; // Change this to your database username
$pass = 'admin123'; // Change this to your database password
$db = 'sarmientologin'; // Change this to your database name
$conn = mysqli_connect($host, $user, $pass, $db);

// Check if the user exists in the database
$sql = "SELECT * FROM register WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // The user exists, so display a welcome message
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    echo "Welcome, $name!";
} else {
    // The user doesn't exist, so display an error message
    echo "Invalid username or password.";
}

// Close the database connection
mysqli_close($conn);
?>