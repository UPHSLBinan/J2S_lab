<head>
    <title>Delete User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <!-- Your HTML code here -->

<!DOCTYPE html>
<html>
<head>
    <title>Delete User Information</title>
</head>
<body>
    <h1>Delete User Information</h1>
    <form action="delete.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit" name="delete">Delete</button>
    </form>
</body>
</html>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>



<?php
// Database connection
$servername = "localhost";
$username = "admin";
$password = "admin123";
$dbname = "userprofile";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Delete user information
if (isset($_POST['delete'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password are correct
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Delete user information
        $sql = "DELETE FROM users WHERE username='$username' AND password='$password'";
        if (mysqli_query($conn, $sql)) {
            echo "User information deleted successfully.";
        } else {
            echo "Error deleting user information: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid username or password.";
    }

    mysqli_close($conn);
}
?>

<form action="create.php" method="post">
<button type="submit" name="Home">Home</button>
