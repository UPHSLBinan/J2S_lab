<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Sign Up</title>

  <style>
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
    if (isset($_POST["register"])) {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $age = $_POST["age"];
      $birthday = $_POST["birthday"];
      $address = $_POST["address"];


      $errors = array();

      if (empty($username) or empty($password) or empty($firstname) or empty($lastname) or empty($age) or empty($birthday) or empty($address)) {
        array_push($errors, "Please fill up the fields correctly");
      }

      include "connect.php";
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

        $sql = "INSERT INTO users (username, password, firstname, lastname, age, birthday, address) VALUES (?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        $preparedStmt = mysqli_stmt_prepare($stmt, $sql);
        if ($preparedStmt) {
          mysqli_stmt_bind_param($stmt, "ssssiis", $username, $password, $firstname, $lastname, $age, $birthday, $address);
          mysqli_stmt_execute($stmt);
          echo "<div class='alert alert-success'>User registered successfully!</div>";
        } else {
          die("Something went wrong.");
        }
      }
    }
    ?>

    <form action="signup.php" method="post">
      <h1>REGISTER</h1>
      <p>Please fill up the form correctly.</p>
      <div class="form-group">
        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
      </div>
      <div class="form-group">
        <input type="number" class="form-control" name="age" id="age" placeholder="Choose your age">
      </div>
      <div class="form-group">
        <input type="date" class="form-control" name="birthday" id="birthday">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-success" name="register" id="register" value="Register">
      </div>
    </form>
   <h5> Already have an account? <a href="signin.php">Log in here!</a></h5>
  </div>
</body>

</html>