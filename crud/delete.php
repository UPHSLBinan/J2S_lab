<?php
	include('conn.php');
	$id=$_GET['id'];
	mysqli_query($conn," DELETE FROM `userprofile` WHERE id= '$id'");
	header('location: index.php');
 
?>