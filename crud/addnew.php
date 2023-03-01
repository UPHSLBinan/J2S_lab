<?php
	include('conn.php');
	
	$firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
	$lastname=$_POST['lastname'];
    $age=$_POST['age'];
    $bday=$_POST['birthday'];
	$address=$_POST['address'];
	
	mysqli_query($conn, "INSERT INTO `userprofile`(`id`, `firstname`, `middlename`, `lastname`, `age`, `birthday`, `address`) VALUES (NULL, '$firstname' , '$middlename', '$lastname', '$age', '$bday', '$address')");
	header('location:index.php');

?>