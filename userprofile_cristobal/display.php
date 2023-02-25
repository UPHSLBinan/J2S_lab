<?php
include 'connectdb.php';
?>


<!DOCTYPE html>
<html lang ="en">
    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name ="viewport" content="width=device-width,initial-scale=1.0">
        <title>User Information</title>\
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

</head>
<body>


<div class="container">
    <button class="btn btn-outline-primary my-5"><a href ="user.php" class="text-dark">Add User</a>
       </button>

       <table class="table table-hover">
  <thead class="thead-dark">
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
    $sql="Select * from `data`";
    $result=mysqli_query($con,$sql);
    if($result){
        while ($row=mysqli_fetch_assoc($result)){

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
    <button class = "btn btn-primary"><a href="edit.php?editid='.$id.'"class="text-light">Edit</a></button>
    <button class = "btn btn-danger"><a href="delete.php?deleteid='.$id.'"class="text-dark">Delete</a></button>
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