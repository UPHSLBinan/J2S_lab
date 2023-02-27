<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
    exit();
}
require_once "database.php";

$db = mysqli_connect('localhost', 'root', '', 'register');
$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>
<body>

    <div class="container">
        <h1>Welcome, you are successfully login!</h1>
        <a href="logout.php" class="btn btn-warning">Logout</a>
	<a href="update.php" class="btn btn-warning">Update</a>
	<a href="delete.php" class="btn btn-warning">Delete</a>
    </div>
</body>
</html>