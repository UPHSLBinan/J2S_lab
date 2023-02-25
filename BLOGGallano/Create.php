<?php
	include 'Connect.php';
	if(isset($_POST['submit'])){
		$UserName=$_POST['UserName'];
		$Password=$_POST['Password'];
		$FirstName=$_POST['FirstName'];
		$LastName=$_POST['LastName'];
		$Age=$_POST['Age'];
		$Birthday=$_POST['Birthday'];
		$Address=$_POST['Address'];

	$sql="insert into `blog` (UserName,Password,FirstName,LastName,Age,Birthday,Address) values('$UserName','$Password','$FirstName','$LastName','$Age','$Birthday','$Address')";

	$result=mysqli_query($con,$sql);
	if($result){
		//echo "Data is successfully inserted"; 
		header('location:Display.php');
	}
	else{
		die(mysqli_error($con));
	}
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Create User</title>
  </head>
  <body>
	<div class="container">
		<form method = "post">
 			<div class="form-group">
  			<label>Username</label>
    			<input type="text" class="form-control" placeholder="Enter User" name="UserName">
  			</div>

			<div class="form-group">
  			<label>Password</label>
    			<input type="password" class="form-control" placeholder="Enter Password" name="Password">
  			</div>

			<div class="form-group">
			<label>First Name</label>
    			<input type="text" class="form-control" placeholder="Enter First Name" name="FirstName">
  			</div>	

			<div class="form-group">
  			<label>Last Name</label>
    			<input type="text" class="form-control" placeholder="Enter Last Name" name="LastName">
  			</div>

			<div class="form-group">
  			<label>Age</label>
    			<input type="text" class="form-control" placeholder="Enter Age" name="Age">
  			</div>

			<div class="form-group">
  			<label>Birthday</label>
    			<input type="text" class="form-control" placeholder="Enter Birthday" name="Birthday">
  			</div>

			<div class="form-group">
  			<label>Address</label>
    			<input type="text" class="form-control" placeholder="Enter Address" name="Address">
			</div>	
  			
  			<button type="submit" class="btn btn-primary" name='submit'>Submit</button>
			</form>
   	</div>

  </body>
</html>