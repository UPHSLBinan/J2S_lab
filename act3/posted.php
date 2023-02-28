<?php

// Display the blog posts
$db_host = 'localhost';
$db_name = 'blog';
$db_user = 'root';
$db_pass = '';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

$sql = "SELECT * FROM posts ORDER BY timestamp DESC";
$result = mysqli_connect($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $content = $row['content'];
        $author = $row['author'];
        $timestamp = $row['timestamp'];
        $date = date('F j, Y', strtotime($timestamp));
?>

<div class="post">
    <h2><?php echo $title; ?></h2>
    <p class="text-muted"><?php echo 'by ' . $author . ' on ' . $date; ?></p>
    <hr>
    <p><?php echo $content; ?></p>
    <hr>
    <div class="comment">
        <h4>Comments:</h4>
        <div id="comments-<?php echo $row['id']; ?>"></div>
        <form action="comment.php" method="POST" class="comment-form">
            <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <textarea class="form-control" name="content" rows="3" placeholder="Add a comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>
</div>

<?php
    }
} else {
    echo '<p>No posts yet.</p>';
}

mysqli_close($conn);

?>
