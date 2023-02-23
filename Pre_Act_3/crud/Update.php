<?php
	include 'Connect.php';
    $Number=$_GET['updateNumber'];
    $sql="Select * from `crud` where Number=$Number";
    $result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		$Number=$row['Number'];	
		$FirstName=$row['FirstName'];
		$MiddleName=$row['MiddleName'];
		$LastName=$row['LastName'];
		$Age=$row['Age'];
		$Birthday=$row['Birthday'];
		$Address=$row['Address'];	
	if(isset($_POST['submit'])){
		$FirstName=$_POST['FirstName'];
		$MiddleName=$_POST['MiddleName'];
		$LastName=$_POST['LastName'];
		$Age=$_POST['Age'];
		$Birthday=$_POST['Birthday'];
		$Address=$_POST['Address'];

	$sql="update `crud` set Number=$Number,FirstName='$FirstName',MiddleName='$MiddleName',
    LastName='$LastName',Age='$Age',Birthday='$Birthday',Address='$Address' where Number=$Number";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "Data is successfully updated"; 
		//header('location:Display.php');
	}
	else{
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>CRUD Operation</title>
  </head>
  <body>
	<div class="container">
		<form method = "post">
 			<div class="form-group">
  			<label>First Name</label>
    			<input type="text" class="form-control" placeholder="Enter First Name" name="FirstName"
                <?php echo $FirstName?>>
  			</div>
			<div class="form-group">
  			<label>Middle Name</label>
    			<input type="text" class="form-control" placeholder="Enter Middle Name" name="MiddleName"
                <?php echo $MiddleName?>>
  			</div>
			<div class="form-group">
  			<label>Last Name</label>
    			<input type="text" class="form-control" placeholder="Enter Last Name" name="LastName"
                <?php echo $LastName?>>
  			</div>
			<div class="form-group">
  			<label>Age</label>
    			<input type="text" class="form-control" placeholder="Enter Age" name="Age"
                <?php echo $Age?>>
  			</div>
			<div class="form-group">
  			<label>Birthday</label>
    			<input type="text" class="form-control" placeholder="Enter Birthday" name="Birthday"
                <?php echo $Birthday?>>
  			</div>
			<div class="form-group">
  			<label>Address</label>
    			<input type="text" class="form-control" placeholder="Enter Address" name="Address"
                <?php echo $Address?>>
  			
  			<button type="submit" class="btn btn-primary" name='submit'>Update</button>
			</form>
   	</div>

  </body>
</html>