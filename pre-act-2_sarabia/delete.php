<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $ID=$_GET['deleteid'];

    $sql="delete from `act2` where id=$ID";
    $result=mysqli_query($con, $sql);
    if($result){
       // echo "Deleted Successfully";
       header('location:display.php');
    }else{
        die(mysqli_error($con));                                           
    } 
}
?>