<!DOCTYPE html>
<html>
<head>
    <title>Edit Post - Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Blue Blog</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="blog.php">Home</a></li>
                <li><a href="user_blog.php">Your Blog</a></li>
                <li><a href="read_user.php">View Profile</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </div>
    </div>
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