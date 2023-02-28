<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Details</title>
</head>
<body>
  <div class="container1">
    <hr>
     <?php
      require_once "database.php";

      // Connect to database
      $db = mysqli_connect('localhost', 'root', '', 'register');

      // Start the session
      session_start(); 

      if(isset($_POST['update'])) {
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];

        $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', age='$age', birthday='$birthday', address='$address' WHERE username='$username'";

        $result = mysqli_query($db, $sql);

        if($result) {
            header('location:index.php');
        } else {
            echo "Error updating record: " . mysqli_error($db);
        } 
      }

      // Check if user is logged in
      if(isset($_SESSION['username'])) {
        // Get the username of the logged in user
        $username = $_SESSION['username'];

        // Retrieve the user's details from the database
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);

        // Display the form with the user's details
        echo '<div class="container">';
        echo '<h2>Edit Details</h2>';
        echo '<form action="update.php" method="POST">';

        echo '<div class="form-group">';
        echo '<label for="username">Username:</label>';
        echo '<input type="text" placeholder="Enter your username" name="username" id="username" value="' . $username . '" readonly>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<label for="firstname">First Name:</label>';
        echo '<input type="text" placeholder="Enter your first name" name="firstname" id="firstname" value="' . $row['firstname'] . '">';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<label for="lastname">Last Name:</label>';
        echo '<input type="text" placeholder="Enter your last name" name="lastname" id="lastname" value="' . $row['lastname'] . '">';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<label for="age">Age:</label>';
        echo '<input type="number" placeholder="Enter your age" name="age" id="age" value="' . $row['age'] . '">';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<label for="birthday">Birthday:</label>';
        echo '<input type="date" placeholder="Enter your birthday" name="birthday" id="birthday" value="' . $row['birthday'] . '">';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<label for="address">Address:</label>';
        echo '<input type="text" placeholder="Enter your address" name="address" id="address" value="' . $row['address'] . '">';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<input type="submit" value="Save Changes" name="update" id="update">';
        echo '</div>';

        echo '</form>';
        echo '</div>';
      } else {
        echo "You must be logged in to view this page.";
      }
    ?>
  </div>
</body>
</html>