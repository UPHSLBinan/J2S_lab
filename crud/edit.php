<?php
	include('conn.php');
 
	$id = $_GET['id'];
 
	$firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
	$lastname=$_POST['lastname'];
    $age=$_POST['age'];
    $bday=$_POST['birthday'];
	$address=$_POST['address'];
 
	mysqli_query($conn," UPDATE `userprofile` SET `firstname`= '$firstname',`middlename`='$middlename',`lastname`='$lastname',`age`='$age',`birthday`='$bday',`address`='$address' WHERE `id` = '$id'");
	header('location: index.php');
 
?>