<!DOCTYPE html>
<html>
<head>
<br><br><br><br>
<div class="containter">
<form method="POST">

    <title>Login</title><br>
<link rel="stylesheet"href="css.css">
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
if (!isset($_SESSION["username"])) {
    // Redirect to the login page
    header("Location: login.php");
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $username = mysqli_real_escape_string($conn, $_SESSION["username"]);
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
            // Delete the user's account from the database
            $delete_stmt = $conn->prepare("DELETE FROM register WHERE username=?");
            $delete_stmt->bind_param("s", $username);
            $delete_stmt->execute();

            // Clear the session variables and redirect to the login page
            session_unset();
            session_destroy();
            header("Location: login.php");
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
    <title>Delete Account</title>
</head>
<body>
<h1>Delete Account</h1>
<?php if (isset($error_msg)) { ?>
    <p><?php echo $error_msg; ?></p>
<?php } ?>
<form method="POST">
    <div>
        <label for="password">Confirm Password:</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <button type="submit">Delete Account</button>
    </div>
</form>
</div>
</body>
</html>