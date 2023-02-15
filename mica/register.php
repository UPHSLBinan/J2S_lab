<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Registration</title>
</head>

<body>
  <div class="container">
    <?php
    if (isset($_POST["submit"])) {
      $name = $_POST["name"];
      $username = $_POST["username"];
      $email = $_POST["email"];
      $pass = $_POST["pass"];
      $pass2 = $_POST["pass2"];
      $passwordConfirm = $_POST["pass"];

      $errors = array();

      if (empty($name) or empty($username) or empty($email) or empty($pass) or empty($pass2)) {
        array_push($errors, "Please fill up the fields correctly");
      }

      if ($pass !== $pass2) {
        array_push($errors, "Password does not match");
      }

      require_once "database.php";
      $sql = "SELECT * FROM users WHERE username = '$username'";
      $result = mysqli_query($conn, $sql);
      $rowCount = mysqli_num_rows($result);
      if ($rowCount > 0) {
        array_push($errors, "Username already exists.");
      }

      if (count($errors) > 0) {
        foreach ($errors as $error) {
          echo "<div class='alert alert-danger'>$error</div>";
        }
      } else {

        $sql = "INSERT INTO users (name, username, email, pass) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        $preparedStmt = mysqli_stmt_prepare($stmt, $sql);
        if ($preparedStmt) {
          mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $pass);
          mysqli_stmt_execute($stmt);
          echo "<div class='alert alert-success'>User registered successfully!</div>";
        } else {
          die("Something went wrong.");
        }
      }
    }
    ?>

    <form action="register.php" method="post">
      <h1>Register</h1>
      <p>Please fill up the form correctly.</p>
      <div class="form-group">
        <input type="text" class="form-control" name="name" id="firstname" placeholder="First Name">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="username" id="lastname" placeholder="Last Name">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="email" id="username" placeholder="Username">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="pass2" id="pass2" placeholder="Confirm Password">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-success" name="submit" id="register" value="Register">
      </div>
    </form>
   <h5> Already have an account? <a href="login.php">Log in here!</a></h5>
  </div>
</body>

</html>