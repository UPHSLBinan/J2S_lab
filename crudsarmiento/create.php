<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="read.php" method="post">
            <div class="form-group">
                <label>First Name:</label>
                <input type="text" name="firstname" class="form-control">
            </div>

        <div class="form-group">
            <label>Middle Name:</label>
            <input type="text" name="middlename" class="form-control">
        </div>

        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lastname" class="form-control">
        </div>

        <div class="form-group">
            <label>Age:</label>
            <input type="number" name="age" class="form-control">
        </div>

        <div class="form-group">
            <label>Birthday:</label>
            <input type="date" name="birthday" class="form-control">
        </div>

        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" class="form-control">
        </div>

        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control">
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control">
        </div>

        <input type="submit" value="Submit" class="btn btn-primary">
    </form>

    <!-- Add Pagination -->
    <ul class="pagination">
        <li class="active"><a href="#">1</a></li>
        <li><a href="read.php">2</a></li>
        <li><a href="read.php">Next</a></li>
    </ul>
</div>

<!-- Add Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php error_reporting (E_ALL ^ E_NOTICE); ?>