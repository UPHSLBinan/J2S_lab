<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<?php

  // Establish database connection
  $servername = "localhost"; // replace with your server name
  $username = "marcus"; // replace with your database username
  $password = "marcus"; // replace with your database password
  $db = "cosico"; // replace with your database name
  $conn = new mysqli($servername, $username, $password, $db);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

// checks if registration form is submitted

$re_username = $_POST['re_username'];
$re_password = $_POST['re_password'];
$re_password_con = $_POST['re_password_con'];

if(empty($re_username)||empty($re_password)||empty($re_password_con)){
echo 'Please complete all fields';
}
else if  ($re_password != $re_password_con){
echo 'Passwords do no match';
}

else{
$sql = "SELECT * FROM users WHERE username='$re_username'"; $result = $conn->query($sql);
if ($result->num_rows > 0) {
        echo "Username already exists, please choose another";
}

else {
$sql = "INSERT INTO users (username, password) 
VALUES ('".$re_username."','".$re_password."')";
if ($conn->query($sql) === TRUE){
{echo 'Registration successful!';
}

}
}}// Close database connection
  $conn->close();?>