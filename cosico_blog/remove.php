<?php
require_once 'database.php';

if(isset($_GET['dlt_id'])){
	$id=$_GET['dlt_id'];


$sql = "delete from 'users' where id = '$id'";
$result= mysqli_query ($conn,$sql);

if($result)
{
header('location:display.php');}
else{
die("Ooops! Something went wrong in the connection");
}

}
 






?>

