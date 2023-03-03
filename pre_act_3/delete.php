<?php
//connect to database
require_once "database.php";

// Start the session
session_start();

// Retrieve the username of the currently logged-in user
$username = $_SESSION['username'];

// Check if the delete_id parameter is set in the URL
if (isset($_GET['delete_id'])) {
    // Get the post ID to delete from the URL parameter
    $post_id = $_GET['delete_id'];

    // Check if the post belongs to the logged-in user
    $query = "SELECT * FROM posts WHERE id = '$post_id' AND username = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        // Delete the post from the database
        $query = "DELETE FROM posts WHERE id = '$post_id'";
        mysqli_query($conn, $query);

        // Redirect to the user's blog page
        header("Location: user_blog.php");
        exit();
    } else {
        // The post does not belong to the logged-in user
        echo "You don't have permission to delete this post.";
    }
}
?>