<!DOCTYPE html>
<html>
<head>
  <title>Blog Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h1>Create your blog!</h1>
    <form method="post" action="save_blog.php">
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter blog title" required>
      </div>
      <div class="form-group">
        <label for="content">Content:</label>
        <textarea class="form-control" name="content" id="content" rows="10" maxlength="10000" placeholder="Enter blog content" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary" value="submit">Submit</button>
    </form>
  </div>
</body>
</html>
