<html>
<br><br><br><br>
<div class="containter">
<link rel="stylesheet"href="css.css">
<body>
<form action="connect.php" method="post">
<h1>Register Here</h1>
<form action="connect.php" method="post">
<strong>First Name:</strong> <input type="text" name="fname"><br>
<strong>Last Name: <input type="text" name="lname"><br>
<strong>Age: <input type="number" name="age"><br><br>
<strong>Birthday: <input type="date" name="birthday"><br><br>
<strong>Address: <input type="text" name="address"><br>
<strong>Username:<input type="text" name="username"><br>
<strong>Password:<input type="text" name="password"><br>
<strong>Password Confirmation:<input type="text" name="confirm"><br>
<input type="submit"><br>
<!-- Button to lead to the login page if the user already has an account -->
<a href="login.php">Already have an account? Login here.</a>

<br>

<!-- Button to lead to the registered users page -->
<a href="registered.php">View registered users</a>

</div>
</form> 
</body>
</html>