<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h2>Registration Form</h2>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required><br><br>
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" required><br><br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required><br><br>
		<label for="confirm_password">Confirm Password:</label>
		<input type="password" name="confirm_password" id="confirm_password" required><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
		<form action="login.php">
		<input type="submit" name="submit" value="Login">
	<?php
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			if($password == $confirm_password){
				//Connect to database
				$servername = "localhost";
				$dbusername = "admin";
				$dbpassword = "admin";
				$dbname = "ariadologin";
				$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}
				//Insert user data into database
				$sql = "INSERT INTO register (name, username, password) VALUES ('$name', '$username', '$password')";
				if ($conn->query($sql) === TRUE) {
				    echo "New record created successfully";
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
</body>
</html>


