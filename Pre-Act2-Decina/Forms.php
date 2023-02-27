<?php
include 'Connect.php';
if(isset($_POST['submit'])){
    $Firstname=$_POST['firstname'];
    $Middlename=$_POST['middlename'];
    $Lastname=$_POST['lastname'];
    $Age=$_POST['age'];
    $Email=$_POST['email'];
    $Details=$_POST['details'];

    $sql="INSERT INTO user (firstname, middlename, lastname, age, email, details)
    VALUES ('$Firstname', '$Middlename', '$Lastname', '$Age', '$Email', '$Details')";
    $result= mysqli_query($con,$sql);
    if($result){
        // echo "Data inserted successfully";
	header('location:Display.php');
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <title>CRUD ACT</title>
</head>
<body>

<div class="container my-10">
    <form method="post">
        <div class="form-group">
            <label>Firstname</label>
            <input type="text" class="form-control" placeholder="Enter your firstname" name="firstname" autocomplete="off">
        </div>

        <div class="form-group">
            <label>Middlename</label>
            <input type="text" class="form-control" placeholder="Enter your middlename" name="middlename" autocomplete="off">
        </div>

        <div class="form-group">
            <label>Lastname</label>
            <input type="text" class="form-control" placeholder="Enter your lastname" name="lastname" autocomplete="off">
        </div>

        <div class="form-group">
            <label>Age</label>
            <input type="age" class="form-control" placeholder="Enter your age" name="age" autocomplete="off">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off">
        </div>

        <div class="form-group">
            <label>Details</label>
            <input type="Details" class="form-control" placeholder="What's interesting about you?" name="details" autocomplete="off">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

</body>
</html>
