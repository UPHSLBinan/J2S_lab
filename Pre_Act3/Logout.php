<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="jumbotron text-center">
		<h1 class="display-4">You have logged out.</h1>
		<p class="lead">Thank you for visiting our website. We hope to see you again soon.</p>
		<form method="post" action="Test_Layout.php">
			<button type="submit" class="btn btn-primary">Login Again</button>
		</form>
	</div>
</body>
</html>