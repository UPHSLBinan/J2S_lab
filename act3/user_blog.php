<!DOCTYPE html>
<html>
<head>
    <title>Blue Blog</title>
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
<!DOCTYPE html>
<html>
<head>
    <title>Bloggers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once 'database.php';

$errors = [];

// If the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input fields
    $title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
    $content = filter_var(trim($_POST['content']), FILTER_SANITIZE_STRING);

    // Validate input fields
    if (empty($title)) {
        $errors[] = 'Title is required';
    }

    if (empty($content)) {
        $errors[] = 'Content is required';
    }

    // If there are no validation errors, insert the blog post into the database
    if (empty($errors)) {
        $username = $_SESSION['username'];
        $timestamp = date('Y-m-d H:i:s');
        $sql = "INSERT INTO posts (title, content, username, timestamp) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $content, $username, $timestamp]);
        header("Location: index.php");
        exit();
    }
}

$stmt = $db->query('SELECT * FROM posts ORDER BY timestamp DESC LIMIT 10');
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
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

       <a href='remove.php?delete_id=$post_id;' >Delete Post</a> 

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