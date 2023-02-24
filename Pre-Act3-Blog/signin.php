<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Sign In</title>

<style>

    body {
  margin: 0;
  padding: 0;
  background-color: #1d519d;
}

.container {
  background: #f1f1f1;
  max-width: 600px;
  margin: 100px auto;
  padding: 50px;
  box-shadow: 10px 10px #888888;
}

.form-group {
  margin-bottom: 30px;
}

</style>
</head>

<body style="background-color:#6B728E;">
  <div class="container">
    <?php
    if (isset($_POST["login"])) {
      $username = $_POST["username"];
      $password = $_POST["password"];

      include "connect.php";

      $sql = "SELECT * FROM users WHERE username = '$username'";
      $result = mysqli_query($conn, $sql);
      $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
      if ($user) {
        if ($password == $user["password"]) {
          header("Location: index.html");
          die();
        } else {
          echo "<div class='alert alert-danger'>Password incorrect.</div>";
        }
      } else {
        echo "<div class='alert alert-danger'>User does not exists.</div>";
      }
    }
    ?>
    <form action="signin.php" method="post">
      <h1>SIGN IN</h1>
      <p>Please sign in to your account.</p>
      <div class="form-group">
        <input type="text" placeholder="Username" name="username" id="username" class="form-control">
      </div>
      <div class="form-group">
        <input type="password" placeholder="Password" name="password" id="password" class="form-control">
      </div>
      <div class="form-group">
        <input type="submit" value="Login" name="login" class="btn btn-success">
      </div>
    </form>
   <h5>Don't have an account? <a href="signup.php">Sign up here!</a></h5>
  </div>
</body>

</html>