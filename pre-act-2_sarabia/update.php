<?php
include 'connect.php';
$ID=$_GET['updateid'];
$sql="Select * from `act2` where id=$ID";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$Firstname=$row['Firstname'];
$Middlename=$row['Middlename'];
$Lastname=$row['Lastname'];
$Age=$row['Age'];
$Birthday=$row['Birthday'];
$Address=$row['Address'];

if(isset($_POST['submit'])){
    $firstname=$_POST['firstname']; 
    $middlename=$_POST['middlename']; 
    $lastname=$_POST['lastname']; 
    $age=$_POST['age']; 
    $birthday=$_POST['birthday']; 
    $address=$_POST['address'];

    $sql="update `act2` set id=$ID, firstname='$firstname', middlename='$middlename', lastname='$lastname', age='$age', birthday='$birthday', address='$address' where id=$ID";
    $result=mysqli_query($con,$sql);
    if($result){
      //  echo "update successfully";
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
     <div class="container my-5">
    <form  method="post">
      <div class="mb-3">
        <label>Firstname</label>
        <input type="text" class="form-control" placeholder="Enter your Firstname" name="firstname" autocomplete = "off" value=<?php  echo $Firstname;?>>
      </div>
      <div class="mb-3">
        <label>Middlename</label>
        <input type="text" class="form-control" placeholder="Enter your Middlename" name="middlename" autocomplete = "off" value=<?php  echo $Middlename;?>>
      </div>
      <div class="mb-3">
        <label>Lastname</label>
        <input type="text" class="form-control" placeholder="Enter your Lastname" name="lastname" autocomplete = "off" value=<?php  echo $Lastname;?>>
      </div>
      <div class="mb-3">
        <label>Age</label>
        <input type="number" class="form-control" placeholder="Enter your Age" name="age" autocomplete = "off" value=<?php  echo $Age;?>>
      </div>
      <div class="mb-3">
        <label>Birthday</label>
        <input type="date" class="form-control" placeholder="Enter your Birthday" name="birthday" autocomplete = "off" value=<?php  echo $Birthday;?>>
      </div>
      <div class="mb-3">
        <label>Address</label>
        <textarea class="form-control" placeholder="Enter your Address" name="address" value=<?php  echo $Address;?>></textarea>
      </div>
      <button type="submit" class="btn btn-dark" name="submit">Update</button>
    </form>
  </div>
    
  </body>
</html>
