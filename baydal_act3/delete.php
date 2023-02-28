<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

<?php
if (isset($_POST['delete'])) {
	$username = $_POST["username"];
    $password = $_POST["password"];
    require_once "database.php";
    
	// Get the user input
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// Delete the user from the database
	$sql = "DELETE FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	// If the user was successfully deleted, redirect to the login page
	if ($result) {
		header("Location: login.php");
		exit();
	} else {
		echo "Error deleting account.";
	}
}


?>
      
   
      <form action="delete.php" method="post">
<div class="login-form">
<h1 style="text-align: center; font-size:"35px"; font-family: "Lucida Handwriting, cursive;"">DELETE FORM</h1>
        <div class="input-box">
            <input type="username" placeholder="Enter Username:" name="username" class="form-control">
        </div>
        <div class="input-box">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Delete" name="Delete" class="btn btn-primary">
        </div>
	</div>
      
     <div><p>Not registered yet: <a href="registe2.php">Register Here</a></p></div>
    </div>
</form>
</body>
</html>