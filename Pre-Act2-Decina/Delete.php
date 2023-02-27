<?php
include 'Connect.php';
if(isset($_GET['deleteid'])){
	$id=$_GET['deleteid'];
	
	$sql="delete from user where id=$id";
	$result=mysqli_query($con,$sql);
	if($result){
		//echo "Deleted Successfully";
		header('location:Display.php');
	}else{
		die(mysqli_error($con));
	}
}
?>