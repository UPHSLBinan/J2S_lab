<?php
require_once 'database.php';

if(isset($_POST['update'])) {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];

    $sql = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', age='$age', birthday='$birthday', address='$address' WHERE username='$username'";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header('location:read.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 
    <title>Update User Data</title>
</head>
<body>
<div class="container">
        
    <?php
    if(isset($_GET['updt_user'])) {
        $username = $_GET['updt_user'];
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
               <div class="card border-primary mb-4">
		
		<div class="card-header bg-primary">
		<h1 style="color:white">Update User Profile</h1>
		</div></div>
		<div class="row ">
			<div class="col-md-4">
				<div class="mb-3">
					<label for="firstname" class="form-label">First Name:</label>
					<input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" autocomplete=off value="<?php echo $row['firstname']; ?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label for="middlename" class="form-label">Middle Name:</label>
					<input type="text" class="form-control" placeholder="Middle Name" name="middlename" id="middlename"autocomplete=off value="<?php echo $row['middlename']; ?>" >
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label for="lastname" class="form-label">Last Name:</label>
					<input type="text" class="form-control" placeholder="Last Name" name="lastname"autocomplete=off value="<?php echo $row['lastname']; ?>">
				</div>		</div></div>
			<div class="row">
			<div class="col-md-4">
				<div class="mb-3">
					<label for="age" class="form-label">Age:</label>
					<input type="int" class="form-control" placeholder="Age" name="age" id="age"autocomplete=off value="<?php echo $row['age']; ?>" >
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label for="birthday" class="form-label">Birthday:</label>
					<input type="date" class="form-control" placeholder="Birthday" name="birthday"autocomplete=off value="<?php echo $row['birthday']; ?>">
				</div>		</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label for="address" class="form-label">Address:</label>
					<input type="text" class="form-control" placeholder="Address" name="address"autocomplete=off value="<?php echo $row['address']; ?>" >
				</div>	</div>	</div>

			<div class="row">
				<div class="col-md-4">
				<div class="mb-3">
					<label for="username" class="form-label">Username:</label>
					<input type="text" class="form-control" placeholder="Userame" name="username" id="username" value="<?php echo $row['username']; ?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-2">
					<label for="pass" class="form-label">Password:</label>
					<input type="password" class="form-control" placeholder="Password" name="pass" id="pass">
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label for="pass2" class="form-label">Confirm Password:</label>
					<input type="password" class="form-control" placeholder="Confirm Password" name="pass2" id="pass2">
				</div>
<div class= "form-group">
			<div class="row">
		<div class="col-md-2">
				<div class="mb">
        <button type="submit" class="btn btn-primary" name="update" value="Update">Update</button>
</div>
    </form>
    <?php } ?>
</body>
</html>
