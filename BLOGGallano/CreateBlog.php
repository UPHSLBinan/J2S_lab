<?php
	include 'Connect.php';
	if(isset($_POST['submit'])){
		$UserName=$_POST['UserName'];
		$Title=$_POST['Title'];
		$Body=$_POST['Body'];

	$sql="insert into `blog` (UserName,Title,Body) values('$UserName','$Title','$Body')";

	$result=mysqli_query($con,$sql);
	if($result){
		//echo "Data is successfully inserted"; 
		header('location:BlogDisplay.php');
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
    			<input type="text" class="form-control" placeholder="Enter Username" name="UserName">
  			</div>

			<div class="form-group">
  			<label>BLOG Title</label>
    			<input type="text" class="form-control" placeholder="Enter BLOG Title" name="Title">
  			</div>

			<div class="form-group">
			<label>BLOG</label>
    			<textarea class="form-control" placeholder="Enter BLOG" name="Body"rows="5" cols="33"></textarea>
  			</div>	

  			<button type="submit" class="btn btn-primary" name='submit'>Submit</button>
			</form>
   	</div>

  </body>
</html>