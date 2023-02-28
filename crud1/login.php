<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style="background-color:#081921; font-family:verdana;
			   text-align: center;">

<div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "connect.php";
            $sql = "SELECT * FROM crud1 WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                 if ($password == $user["password"]) {
                    header("Location: welcome.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
     <form style="background-color:#000000; 
					  position: absolute; 
					  top: 46%; left: 50%; width: 300px; 
					  transform: translate(-50%, -50%); 				 
					  box-sizing: border-circle; 				 
					  border-radius: 15px;
					  color:#F9F9F9; 
					  text-align: center;
					  width: 220px;
					  padding: 50px; 
					  margin: 30px auto; 
                      action="login.php" method="post">
<div class="input-field">
				<label style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif'"><b>Email: </b> </label>
				<input type="text" required 
					   class="form-control"
					   id="last name"
					   name="email"
					   placeholder="Email"  
					   style="width:190px; height:25px;" ><br><br>
			</div>
			
			<div class="input-field">
				<label style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif'"><b>Password: </b> </label>
				<input type="password" required 
					   class="form-control"
					   id="password"
					   name="password"
					   placeholder="Password"  
					   style="width:190px; height:25px;" ><br><br>
			</div>

            <button style="background-color: red; 
				height: 40px; 
				width: 190px;
				border: solid; 
				outline:none;
				color: white; 
				font-size: 15px;
				border-radius: 12px;" type="submit" name="submit" class="btn btn-primary"><b>Login</b></button>

				
</form>
	</div>
</body>
</html>