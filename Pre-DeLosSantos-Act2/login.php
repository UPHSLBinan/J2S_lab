<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body style="background-color: #1DA1F2;">
  <div class="container1">
<img src="logo.png" alt="Logo ni Arman">
<hr>
     <form action="login.php" method="POST">
      <div class="form-group">
        <b><p id="textfont" name="textfont">LOGIN FORM</p></b>
        <p>Fill out the form correctly to login.</p>
      </div>
      <div class="form-group">
    
        <input type="text" placeholder="Enter your username" name="username" id="username">
      </div>
      <div class="form-group">
    
        <input type="password" placeholder="Enter your password" name="password" id="password">
      </div>
      <div class="form-group">
        <input type="submit" value="Login" name="login" id="login">
      </div> 
<hr>
    <?php
    require_once "database.php";

    // Connect to database
    $db = mysqli_connect('localhost', 'root', '', 'activity3');

// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
  // Get the user's details from the database
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM users WHERE id=$user_id";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);

                // Redirect to index.php
            header("Location: index.php");
            exit();
} else {
  // If the user is not logged in, display the login form

}

if (isset($_SESSION['user_id'])) {
echo "<div class='form-group'><form action='logout.php' method='POST'><input type='submit' value='Logout' name='logout' id='logout'></form></div>";
} 
// Display the user's details
if (isset($_POST['login'])) {
  // Get the user input
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Check if the user exists in the database
  $sql = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($db, $sql);

  // If the user exists, check their password
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['password']) {
      // If password is correct, set the session variable
      $_SESSION['user_id'] = $row['id'];

                // Redirect to index.php
            header("Location: index.php");
            exit();
    } else {
echo"<div class='alert alert-danger'>Incorrect password.</div>";
    }
  } else {

echo"<div class='alert alert-danger'>Invalid username or password</div>";
  }
}

?>

    </form>



<div class="form-group">
	<label class="alcrt" for="register">Create an account. </label>
	<input type="button" name="register" id="register" value="Register" onclick="window.location.href='register.php';">
</div>



</form>
</div>
</body>
</html>