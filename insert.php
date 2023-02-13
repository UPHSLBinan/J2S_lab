<!DOCTYPE html>
<html>
 
<head>
    <title>Sarmiento</title>
</head>
 
<body>
    <center>
        <?php
$servername = "localhost";
$username = "admin";
$password = "admin123";
$dbname = "sarmiento";
 
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "admin", "admin123", "sarmiento");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $Fname =  $_REQUEST['Fname'];
        $Lname = $_REQUEST['Lname'];
        $Age =  $_REQUEST['Age'];
        $Email = $_REQUEST['Email'];
        $Detail = $_REQUEST['Detail'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO users VALUES ('$Fname',
            '$Lname','$Age','$Email','$Detail')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";
 
            echo nl2br("\n$Fname\n $Lname\n "
                . "$Age\n $Email\n $Detail");
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