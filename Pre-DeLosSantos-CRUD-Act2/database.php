<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "userprofile";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if(!$conn){
   die("There were some errors in the connection"); 
}

?>