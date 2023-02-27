<?php

include 'Connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD ACT2</title>
 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">

</div>
<button class="btn btn-primary my-5"><a href="Forms.php" class="text-light">Add user</a></button>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Account Number</th>
      <th scope="col">Firstname</th>
      <th scope="col">Middlename</th>
      <th scope="col">Lastname</th>
      <th scope="col">Age</th>
      <th scope="col">Email</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>

<?php

$sql = "SELECT * FROM user";
$result = mysqli_query($con, $sql);
if($result){
	while($row = mysqli_fetch_assoc($result)){
	$id = $row['id'];
	$Firstname = $row['Firstname'];
	$Middlename = $row['Middlename'];
	$Lastname = $row['Lastname'];	
	$Age = $row['Age'];
	$Email = $row['Email'];
	$Detail = $row['Details'];

	echo' <tr>
      <th scope="row">'.$id.'</th>
      <td>'.$Firstname.'</td>
      <td>'.$Middlename.'</td>
      <td>'.$Lastname.'</td>
      <td>'.$Age.'</td>
      <td>'.$Email.'</td>
      <td>'.$Detail.'</td>
      <td>
	<button class="btn btn-primary"><a href="Update.php?updateid='.$id.'" class="text-light">Update</a></button>
	<button class="btn btn-danger"><a href="Delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>

      </td>
    </tr>';
  }
}

?>



</tbody>
</table>
</body>
</html>