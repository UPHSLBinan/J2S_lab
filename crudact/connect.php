<?php

$conn= new mysqli ('localhost', 'root', '', 'userprofile');

if(!$conn) {
    die (mysqli_error($conn));
}
?>