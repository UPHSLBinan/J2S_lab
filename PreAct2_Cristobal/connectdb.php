<?php

$con = new mysqli('localhost','lance','lance','userprofile');

if(!$con) {
    die(mysqli_error($con));
}


?>