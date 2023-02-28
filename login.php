<?php
session_start();
if (isset($_SESSION["userssss"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head> 
<body style="background-color:powderblue;">
<center> 

   
    

</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $username = $_POST["username"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                 if ($password == $user["password"]) {
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?><div class="container">



    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="image/harap.jpg" alt="">
        <div class="text">
          
        </div> 
       Login<br> </span>
      </div>
      <div class="back">
        <img class="backImg" src="images/backImg.jpg" alt="">
        <div class="text">
           </div>
      </div>
    </div>
      <form action="login.php" method="post">
	<div class="login-form">
        <div class="input-box"> 
<label for="username"><b>Username</b></label>
 <input type="email" placeholder="Enter Email:" name="username" class="form-control"><b></br>
        
<label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password:" name="password" class="form-control"><b></br>
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
	</div>
      </form>
     <div><p>Not registered yet <a href="Register.php">Register Here</a></p></div>
    </div>
</body>
</html>