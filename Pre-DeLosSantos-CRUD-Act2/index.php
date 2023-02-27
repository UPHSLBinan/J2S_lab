<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>









</head>
<body>
  <div class="container1">
<img src="bootstrap-logo.svg" alt="Logo ni Arman" width="130" height="100">
<hr>
     <form action="edit.php" method="POST">


 <?php
    require_once "database.php";

    // Connect to database
    $db = mysqli_connect('localhost', 'root', '', 'userprofile');

// Start the session
session_start();
// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
  // Get the user's details from the database
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM users WHERE id=$user_id";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);













       // Print the user's details
      echo '<div class="form-group"><b><p id="textfont" name="textfont">LOGGED IN USER DETAILS</p></b></div>';
      echo "Welcome, " . $row['firstname'] . " " . $row['lastname'] . "<br>";
      echo "Age: " . $row['age'] . "<br>";
      echo "Birthday: " . $row['birthday'] . "<br>";
      echo "Address: " . $row['address'] . "<br>";
echo "<hr>";
echo "<div class='form-group'><form action='edit.php' method='POST'><input type='submit' value='Edit Details' name='edit' id='edit'></form></div>";
echo "<div class='form-group'><form action='delete.php' method='POST'><input type='submit' value='Delete Account' name='delete' id='delete'></form></div>";
echo "<div class='form-group'><form action='registered.php' method='POST'><input type='submit' value='Registered Users' name='registered' id='registered'></form></div>";
echo "<div class='form-group'><form action='logout.php' method='POST'><input type='submit' value='Logout' name='logout' id='logout'></form></div>";



} else {
  // If the user is not logged in, display the login form


}

// Display the user's details
if (isset($_POST['login'])) {
  // Get the user input
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Check if the user exists in the database
  $sql = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($db, $sql);

  // If the user exists, check their password
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['password']) {
      // If password is correct, set the session variable
      $_SESSION['user_id'] = $row['id'];



      // Print the user's details
      echo '<div class="form-group"><b><p id="textfont" name="textfont">LOGGED IN USER DETAILS</p></b></div>';
      echo "Welcome, " . $row['firstname'] . " " . $row['lastname'] . "<br>";
      echo "Age: " . $row['age'] . "<br>";
      echo "Birthday: " . $row['birthday'] . "<br>";
      echo "Address: " . $row['address'] . "<br>";




echo "<hr>";
echo "<div class='form-group'><form action='edit.php' method='POST'><input type='submit' value='Edit Details' name='edit' id='edit'></form></div>";
echo "<div class='form-group'><form action='registered.php' method='POST'><input type='submit' value='See Registered Users' name='registered' id='registered'></form></div>";
echo "<div class='form-group'><form action='delete.php' method='POST'><input type='submit' value='Delete Account' name='delete' id='delete'></form></div>";
echo "<div class='form-group'><form action='logout.php' method='POST'><input type='submit' value='Logout' name='logout' id='logout'></form></div>";
    } else {

      echo "Incorrect password.";

                // Redirect to index.php
            header("Location: login.php");
            exit();


    }
  } else {


echo "Invalid username or password";

                // Redirect to index.php
            header("Location: login.php");
            exit();


  }
}

?>



    </form>

   


</form>
</div>
</body>
</html>