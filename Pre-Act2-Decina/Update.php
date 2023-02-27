<?php
include 'Connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM user WHERE id=$id";
$result = mysqli_query($con, $sql);
if (!$result) {
  die(mysqli_error($con));
}
$row = mysqli_fetch_assoc($result);
$firstname = $row['Firstname'];
$middlename = $row['Middlename'];
$lastname = $row['Lastname'];
$age = $row['Age'];
$email = $row['Email'];
$details = $row['Details'];


if (isset($_POST['submit'])) {
    $Firstname = $_POST['firstname'];
    $Middlename = $_POST['middlename'];
    $Lastname = $_POST['lastname'];
    $Age = $_POST['age'];
    $Email = $_POST['email'];
    $Details = $_POST['details'];

    $sql = "UPDATE user SET firstname='$Firstname',middlename='$Middlename',
lastname='$Lastname',age='$Age',email='$Email',details='$Details' WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Data Updated successfully";
        header('location:Display.php');
    } else {
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
            <input type="text" class="form-control" placeholder="Enter your firstname" name="firstname" autocomplete="off" value=<?php echo $firstname;?>>
        </div>

        <div class="form-group">
            <label>Middlename</label>
            <input type="text" class="form-control" placeholder="Enter your middlename" name="middlename" autocomplete="off" value=<?php echo $middlename;?>>
        </div>

        <div class="form-group">
            <label>Lastname</label>
            <input type="text" class="form-control" placeholder="Enter your lastname" name="lastname" autocomplete="off" value=<?php echo $lastname;?>>
        </div>

        <div class="form-group">
            <label>Age</label>
            <input type="age" class="form-control" placeholder="Enter your age" name="age" autocomplete="off" value=<?php echo $age;?>>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" value=<?php echo $email;?>>
        </div>

        <div class="form-group">
            <label>Details</label>
            <input type="Details" class="form-control" placeholder="What's interesting about you?" name="details" autocomplete="off" value=<?php echo $details;?>>
	</div>
	<button type="submit" class="btn btn-primary" name="submit">Update</button>
