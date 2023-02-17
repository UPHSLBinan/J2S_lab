<!DOCTYPE html>
<html>
<head>
	<title>User Information Form</title>
</head>
<body>

	<h1>User Information Form</h1>

	<form method="POST" action="connect2.php">
		
		<label>Last Name:</label>
		<input type="text" name="lastname" required><br><br>
		
		<label>First Name:</label>
		<input type="text" name="firstname" required><br><br>
		
		<label>Age:</label>
		<input type="number" name="age" required><br><br>
		
		<label>Email:</label>
		<input type="email" name="email" required><br><br>
		
		<label>Detail:</label>
		<textarea name="detail"></textarea><br><br>

		<input type="submit" name="submit" value="Submit">
		<input type="reset" value="Clear">
	</form>

	<?php
		if(isset($_POST["submit"])){
			$lname = $_POST["lastname"];
			$fname = $_POST["firstname"];
			$age = $_POST["age"];
			$email = $_POST["email"];
			$detail = $_POST["detail"];

			echo "<h2>Submitted Information:</h2>";
			echo "<p>Last Name: " . $lname . "</p>";
			echo "<p>First Name: " . $fname . "</p>";
			echo "<p>Age: " . $age . "</p>";
			echo "<p>Email: " . $email . "</p>";
			echo "<p>Detail: " . $detail . "</p>";
		}
	?>

</body>
</html>