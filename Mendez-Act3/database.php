<?php
$hostName="localhost";
$db_user = "root";
$db_pass = "";
$dbName= "web";

$db = new PDO("mysql:host=$hostName;dbname=$dbName", $db_user, $db_pass);

$conn = mysqli_connect($hostName,$db_user,$db_pass,$dbName);

if(!$conn)
{
die("Ooops! Something went wrong in the connection");
}


$dsn = "mysql:host=localhost;dbname=$dbName;charset=utf8mb4";


try {
  $pdo = new PDO($dsn, $db_user, $db_pass);
} catch (PDOException $e) {
  echo "Error connecting to database: " . $e->getMessage();
}

?>