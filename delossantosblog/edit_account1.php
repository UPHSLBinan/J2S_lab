<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Edit post</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
  <title>Edit Details</title>
</head>
<body>
     <form action="update.php" method="POST">
      <div class="form-group">
        <h3>EDIT DETAILS</h3><hr>
      </div>
      <?php

      // Check if the user is already logged in
      if (isset($_SESSION['user_id'])) {
        // Get the user's details from the database
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE id=$user_id";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);

        // Display the user's details in the form
        echo '<label for="age">FULL NAME:</label><br>';
        echo '<div class="form-group">';
        echo '<input style="width: 43%; border-radius: 10px; padding: 10px; margin: 10px;" type="text" placeholder="Enter your first name" name="firstname" id="firstname" value="' . $row['firstname'] . '">';
	echo '<input style="width: 49%; border-radius: 10px; padding: 10px; margin: 10px;" type="text" placeholder="Enter your last name" name="lastname" id="lastname" value="' . $row['lastname'] . '">';
        echo '</div>';


        echo '<div class="form-group">';
        echo '<label for="age">AGE:</label><br>';
        echo '<input style="width: 100%; border-radius: 10px; padding: 10px; margin: 10px;" type="number" placeholder="Enter your age" name="age" id="age" value="' . $row['age'] . '">';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<label for="birthday">BIRTHDAY:</label><br>';
        echo '<input style="width: 100%; border-radius: 10px; padding: 10px; margin: 10px;" type="date" placeholder="Enter your birthday" name="birthday" id="birthday" value="' . $row['birthday'] . '">';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<label for="address">ADDRESS:</label><br>';
        echo '<input style="width: 100%; border-radius: 10px; padding: 10px; margin: 10px;" type="text" placeholder="Enter your address" name="address" id="address" value="' . $row['address'] . '">';
        echo '</div>';

        echo '<div class="form-group">';
        echo '<input style=" width: ; margin: 20px;"class="btn btn-primary text-uppercase" type="submit" value="Save Changes" name="save" id="save">';
        echo '</div>';

      } else {
        echo "You must be logged in to view this page.";
      }
      ?>
    </form>

</body>
</html>