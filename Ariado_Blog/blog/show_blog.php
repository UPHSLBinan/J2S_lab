<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Blogs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>

    <div class="container">
	&nbsp;<h1 class="text-center">WebSystems & Technology | World Building</h1>
      <hr>
<form>
	<button type="submit" name="submit" class="btn btn-primary" formaction="index.php">Home</button><br><br>
</form>
      <?php
        // connect to the database
        $db = new mysqli('localhost', 'admin', 'admin', 'userprofile');

        // check for errors
        if ($db->connect_error) {
          die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }

        // query the database for blog posts
        $query = "SELECT * FROM users_blog ORDER BY timestamp DESC";
        $result = $db->query($query);

        // loop through each row and display the post
        while ($row = $result->fetch_assoc()) {
          echo '<div class="card">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $row['blog_title'] . '</h5>';
          echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['timestamp'] . ' by ' . $row['username'] . '</h6>';
          echo '<p class="card-text">' . $row['blog_content'] . '</p>';
          echo '</div>';
          echo '</div>';
          echo '<br>';
        }

        // close the database connection
        $db->close();
      ?>
    </div>

  </body>
</html>
