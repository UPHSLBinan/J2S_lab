<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">
  <title>Blog Template · Bootstrap v5.3</title>

  <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900&display=swap" rel="stylesheet">
  <link href="blog.css" rel="stylesheet">
</head>
<body>
  <header class="blog-header py-3">
  <div class="container">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="blogtest2.php">BlogTest</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <form class="search-form" action="#" method="get">
          
        </form>
         <?php
          if(isset($_SESSION['Name'])) {
            echo '<div class="dropdown">';
            echo '<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">' . $_SESSION['Name'] . '</button>';
            echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
            echo '<li><a class="dropdown-item" href="Landing.php">Profile</a></li>';
            echo '<li><a class="dropdown-item" href="#">Settings</a></li>';
            echo '<li><hr class="dropdown-divider"></li>';
            echo '<li><a class="dropdown-item" href="Logout.php">Logout</a></li>';
            echo '</ul>';
            echo '</div>';
          } else {
            echo '<a class="btn btn-sm btn-outline-secondary" href="Test_Layout.php">Sign up</a>';
          }
        ?>
      </div>
    </div>
  </div>
</header>

  <main class="container">
    <div class="p-4 p-md-5 mb-4 rounded bg-light">
      <div class="col-md-6 mx-auto">
        <h1 class="display-4 font-weight-bold">Treasure</h1>
	<div class="mb-1 text-muted">Nov 12, 2023 <span class="author-name">Some Author</span></div>
        <p class="lead my-3">His parents continued to question him. He didn't know what to say to them since they refused to believe the truth. He explained again and again, and they dismissed his explanation as a figment of his imagination. There was no way that grandpa, who had been dead for five years, could have told him where the treasure had been hidden. Of course, it didn't help that grandpa was roaring with laughter in the chair next to him as he tried to explain once again how he'd found it.</p>
        <a href="blogtest2.php" class="btn btn-primary btn-lg">Home</a>
      </div>
    </div>


  </main>

  <!-- Bootstrap core JavaScript -->
  <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>