<html>
<body>

<form action="index.php" method="post">
First Name: <input type="text" name="fname"><br>
Last Name: <input type="text" name="lname"><br>
Age: <input type="number" name="age"><br>
E-mail: <input type="email" name="email"><br>
Detail: <input type="text" name="detail"><br>

<input type="submit">
</form>

</body>
</html>

<html>
 
<head>
    <title>Insert Your Record</title>
</head>
 
<body>
    <center>
<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "ariado";

        $conn = mysqli_connect("localhost", "admin", "admin", "ariado");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $fname =  $_REQUEST['fname'];
        $lname = $_REQUEST['lname'];
        $age =  $_REQUEST['age'];
        $email = $_REQUEST['email'];
        $detail = $_REQUEST['detail'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO users  VALUES ('$fname',
            '$lname','$age','$email','$detail')";
         
        if(mysqli_query($conn, $sql)){
            echo " ";
 
            echo nl2br(" ");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
?>
 </center>
</body>
 
</html>
