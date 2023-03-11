<?php
require_once "database.php";

if(isset($_GET['dlt_user'])){
	$username=$_GET['dlt_user'];

	$sql = "DELETE FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<div class='alert alert-success'>Deleted Successfully!</div>";
    echo "<button><a href=\"login.php\">Log in</a></button>";
} else {
    die("Oops! Something went wrong in the connection");
   echo "<button><a href=\"login.php\">Log in</a></button>";
}}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 <link rel="stylesheet" href="read.css"/>
</head>

</html>
