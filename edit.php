<?php
include 'connection.php';
$id=$_GET['editid'];
$sql="Select *from `troy` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$firstname=$row['firstname'];
$middlename=$row['middlename'];
$lastname=$row['lastname'];
$age=$row['age'];
$birthday=$row['birthday'];
$address=$row['address'];

if(isset($_POST['submit'])) {
    $firstname=$_POST['firstname']; 
    $middlename=$_POST['middlename']; 
    $lastname=$_POST['lastname']; 
    $age=$_POST['age']; 
    $birthday=$_POST['birthday']; 
    $address=$_POST['address']; 


    $sql = "update `data` set id=$id, firstname='$firstname',middlename='$middlename',lastname='$lastname',age='$age',birthday='$birthday',address='$address'
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




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <title>User Profile</title> 
  </head>
  <body>
   <div class="container my-5">

   <form method = "post">
  <div class="form-group">
    <label >First Name</label>
    <input type="text" class="form-control"  placeholder="First Name" name="firstname" autocomplete = "off" value =<?php echo $firstname; ?>>
</div>

<div class="form-group">
    <label >Middle Name</label>
    <input type="text" class="form-control"  placeholder="Middle Name" name="middlename" autocomplete = "off" value = <?php echo $middlename;?>>
</div>

<div class="form-group">
    <label >Last Name</label>
    <input type="text" class="form-control"  placeholder="Last Name" name="lastname" autocomplete = "off"value = <?php echo $lastname;?>>
</div>

<div class="form-group">
    <label >Age</label>
    <input type="text" class="form-control"  placeholder="Enter Your Age" name="age" autocomplete = "off"value = <?php echo $age;?>>
</div>

<div class="form-group">
    <label >Birthday</label>
    <input type="text" class="form-control"  placeholder="Enter Your Birthday" name="birthday" autocomplete = "off"value = <?php echo $birthday;?>>
</div>

<div class="form-group">
    <label >Address</label>
    <input type="text" class="form-control"  placeholder="Enter Your Address" name="address" autocomplete = "off"value = <?php echo $address;?>>
</div>
    
  <button type="submit" class="btn btn-primary" name = "submit">Edit</button>
</form>
   </div>

    
    
  </body>
</html> 