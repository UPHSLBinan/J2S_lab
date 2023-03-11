<?php 
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 <link rel="stylesheet" href="read.css"/>
</head>
<body>
  <div class="container">
    
<?php 
      session_start();

      $user = $_SESSION["username"];
      // Check if the user is logged in
      if (!isset($_SESSION["username"])) {
        header("Location: login.php");
      }

    $sql = "SELECT * FROM users WHERE username='$user'";
$result = mysqli_query($conn, $sql);
if($result){
$row = mysqli_fetch_assoc($result);
	
      // Display a greeting to the user
      echo "<h1>Hello, " . $row["firstname"] . "!</h1>";
      // Display the user's data except for the username and password
      echo "<p>Username: " . $row["username"] . "</p>";
      echo "<p>First Name: " . $row["firstname"] . "</p>";
      echo "<p>Middle Name: " . $row["middlename"] . "</p>";
      echo "<p>Last Name: " . $row["lastname"] . "</p>";
      echo "<p>Age: " . $row["age"] . "</p>";
      echo "<p>Birthday: " . $row["birthday"] . "</p>";
      echo "<p>Address: " . $row["address"] . "</p>";
}
    ?>
    <div class="d-flex justify-content-between align-items-center">
     <button class="btn btn-primary"><a href="update.php?updt_user=<?php echo $_SESSION['username']; ?>" style="text-decoration:none" class="text-white">Update Profile</a></button>
  <button class="btn btn-danger"><a href="login.php" style="text-decoration:none" class="text-white">Log Out</a></button>
  <button class="btn btn-danger"><a href="remove.php?dlt_user=<?php echo $_SESSION['username']; ?>" style="text-decoration:none" class="text-white">Delete</a></button>
    </div>
  </div>



</body>
</html>