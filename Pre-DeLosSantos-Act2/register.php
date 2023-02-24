<?php
require_once "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="container1">
<img src="logo.png" alt="Logo ni Arman">
<hr>
 <form action="register.php" method="POST">

	<div class="form-group">
	<b><p id="textfont" name="textfont">REGISTRATION FORM</p></b>
	<p>Fill out the form correctly to register.</p>
 	</div>

	<div class="form-group">
	<input type="text" placeholder="Enter your firstname" name="firstname" id="firstname">
 	</div>

	<div class="form-group">
	<input type="text" placeholder="Enter your lastname" name="lastname" id="lastname">
 	</div>

	<div class="form-group">
	<input type="number" placeholder="Enter your age" name="age" id="age">
 	</div>

	<div class="form-group">
	<input type="date" placeholder="Enter your birthday" name="birthday" id="birthday">
 	</div>

	<div class="form-group">
	<input type="text" placeholder="Enter your address" name="address" id="address">
 	</div>

	<div class="form-group">
	<input type="text" placeholder="Enter your username" name="username" id="username">
 	</div>

	<div class="form-group">
	<input type="password" placeholder="Enter your password" name="password" id="password">
 	</div>

	<div class="form-group">
	<input type="password" placeholder="Re-enter your password" name="password2" id="password2">
 	</div>

	<div class="form-group">
	<input type="submit" value="Register" name="register" id="register">
 	</div>
<hr>
<?php

if(isset($_POST["register"])){

	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$age = $_POST["age"];
	$birthday = $_POST["birthday"];
	$address = $_POST["address"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$password2 = $_POST["password2"];

	$errors = array();
	
	if(empty($firstname) or empty($lastname) or empty($age) or empty($birthday) or empty($address) or empty($username) or empty($password) or empty($password2)){
	
	array_push($errors, "Please fill up the fields correctly.");

	}

	if($password !== $password2){
	array_push($errors, "Password does not match.");

	}
	
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);
	$rowCount = mysqli_num_rows($result);

	if($rowCount > 0){
	array_push($errors, "Username already exists.");
	}
	if(count ($errors) > 0){
	foreach($errors as $error){
	echo "<div class='alert alert-danger'>$error</div>";
	}
	} else {
	$sql = "INSERT INTO users (firstname, lastname, age, birthday, address, username, password) VALUES (?,?,?,?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);
	$preparedStmt = mysqli_stmt_prepare($stmt, $sql);
	if($preparedStmt){
	mysqli_stmt_bind_param($stmt, "ssissss", $firstname, $lastname, $age, $birthday, $address, $username, $password);
	
	mysqli_stmt_execute($stmt);

	echo"<div class='alert alert-success'>User registered succesfully!</div>";
	} else{
	die("Something went wrong. Please try again.");
	}
    }
}
?>

</form>
	<div class="form-group">
	<label class="alcrt" for="login">Already have an account? </label>
 	<input type="button" name="login" id="login" value="Login" onclick="window.location.href='login.php';">
 	</div>
  </div>
</body>
</html>