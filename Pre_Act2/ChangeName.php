<?php
session_start();

// Redirect to login page if user is not logged in
if(!isset($_SESSION['Name'])) {
  header('location: Login.php');
}

// Get the logged in user's name from the session
$Name = $_SESSION['Name'];

// If the user submitted the form to change their name
if(isset($_POST['changeName'])) {
  $newName = $_POST['newName'];
  
  // TODO: Add validation and sanitization for the new name input
  
  // Update the user's name in the database
  $servername = "localhost";
  $username = "VoidAdmin";
  $password = "Admin";
  $dbname = "singhid";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "UPDATE user2 SET Name='$newName' WHERE Name='$Name'";
  if ($conn->query($sql) === TRUE) {
    // Update the session variable with the new name
    $_SESSION['Name'] = $newName;
    
    // Redirect the user back to the landing page with a success message
    header('location: Landing.php?msg=success');
  } else {
    echo "Error updating record: " . $conn->error;
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Name</title>
</head>
<body>
	<h1>Change Name</h1>
	<p>Enter your new name below:</p>
	<form method="post" action="">
	  <input type="text" name="newName" placeholder="New Name" required><br>
	  <input type="submit" name="changeName" value="Change">
	</form>
	<a href="Landing.php">Cancel</a>
</body>
</html>