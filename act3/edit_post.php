<!DOCTYPE html>
<html>
<head>
    <title>Edit Post - Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
<style>
     body{
height: 200px;
width: 100%;
padding: 50x;
font-family: Copperplate, fantasy;
font-size: 27px;
color: black;
background: linear-gradient(pink, white);
height: 200vh;
overflow: show;
}
.container {
  margin-top: 5px;
  font-family: Copperplate, fantasy;
  font-size: 30px;
  color: white;
  background-color: #FF647F;
  max-width: 600px;
  margin: 40px auto;
  padding: 25px;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  border-style: solid;
  border-width: 10px;
  border-color: white;
  height: auto; /* make the container endless */
}
.h1{
text-align: center;
padding: 0 0 20px 0;
border-bottom: 1px solid silver;
}

.form-group{
 margin-top:90px;
    margin-bottom:42px;
}

    
   </style>
</head>
<body>
<nav>
        <a href="index.php">Bloggers</a>
	<a href="user_blog.php">View Profile</a></li>
        <a href="logout.php" style="float:right">Logout</a>
    </nav>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="page-header">
                Blue Bootstrap Blog
                <small>Edit Post</small>
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
$query = "SELECT * FROM posts WHERE id = '$post_id' AND username = '$username'";
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
        $query = "UPDATE posts SET title = '$new_title', content = '$new_content' WHERE id = '$post_id' AND username = '$username'";
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
        <button type='submit' class='btn btn-primary'>Save Changes</button>
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