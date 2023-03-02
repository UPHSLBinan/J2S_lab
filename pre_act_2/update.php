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
<div class="container my-5">

   <?php
    if (isset($_GET["up"])) {
    $id = $_GET["up"];
	

    if(isset($_POST['update'])) {
        
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        
        $sql = "UPDATE users SET 
                firstname = '$firstname', 
                middlename = '$middlename', 
                lastname = '$lastname', 
                age = '$age', 
                birthday = '$birthday', 
                address = '$address' 
                WHERE id = $id";
                
        if ($conn->query($sql) === TRUE) {
            echo "User details updated successfully.";
        } else {
            echo "Error updating user details: " . $conn->error;
        }
        $conn->close();
    }}
?>

<form action="update.php" method="POST"> 
	<div class="form-group">
		<label for="firstname" class="form-label">First Name: </label>
		<input type="text" placeholder="First Name" class="form-control" autocomplete="off" name="firstname" id="firstname">
	</div>

	<div class="form-group">
		<label for="middlename" class="form-label">Middle Name: </label>
		<input type="text" placeholder="Middle Name" class="form-control" autocomplete="off" name="middlename" id="middlename">
	</div>		

	<div class="form-group">
		<label for="lastname" class="form-label">Last Name: </label>
		<input type="text" placeholder="Last Name" class="form-control" autocomplete="off" name="lastname" id="lastname">
	</div>
		
	<div class="form-group">
		<label for="age" class="form-label">Age: </label>
		<input type="int" placeholder="Age" class="form-control" autocomplete="off" name="age" id="age">
	</div>

	<div class="form-group">
		<label for="birthday" class="form-label">Birthday: </label>
		<input type="date" placeholder="Birthday" class="form-control" autocomplete="off" name="birthday" id="birthday">
	</div>

	<div class="form-group my-2">
		<label for="address" class="form-label">Address: </label>
		<input type="varchar" placeholder="Address" class="form-control" autocomplete="off" name="address" id="address">
		
 		

		
		
 		<button type="submit" name = "update" class="btn btn-primary">update</button>







</div>
</body>
</html>