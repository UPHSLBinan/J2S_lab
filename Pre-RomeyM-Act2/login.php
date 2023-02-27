<?php

// Change these values to match your MySQL server settings
$servername = "localhost";
$username = "Tundra";
$password = "akositundra123";
$dbname = "Tundra";

// Create a connection to the MySQL server
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// Check if the user is already logged in
if (isset($_SESSION["username"])) {
    // Redirect to the main page
    header("Location: main.php");
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Prepare SQL statement to check if the user exists in the database
    $stmt = $conn->prepare("SELECT * FROM register WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Get the result of the query
    $result = $stmt->get_result();

    // If the user exists, check their password
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            // If password is correct, set the session variables
            $_SESSION['username'] = $row['username'];

            // Redirect to the main page
            header("Location: main.php");
            exit;
        } else {
            $error_msg = "Incorrect password.";
        }
    } else {
        $error_msg = "Invalid username or password.";
    }
    // Close the prepared statement and result set
    $stmt->close();
    $result->close();
}

// Close the database connection
$conn->close();

?>
<!DOCTYPE html>
<html>
<head>
<br><br><br><br>
<div class="containter">
<form method="POST">
    <title>Login</title><br>
<link rel="stylesheet"href="css.css">
</head>
<body> <br><br>
<h1>Login</h1>
<?php if (isset($error_msg)) { ?>
    <p><?php echo $error_msg; ?></p>
<?php } ?>

    <div>
        <label for="username" style="font-weight: bold;">Username:</label>
        <input type="text" name="username" required>
    </div>
    <div>
       <label for="password" style="font-weight: bold;">Password:</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <br><button type="submit" style="font-weight: bold; width: 100px;">Login</button>
    </div>
<br>
    <div>
	<a href="Register.php">Don't have an account? Register here.</a>
    </div>
</form>
</div>
</body>
</html>