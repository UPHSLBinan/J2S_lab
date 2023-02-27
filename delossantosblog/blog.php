<?php
  require_once "database.php";
  session_start();

// Connect to database
    $db = mysqli_connect('localhost', 'root', '', 'userprofile');


  if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
  }else{


}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Blog Posts</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body style="background-color: white;">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
			<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Posts</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="login.php">Login</a></li>
			<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="register.php">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>USER PROFILE</h1>
                            <span class="subheading">User details, posts, and blogs.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">

                        <h2>MY PROFILE</h2>

<?php

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
  // Get the user's details from the database
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM users WHERE id=$user_id";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);

  // Print the user's details
  echo '<div class="container1"><center><h4>MY DETAILS</h4><hr>';
  echo "Name: " . $row['firstname'] . " " . $row['lastname'] . "<br>";
  echo "Age: " . $row['age'] . "<br>";
  echo "Birthday: " . $row['birthday'] . "<br>";
  echo "Address: " . $row['address'] . "<br>";
  echo '<form action="logout.php" style="display: inline-block;  margin-top:20px; " ><input  class="btn btn-primary text-uppercase" type="submit" value="Logout"></form> <form action="edit_account.php" style="display: inline-block;  margin-top:20px; margin-left:40px; " ><input  class="btn btn-primary text-uppercase" type="submit" value="Edit Details"></form></center></div>';
  
  echo "<hr>";
        // Set the username variable
        $username = $row['username'];

}

?>
                        <div class="my-5">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->


<?php




	if (isset($_POST['create_post'])) {
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);
  $username = $row['username'];

  $query = "INSERT INTO blog_posts (title, body, created_at, updated_at, username) VALUES ('$title', '$body', NOW(), NOW(), '$username')";
  mysqli_query($conn, $query);
}

  if (isset($_POST['edit_post'])) {
    $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);

    $query = "UPDATE blog_posts SET title='$title', body='$body', updated_at=NOW() WHERE id=$post_id";
    mysqli_query($conn, $query);
  }

  if (isset($_POST['delete_post'])) {
    $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);

    $query = "DELETE FROM blog_posts WHERE id=$post_id";
    mysqli_query($conn, $query);
  }

  $username = $row['username'];
  $query = "SELECT * FROM blog_posts WHERE username='$username'";
  $result = mysqli_query($conn, $query);

	?>



<!DOCTYPE html>
<html>
<head>
  <title>My Blog</title>
</head>
<body>
  <h1>MY BLOG</h1>
<div class="container1" style="text-align: center;">
  <h2>Create a new post</h2>
<hr>
  <form action="blog.php" method="post">
<br>
    <div>
      <input style="border-radius: 10px; height: 50px; width: 400px;" placeholder="title" type="text" id="title" name="title" required>
    </div>
<br>
    <div>
      <textarea style="border-radius: 10px; height: 200px; width: 400px;"  placeholder="body" id="body" name="body" required></textarea>
    </div>
<br>
    <div style="text-align: center;">
      <button class="btn btn-primary text-uppercase" type="submit" name="create_post">Create post</button>
    </div>
  </form>
</div>
  <h2>MY POSTS</h2>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="container1">
      <h3><?php echo $row['title']; ?></h3>
<hr> <p style="display: inline-block; margin-left: 20px; line-height: 0;" >By: <b><?php echo $row['username']; ?></b></p>
      <p style="display: inline-block; line-height: 0;"> on <?php echo $row['created_at']; ?></p>
	<p style="margin-left: 20px; line-height: 0;"><?php echo $row['body']; ?></p>
      <p style="display: inline-block; margin-left: 20px; line-height: 0;"> Last Edited: <?php echo $row['updated_at']; ?></p>
     
<br>
<br>    <div style="text-align: center;">
      <form action="edit.php" method="post" style="display: inline-block;" >
        <input style="display: inline-block;" type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
        <button style="display: inline-block; margin-left: 0px;" class="btn btn-primary text-uppercase" type="submit" name="edit_post">Edit post</button>
      </form>

      <form action="blog.php" method="post" style="display: inline-block;">
        <input  style="display: inline-block;" type="hidden" name="post_id"  value="<?php echo $row['id']; ?>">
        <button  style="display: inline-block; margin-left: 50px;" class="btn btn-primary text-uppercase" style="display: inline-block;" type="submit" name="delete_post">Delete post</button>
      </form>
	</div>
    </div>
  <?php  }?>

  <div>

  </div>




	


                            







                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2022</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
