<?php
require_once "database.php";
session_start();

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
    header('location:blog.php');
    exit();
  } else {
     $error_msg = "Incorrect username / password. Try Again";
  }

  $stmt->close();
  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<style>
		body {
			background-color: #5c2751;
			font-family: Arial, sans-serif;
		}

		.container {
			margin: auto;
			max-width: 500px;
			padding: 20px;
			border: 1px solid #d3c3e0;
			border-radius: 10px;
			background-color: #f3d7ff;
			box-shadow: 0px 0px 10px #d3c3e0;
		}

		h1, h3 {
			text-align: center;
			margin: 0;
			color: #5c2751;
		}

		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
			color: #5c2751;
		}

		input[type="text"], input[type="password"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
			border: 1px solid #d3c3e0;
			box-sizing: border-box;
			font-size: 16px;
			color: #5c2751;
		}

		input[type="submit"] {
			background-color: #7b42a5;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			margin-top: 20px;
		}

		input[type="submit"]:hover {
			background-color: #5c2751;
		}

		.error {
			color: red;
			margin-bottom: 20px;
		}

		.signup {
			margin-top: 20px;
			text-align: center;
		}

		.signup a {
			color: #7b42a5;
			text-decoration: none;
		}

		.signup a:hover {
			text-decoration: underline;
		}
	</style>
</style>
<div class="container">
	<h1>Login</h1>
	<?php if (isset($error_msg)) { ?>
		<p class="error"><?php echo $error_msg; ?></p>
	<?php } ?>
	<form action="login.php" method="POST">
		<label for="username">Username:</label>
		<input type="text" name="username" placeholder="Username" autocomplete="off" required>

		<label for="password">Password:</label>
		<input type="password" name="password" placeholder="Password" autocomplete="off" required>

		<input type="submit" name="login" value="Login">

		<p class="signup">Don't have an account? <a href="register.php">Sign up here!</a></p>
	</form>
</div>
</body>
</html>