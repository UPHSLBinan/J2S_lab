<!DOCTYPE html>
<html>
<head>
    <title>Update Username and Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<form action="delete.php" method="post">
        <input type="submit" value="Delete Account ">
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username = "admin";
$password = "admin123";
$dbname = "userprofile";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the user's current username and password from the HTML form
$current_username = $_POST['username'];
$current_password = $_POST['password'];

// Get the user's new username and password from the HTML form
$new_username = $_POST['new_username'];
$new_password = $_POST['new_password'];

// Check if the user's current username and password are correct
$sql = "SELECT * FROM users WHERE username='$current_username' AND password='$current_password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Update the user's username and password in the database
    $sql = "UPDATE users SET username='$new_username', password='$new_password' WHERE username='$current_username'";

    if (mysqli_query($conn, $sql)) {
        echo "Username and password updated successfuly.";
    } else {
        echo "Error updating username and password: " . mysqli_error($conn);
    }
} else {
    echo "Incorrect current username or password";
}

mysqli_close($conn);
?>