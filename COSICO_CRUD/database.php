<?php
$hostName="localhost";
$db_user = "marcus";
$db_pass = "marcus";
$dbName= "userprofile";


$conn = mysqli_connect($hostName,$db_user,$db_pass,$dbName);

if(!$conn)
{
die("Ooops! Something went wrong in the connection");
}

?>