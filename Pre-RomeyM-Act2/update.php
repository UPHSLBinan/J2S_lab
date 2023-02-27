<?php

// Start the session
session_start();

// Set the database credentials
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

// Check if the user submitted the update form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $age = $_POST["age"];
    $birthday = $_POST["birthday"];
    $address = $_POST["address"];

    // Update the user's information in the database
    $sql = "UPDATE register SET fname='$fname', lname='$lname', age=$age, birthday='$birthday', address='$address' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully. ";
        echo "<button onclick=\"location.href='main.php'\">Go to Main Page</button>";
    } else {
        echo "Error updating user: " . $conn->error;
    }
}

// Get the user's information from the database based on the login credentials
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    $sql = "SELECT * FROM register WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["id"] = $row["id"];
    } else {
        echo "Error: User not found.";
    }
}

// Close the MySQL connection
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css.css">
    <title>Update User</title>
</head>
<body>

    <div class="container">
    <form method="POST" action="main.php">
    <h1>Update User</h1>
    
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>First Name:</label>
        <input type="text" name="fname" value="<?php echo $row['fname']; ?>"><br>
        <label>Last Name:</label>
        <input type="text" name="lname" value="<?php echo $row['lname']; ?>"><br>
        <label>Age:</label>
        <input type="number" name="age" value="<?php echo $row['age']; ?>"><br>
        <label>Birthday:</label>
        <input type="date" name="birthday" value="<?php echo $row['birthday']; ?>"><br>
        <label>Address:</label>
        <textarea name="address"><?php echo $row['address']; ?></textarea><br>
        <button type="submit">Update</button>
   </form>
   </div>
</body>
</html>

