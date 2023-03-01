<?php
include 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width,initial-scale=1.0">
       <title>pre-act-2_sarabia</title>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
<button class="btn btn-dark my-5" ><a href="user.php" class="text-light">Add user</a></button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Middlename</th>
      <th scope="col">Lastname</th>
      <th scope="col">Age</th>
      <th scope="col">Birthday</th>
      <th scope="col">Address</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>

<?php

$sql="Select * from `act2`";
$result=mysqli_query($con, $sql);
if($result){
  while($row=mysqli_fetch_assoc($result)){
      $ID=$row['ID'];
      $Firstname=$row['Firstname'];
      $Middlename=$row['Middlename'];
      $Lastname=$row['Lastname'];
      $Age=$row['Age'];
      $Birthday=$row['Birthday'];
      $Address=$row['Address'];
      echo ' <tr>
      <th scope="row">'.$ID.'</th>
      <td>'.$Firstname.'</td>
      <td>'.$Middlename.'</td>
      <td>'.$Lastname.'</td>
      <td>'.$Age.'</td>
      <td>'.$Birthday.'</td>
      <td>'.$Address.'</td>
    <td>
    <button class="btn btn-dark" "btn btn-outline-light"><a href="update.php? updateid='.$ID.'" class="text-light">Update</a></button>
    <button class="btn btn-danger" "btn btn-outline-danger"><a href="delete.php? deleteid='.$ID.'" class="text-light">Delete</a></button>
    </td>
    </tr>';
  }
}

?>




  </tbody>
</table>

</div>



</body>
</html>