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

    $sql = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', age='$age', birthday='$birthday', address='$address' WHERE username='$username'";

    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User Data</title>
</head>
<body>
    <?php
    if(isset($_GET['updt_user'])) {
        $username = $_GET['updt_user'];
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
    <form action="update.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>"><br><br>
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>"><br><br>
        <label for="middlename">Middle Name:</label>
        <input type="text" id="middlename" name="middlename" value="<?php echo $row['middlename']; ?>"><br><br>
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>"><br><br>
        <label for="age">Age:</label>
        <input type="text" id="age" name="age" value="<?php echo $row['age']; ?>"><br><br>
        <label for="birthday">Birthday:</label>
        <input type="text" id="birthday" name="birthday" value="<?php echo $row['birthday']; ?>"><br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>"><br><br>
        <input type="submit" name="update" value="Update">
    </form>
    <?php } ?>
</body>
</html>
