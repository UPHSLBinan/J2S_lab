<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">

<title>Register </title>
<body>

<div class = "RegGroup">
<center>
<h2> Register</h2>
<form action = "registered.php" method ="POST">
<label for ="re_username"> Username:</label>
<input type= "varchar" name = "re_username"required><br><br>
<label for ="re_password"> Password:</label>
<input type= "varchar" name = "re_password"required><br><br>
<label for="re_password_con"> Confirm Password:</label>
<input type= "varchar" name = "re_password_con"required><br><br>
<input type = "submit" value = "Register">

</form>
</center>

</div>

</body>
</html>