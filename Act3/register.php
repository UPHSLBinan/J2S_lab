<?php 
require_once "database.php";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
 <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, Helvetica, sans-serif;
    }
    .container {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
    input[type="text"],
    input[type="password"],
    input[type="date"],
    input[type="int"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: none;
      border-radius: 5px;
      background-color: #f2f2f2;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    .alert {
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      font-weight: bold;
    }
    .alert-danger {
      background-color: #f44336;
      color: #fff;
    }
    .alert-success {
      background-color: #4CAF50;
      color: #fff;
    }
    h5 {
      margin-top: 20px;
      text-align: center;
    }
    a {
      color: #4CAF50;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Register</title>

</head>
<body>
  

</head>


<div class="container">

	
	<form action="register.php" method="POST" class="mt-3">

		<?php

	if(isset($_POST["register"])){

	$firstname= $_POST ['firstname'];
	$lastname= $_POST ['lastname'];
	$age= $_POST ['age'];
	$birthday= $_POST ['birthday'];
	$address= $_POST ['address'];
	$username= $_POST ['username'];
	$pass=  $_POST ['pass'];
	$pass2=  $_POST ['pass2'];


	$errors =array();

	if(empty($firstname) or empty($lastname) or empty($age)  or empty($birthday) or empty($address) or empty($username)or empty($pass)or empty($pass2))
	{
	array_push($errors,"Please complete all fields.");
	}
	
	if($pass !== $pass2){
	array_push($errors,"Password does not match.");
	}
	
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);
	$rowCount = mysqli_num_rows($result);
	if ($rowCount > 0) {
		array_push($errors, "Username already exists.");
	}

	if (count($errors) > 0) {
		foreach ($errors as $error) {
			echo "<div class='alert alert-danger'>$error</div>";
		}
	} else {
		$sql = "INSERT INTO users (username,password,firstname,lastname,age,birthday,address)
			VALUES(?,?,?,?,?,?,?)";
		$stmt = mysqli_stmt_init($conn);
		$preparedStmt = mysqli_stmt_prepare($stmt,$sql);
		if ($preparedStmt){
			mysqli_stmt_bind_param($stmt,"ssssiss",$username,$pass,$firstname,$lastname,$age,$birthday,$address);
			mysqli_stmt_execute($stmt);
			
		echo"<div class='alert alert-success'>User registered successfully!</div>";
		} else {
			die("Something Went Wrong.. Please try again");
		}
	}
     }
		
	?>
		<h1 style="text-align: center">Register</h1>
		
		<div>
			<label for="firstname">First Name:</label>
			<input type="text" placeholder="First Name" name="firstname" id="firstname" autocomplete="off" >
		</div>
		
		<div>
			<label for="lastname">Last Name:</label>
			<input type="text" placeholder="Last Name" name="lastname" autocomplete="off" >
		</div>
		
		<div>
			<label for="age">Age:</label>
			<input type="int" placeholder="Age" name="age" id="age" autocomplete="off" >
		</div>
		
		<div>
			<label for="birthday">Birthday:</label>
			<input type="date" placeholder="Birthday" name="birthday" autocomplete="off" >
		
			<label for="address">Address:</label>

			<input type="text" placeholder="Address" name="address" autocomplete="off" >
		
		</div>
		<div>
			<label for="username">Username:</label>
			<input type= "text" name = "username" placeholder="Username" autocomplete="off">

		</div>	<div>
			<label for ="username">Password:</label>
			<input type= "password" name = "pass" autocomplete="off">

		</div>	<div>

			<label for ="username">Confirm Password:</label>
			<input type= "password" name = "pass2" autocomplete="off">
		</div><div>
	
		<input type = "submit" name= "register"value = "Register">
		<h5>Have an account?<a href ="login.php"> Sign in</a> here!</h5>
		</div></div>

		</body>
		</html>















