<!DOCTYPE html>
<html>
<head>
    <title>Edit Post - Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
<style>
      body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  background-color: #DB45AB;
}

/* Navigation styling */
nav {
 background-color: black;
  height: 60px;
}

nav a {
  color: #fff;
  text-decoration: none;
  font-size: 18px;
  line-height: 60px;
  padding: 0 20px;
  display: inline-block;
  height: 60px;
  border-bottom: 3px solid transparent;
}

nav a:hover {
  border-bottom: 3px solid #fff;
}

/* Main content styling */
.container {
  max-width: 800px;
  margin: 20px auto;
  background-color: #ADADAD;
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 20px;
}

h1, h2 {
  font-weight: bold;
  margin-bottom: 10px;
}

h1 {
  font-size: 36px;
  color: black;
}

h2 {
  font-size: 24px;
  color: #006064;
}

p {
  margin: 0 0 20px;
  color: #333;
}

.well {
  background-color: #e0f7fa;
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 20px;
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 10px;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 5px;
  border: 1px solid #ddd;
  border-radius: 4px;
  margin-bottom: 20px;
  color: #333;
}

button[type="submit"] {
  background-color: black;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: black;
  
}
button[type="submit"] {
  background-color: #0077be;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.error {
  color: #ff0000;
  margin-bottom: 10px;
}
    
   </style>
</head>
<body>
<nav>
        <a href="blog.php">Mendez_Blog</a>
	<a href="user_blog.php">View Profile</a></li>
        <a href="logout.php" style="float:right">Logout</a>
    </nav>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="page-header">
                Blog Pink Bootstrap ||
                <small>        Edit Post</small>
            </h1>


<?php
//connect to database
require_once "database.php";

// Start the session
session_start();

// Retrieve the post ID from the URL parameter
$post_id = $_GET['id'];

// Retrieve the username of the currently logged-in user
$username = $_SESSION['username'];

// Retrieve the post data from the database
$query = "SELECT * FROM blog WHERE id = '$post_id' AND username = '$username'";
$result = mysqli_query($conn, $query);

// Check if the post exists and belongs to the current user
if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $content = $row['content'];

    // Check if the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the updated post data from the form
        $new_title = mysqli_real_escape_string($conn, $_POST['title']);
        $new_content = mysqli_real_escape_string($conn, $_POST['content']);

        // Update the post data in the database
        $query = "UPDATE blog SET title = '$new_title', content = '$new_content' WHERE id = '$post_id' AND username = '$username'";
        mysqli_query($conn, $query);

        // Redirect the user to the blog page
        header("Location: user_blog.php");
        exit();
    }

    // Display the form with the current post data
    echo "<form method='POST'>
        <div class='form-group'>
            <label>Title</label>
            <input type='text' class='form-control' name='title' value='$title'>
        </div>
        <div class='form-group'>
            <label>Content</label>
            <textarea class='form-control' name='content'>$content</textarea>
        </div>
        <button type='submit' >Save Changes</button>
</form>";
} else {
// If the post doesn't exist or doesn't belong to the current user, display an error message
echo "<div class='alert alert-danger'>Sorry, you don't have permission to edit this post.</div>";
}

// Close the database connection
mysqli_close($conn);
?>
</div>
</div>

</div>

</body>
</html>