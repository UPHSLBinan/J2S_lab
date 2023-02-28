<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">



    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="image/harap.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">

        <div class="form-content">
          <div class="login-form">
            <div class="title">Update</div>
          <form action="update.php" method="POST">
            <div class="input-boxes">
		<div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your id" name="id" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your firstname" name="firstname" required>
              </div>	
		 <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your middlename"  name="middlename" required>
              </div>
		 <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your lastname" name="lastname" required>
              </div>
		 <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your age" name="age" required>
              </div>
		 <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="date" placeholder="Enter your birthday" name="birthday" required>
              </div>
		 <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your address" name="address" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your username/Email" name="gmail" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password" required>
              </div>
		
              <div class="input-box">
  		<i class="fas fa-envelope"></i>
 		 <input type="submit" name="update" value="update">
		</div>
              <div><p>Not registered yet <a href="login.php">Login</a></p></div>
            </div>
      </form>
      </div>
       
    </div>
    </div>
    </div>
  </div>
	
<?php

// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "users";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if(isset($_POST['id']) && isset($_POST['firstname']) && isset($_POST['middlename']) && isset($_POST['lastname']) && isset($_POST['age']) && isset($_POST['birthday']) && isset($_POST['address']) && isset($_POST['gmail']) && isset($_POST['password'])) {

	// Get form data
	$id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];

	// Update user data in the database
	$sql = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', age='$age', birthday='$birthday', address='$address', gmail='$gmail', password='$password' WHERE id='$id'";
	if(mysqli_query($conn, $sql)) {
		echo "User data updated successfully.";
	} else {
		echo "Error updating user data: " . mysqli_error($conn);
	}
	
	// Close the database connection
	mysqli_close($conn);
} 

?>

</body>
</html>
