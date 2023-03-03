<?php
require_once 'database.php';

if(isset($_POST['update'])) {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];

    $sql = "UPDATE users SET firstname='$firstname',  lastname='$lastname', age='$age', birthday='$birthday', address='$address' WHERE username='$username'";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header('location:read.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 <link rel="stylesheet" href="stylesheet.css"/>
    <title>Update User Data</title>
</head>
<body>
<div class="container">
        
    <?php
    if(isset($_GET['updt_user'])) {
        $username = $_GET['updt_user'];
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="card border-primary mb-4">
                <div class="card-header bg-primary">
                    <h1 style="color:white">Update User Profile</h1>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="firstname" class="col-sm-2 col-form-label">First Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" autocomplete="off" value="<?php echo $row['firstname']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastname" class="col-sm-2 col-form-label">Last Name:</label>
                        <div class="col-sm-10">
                            <input type="text
" class="form-control" placeholder="Last Name" name="lastname" autocomplete="off" value="<?php echo $row['lastname']; ?>">
</div>
</div>
<div class="form-group row">
<label for="age" class="col-sm-2 col-form-label">Age:</label>
<div class="col-sm-10">
<input type="number" class="form-control" placeholder="Age" name="age" id="age" autocomplete="off" value="<?php echo $row['age']; ?>">
</div>
</div>
<div class="form-group row">
<label for="birthday" class="col-sm-2 col-form-label">Birthday:</label>
<div class="col-sm-10">
<input type="date" class="form-control" placeholder="Birthday" name="birthday" autocomplete="off" value="<?php echo $row['birthday']; ?>">
</div>
</div>
<div class="form-group row">
<label for="address" class="col-sm-2 col-form-label">Address:</label>
<div class="col-sm-10">
<input type="text" class="form-control" placeholder="Address" name="address" autocomplete="off" value="<?php echo $row['address']; ?>">
</div>
</div>
</div>
<div class="card-footer">
<input type="hidden" name="username" value="<?php echo $row['username']; ?>">
<button type="submit" class="btn btn-primary" name="update" value="Update">Update</button>
</div>
</div>
</form>
<?php } ?>

</div>
</body>
</html>