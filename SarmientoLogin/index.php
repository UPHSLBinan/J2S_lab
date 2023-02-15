<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
</head>
<body>
	<h2>Register Form</h2>
	<form action="register.php" method="POST">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br>

		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br>

		<label for="password">Re-Enter Password:</label>
		<input type="password" id="password" name="password" required><br>

		<input type="submit" value="Register">
	</form>
</body>
</html>