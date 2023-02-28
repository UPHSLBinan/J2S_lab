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

$stmt = $conn->query('SELECT * FROM posts ORDER BY timestamp DESC LIMIT 10');
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>
<body>

    <div class="container">
        <h1>Welcome, you are successfully logged in!</h1>
	<a href="user_blog.php" class="btn btn-warning">Update</a>
        <a href="logout.php" class="btn btn-warning">Logout</a>
        
        
<?php if (!empty($errors)): ?>
            <div class="well">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <h2>Create a New Blog Post</h2>
        <form method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form></div>
<hr><center>
  <h2>Recent Posts</h2>



    <?php foreach ($posts as $post): ?>
	<center>
        <div class="well">
	 <label>Title:</label>
            <h3><?= $post['title'] ?></h3>
	  <label>Content:</label>
            <p><?= $post['content'] ?></p>
            <p><?= $post['username'] ?> | <?= $post['timestamp'] ?></p>
<hr></center>
        </div>
    <?php endforeach; ?>
    </div>





</body>
</html>
