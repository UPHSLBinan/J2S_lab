<html>
  <head>
    <title>Create Blog Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1 class="my-4">Create Blog Post</h1>
      <form method="POST" action="createpost.php">
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="form-group">
          <label for="body">Body:</label>
          <textarea id="body" name="body" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
      </form>
    </div>
  </body>
</html>