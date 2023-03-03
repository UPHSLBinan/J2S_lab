<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
 <title>Login</title>
  <style>
    body {
      background-color: #blue;
    }
  </style>
</head>
<body>

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

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <div class="card border-primary">
        <div class="card-header bg-primary text-white">
          <h3 class="text-center">Login</h3>
        </div>
        <div class="card-body">
          <?php if (isset($error_msg)) { ?>
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
          <?php } ?>
          <form action="login.php" method="POST">
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" placeholder="Username" name="username" id="username">
            </div>

            <div class="form-group mb-4">
              <label for="password">Password:</label>
              <input type="password" class="form-control"
	      <input type="password" class="form-control" placeholder="Password" name="password" id="password">
		</div>

            <div class="form-group mb-4">
		
              <button type="submit" class="btn btn-primary md-2" name="login" id="login">Login</button>
              
           </div> 
		 
		<h7> Don't have an account? <a href="register.php">Sign up here!</a></h7>
		</div></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>