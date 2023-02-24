<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "activity3";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if(!$conn){
   die("There were some errors in the connection"); 
}

?>