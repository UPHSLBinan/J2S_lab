<?php
require_once 'database.php';
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header('Location: login.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the post data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $timestamp = date('Y-m-d H:i:s');

    // Validate the post data
    $errors = array();
    if (empty($content)) {
        $errors[] = 'Content is required';
    }

    // Save the post to the database
    if (empty($errors)) {
        // Insert the post into the database
        $stmt = $db->prepare('INSERT INTO blog (username, title, content, timestamp) VALUES (:username,:title, :content, :timestamp)');
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':content', $content);
        $stmt->bindValue(':timestamp', $timestamp);
        $stmt->execute();

        // Redirect to the blog page
        header('Location: blog.php');
        exit;
    }
}

// Retrieve the recent posts from the database
$stmt = $db->query('SELECT * FROM blog ORDER BY timestamp DESC LIMIT 10');
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bloggers</title>
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
  border: 1px solid #d1e2ff;
  border-radius: 4px;
  padding: 20px;
  box-shadow: 0px 0px 5px #b3d3ff;
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
  color: black;
}



label {
  display: block;
  font-weight: bold;
  margin-bottom: 10px;
  color: black;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 5px;
  border: 1px solid #d1e2ff;
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
  background-color: #0061a9;
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
	<a href="user_blog.php"style="float:right">View Profile</a></li>
        
    </nav><div class="container">
    <h1>New Post</h1>
    <form method="post">
        <?php if (!empty($errors)): ?>
            <div class="well">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        
        <label for="content">Content</label>
        <textarea name="content" id="content" rows="10"></textarea>
        
        <button type="submit">Save Post</button>
    </form>
    
    <hr>
    
    <h2>Recent Posts</h2>
    <?php foreach ($posts as $post): ?>
        <div class="well">
            <h3><?= $post['title'] ?></h3>
            <p><?= $post['content'] ?></p>
            <p><?= $post['username'] ?> | <?= $post['timestamp'] ?></p>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>