<?php
	//connect to database
//connect to database
	require_once "database.php";

// Start the session
session_start();
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
                            <h1>BLOG POSTS</h1>
                            <span class="subheading">See everyone's blog posts.</span>
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

                        <h2>BLOG POSTS</h2>

<?php

    // Connect to database
    $db = mysqli_connect('localhost', 'root', '', 'userprofile');


if (isset($_SESSION['user_id'])) {
  // Get the user's details from the database
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM users WHERE id=$user_id";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);

  // Print the user's details
  echo '<h5 style="display: inline-block">Welcome, ' . $row['firstname'] . ' ' . $row['lastname'] . '<br></h5> ';
  echo '<form action="blog.php" style="display: inline-block;  margin-left:150px; " ><input  class="btn btn-primary text-uppercase" type="submit" value="Create post"></form>';
echo "<hr>";

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




	//get all blog posts from database
	$sql = "SELECT * FROM blog_posts ORDER BY created_at DESC";
	$result = mysqli_query($conn, $sql);

	//display each post
	while ($row = mysqli_fetch_assoc($result)) {
		echo'<div class="container1">';
		echo '<h2><a href="view_post.php?id=' . $row['id'] . '">' . $row['title'] . '</a><hr></h2>';
		echo '<p style="margin-left: 10px;">By <b> ' . $row['username'] . '</b> on ' . $row['created_at'] . '</p>';
		echo '<p style="margin-left: 10px;">' . $row['body'] . '</p>';
		echo'</div>';
	}





	?>








	<?php
	//display create post link if user is logged in
	
	if (isset($_SESSION['user_id'])) {
		echo'<div class="container1" style="text-align: center;">';
		echo '<form action="blog.php" style="display: inline-block;  margin-left:0px; " ><input  class="btn btn-primary text-uppercase" type="submit" value="Add Blog"></form>
                <form action="logout.php" style="display: inline-block;  margin-left:50px; " ><input  class="btn btn-primary text-uppercase" type="submit" value="Logout"></form>';
		echo'</div>';
	} else{
	echo '<div style="text-align: center;"><form action="blog.php" style="display: inline-block;  margin-left:0px; " ><input  class="btn btn-primary text-uppercase" type="submit" value="Create post"></form>';
	echo '<form action="login.php" style="display: inline-block;  margin-left:10px; " ><input  class="btn btn-primary text-uppercase" type="submit" value="Login"></form>';
	echo '<form action="register.php" style="display: inline-block;  margin-left:10px; " ><input  class="btn btn-primary text-uppercase" type="submit" value="Register"></form></div>';
	
}
	

?>


                            







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
