<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Login</title>

</head>

<body>
  <div class="container">
    <?php
    if (isset($_POST["login"])) {
      $username = $_POST["username"];
      $pass = $_POST["pass"];

      require_once "database.php";

      $sql = "SELECT * FROM users WHERE username = '$username'";
      $result = mysqli_query($conn, $sql);
      $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
      if ($user) {
        if ($pass == $user["pass"]) {
          header("Location: index.php");
          die();
        } else {
          echo "<div class='alert alert-danger'>Password incorrect.</div>";
        }
      } else {
        echo "<div class='alert alert-danger'>User does not exists.</div>";
      }
    }
    ?>
    <form action="login.php" method="post">
      <h1>Login</h1>
      <p>Please login to your account.</p>
      <div class="form-group">
        <input type="text" placeholder="Username" name="username" id="username" class="form-control">
      </div>
      <div class="form-group">
        <input type="password" placeholder="Password" name="pass" id="pass" class="form-control">
      </div>
      <div class="form-group">
        <input type="submit" value="Login" name="login" class="btn btn-success">
      </div>
    </form>
   <h5>Don't have an account? <a href="register.php">Sign up here!</a></h5>
  </div>
</body>

</html>