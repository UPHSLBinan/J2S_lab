<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mejarito";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get input data
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$age = $_POST['age'];
$email = $_POST['email'];
$detail = $_POST['detail'];

// Update user
$sql = "UPDATE users SET FirstName='$first_name', LastName='$last_name', Age='$age', EMail='$email', Detail='$detail' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "User updated successfully";
        // Redirect back to the HTML file
        header("Location: index.php");
        exit();
} else {
    echo "Error updating user: " . $conn->error;
}

// Close database connection
$conn->close();
?>
