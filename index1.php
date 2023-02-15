<!DOCTYPE html>
<html>
<head>
	<title>PHP Form Example</title>
</head>
<body>

	<h1>PHP Form Example</h1>

	<form method="post" action="submit-form.php">
		<label for="first-name">First Name:</label>
		<input type="text" name="first_name" id="first-name"><br>

		<label for="last-name">Last Name:</label>
		<input type="text" name="last_name" id="last-name"><br>

		<label for="age">Age:</label>
		<input type="number" name="age" id="age"><br>

		<label for="email">E-Mail:</label>
		<input type="email" name="email" id="email"><br>

		<label for="detail">Detail:</label>
		<textarea name="detail" id="detail"></textarea><br>

		<input type="submit" value="Submit">
	</form>

</body>
</html>
