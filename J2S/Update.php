<?php
include 'Connect.php';
$Number=$_GET['updateNumber'];
$sql="Select * from `crud` where Number=$Number";
$result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $FirstName=$row['FirstName'];
    $LastName=$row['LastName'];
    $Age=$row['Age'];
    $Birthday=$row['Birthday'];
    $Address=$row['Address'];	

    if(isset($_POST['submit'])){
    $FirstName=$_POST['FirstName'];
    $LastName=$_POST['LastName'];
    $Age=$_POST['Age'];
    $Birthday=$_POST['Birthday'];
    $Address=$_POST['Address'];
	
    $sql="update `crud` set Number=$Number,FirstName='$FirstName',LastName='$LastName',Age='$Age',Birthday='$Birthday',Address='$Address' where Number=$Number";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "Data is successfully updated"; 
		
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

    <title>CrudOperation</title>
  </head>
  <body>

    
	<div class="container">

  <h1>Update the account</h1>

		<form method = "post">
 			<div class="form-group">
  			<label>First Name</label>
    			<input type="text" class="form-control" placeholder="Enter First Name" name="FirstName" 
                value=<?php echo $FirstName;?>>
  			</div>
			<div class="form-group">
  			<label>Last Name</label>
    			<input type="text" class="form-control" placeholder="Enter Last Name" name="LastName"   
                value=<?php echo $LastName;?>>
  			</div>
			<div class="form-group">
  			<label>Age</label>
    			<input type="text" class="form-control" placeholder="Enter Age" name="Age"  
                value=<?php echo $Age;?>>
  			</div>
			<div class="form-group">
  			<label>Birthday</label>
    			<input type="date" class="form-control" placeholder="Enter Birthday" name="Birthday"    
                value=<?php echo $Birthday;?>>
  			</div>
			<div class="form-group">
  			<label>Address</label>
    			<input type="text" class="form-control" placeholder="Enter Address" name="Address"  
                value=<?php echo $Address;?>>
  			<br>
  			<button type="submit" class="btn btn-primary" name='submit'>Update</button>
			</form>
   	</div>

  </body>
</html>

