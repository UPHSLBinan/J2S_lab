<?php
include 'connection.php';

if(isset($_POST['submit'])) {
    $firstname=$_POST['firstname']; 
    $middlename=$_POST['middlename']; 
    $lastname=$_POST['lastname']; 
    $age=$_POST['age']; 
    $birthday=$_POST['birthday']; 
    $address=$_POST['address']; 


    $sql = "insert into `troy` (firstname,middlename,lastname,age,birthday,address)
    values('$firstname','$middlename','$lastname','$age','$birthday','$address')";

    $result=mysqli_query($con,$sql);
    if($result){
       // echo "Data Inserted Successfully";
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
   
    <span class="border border-light"></span>

    <title>User Profile</title> 
  </head>
  <body>
  <h1>User Information</h1>
 
   <div class="container-fluid my-5">

   <form method = "post">
  <div class="form-floating">
    <label for="floatingInput" >First Name</label>
    <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="firstname" autocomplete = "off">
</div>

<div class="form-group">
    <label >Middle Name</label>
    <input type="text" class="form-control"  placeholder="Middle Name" name="middlename" autocomplete = "off">
</div>

<div class="form-group">
    <label >Last Name</label>
    <input type="text" class="form-control"  placeholder="Last Name" name="lastname" autocomplete = "off">
</div>

<div class="form-group">
    <label >Age</label>
    <input type="text" class="form-control"  placeholder="Enter Your Age" name="age" autocomplete = "off">
</div>

<div class="form-group">
    <label >Birthday</label>
    <input type="text" class="form-control"  placeholder="Enter Your Birthday" name="birthday" autocomplete = "off">
</div>

<div class="form-group">
    <label >Address</label>
    <input type="text" class="form-control"  placeholder="Enter Your Address" name="address" autocomplete = "off">
</div>
    
  <button type="submit" class="btn btn-outline-primary" name = "submit">Submit</button>
</form>
   </div>

    
    
  </body>
</html> 