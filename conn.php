<?php

$con=new mysqli('localhost','admin','admin','admin');

if(!$con)
{
die (mysqli_error($con));
}
?>