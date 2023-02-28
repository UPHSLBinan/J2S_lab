<?php 
require_once "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

</head>
<body>
  
<style>
/* Main content styling */
.container {
  max-width: 500px;
  margin: 10px auto;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 10px;
}

h1 {
  font-size: 36px;
  color: #6a1b9a;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 10px;
}

input[type="date"],
textarea {
  width: 30%;
  padding: 6px;
  border: 1px solid #ddd;
  border-radius: 4px;
  margin-bottom: 20px;
  color: #333;
}


input[type="int"],
textarea {
  width: 30%;
  padding: 6px;
  border: 1px solid #ddd;
  border-radius: 4px;
  margin-bottom: 20px;
  color: #333;
}


input[type="text"],
textarea {
  width: 90%;
  padding: 6px;
  border: 1px solid #ddd;
  border-radius: 4px;
  margin-bottom: 20px;
  color: #333;
}

button[type="submit"] {
  background-color: #6a1b9a;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="password"],
textarea {
  width: 90%;
  padding: 6px;
  border: 1px solid #ddd;
  border-radius: 4px;
  margin-bottom: 20px;
  color: #333;
}



button[type="submit"]:hover {
  background-color: #8e24aa;
}

.error {
  color: #ff0000;
  margin-bottom: 10px;
}

</style>
</head>
</style>

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















