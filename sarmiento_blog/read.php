<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Log In</h2>

        <form action="update0.php" method="post">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" class="form-control" name="username">
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Log In</button>
        </form>


        <nav>
            <ul class="pagination">
                <li class="enabled"><a href="create.php">&laquo;</a></li>
                <li class="active"><a href="read.php">2 <span class="sr-only">(current)</span></a></li>
            </ul>
        </nav>
    </div>
</body>
</html>

<?php
ini_set('display_errors', 'Off');
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

// Get the user's registration information from the HTML form
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$username = $_POST['username'];
$password = $_POST['password'];

// Insert the user's information into the database
$sql = "INSERT INTO users (firstname, middlename, lastname, age, birthday, address, username, password)
VALUES ('$firstname', '$middlename', '$lastname', '$age', '$birthday', '$address', '$username', '$password')";


if (mysqli_query($conn, $sql)) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

