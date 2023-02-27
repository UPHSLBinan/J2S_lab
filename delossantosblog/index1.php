<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
</head>
<body>

	<h1>Blog</h1>

	<?php
	//connect to database
//connect to database
	require_once "database.php";

    // Connect to database
    $db = mysqli_connect('localhost', 'root', '', 'userprofile');

// Start the session




	//get all blog posts from database
	$sql = "SELECT * FROM blog_posts ORDER BY created_at DESC";
	$result = mysqli_query($conn, $sql);

	//display each post
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<h2><a href="view_post.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h2>';
		echo '<p>By ' . $row['username'] . ' on ' . $row['created_at'] . '</p>';
		echo '<p>' . $row['body'] . '</p>';
	}





	?>








	<?php
	//display create post link if user is logged in
	session_start();
	if (isset($_SESSION['user_id'])) {
		echo '<a href="blog.php">Create Post</a>';
		echo '<p><a href="logout.php">Logout</a></p>';
	} else{

	echo '<p><a href="login.php">Login</a> | <a href="signup.php">Signup</a></p>';
}
	



?>

	

</body>
</html>