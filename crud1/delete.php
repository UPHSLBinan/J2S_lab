<?php
session_start();
if (isset($_SESSION["crud1"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">;
</head>
<body>
    <div class="container">
       
<?php
if (isset($_POST['delete'])) {
	$email = $_POST["email"];
    $password = $_POST["password"];
    require_once "register.php";
    
	// Get the user input
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// Delete the user from the database
	$sql = "DELETE FROM crud1 WHERE email='$email' AND password='$password'";
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



    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="image/harap.jpg" alt="">
        <div class="text">
          
          
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
      <form action="delete.php" method="post">
	<div class="login-form">
        <div class="input-box">
            <input type="email" placeholder="Enter email:" name="email" class="form-control">
        </div>
        <div class="input-box">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="delete" name="delete" class="btn btn-primary">
        </div>
	</div>
      </form>
    </div>
</body>
</html>