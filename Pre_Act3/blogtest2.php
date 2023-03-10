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
        <h1 class="display-4 font-weight-bold">Balloons are pretty</h1>
	<div class="mb-1 text-muted">Jan 12, 2018 <span class="author-name">Some Author</span></div>
        <p class="lead my-3">Balloons are pretty and come in different colors, different shapes, different sizes, and they can even adjust sizes as needed. But don't make them too big or they might just pop, and then bye-bye balloon....</p>
        <a href="Testread1.php" class="btn btn-primary btn-lg">Continue reading</a>
      </div>
    </div>

<div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">Some World</strong>
          <h3 class="mb-0">Treasure</h3>
          <div class="mb-1 text-muted">Nov 12, 2023 <span class="author-name">Some Author</span></div>
	<p class="card-text mb-auto">His parents continued to question him. He didn't know what to say to them since they refused to believe the truth. He explained again and again, and they dismissed his explanation as a figment of his imagination.</p>
	<a href="Testread2.php" class="stretched-link">Continue reading</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Some Rumors</strong>
          <h3 class="mb-0">Patiently</h3>
          <div class="mb-1 text-muted">Nov 11, 2019 <span class="author-name">Some Author</span></div>
          <p class="mb-auto">TShe patiently waited for his number to be called. She had no desire to be there, but her mom had insisted that she go..</p>
          <a href="Testread3.php" class="stretched-link">Continue reading</a>
        </div>
      </div>
    </div>
  </div>

  </main>

  <!-- Bootstrap core JavaScript -->
  <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>