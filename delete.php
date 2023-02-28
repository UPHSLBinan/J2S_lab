<?php
include 'conn.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql ="delete from `userprofile` where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "The information has been deleted";
        header('location:display.php');
}
else
{
die(mysqli_error($con));
}
}
?> 