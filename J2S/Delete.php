<?php
    include 'Connect.php';
    if(isset($_GET['deleteNumber'])){
        $Number=$_GET['deleteNumber'];

        $sql="delete from `crud` where Number=$Number";
        $result=mysqli_query($con,$sql);
        if($result){

            header('location:display.php');
        }    
        else{
            die(mysqli_error($con));
        }
    }
?>