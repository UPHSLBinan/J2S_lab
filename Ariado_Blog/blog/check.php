<!DOCTYPE html>
<html>
<head>
	<title>Update Account</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Load Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- Load jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Load Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<h2>Update My Account</h2>
				<form action="update.php" form method="post">
					<div class="form-group">
						<label for="username">Enter Username:</label>
						<input type="text" class="form-control" id="username" name="username" required>
					</div>
					<div class="form-group">
						<label for="password">Enter Password:</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Submit</button><br><br>
				</form>
			<form>
				<button type="submit" class="btn btn-primary" formaction="login.php">Go back</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
