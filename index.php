<html>
<body>

<form action="connect.php" method="post">
FNAME: <input type="text" name="fname"><br>
LNAME:  <input type="text" name="Iname"><br>
AGE:        <input type="text" name="age"><br>
EMAIL:      <input type="email" name="email"><br>
DETAIL:     <input type="text" name="detail"><br>
<input type="submit">
</form>


</body>
</html>
<?php
$firstname =$_POST['fname'];
$lastname=$_POST['Iname'];
$taon =$_POST['age'];
$email1 =$_POST['email'];
$detail1 =$_POST['detail'];

$servername ="localhost";
$username ="fadacma";
$password ="@ngelous61416141fada08";
$dbname ="fadacma";

//Create connection
$conn = new mysqli($servername,$username,$password,$dbname);
//Check connection
if ($conn->connect_error)
{die("connection failed:".$conn->connect_error);}

$sql = "INSERT INTO users (Fname,Lname,Age,Email,Detail)
VALUES ('".$firstname."','".$lastname."','".$taon."','".$email1."','".$detail1."')";
if ($conn->query($sql)===TRUE)
{
echo "New record created successfully";
}else{
echo "Error:".$sql."<br>".$conn->error;}
$conn->close();