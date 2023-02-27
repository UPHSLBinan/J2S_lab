<!DOCTYPE html>
<html>
<head>
	<title>User Information Form</title>
</head>
<body>
	<h1>User Information Form</h1>
	<form action="submit.php" method="post">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"><br><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br><br>

		<label for="firstname">First Name:</label>
		<input type="text" id="firstname" name="firstname"><br><br>

		<label for="lastname">Last Name:</label>
		<input type="text" id="lastname" name="lastname"><br><br>

		<label for="age">Age:</label>
		<input type="number" id="age" name="age"><br><br>

		<label for="birthday">Birthday:</label>
		<input type="date" id="birthday" name="birthday"><br><br>

		<label for="address">Address:</label>
		<textarea id="address" name="address"></textarea><br><br>

            

	</form>

<form action="submit.php" method="POST">
  <div class="form-group">
    <label for="blog_title">Blog Title</label>
    <input type="text" class="form-control" id="blog_title" name="blog_title" required>
  </div>
  <div class="form-group">
    <label for="blog_body">Blog Body</label>
    <textarea class="form-control" id="blog_body" name="blog_body" rows="5" required></textarea>
  </div>
  <div class="form-group">
    <label for="blog_username">Username</label>
    <input type="text" class="form-control" id="blog_username" name="blog_username" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>


