<!DOCTYPE html>
<html>
<head>
	<title>Form Submission Example</title>
</head>
<body>
	<h2>Enter Your Information</h2>
	<form action="flor2.php" method="post">
		<label for="FNAME">First Name:</label>
		<input type="text" id="fname" name="FNAME"><br><br>
		
		<label for="LNAME">Last Name:</label>
		<input type="text" id="lname" name="LNAME"><br><br>
		
		<label for="AGE">Age:</label>
		<input type="number" id="age" name="AGE"><br><br>
		
		<label for="EMAIL">Email:</label>
		<input type="email" id="email" name="EMAIL"><br><br>
		
		<label for="DETAIL">Details:</label>
		<textarea id="detail" name="DETAIL"></textarea><br><br>
		
		<input type="submit" value="Submit">
	</form>
</body>
</html>