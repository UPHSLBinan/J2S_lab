<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php
		$fname = $_POST['fname'];
        	$lname = $_POST['lname'];
	        $age =	$_POST['age'];
	        $email=	$_POST['email'];
	        $detail=$_POST['detail'];
		$conn = mysqli_connect("localhost", "root", "", "bautista");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		$age = $_REQUEST['age'];
		$email = $_REQUEST['email'];
		$detail = $_REQUEST['detail'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO user VALUES ('".$fname."',
			'".$lname."','".$age."','".$email."','".$detail."')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully."
				. " Please browse your localhost php my admin"
				. " to view the updated data</h3>";

			echo nl2br("\n $fname\n $lname\n "
				. "$age\n $email\n $detail");
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>








	
	












