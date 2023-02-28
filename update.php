<?php
include 'conn.php';
$id=$_GET['editid'];
$sql="Select *from `userprofile` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$fname=$row['firstname'];
$mname=$row['middlename'];
$lname=$row['lastname'];
$age=$row['age'];
$bday=$row['birhday'];
$add=$row['address'];

if(isset($_POST['submit'])) {
    $fname=$_POST['firstname']; 
    $mname=$_POST['middlename']; 
    $lname=$_POST['lastname']; 
    $age=$_POST['age']; 
    $bday=$_POST['birhday']; 
    $add=$_POST['address']; 


    $sql = "update `userprofile` set id=$id, firstname='$fname',middlename='$mname',lastname='$lname',age='$age',birhday='$bday',address='$add'
    where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
       //echo "Edit Successful";
       header('location:display.php');
        }else{
            die(mysqli_error($con));
        }
}

?>
