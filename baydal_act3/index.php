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

$stmt = $pdo->query('SELECT * FROM posts ORDER BY timestamp DESC LIMIT 10');
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
        <h1>Welcome, you are successfully login!</h1>
        <a href="logout.php" class="btn btn-warning">Logout</a>
        <a href="user_blog.php" class="btn btn-warning">Update</a>
 <h2>Add Blog Post</h2>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content"><?php echo isset($_POST['content']) ? $_POST['content'] : ''; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form></div>
<hr>
<center>
    <h2>Recent Posts</h2>
<?php if (count($posts) === 0): ?>
    <p>No posts found.</p>
<?php else: ?>
    <?php foreach ($posts as $post): ?>
        <div class="post-container">
            <h3><?php echo $post['title']; ?></h3>
            <p><?php echo $post['content']; ?></p>
            <small>Posted by <?php echo $post['username']; ?> on <?php echo $post['timestamp']; ?></small>
        </div>
    <?php endforeach; ?>
<?php endif; ?>


</body>
</html>