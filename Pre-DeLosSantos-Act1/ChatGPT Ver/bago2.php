<?php


// Set up the database connection
$servername = "localhost";
$username = "user";
$password = "useruser1";
$dbname = "delossantos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$email = $_POST['email'];
$detail = $_POST['detail'];

 if(isset($_POST["submit"])){

            echo "<h2>Submitted Information:</h2>";
            echo "<p>Last Name: " . $lname . "</p>";
            echo "<p>First Name: " . $fname . "</p>";
            echo "<p>Age: " . $age . "</p>";
            echo "<p>Email: " . $email . "</p>";
            echo "<p>Detail: " . $detail . "</p>";
}

// Prepare and execute the SQL statement to insert the data into the database


        $sql = "INSERT INTO users  VALUES ('$fname','$lname','$age','$email','$detail')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>Submitted Information:"
                . " "
                . " ";
 
            echo nl2br("\n$fname\n $lname\n "
                . "$age\n $email\n $detail");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
