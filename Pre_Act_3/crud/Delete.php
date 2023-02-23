<?php
    include 'Connect.php';
    if(isset($_GET['deleteNumber'])){
        $Number=$_GET['deleteNumber'];

        $sql="delete from `crud` where Number=$Number";
        $result=mysqli_query($con,$sql);
        if($result){
            echo "Deleted successful";
            //header('location:Display.php')
        }    
        else{
            die(mysqli_error($con));
        }
    }
?>