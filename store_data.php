<?php
// establish database connection
$host = "localhost"; // your database host name
$username = "Marcus"; // your database username
$password = "Marcus"; // your database password
$dbname = "cosico"; // your database name
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// get form data
$FirstName = $_POST["FirstName"];
$LastName = $_POST["LastName"];
$Age = $_POST["Age"];
$Email = $_POST["Email"];
$Detail = $_POST["Detail"];

// insert data into database
$sql = "INSERT INTO users (FirstName, LastName, Age, Email, Detail)
VALUES ('".$FirstName."', '".$LastName."', '".$Age."', '".$Email."', '".$Detail."')";
if (mysqli_query($conn, $sql)) {
  echo "Data stored successfully.";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// close database connection
mysqli_close($conn);
?>