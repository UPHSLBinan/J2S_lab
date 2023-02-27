<?php
require_once "database.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>REGISTER</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
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
                            <h1>REGISTER</h1>
                            <span class="subheading">Fill up the forms correctly to register.</span>
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
                        <p>Input your details to register.</p>
                        <div class="my-5">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->

 <form action="register.php" method="POST">


<?php

if(isset($_POST["register"])){

	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$age = $_POST["age"];
	$birthday = $_POST["birthday"];
	$address = $_POST["address"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$password2 = $_POST["password2"];

	$errors = array();
	
	if(empty($firstname) or empty($lastname) or empty($age) or empty($birthday) or empty($address) or empty($username) or empty($password) or empty($password2)){
	
	array_push($errors, "Please fill up the fields correctly.");

	}

	if($password !== $password2){
	array_push($errors, "Password does not match.");

	}
	
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);
	$rowCount = mysqli_num_rows($result);

	if($rowCount > 0){
	array_push($errors, "Username already exists.");
	}
	if(count ($errors) > 0){
	foreach($errors as $error){
	echo "<div class='alert alert-danger'>$error</div>";
	}
	} else {
	$sql = "INSERT INTO users (firstname, lastname, age, birthday, address, username, password) VALUES (?,?,?,?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);
	$preparedStmt = mysqli_stmt_prepare($stmt, $sql);
	if($preparedStmt){
	mysqli_stmt_bind_param($stmt, "ssissss", $firstname, $lastname, $age, $birthday, $address, $username, $password);
	
	mysqli_stmt_execute($stmt);

	echo"<div class='alert alert-success'>User registered succesfully!</div>";
	} else{
	die("Something went wrong. Please try again.");
	}
    }
}
?>

                                <div class="form-floating">
                                    <input class="form-control" name="firstname" id="firstname" type="text" placeholder="Enter your firstname..." data-sb-validations="required" />
                                    <label for="name">Username</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A firstname is required.</div>
                                </div>
                 
                            
                                <div class="form-floating">
                                    <input class="form-control" name="lastname" id="lastname" type="text" placeholder="Enter your lastname..." data-sb-validations="required" />
                                    <label for="name">Lastname</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A lastname is required.</div>
                                </div>

                                <div class="form-floating">
                                    <input class="form-control" name="age" id="age" type="number" placeholder="Enter your age..." data-sb-validations="required" />
                                    <label for="name">Age</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A lastname is required.</div>
                                </div>

                                <div class="form-floating">
                                    <input class="form-control" name="birthday" id="birthday" type="date" placeholder="Enter your birthday..." data-sb-validations="required" />
                                    <label for="name">Birthday</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A birthday is required.</div>
                                </div>

                                <div class="form-floating">
                                    <input class="form-control" name="address" id="address" type="text" placeholder="Enter your address..." data-sb-validations="required" />
                                    <label for="name">Address</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A address is required.</div>
                                </div>

                             <div class="form-floating">
                                    <input class="form-control" name="username" id="username" type="text" placeholder="Enter your username..." data-sb-validations="required" />
                                    <label for="name">Username</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A username is required.</div>
                                </div>

                             <div class="form-floating">
                                    <input class="form-control" name="password" id="password" type="text" placeholder="Enter your password..." data-sb-validations="required" />
                                    <label for="name">Password</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A password is required.</div>
                                </div>

                             <div class="form-floating">
                                    <input class="form-control" name="password2" id="password2" type="text" placeholder="Confirm your password..." data-sb-validations="required" />
                                    <label for="name">Confirm Password</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A password confirmation is required.</div>
                                </div>
<br>
	<div class="form-group">

	<input type="submit" value="Register" name="register" id="register" class="btn btn-primary text-uppercase">
 	</div>
<hr>


</form>
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
