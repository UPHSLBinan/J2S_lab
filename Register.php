<!DOCTYPE html>
<html>
  <head>  
<body style="background-color:powderblue;">
<center> 

    <title>User Registration Form</title>
  </head>
  <body>
    <h1>User Registration Form</h1>
    <form method="post" action="Register.php"> 
<div class="container">
      <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Username" name="username" id="username" required>   
      <br> </br>
  <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Password" name="password" id="password" required>   
      <br> </br>

<label for="repassword"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="repassword" id="repassword" required>   
      <br> </br>
  <label for="firstname"><b>First Name</b></label>
    <input type="text" placeholder="First Name" name="firstname" id="firstname" required>   
      <br> </br>
  <label for="middlename"><b>Middle Name</b></label>
    <input type="text" placeholder="Middle Name" name="middlename" id="middlename" required>   
      <br></br>
<label for="lastname"><b>Last Name</b></label>
    <input type="text" placeholder="Last Name" name="lastname" id="lastname" required>   
      <br> </br>
<label for="age"><b>Age</b></label>
    <input type="number" placeholder="age" name="age" id="age" required>    
      <br> </br>
<label for="birthday"><b>Birthday</b></label>
    <input type="date" placeholder="Birthday" name="birthday" id="birthday" required>    
      <br></br>
<label for="address"><b>Address</b></label>
    <input type="address" placeholder="Address" name="address" id="address" required>   
      <br></br>








      
      <div><p>Not registered yet <a href="login.php">Login</a></p></div>
      <br>
      <input type="submit" name="register"value="Submit">
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
if(isset($_POST['register'])) {
    // Get form data
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // Check if password and repassword match
    if ($password !== $repassword) {
        echo "Error: Password and repassword do not match.";
        exit;
    }

    // Check if email already exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Error: Email already exists.";
        exit;
    }

    // Insert form data into the database
    $sql = "INSERT INTO users (firstname, middlename, lastname, age, birthday, address, username, password) VALUES ('$firstname', '$middlename', '$lastname', '$age', '$birthday', '$address', '$username', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "The account was created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>
    </form>
  </body>
</html>
