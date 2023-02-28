<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
	<title>Create a Blog Post</title>

<body>
	
<div class="container">

<h1>Post your thoughts</h1>

    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="image/harap.jpg" alt="">
        <div class="text">
          <span class="text-1">FADAYON COMPANY. <br> Every thought mattered.</span>
          <span class="text-2">Voice-out your Voice</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">

        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="index1.php" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="text" placeholder="Author" name="username"required>
              </div>
		 <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Blog Title" name="title"required>
		
              </div>
		   </div>
     <div class="signup-form">
          <div class="title">Working Area</div>
         <form action="index1.php" method="POST">
            <div>
  <textarea rows="17" cols="57" name="body"></textarea>
</div>
             
              <div class="button input-box">
                <input type="submit" value="Post" name="submit">
		
              </div>
              <div class="text sign-up-text">If you want to change title, Author and ID you can click <label for="flip">Changes button</label></div>

              <a href="indexblog.php" >Newsfeed</a>
              <div class="button input-box">
                <label for="flip">Click to Start your content</label></div>
            
            </div>

		
        </form>
<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "users";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get form data
    $gmail = isset($_POST['gmail']) ? $_POST['gmail'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $body = isset($_POST['body']) ? $_POST['body'] : '';
    $timestamp = isset($_POST['timestamp']) ? $_POST['timestamp'] : '';

    // Check if password and repassword match

    // Check if email already exists in the database

    // Insert form data into the database
    $sql = "INSERT INTO blog_posts (gmail, title, body, timestamp) VALUES ( '$gmail', '$title', '$body', '$timestamp')";

    if (mysqli_query($conn, $sql)) {
	echo "The post successfully posted";
         // fixed syntax error in header() function
        exit(); // added exit() to stop script execution after redirect
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>


            </div>
      </form>
    </div>
   
    </div>
  </div>

</body>
</html>
