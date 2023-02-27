<?php
// Database credentials
$servername = "localhost";
$username = "mark";
$password = "mark2";
$dbname = "partoza_blog";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$blog_title = $_POST["blog_title"];
$blog_body = $_POST["blog_body"];
$blog_timestamp = date("Y-m-d H:i:s");
$blog_username = $_POST["blog_username"];


$sql = "INSERT INTO blog_posts (blog_title, blog_body, blog_timestamp, blog_username)
VALUES ('$blog_title', '$blog_body', '$blog_timestamp', '$blog_username')";

if (mysqli_query($conn, $sql)) {
    echo "New blog post created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>


