<?php
session_start();
if (isset($_SESSION["user"])) {
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
       
<?php
if (isset($_POST['delete'])) {
	$gmail = $_POST["gmail"];
    $password = $_POST["password"];
    require_once "database.php";
    
	// Get the user input
	$gmail = mysqli_real_escape_string($conn, $_POST['gmail']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// Delete the user from the database
	$sql = "DELETE FROM users WHERE gmail='$gmail' AND password='$password'";
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
          <span class="text-1">FADAYON<br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
      <form action="delete.php" method="post">
	<div class="login-form">
        <div class="input-box">
            <input type="email" placeholder="Enter Email:" name="gmail" class="form-control">
        </div>
        <div class="input-box">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="delete" name="delete" class="btn btn-primary">
        </div>
	</div>
      </form>
     <div><p>Not registered yet <a href="registe2.php">Register Here</a></p></div>
    </div>
</body>
</html>