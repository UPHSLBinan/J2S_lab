<!DOCTYPE html>
<html>
<style>
.container { 
  height: 200px;
  position: relative;
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>
  <head>
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1 class="text-center mt-5">Welcome to UPHSL Basic Home Page!</h1>
      <?php
		$host = "localhost";
		$username = "admin";
		$password = "admin";
		$database = "userprofile";
        // Connect to the database
	  $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        
     session_start();

     if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $name = $row['first_name'];
        // Print a personalized message to the user
        echo "<p class='text-center mt-5'>Welcome, " . $name . "!</p>";

        }
}
else {
        header("location: login.php");
      }
        // Close the database connection
        $conn->close();
      ?>
    </div>
<div class="container">
  <div class="center">
		<form>
			<button type="submit" class="btn btn-primary" formaction="login.php">Go back to Login</button>
		</form>
  </div>
</div>

  </body>
</html>
