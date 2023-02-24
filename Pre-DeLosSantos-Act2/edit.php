<!DOCTYPE html>
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
<img src="logo.png" alt="Logo ni Arman">
<hr>
     <form action="update.php" method="POST">
      <div class="form-group">
        <b><p id="textfont" name="textfont">EDIT DETAILS</p></b>
        <p>Update your details.</p>
      </div>
      <?php
      require_once "database.php";

    // Connect to database
    $db = mysqli_connect('localhost', 'root', '', 'activity3');

      // Start the session
      session_start();

      // Check if the user is already logged in
      if (isset($_SESSION['user_id'])) {
        // Get the user's details from the database
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE id=$user_id";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);

        // Display the user's details in the form
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
        echo '<input type="submit" value="Save Changes" name="save" id="save">';
        echo '</div><hr>';

      } else {
        echo "You must be logged in to view this page.";
      }
      ?>
    </form>
  </div>
</body>
</html>