<?php
require_once "database.php";
session_start();

// Connect to database
$db = mysqli_connect('localhost', 'root', '', 'userprofile');

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
  // Get the user's details from the database
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM users WHERE id=$user_id";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);

  // Print the user's details
  echo '<div class="form-group"><b><p id="textfont" name="textfont">LOGGED IN USER DETAILS</p></b></div>';
  echo "Welcome, " . $row['firstname'] . " " . $row['lastname'] . "<br>";
  echo "Age: " . $row['age'] . "<br>";
  echo "Birthday: " . $row['birthday'] . "<br>";
  echo "Address: " . $row['address'] . "<br>";
  echo "<hr>";

  echo "<div class='form-group'><form action='logout.php' method='POST'><input type='submit' value='Logout' name='logout' id='logout'></form></div>";

        // Set the username variable
        $username = $row['username'];


} else {
  header('Location: login.php');
  exit;
}

// Connect to database
$db = mysqli_connect('localhost', 'root', '', 'userprofile');

// Get the post id from the form
if (isset($_POST['post_id'])) {
  $post_id = mysqli_real_escape_string($db, $_POST['post_id']);
} else {
  // Handle the case when the post ID is not set
  echo "Error: post ID not set";
  exit();
}

// Get the post details from the database
$sql = "SELECT * FROM blog_posts WHERE id=$post_id";
$result = mysqli_query($db, $sql);
if (!$result || mysqli_num_rows($result) == 0) {
  // Handle the case when the SQL query fails or returns no rows
  echo "Error: post not found";
  exit();
}
$row = mysqli_fetch_assoc($result);


// Handle form submission
if (isset($_POST['update_post'])) {
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $body = mysqli_real_escape_string($db, $_POST['body']);

  $query = "UPDATE blog_posts SET title='$title', body='$body', updated_at=NOW() WHERE id=$post_id";
  mysqli_query($db, $query);

  // Redirect to the updated post
  header("Location: blog.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit post - My Blog</title>
</head>
<body>
  <h1>Edit post</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($row['id']); ?>">
    <div>
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
    </div>
    <div>
      <label for="body">Body:</label>
      <textarea id="body" name="body" required><?php echo htmlspecialchars($row['body']); ?></textarea>
    </div>
    <div>
      <button type="submit" name="update_post">Update post</button>
    </div>
  </form>

  <div>
    <a href="blog.php">Back to blog</a>
  </div>
</body>
</html>