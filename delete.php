<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head> 
<body style="background-color:powderblue;">
<center> 

   
    <title>Login Form</title>

</head>
<body> 
 <h1>Delete your account</h1>
    <div class="container">
       
<?php
if (isset($_POST['delete'])) {
	$username = $_POST["username"];
    $password = $_POST["password"];
    require_once "database.php";
    
	// Get the user input
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// Delete the user from the database
	$sql = "DELETE FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	// If the user was successfully deleted, redirect to the login page
	if ($result) {
		header("Location: login.php");
		exit();
	} else {
		echo "Error deleting account.";
	}
}


?>
       


<div class="container">

    
      
      <form action="delete.php" method="post">
	<div class="login-form">
        <div class="input-box"> 
             <label for="username"><b>Username</b></label>
            <input type="email" placeholder="Enter Email:" name="username" class="form-control">
        </div>
        <div class="input-box"> 
 <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="delete" name="delete" class="btn btn-primary">
        </div>
	</div>
      </form>
     <div><p>Not registered yet <a href="registe2.php">Register Here</a></p></div> 
</center>
    </div> 
</head>
</body>
</html>