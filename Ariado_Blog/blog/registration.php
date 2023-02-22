<!DOCTYPE html>
<html>
<head>
	<title>Account Registration</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-4">
		<h1>Account Registration</h1>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label for="first_name">First Name:</label>
				<input type="text" class="form-control" id="first_name" name="first_name" required>
			</div>
			<div class="form-group">
				<label for="middle_name">Middle Name:</label>
				<input type="text" class="form-control" id="middle_name" name="middle_name">

			</div>
			<div class="form-group">
				<label for="last_name">Last Name:</label>
				<input type="text" class="form-control" id="last_name" name="last_name" required>
			</div>
			<div class="form-group">
				<label for="age">Age:</label>
				<input type="number" class="form-control" id="age" name="age" required>
			</div>
			<div class="form-group">
				<label for="birthday">Birthday:</label>
				<input type="date" class="form-control" id="birthday" name="birthday" required>
			</div>
			<div class="form-group">
				<label for="address">Address:</label>
				<input type="text" class="form-control" id="address" name="address" required>
			</div>
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" name="username" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>
			<div class="form-group">
				<label for="password">Confirm Password:</label>
				<input type="password" class="form-control" id="confirmpassword" name="confirm_password" required>
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button><br><br>
		</form>
		<form>
			<button type="submit" class="btn btn-primary" formaction="index.php">Go to Home</button>
		</form>
	</div>
<?php
		if(isset($_POST['submit'])){
			$name = $_POST['name'] ?? ' ';
			$username = $_POST['username'];
			$password = $_POST['password'];
			$first_name = $_POST['first_name'];
			$middle_name = $_POST['middle_name'];
			$last_name = $_POST['last_name'];
			$age = $_POST['age'];
			$birthday = $_POST['birthday'];
			$address = $_POST['address'];

			$confirm_password = $_POST['confirm_password'];
			if($password == $confirm_password){
				//Connect to database
				$servername = "localhost";
				$dbusername = "admin";
				$dbpassword = "admin";
				$dbname = "userprofile";
				$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}
				//Insert user data into database
				$sql = "INSERT INTO users (username, password, first_name, middle_name, last_name, age, birthday, address) VALUES ('$username', '$password', '$first_name', '$middle_name', '$last_name', '$age', '$birthday', '$address')";
				if ($conn->query($sql) === TRUE) {
				    echo "New record created successfully";
					header("Location: account_created.php");
 
					exit;
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$conn->close();
			}
			else{
				echo "Passwords do not match";
			}
		}
	?>
	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
