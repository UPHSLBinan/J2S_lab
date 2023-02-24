<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Display </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
</head>
<body style="background-color:#2B3467;">
    
<div class="text-center" style="background-color: #BAD7E9;">
    <div class="container p-5">
        <img src="logo.png" alt="logo" width="150" height="130">
        <h1>INFORMATION TABLE</h1>
        <p>Below are the information/details that are also stored in the database:</p>
</div>
</div>

<div class="table-responsive-sm" style="color: white; text-align:center;">
<table class="table my-5">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Age</th>
      <th scope="col">Birthday</th>
      <th scope="col">Address</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

  <?php

    $sql="SELECT * FROM users";
    $result=mysqli_query($conn,$sql);
    if ($result) {
        while($row=mysqli_fetch_assoc($result)) {
            $id=$row['id'];
            $firstname=$row['firstname'];
            $middlename=$row['middlename'];
            $lastname=$row['lastname'];
            $age=$row['age'];
            $birthday=$row['birthday'];
            $address=$row['address'];
            echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$firstname.'</td>
      <td>'.$middlename.'</td>
      <td>'.$lastname.'</td>
      <td>'.$age.'</td>
      <td>'.$birthday.'</td>
      <td>'.$address.'</td>
      <td>
      <button class="btn btn-warning"><a href="update.php?updateid='.$id.'" class="text-dark"> UPDATE </a></button>
      <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-dark"> DELETE </a></button>
      </td>
    </tr>';
        }

    }

  ?>
   

  </tbody>
</table>

<div class="container">
    <center><button class="btn btn-primary my-5"><a href="CrudAct1.php" class="text-light">ADD USER </a></button></center>
    <p style="text-align:center;">&copy; Erispe, M.A. 2023</p>

</div>

</div>
</body>
</html>