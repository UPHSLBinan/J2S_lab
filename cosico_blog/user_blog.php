<!DOCTYPE html>
<html>
<head>
    <title>Blue Blog</title>
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
                    <li><a href="read_user.php?post_id=$id">View Profile</a></li>
                    <li href="logout.php"><a href="logout.php">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>





<?php
//connect to database
require_once "database.php";

// Start the session
session_start();

// Retrieve the username of the currently logged-in user
$username = $_SESSION['username'];

// Retrieve all blog posts associated with the currently logged-in user
$query = "SELECT * FROM posts WHERE username = '$username' ORDER BY timestamp DESC";;
$result = mysqli_query($conn, $query);

// Check if there are any posts for this user
if(mysqli_num_rows($result) > 0) {
    // Display the welcome message
    echo "<div class='container'>
        <div class='row'>
            <div class='col-md-8'>
                <h1 class='page-header'>
                    Blue Blog
                    <small>Welcome, $username</small>
                </h1>";

    // Loop through all posts and display them
    while($row = mysqli_fetch_assoc($result)) {
        $post_id = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $timestamp = $row['timestamp'];
        echo "<div class='post'>
            <h2>$title</h2>
            <p class='date'>$timestamp</p>
            <p>$content</p>
           <a href='edit_post.php?id=$post_id;' class='btn btn-primary'>Edit Post</a>

	<a href='delete.php?delete_id=$post_id;' class='btn btn-danger'>Delete Post</a> 

        </div>";
    }

    echo "</div></div></div>";
} else {
    echo "You haven't written any posts yet.";
}
?>