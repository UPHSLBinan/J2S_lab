<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "form_activity";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
  die("There were some errors.");
}
