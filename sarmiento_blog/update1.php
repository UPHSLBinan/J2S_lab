<head>
    <title>Update Username and Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<!DOCTYPE html>
<html>
<head>
    <title>Update Username and Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Update Username and Password</h2>
        <form action="update2.php" method="post">

            <label>Username:</label>
            <input type="text" name="username"><br><br>

            <label>Password:</label>
            <input type="password" name="password"><br><br>

            <label>New Username:</label>
            <input type="text" name="new_username"><br><br>

            <label>New Password:</label>
            <input type="password" name="new_password"><br><br>

            <input type="submit" value="Update">
        </form>

    </div>
</body>
</html>