<?php
include "connect.php";
$id=$_GET['updateid'];
$sql="SELECT * FROM users WHERE id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$username=$row['username'];
$password=$row['password'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$age=$row['age'];
$birthday=$row['birthday'];
$address=$row['address'];


if(isset($_POST['update'])) {
    $username = $_POST['username'];
    $oassword = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];

    $sql="UPDATE users set id='$id',username='$username', password='$password', firstname='$firstname',lastname='$lastname',
    age='$age',birthday='$birthday',address='$address' WHERE id=$id";

    $result=mysqli_query($conn,$sql);
    if ($result) {
        //echo "Data has been updated successfully!";
        header('location:profile.php');
    }
    else {
        die(mysqli_error($conn));
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <style>
	.container1 {
  		background: #93BFCF;
  		max-width: 800px;
  		margin: 100px auto;
  		padding: 50px;
  		box-shadow: 5px 10px #888888;
	}
    </style>

    <title> Blog | Erispe </title>
  </head>
  <body style="background-color: #6096B4;">
  <div class="container text-center">
    <br><br>
    <h1>UPDATE FORM</h1>
    <p>Please update your details/information here:</p>
  </div>

    <div class="container1 my-5">
    <form method="post">
    <div class="row g-3 mb-4">
    <div class="col">
             <label for="username">Username</label>
             <input type="text" class="form-control" id="username" name="username" placeholder="Enter your first name" 
             autocomplete="off" value=<?php echo $username;?>>
    </div>
    <div class="col">
             <label for="password">Password</label>
             <input type="password" class="form-control" id="password" name="password" placeholder="Enter your last name" 
             autocomplete="off" value=<?php echo $password;?>>
    </div>
    </div>
    <div class="row g-3 mb-4">
    <div class="col">
             <label for="firstname">First Name</label>
             <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name" 
             autocomplete="off" value=<?php echo $firstname;?>>
    </div>
    <div class="col">
             <label for="lastname">Last Name</label>
             <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name" 
             autocomplete="off" value=<?php echo $lastname;?>>
    </div>
    </div>
    <div class="form-group">
             <label for="age">Age</label>
             <input type="number" class="form-control" id="age" name="age" placeholder="Choose your age" minlength="1" 
             maxlength="80" autocomplete="off" value=<?php echo $age;?>>
    </div>
    <div class="form-group">
             <label for="birthday">Birthday</label>
             <input type="date" class="form-control" id="birthday" name="birthday" autocomplete="off" value=<?php echo $birthday;?>>
    </div>
    <div class="form-group">
             <label for="address">Address</label>
             <input type="text" class="form-control" id="address" name="address" autocomplete="off" value=<?php echo $address;?>>
    </div>
            <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
</form>

    </div>

  </body>
</html>