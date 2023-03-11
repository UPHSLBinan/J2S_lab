<?php
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
<?php
//query to get all blog posts
$query = "SELECT * FROM posts ORDER BY timestamp DESC";
$result = mysqli_query($mysqli, $query);

                        //check if any posts exist
                        if(mysqli_num_rows($result) > 0) {
                            //output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                    ?>
                                <!-- Post preview-->
                                <div class="post-preview">
                                    <a href="post.php?id=<?php echo $row['id']; ?>">
                                        <h2 class="post-title"><?php echo $row['title']; ?></h2>
                                        <h3 class="post-subtitle"><?php echo $row['subtitle']; ?></h3>
                                    </a>
                                    <p class="post-meta">
                                        Posted by
                                        <?php echo $row['author']; ?>
                                        on <?php echo date('F j, Y', strtotime($row['created_at'])); ?>
                                    </p>
                                </div>
                                <!-- Divider-->
                                <hr class="my-4" />
                    <?php
                            }
                        } else {
                            echo "No posts found.";
                        }

                        //close database connection
                        mysqli_close($mysqli);
                    ?>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website <?php echo date("Y"); ?></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
