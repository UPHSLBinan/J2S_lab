<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $firstname=$_POST['firstname']; 
    $middlename=$_POST['middlename']; 
    $lastname=$_POST['lastname']; 
    $age=$_POST['age']; 
    $birthday=$_POST['birthday']; 
    $address=$_POST['address'];

    $sql="insert into `act2` (firstname,middlename,lastname,age,birthday,address)
    values('$firstname','$middlename','$lastname','$age','$birthday','$address')";
    $result=mysqli_query($con,$sql);
    if($result){
      //  echo "Data inserted successfully";
      header('location:display.php');
}else{
        die(mysqli_error($con));
}
}
 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pre-act-2_sarabia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" >
  </head>
  <body>
  <h1 align="center">Fill out form</h1>
     <div class="container my-5">
    <form  method="post">
      <div class="mb-3">
        <label>Firstname</label>
        <input type="text" class="form-control" placeholder="Enter your Firstname" name="firstname" autocomplete = "off">
      </div>
      <div class="mb-3">
        <label>Middlename</label>
        <input type="text" class="form-control" placeholder="Enter your Middlename" name="middlename" autocomplete = "off">
      </div>
      <div class="mb-3">
        <label>Lastname</label>
        <input type="text" class="form-control" placeholder="Enter your Lastname" name="lastname" autocomplete = "off">
      </div>
      <div class="mb-3">
        <label>Age</label>
        <input type="number" class="form-control" placeholder="Enter your Age" name="age" autocomplete = "off">
      </div>
      <div class="mb-3">
        <label>Birthday</label>
        <input type="date" class="form-control" placeholder="Enter your Birthday" name="birthday" autocomplete = "off">
      </div>
      <div class="mb-3">
        <label>Address</label>
        <textarea class="form-control" placeholder="Enter your Address" name="address"></textarea>
      </div>
      <button type="submit" class="btn btn-dark" name="submit">Submit</button>
    </form>
  </div>
    
  </body>
</html>
