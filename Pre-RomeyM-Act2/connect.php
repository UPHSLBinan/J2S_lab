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

// If the user submitted the registration form, insert their information into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $age = $_POST["age"];
    $birthday = $_POST["birthday"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO register (fname, lname, age, birthday, address, username, password)
            VALUES ('$fname', '$lname', '$age', '$birthday', '$address', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the MySQL connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<h1>Welcome User</h1>
</head>
<body>
</form>

	<a href="login.php">Already have an account? Login here.</a>

</body>
</html>