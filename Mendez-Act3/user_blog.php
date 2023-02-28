
<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Style for navigation menu */
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #DB45AB;
  }

  /* Navigation styling */
  nav {
   padding: 0 20px;
   background-color: black;
    height: 60px;
    margin-top: -10px;
    line-height: 60px;
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
    background-color: #fff;
    border: 1px solid #b2ebf2;
    border-radius: 4px;
    padding: 20px;
    box-shadow: 0px 0px 5px #80deea;
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
    color: black;
  }

  p {
    margin: 0 0 20px;
    color: #333;
  }

  .well {
    background-color: #e0f7fa;
    border: 1px solid #b2ebf2;
    border-radius: 4px;
    padding: 20px;
    margin-bottom: 20px;
  }

  label {
    display: block;
    font-weight: bold;
    margin-bottom: 10px;
    color: #00838f;
  }

  input[type="text"],
  textarea {
    width: 100%;
    padding: 5px;
    border: 1px solid #b2ebf2;
    border-radius: 4px;
    margin-bottom: 20px;
    color: #333;
  }
.button
{
   background-color: #00838f;
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
    <a href="logout.php" style="float:right">Logout</a>
    <a href="user_blog.php"style="float:right">View Profile</a>	
</nav>
<div class="container">
<?php
//connect to database
require_once "database.php";

// Start the session
session_start();

// Retrieve the username of the currently logged-in user
$username = $_SESSION['username'];

// Retrieve all blog posts associated with the currently logged-in user
$query = "SELECT * FROM blog WHERE username = '$username' ORDER BY timestamp DESC";;
$result = mysqli_query($conn, $query);

// Check if there are any posts for this user
if(mysqli_num_rows($result) > 0) {
    // Display the welcome message
    echo "<div class='row'>
        <div class='col-md-8'>
            <h1 class='page-header'>
                Mendez_Blog
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

       <a href='edit_post.php?id=$post_id;'>Edit Post</a>

       <a href='delete.php?delete_id=$post_id;'>Delete Post</a> 




    </div>";
    }

    echo "</div></div>";
} else {
    echo "<p>You haven't written any posts yet.</p>";
}
?>
</div>
</body>
</html