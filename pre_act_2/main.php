<?php 
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">



  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>mkevinrenz</title>
</head>
<body>

<div class ="container my-5">
<?php
if (isset($_POST["Insert"])){
 $firstname= $_POST['firstname'];
 $middlename= $_POST['middlename'];
 $lastname= $_POST['lastname'];
 $age= $_POST['age'];
 $birthday= $_POST['birthday'];
 $address= $_POST['address'];

	$sql = "insert into users(firstname,middlename,lastname,age,birthday,address)
	values (?,?,?,?,?,?)";
	
	

$stmt = mysqli_stmt_init($conn);
$preparedStmt = mysqli_stmt_prepare($stmt,$sql);
if ($preparedStmt){
mysqli_stmt_bind_param($stmt,"sssiss",$firstname,$middlename,$lastname,$age,$birthday,$address);
mysqli_stmt_execute($stmt);

if ($preparedStmt){
echo"<div class= 'alert alert-success'>User registered successfully!</div>";
}

header('location:display.php');
}
else{
die("Something Went Wrong.. Please try again");
}


}


?>
<form action = "main.php" method="POST"> 
	<div class= "form-group">

                <div class= "form-group">
		<label for= "firstname" class="form-label">First Name: </label>
		<input type ="text" placeholder = "First Name" class="form-control" autocomplete = "off" name= "firstname"id= "firstname">
		</div>

		<div class= "form-group">
		<label for= "middlename" class="form-label">Middle Name: </label>
			<input type ="text" placeholder = "Middle Name" class="form-control"autocomplete = "off" name= "middlename"id= "middlename">
		</div>		

		<div class= "form-group">
		<label for= "lastname" class="form-label">Last Name: </label>
			<input type ="text" placeholder = "Last Name" class="form-control"autocomplete = "off" name= "lastname"id= "lastname">
		</div>
		
		<div class= "form-group">
		<label for= "Age" class="form-label">Age: </label>
			<input type ="int" placeholder = "Age" class="form-control" autocomplete = "off" name= "age"id= "age">
		</div>

		<div class= "form-group">
		<label for= "Birthday" class="form-label">Birthday: </label>
			<input type ="date" placeholder = "birthday" class="form-control" autocomplete = "off" name= "birthday"id= "birthday">
		</div>

		<div class= "form-group my-2">
		<label for= "address" class="form-label">Address: </label>
			<input type ="varchar" placeholder ="Address" class="form-control" autocomplete = "off" name= "address"id= "address">
		</div>

		
		
 		<button type="submit" name = "Insert" class="btn btn-primary">Submit</button>







</div>
</body>
</html>