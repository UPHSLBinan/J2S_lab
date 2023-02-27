<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>



	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
		.active {
			background-color: #4CAF50;
			color: white;
			cursor: default;
		}
		.pagination {
			display: inline-block;
			margin-top: 20px;
		}
		.pagination a {
			color: black;
			float: left;
			padding: 8px 16px;
			text-decoration: none;
			transition: background-color .3s;
			border: 1px solid #ddd;
			margin: 0 4px;
		}
		.pagination a.active {
			background-color: #4CAF50;
			color: white;
			border: 1px solid #4CAF50;
		}
		.pagination a:hover:not(.active) {
			background-color: #ddd;
		}
	</style>






</head>
<body>
  <div class="container1">
<img src="bootstrap-logo.svg" alt="Logo ni Arman" width="130" height="100">
<hr>
     <form action="index.php" method="POST">


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



 echo '<div class="form-group"><b><p id="textfont" name="textfont">LIST OF REGISTERED USERS</p></b></div>';

// Define the number of users to show per page
$users_per_page = 5;

// Get the total number of users in the database
$sql = "SELECT COUNT(*) as total FROM users";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_users = $row['total'];

// Calculate the total number of pages
$total_pages = ceil($total_users / $users_per_page);

// Get the current page number from the URL
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $users_per_page;

// Retrieve the users for the current page
$sql = "SELECT id, firstname, lastname, age, birthday, address FROM users LIMIT $offset, $users_per_page";
$result = $conn->query($sql);

// Output the users as a table
echo "<table>";
echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Birthday</th><th>Address</th></tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['birthday'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Output the pagination links
echo "<div>";
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $current_page) {
        echo "<span>$i</span>";
    } else {
        echo "<a href=\"?page=$i\">$i</a>";
    }
}
echo "</div>";








  

echo "<hr>";

echo "<div class='form-group'><form action='index.php' method='POST'><input type='submit' value='Go Back >>' name='back' id='back'></form></div>";



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




// Define the number of users to show per page
$users_per_page = 5;

// Get the total number of users in the database
$sql = "SELECT COUNT(*) as total FROM users";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_users = $row['total'];

// Calculate the total number of pages
$total_pages = ceil($total_users / $users_per_page);

// Get the current page number from the URL
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $users_per_page;

// Retrieve the users for the current page
$sql = "SELECT id, firstname, lastname, age, birthday, address FROM users LIMIT $offset, $users_per_page";
$result = $conn->query($sql);

// Output the users as a table
echo "<table>";
echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Birthday</th><th>Address</th></tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['birthday'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Output the pagination links
echo "<div>";
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $current_page) {
        echo "<span>$i</span>";
    } else {
        echo "<a href=\"?page=$i\">$i</a>";
    }
}
echo "</div>";








echo "<hr>";

echo "<div class='form-group'><form action='index.php' method='POST'><input type='submit' value='Go Back >>' name='back' id='back'></form></div>";
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