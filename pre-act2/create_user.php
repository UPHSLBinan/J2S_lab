<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $detail = $_POST["detail"];

    // Create a new connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mejarito";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (FirstName, LastName, Age, EMail, Detail) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $first_name, $last_name, $age, $email, $detail);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "New user created successfully.";

        // Redirect back to the HTML file
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>
