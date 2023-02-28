<!DOCTYPE html>
<html>
<head>
    <title>Blue Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: #7F00FF;
            font-family: Arial, sans-serif;
        }

    nav {
        background-color: #9400D3;
        overflow: hidden;
        position: sticky;
        top: 0;
        width: 100%;
        z-index: 1;
    }

    nav a {
        color: white;
        display: block;
        font-size: 18px;
        padding: 20px;
        text-align: center;
        text-decoration: none;
    }

    nav a:hover {
        background-color: #6A5ACD;
    }

    .container {
        margin: auto;
        max-width: 800px;
        padding: 20px;
    }

    .post {
        background-color: #FFF0F5;
        border: 1px solid #DDA0DD;
        border-radius: 10px;
        margin-bottom: 20px;
        padding: 20px;
    }

    h1 {
        color: white;
        margin-top: 0;
    }

    h2 {
        color: #483D8B;
    }

    p.date {
        color: #8B008B;
        font-size: 14px;
        margin-top: 0;
    }

    a {
        color: #9400D3;
        text-decoration: none;
    }

    a:hover {
        color: #6A5ACD;
    }
</style>
<!DOCTYPE html>
<html>
<head>
    <title>Bloggers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        <style>
      body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  background-color: #f5f5f5;
}

/* Navigation styling */
nav {
  background-color: #5e35b1;
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
  background-color: #fff;
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
  color: #6a1b9a;
}

h2 {
  font-size: 24px;
  color: #6a1b9a;
}

p {
  margin: 0 0 20px;
  color: #333;
}

.well {
  background-color: #f3e5f5;
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
  background-color: #6a1b9a;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #8e24aa;
}

.error {
  color: #ff0000;
  margin-bottom: 10px;
}
</style>
</head>
<body>
<nav>
    <a href="blog.php">Bloggers</a>
    <a href="user_blog.php">View Profile</a>
    <a href="logout.php" style="float:right">Logout</a>
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
$query = "SELECT * FROM posts WHERE username = '$username' ORDER BY timestamp DESC";;
$result = mysqli_query($conn, $query);

// Check if there are any posts for this user
if(mysqli_num_rows($result) > 0) {
    // Display the welcome message
    echo "<div class='row'>
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
       <a href='edit_post.php?id=$post_id;'>Edit Post</a>

<a href='delete.php?delete_id=$post_id;' >Delete Post</a> 

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