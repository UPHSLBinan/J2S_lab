<?php
require_once "database.php";



?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>USERS</title>
</head>
<body>

<div class ="container">
<button class = "btn btn-primary my-5"> <a href ="main.php" class= "text-light">Add Account </a>
</button>

<table class="table table-success table-striped">
  <thead>
  <tr>

<th scope= "col"> username </th>
<th scope= "col"> First Name </th>
<th scope= "col"> Middle Name </th>
<th scope= "col"> Last Name </th>
<th scope= "col"> Age </th>
<th scope= "col"> Birthday </th>
<th scope= "col"> Address </th>
<th scope= "col"> Option </th>

</tr>
</thead>
<tbody>

<?php

$sql = "SELECT * FROM users";
$result= mysqli_query($conn,$sql);
if($result){
while($row = mysqli_fetch_assoc ($result)){
$username = $row['username'];
$firstname=$row['firstname'];
$middlename=$row['middlename'];
$lastname=$row['lastname'];
$age=$row['age'];
$birthday=$row['birthday'];
$address=$row['address'];

echo '<tr>
<th scope = "row">'.$username.'</th> 
<td>'.$firstname.'</td>
<td>'.$middlename.'</td>
<td>'.$lastname.'</td>
<td>'.$age.'</td>
<td>'.$birthday.'</td>
<td>'.$address.'</td>
<td>

<button class = "btn btn-danger"><a href="remove.php? dlt_id='.$username.'"style="text-decoration:none" class="text-white">Delete</a></button>


<button class = "btn btn-primary"><a href="update.php? updateid='.$username.'" style="text-decoration:none" class="text-white">Update</a></button>

</td>
</tr>';
}
}



?>




</table>





</div>

</body>
</html>