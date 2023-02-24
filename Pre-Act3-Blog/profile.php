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
<body style="background-color:#404258;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="logo.png" width="60" height="60" alt="">
        <a class="navbar-brand" href="#">MYNX</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
    aria-expanded="false" aria-label="Toggle navigation">
    
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
 
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html"> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            News
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Social Media</a>
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Local</a>
          <a class="dropdown-item" href="#">Historical</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Blogs
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Marketing</a>
          <a class="dropdown-item" href="#">Business</a>
          <a class="dropdown-item" href="#">Websites</a>
          <a class="dropdown-item" href="#">Tutorials</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"> About us <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="signup.php"> Sign up <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="signin.php"> Sign in <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="profile.php"> Profiles <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    
<div class="text-center" style="background-color: whitesmoke;">
    <div class="container p-5">
        <h1>INFORMATION TABLE</h1>
        <p>Below are the information/details that are also stored in the database:</p>
</div>
</div>

<div class="table-responsive-sm" style="color: white; text-align:center;">
<table class="table my-5">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">First Name</th>
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
            $username=$row['username'];
            $password=$row['password'];
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $age=$row['age'];
            $birthday=$row['birthday'];
            $address=$row['address'];
            echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$username.'</td>
      <td>'.$password.'</td>
      <td>'.$firstname.'</td>
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
    <p style="text-align:center;">&copy; Erispe, M.A. 2023</p>

</div>

</div>
</body>
</html>