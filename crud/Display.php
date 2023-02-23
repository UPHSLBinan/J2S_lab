<?php
include 'Connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge ">
	<meta name= "viewport" content="width=device-width,initial-scale=1.0">
	<title>CRUD Operation</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<div class="container">
		<button class="btn btn-primary my-5"><a href="Create.php" class="text-light">Add User</a></button>
	
	<table class="table">
  <thead>
    <tr>
	  <th scope="col">#</th>	
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Age</th>
	  <th scope="col">Birthday</th>
      <th scope="col">Address</th>
	  <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    	<?php
		$sql="Select * from `crud`";
		$result=mysqli_query($con,$sql);
		if($result){
			while($row=mysqli_fetch_assoc($result)){
			$Number=$row['Number'];	
			$FirstName=$row['FirstName'];
			$MiddleName=$row['MiddleName'];
			$LastName=$row['LastName'];
			$Age=$row['Age'];
			$Birthday=$row['Birthday'];
			$Address=$row['Address'];

			echo '
				<tr>
					<td>'.$Number.'</td>
					<td>'.$FirstName.'</td>
					<td>'.$MiddleName.'</td>
					<td>'.$LastName.'</td>
					<td>'.$Age.'</td>
					<td>'.$Birthday.'</td>
					<td>'.$Address.'</td>
					<td>
						<button class="btn btn-primary"><a href="Update.php? updateNumber='.$Number.'" class="text-light">Update</a></button>
						<button class="btn btn-danger"><a href="Delete.php? deleteNumber='.$Number.'" class="text-light">Delete</a></button>
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