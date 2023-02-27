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
    <title>Blue Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

    <!-- Navigation -->
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
                    <li><a href="read.php">View Profile</a></li>
                    <li href="logout.php"><a href="logout.php">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Blue Blog
                    <small>Welcome, <?php echo $username; ?></small>
                </h1>

                <!-- Blog Post Form -->
                <div class="well">
                    <h4>Create a Post:</h4>
                    <?php if (!empty($errors)) : ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($errors as $error) : ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>	
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form method="post">
                        <div class="form-group">
			    <label>Title</label>
			    <input type="text" id="title" name="title" class="form-control" rows="3">
 			    <label>Content</label>
                            <textarea id="content" name="content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>

                <hr>

                <!-- Blog Post -->
                <?php foreach ($posts as $post) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2>
                            <a href="#"><?php echo $post['title']; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="#"><?php echo $post['username']; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post['timestamp']; ?></p>
                        <hr>
                        <p><?php echo $post['content']; ?></p>
                        
                        <hr>
                    </div>
                </div>
                <?php endforeach; ?>