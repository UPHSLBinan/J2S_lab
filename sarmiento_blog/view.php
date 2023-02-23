<html>
  <head>
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1 class="my-4">Blog Posts</h1>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <form method="POST" action="blogform.php">
      <button type="submit" class="btn btn-primary">Create Blog</button>

      <?php
      // Connect to database (replace DB_HOST, DB_USERNAME, DB_PASSWORD, and DB_NAME with your own database information)
      $conn = mysqli_connect('localhost', 'admin', 'admin123', 'userprofile');

      // Query all blog posts in descending order of timestamp
      $query = "SELECT * FROM posts ORDER BY timestamp DESC";
      $result = mysqli_query($conn, $query);

      // Loop through each post and display it
      while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $body = $row['body'];
        $username = $row['username'];
        $timestamp = $row['timestamp'];

        echo "
        <div class='card my-4'>
          <div class='card-body'>
            <h2 class='card-title'>$title</h2>
            <p class='card-text'>By $username on $timestamp</p>
            <p class='card-text'>$body</p>
          </div>
        </div>";
      }

      // Close database connection
      mysqli_close($conn);
      ?>
    </div>
  </body>
</html>

