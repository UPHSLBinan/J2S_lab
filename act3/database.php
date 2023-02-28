<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "users";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}
$db = new PDO('mysql:host=' . $hostName . ';dbname=' . $dbName, $dbUser, $dbPassword);
$dsn = "mysql:host=localhost;dbname=$dbName;charset=utf8mb4";

try {
  $pdo = new PDO($dsn, $dbUser,$dbPassword);
} catch (PDOException $e) {
  echo "Error connecting to database: " . $e->getMessage();
}
?>
