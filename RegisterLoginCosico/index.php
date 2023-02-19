<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">

<title>Login </title>

<body>
<center>
<h1>Welcome, Please Register or Login</h1>
</center>
<div class = "LogGroup">
<center>
<h2>Login</h1>
<form action = "login.php" method = "POST">
<label for ="username"> Username:</label>
<input type= "varchar" name = "username"required><br><br>
<label for ="password"> Password:</label>
<input type= "varchar" name = "password" required><br><br>
<input type = "submit" value = "Login">

<h5> Don't have an account? <a href="register.php">Sign up here!</a></h5>
</form>
</center></div></body></html>