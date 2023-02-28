<?php
require 'connect.php';
if(isset($_POST['submit']))
{
	
 
	$firstname=$_POST['firstname'];
	$middlename=$_POST['middlename'];
	$lastname=  $_POST['lastname'];
	$age=  $_POST['age'];
	$email=  $_POST['email'];
	$birthday=  $_POST['birthday'];
	$address= $_POST['address'];
	$password=  $_POST['password'];


	// Insert form data into the database
    $sql = "INSERT INTO crud1 (firstname, middlename, lastname, age, birthday, address, email, password) VALUES ('$firstname', '$middlename', '$lastname', '$age', '$birthday', '$address', '$email', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
// Close the database connection
mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>crud1</title>
	<link rel="stylesheet" href="style.css">
  </head>
  <body>
  <form action="register.php" method="POST">


  <div class="container">
	<label>First Name: </label>
	<input type="text" required 
	       class="form-control"
			id="firstname"
			name="firstname"
			placeholder="First Name"
			style="width:190px; height:25px;"><br><br></div>

			<div class = "form-group">
	<label>Middle Name: </label>
	<input type="text" required 
	       class="form-control"
		   id="middlename"
		   name="middlename"
			placeholder="Middle Name"
			style="width:190px; height:25px;"><br><br></div>
            
			<div class = "form-group">
	<label>Last Name: </label>
	<input type="text" required 
	       class="form-control"
			id="lastname"
			name="lastname"
			placeholder="Last Name"
			style="width:190px; height:25px;"><br><br></div>
           
			<div class = "form-group">
	<label>Age: </label>
	<input type="number" required 
	       class="form-control"
			id="age"
			name="age"
			placeholder="Age"
			style="width:190px; height:25px;"><br><br></div>

			<div class = "form-group">
	<label>Birthday: </label>
	<input type="date" required 
	       class="form-control"
			id="birthday"
			name="birthday"
			placeholder="mm/dd/yyyy"
			style="width:190px; height:25px;"><br><br></div>

			<div class = "form-group">
	<label>Email: </label>
	<input type="email" required 
	       class="form-control"
			id="email"
			name="email"
			placeholder="Email"
			style="width:190px; height:25px;"><br><br></div> 
       
            <div class = "form-group">
	<label>Address: </label>
	<input type="text" required 
	       class="form-control"
			id="address"
			name="address"
			placeholder="Address"
			style="width:190px; height:25px;"><br><br></div>
    
            <div class = "form-group">
	<label>Password: </label>
	<input type="password" required 
	       class="form-control"
			id="password"
			name="password"
			placeholder="Password"
			style="width:190px; height:25px;"><br><br></div>

			<div class = "form-group">
	<label>Confirm Password: </label>
	<input type="password" required 
	       class="form-control"
			id="password2"
			name="password2"
			placeholder="Confirm Password"
			style="width:190px; height:25px;"><br><br></div>

            <div class="input-field">
			<input type="submit" name="submit" value="submit">

			<h5> Have an account? <a href="login.php"> Log in Here! </a> </h5> 
			
</form>
</div>
  </body>
</html>
</html>