<?php
session_start();
if (isset($_SESSION["users"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
        $firstname = $_POST["firstname"];
 	$middlename = $_POST["middlename"];
	$lastname = $_POST["lastname"];
	$age = $_POST["age"];
	$birthday = $_POST["birthday"];
	$address = $_POST["address"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$password2 = $_POST["password2"];

           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
         
if(empty($firstname)or empty($middlename) or empty($lastname) or empty($age) or empty($birthday) or empty($address) or empty($username) or empty($password) or empty($password2)){
array_push($errors, "Please fill up the fields correctly.");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$password2) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE username = '$username'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Username already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (firstname,middlename, lastname, age, birthday, address, username,password) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
               mysqli_stmt_bind_param($stmt, "sssissss", $firstname,$middlename,  $lastname, $age,  $birthday, $address,  $username,  $password);
		mysqli_stmt_execute($stmt);

                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="register.php" method="post">
            <div class="form-group">
  		<h1 style="text-align: center; font-size:"35px"; font-family: "Lucida Handwriting, cursive;"">REGISTRATION FORM</h1>
		<label for="firstname">Firstname:</label>
                <input type="text" class="form-control" name="firstname" placeholder="Enter Your Firstname ">
            </div>
            <div class="form-group">
              <label for="middlename">Middlename:</label>
                <input type="text" class="form-control" name="middlename" placeholder="Enter your Middlename">
 		 </div>
            <div class="form-group">
              <label for="lastname">Lastname:</label>
                <input type="text" class="form-control" name="lastname" placeholder="Enter your Lastname">
            </div>
		 <div class="form-group">
              <label for="age">Age:</label>
                <input type="text" class="form-control" name="age" placeholder="Enter your Age">
            </div>
	 <div class="form-group">
              <label for="birthday">Birthday</label>
                <input type="date" class="form-control" name="birthday">
            </div>
		<div class="form-group">
              <label for="username">Address:</label>
                <input type="text" class="form-control" name="address" placeholder="Enter your Address">
            </div>
 		<div class="form-group">
              <label for="address">Username:</label>
                <input type="text" class="form-control" name="username" placeholder="Enter your Username">
            </div>
            <div class="form-group">
		<label for="password">Password:</label>	
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
 	<label for="password2">Confirm Password:</label>
                <input type="password" class="form-control" name="password2" placeholder="Repeat Password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>