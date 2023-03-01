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
        $stmt = $db->prepare('INSERT INTO posts (username, title, content, timestamp) VALUES (:username,:title, :content, :timestamp)');
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
$stmt = $db->query('SELECT * FROM posts ORDER BY timestamp DESC LIMIT 10');
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blogact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
   

</style>
</head>
<body>
    <nav>
        <a href="blog.php">Blogact</a>
	
        <a href="logout.php" style="float:right">Logout</a>
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
        <br><br>
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