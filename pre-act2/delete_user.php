<?php
// check if the form has been submitted
if (isset($_POST['id'])) {
    // retrieve the ID of the user to delete
    $id = $_POST['id'];

    // connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mejarito";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // construct the SQL query to delete the user
    $sql = "DELETE FROM users WHERE id = $id";

    // execute the query
    if (mysqli_query($conn, $sql)) {
        // redirect to the main page
        header('Location: index.php');
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // close the database connection
    mysqli_close($conn);
}
?>
