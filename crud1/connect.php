<?php

$serverName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "mendez";

$conn = new mysqli($serverName,$dbUser,$dbPassword,$dbName);
// Check connection
if (!$conn){
  die(mysqli_error($conn));
}
?>
