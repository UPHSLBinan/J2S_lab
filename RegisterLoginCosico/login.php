<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<?php
  // Establish database connection
  $servername = "localhost"; 
  $username = "marcus"; 
  $password = "marcus"; 
  $db = "cosico"; 
  $conn = new mysqli($servername, $username, $password, $db);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

// checks if login submitted


$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
      $result = $conn->query($sql);

if ($result->num_rows > 0) {
        // User is authenticated, grant access
	
        echo "Login successful!Welcome, $username";
      } else {
        echo "Invalid username or password";      
}  $conn->close();?>