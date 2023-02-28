<?php

include 'conn.php';
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$bday=$_POST['bday'];
$add=$_POST['add'];


$sql="insert into 'userprofile'(firstname,middlename,lastname,age,birhday,address)
values ('$fname','$mname','$lname','$age','$bday','$add')";
$result=mysqli_query($con,$sql);
if($result)
{
echo "data inserted success";
}
else
{
die(mysqli_error($con));
}   
}         
?>

<form>
  <div class="form-group">
    <form method="post">
    First name: <input type="text" name="fname"><br>
    Middle name:<input type="text" name="mname"><br>
    Last name: <input type="text" name="lname"><br>
    Age:<input type="number" name="age"><br>
    Birthday:<input type="text" name="bday"><br>
    Address:<input type="text" name="add"><br>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>