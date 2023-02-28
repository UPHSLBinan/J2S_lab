<?php
include 'conn.php';
?>


<!DOCTYPE html>
<html lang ="en">
    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name ="viewport" content="width=device-width,initial-scale=1.0">
        <title>User Information</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>


<div class="container">
    <button class="btn btn-primary my-5"><a href ="index.php" class="text-light">Add User</a>
       </button>
       <table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID#</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Age</th>
      <th scope="col">Birthday</th>
      <th scope="col">Address</th>
      <th scope="col"></th>
    </tr>
    </tr>
    </tr>
    </tr>
  </thead>
  <tbody>

  <?php
    $sql="Select * from `userprofile`";
    $result=mysqli_query($con,$sql);
    if($result){
        while ($row=mysqli_fetch_assoc($result))
{

            $id=$row['id'];
            $fname=$row['firstname'];
            $mname=$row['middlename'];
            $lname=$row['lastname'];
            $age=$row['age'];
            $bday=$row['birhday'];
            $add=$row['address'];     
            echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$fname.'</td>
            <td>'.$mname.'</td>
            <td>'.$lname.'</td>
            <td>'.$age.'</td>
            <td>'.$bday.'</td>
            <td>'.$add.'</td>
            <td>
    <button class = "btn btn-primary"><a href="update.php?editid='.$id.'"class="text-light">Edit</a></button>
    <button class = "btn btn-danger"><a href="delete.php?deleteid='.$id.'"class="text-light">Delete</a></button>
</td>
<tr>';  
}
}        
?>
</tbody>
</table>
</div>

</body>
</html>