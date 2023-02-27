<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css.css">
</head>
<body>
<?php
// Change these values to match your MySQL server settings
$servername = "localhost";
$username = "Tundra";
$password = "akositundra123";
$dbname = "tundra";

// Create a connection to the MySQL server
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // Redirect to the login page
    header("Location: login.php");
    exit;
}

// Retrieve the user's information from the database
$stmt = $conn->prepare("SELECT * FROM register WHERE username=?");
$stmt->bind_param("s", $_SESSION["username"]);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Handle form submissions
if (isset($_POST["action"])) {
    if ($_POST["action"] === "update") {
        header("Location: update.php");
        exit;
    } elseif ($_POST["action"] === "logout") {
        header("Location: logout.php");
        exit;
    } elseif ($_POST["action"] === "delete") {
        header("Location: delete.php");
        exit;
    }
}

?>
<br><br><br><br><br>
<form class="button-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <br><br><br><br><br>Welcome, <?php echo $user["fname"] . " " . $user["lname"]; ?>!<br>
    Age: <?php echo $user["age"]; ?><br>
    Birthday: <?php echo $user["birthday"]; ?><br>
    Address: <?php echo $user["address"]; ?><br><br>
    <h1>Manage your account here:</h1><br>
    <button type="submit" name="action" value="update">Update Account</button><br><br>
    <button type="submit" name="action" value="logout">Logout</button><br><br>
    <button type="submit" name="action" value="delete">Delete Account</button><br><br>
</form>


</body>
</html>