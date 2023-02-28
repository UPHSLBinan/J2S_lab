<!DOCTYPE html>
<html>
  <head> 
<body style="background-color:powderblue;">
<center> 
    <title>Update Form</title>
  </head>
  <body>
    <h1>Update your account</h1>
    <form method="post" action="update.php">
	<div class="input-box">
                <i class="fas fa-user"></i>
               ID <input type="text" placeholder="Enter your id" name="id" required>
              </div>
      <label for="username">Username:</label>
      <input type="text" name="username" required>
      <br>
      <label for="password">Password:</label>
      <input type="password" name="password" required>
      <br>
      <label for="repassword">Re-enter Password:</label>
      <input type="password" name="repassword" required>
      <br>
      <label for="age">Age:</label>
      <input type="number" name="age" required>
      <br>

	<label for="birthday">Birthday:</label>
      <input type="date" name="birthday" required>
      <br>
      <label for="firstname">First Name:</label>
      <input type="text" name="firstname" required>
      <br>
      <label for="lastname">Last Name:</label>
      <input type="text" name="lastname" required>
      <br>
      <label for="middlename">Middle Name:</label>
      <input type="text" name="middlename">
      <br>
      <label for="address">Address:</label>
      <textarea name="address" required></textarea> 
      <div><p>Not registered yet <a href="login.php">Login</a></p></div>
      <br>
      <input type="submit" name="update"value="Update">
<?php

// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "userssss";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if(isset($_POST['id']) && isset($_POST['firstname']) && isset($_POST['middlename']) && isset($_POST['lastname']) && isset($_POST['age']) && isset($_POST['birthday']) && isset($_POST['address']) && isset($_POST['username']) && isset($_POST['password'])) {

	// Get form data
	$id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

	// Update user data in the database
	$sql = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', age='$age', birthday='$birthday', address='$address', username='$username', password='$password' WHERE id='$id'";
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