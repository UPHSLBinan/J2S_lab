<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		header('Location: login.php');
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Blog</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>My Blog</h1>
		<form action="submit_post.php" method="post">
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" required>
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea class="form-control" name="content" required></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>
