<?php

$conn= new mysqli ('localhost', 'root', '', 'erispe_blog');

if(!$conn) {
    die (mysqli_error($conn));
}
?>