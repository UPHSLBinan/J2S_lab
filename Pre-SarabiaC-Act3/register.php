<?php 
require_once "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <!-- Bootstrap 5 stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
  
<div class="container">

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

	<form action="register.php" method="POST" class="mt-3">
		<div class="card border-primary mb-4">
		
		<div class="card-header bg-dark ">
		<h1 style="color:white">Register</h1>
		</div></div>
		<div class="row">
			<div class="col-md-6">
				<div class="mb-2">
					<label for="firstname" class="form-label">First Name:</label>
					<input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" autocomplete=off >
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="mb-2">
					<label for="lastname" class="form-label">Last Name:</label>
					<input type="text" class="form-control" placeholder="Last Name" name="lastname"autocomplete=off >
				</div>		</div></div>
			<div class="row">
			<div class="col-md-4">
				<div class="mb-3">
					<label for="age" class="form-label">Age:</label>
					<input type="int" class="form-control" placeholder="Age" name="age" id="age"autocomplete=off >
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label for="birthday" class="form-label">Birthday:</label>
					<input type="date" class="form-control" placeholder="Birthday" name="birthday"autocomplete=off >
				</div>		</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label for="address" class="form-label">Address:</label>
					<input type="text" class="form-control" placeholder="Address" name="address"autocomplete=off >
				</div>	</div>	</div> 

			<div class="row">
				<div class="col-md-4">
				<div class="mb-3">
					<label for="username" class="form-label">Username:</label>
					<input type="text" class="form-control" placeholder="Userame" name="username" id="username" >
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label for="pass" class="form-label">Password:</label>
					<input type="password" class="form-control" placeholder="Password" name="pass" id="pass">
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label for="pass2" class="form-label">Confirm Password:</label>
					<input type="password" class="form-control" placeholder="Confirm Password" name="pass2" id="pass2">
		</div></div></div>
			<div class="form-group">
			<div class="col-md-4">
			
					<button type ="submit" value = "  Register   " name= "register"id= "register"> Register</input>


			


		
	</div>	
	
				
<h7> Already have an account? <a href="login.php">Log in here!</a></h7>


  		  
		
		
	



</body>
</html>














</body>
</html>