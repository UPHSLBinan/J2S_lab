<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $detail = $_POST['detail'];

    $servername = "localhost";
    $username = "sarabiachristian";
    $password = "blazedyagami2000";
    $dbname = "sarabia";

    $conn = new mysqli ($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("connection failed: ". $conn->connect_error);
    }

    $sql = "INSERT INTO j2s_sarabia (firstname, lastname, age, email, detail)
    VALUES ('".$firstname."', '".$lastname."', '".$age."', '".$email."', '".$detail."')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created sucessfully";
    } else {
        echo "Error:". $sql . "<br>" .$conn->error;
    }

    $conn->close();
}
?>
