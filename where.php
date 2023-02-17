<?php
$servername = "localhost";
$username = "myadmin";
$password = "myadmin";
$dbname = "sanchez";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Fname,Lname FROM users WHERE Lname='sanchez'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo " Name: " . $row["Fname"]. " ".$row['Lname']." <br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>