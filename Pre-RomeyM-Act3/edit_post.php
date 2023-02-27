<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}

// Change these values to match your MySQL server settings
$servername = "localhost";
$username = "Tundra";
$password = "akositundra123";
$dbname = "Tundra";

// Create a connection to the MySQL server
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If edit form has been submitted, update post in database
if (isset($_POST['submit'])) {
  $post_id = $_POST['post_id'];
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);
  $username = $_SESSION['username'];

  $query = "UPDATE blog_posts SET title='$title', body='$body', updated_at=NOW() WHERE id='$post_id' AND username='$username'";

  if (mysqli_query($conn, $query)) {
    echo "Post updated successfully!";
  } else {
    echo "Error updating post: " . mysqli_error($conn);
  }
}

// If delete button has been clicked, delete post from database
if (isset($_POST['delete'])) {
  $post_id = $_POST['post_id'];
  $username = $_SESSION['username'];

  $query = "DELETE FROM blog_posts WHERE id='$post_id' AND username='$username'";

  if (mysqli_query($conn, $query)) {
    echo "Post deleted successfully!";
  } else {
    echo "Error deleting post: " . mysqli_error($conn);
  }
}

// Get post from database
if (isset($_GET['post_id'])) {
  $post_id = $_GET['post_id'];
  $username = $_SESSION['username'];

  $query = "SELECT * FROM blog_posts WHERE id='$post_id' AND username='$username'";

  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $post = mysqli_fetch_assoc($result);
  } else {
    echo "Error: Post not found.";
    exit();
  }
} else {
  echo "Error: No post ID specified.";
  exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Post - My Blog</title>
</head>
<body>

<h1>Edit Post</h1>

<form method="POST" action="edit.php">
  <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
  <label for="title">Title:</label>
  <input type="text" name="title" value="<?php echo $post['title']; ?>"><br><br>
  <label for="body">Body:</label>
  <textarea name="body"><?php echo $post['body']; ?></textarea><br><br>
  <input type="submit" name="submit" value="Update">
</form>

<form method="POST" action="edit.php">
  <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
  <input type="submit" name="delete" value="Delete">
</form>

<p>Created at: <?php echo $post['created_at']; ?></p>
<p>Last updated at: <?php echo $post['updated_at']; ?></p>

<a href="index.php">Back to Home</a>

</body>
</html>