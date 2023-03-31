<html>
<body>
<div class="formcontainer">
<form action="register.php" method="post">
<div class="formgroup">
<input type="text" name="firstname" id="firstname" placeholder="Enter your Firstname."><br>
</div><div class="formgroup">
<input type="text" name="middlename" id="middlename" placeholder="Enter your Middlename."><br>
</div><div class="formgroup">
<input type="text" name="lastname" id="lastname" placeholder="Enter your Lastname."><br>
</div><div class="formgroup">
<input type="number" name="age" id="age" placeholder="Enter your Age."><br>
</div><div class="formgroup">
<input type="date" name="birthday" id="birthday"><br>
</div><div class="formgroup">
<input type="text" name="address" id="firstname" placeholder="Enter your Address."><br>
</div><div class="formgroup">
<input type="text" name="username" id="firstname" placeholder="Enter your Username."><br>
</div><div class="formgroup">
<input type="password" name="password" id="password" placeholder="Enter your Password."><br>
</div><div class="formgroup">
<input type="password" name="password2" id="password2" placeholder="Confirm your Password."><br>
</div>
<input type="submit">
</form>
</div>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userprofile";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
$middlename = isset($_POST['middlename']) ? $_POST['middlename'] : '';
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$password2 = isset($_POST['password2']) ? $_POST['password2'] : '';

$error = '';
if (empty($firstname) || empty($lastname) || empty($age) || empty($address) || empty($username) || empty($password) || empty($password2)) {
  echo "Please fill up all the fields.";
} else if ($password !== $password2) {
    echo "Password confirmation does not match.";
  $error = 'Password confirmation does not match.';
} else {
  $sql = "INSERT INTO user (firstname, middlename, lastname, age, birthday, address, username, password) VALUES ('$firstname', '$middlename', '$lastname', '$age', '$birthday', '$address', '$username', '$password')";

  if (mysqli_query($conn, $sql)) {
    echo "Registered Succesfully.";
  } else {
    // Handle database insertion error
  }
}

// Display login
echo '<p>Have an account?</p>';
echo '<form action="login.php" method="post">';
echo '<input type="submit" name="delete" value="Login">';
echo '</form>';

// Display 
echo '<form action="pagination.php" method="post">';
echo '<input type="submit" name="delete" value="See Registered Users">';
echo '</form>';

mysqli_close($conn);
?>


</body>
</html>