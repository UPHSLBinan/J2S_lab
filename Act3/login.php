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
<style>


    body {
      background-color: #f2f2f2;
      font-family: Arial, Helvetica, sans-serif;
    }
    .container {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
    input[type="text"],
    input[type="password"],
    input[type="date"],
    input[type="int"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: none;
      border-radius: 5px;
      background-color: #f2f2f2;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    .alert {
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      font-weight: bold;
    }
    .alert-danger {
      background-color: #f44336;
      color: #fff;
    }
    .alert-success {
      background-color: #4CAF50;
      color: #fff;
    }
    h5 {
      margin-top: 20px;
      text-align: center;
    }
    a {
      color: #4CAF50;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
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