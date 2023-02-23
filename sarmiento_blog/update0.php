<!DOCTYPE html>
<html>
<head>
    <title>Update Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Update Username and Password</h2>
        <form action="update1.php" method="post">
            <div class="form-group">
                <input type="submit" value="Change username and password" class="btn btn-primary">
            </div>
        </form>
    </div>
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

// Get the user's login information from the HTML form
$username = $_POST['username'];
$password = $_POST['password'];

// Check the user's login information against the database
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // User logged in successfully
    $row = mysqli_fetch_assoc($result);
    echo "";
} else {
    echo "Invalid username or password.";
}

mysqli_close($conn);
?>

<div class="container">
        <h2>Post Blog</h2>
        <form action="blogform.php" method="post">
        <input type="submit" value="Create Blog" class="btn btn-primary">