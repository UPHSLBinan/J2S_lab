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
    
        <?php
session_start();
require_once "database.php";

        if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // User is authenticated, set session variables and redirect to user profile
    $user = $result->fetch_assoc();

      $_SESSION['username'] = $user['username'];
	$_SESSION['firstname'] = $user['firstname'];
    $_SESSION['middlename'] = $user['middlename'];
    $_SESSION['lastname'] = $user['lastname'];
    $_SESSION['age'] = $user['age'];
    $_SESSION['birthday'] = $user['birthday'];
    $_SESSION['address'] = $user['address'];
    header('location:index.php');
    exit();
  } else {
     $error_msg = "Incorrect username / password. Try Again";
  }

  $stmt->close();
  $conn->close();
}
?>
  <div class="container"> 
       <form action="login.php" method="post">

<h1 style="text-align: center; font-size:"35px"; font-family: "Lucida Handwriting, cursive;"">LOGIN FORM</h1>
        <div class="box">
	<div class="form-group">
	<label for="username">Username</label>
            <input type="username" placeholder="Enter username:" name="username" class="form-control">
<label for="password">Password</label>

        
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
      </form>
     <div><p>Not registered yet <a href="register.php">Register Here</a></p></div>
</div>
</body>
</html>