<?php
$fname =$_POST['fname'];
$lname=$_POST['Iname'];
$age =$_POST['age'];
$email =$_POST['email'];
$detail =$_POST['detail'];

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
VALUES ('".$fname."','".$lname."','".$age."','".$email."','".$detail."')";
if ($conn->query($sql)===TRUE)
{
echo "New record created successfully";
}else{
echo "Error:".$sql."<br>".$conn->error;}
$conn->close();