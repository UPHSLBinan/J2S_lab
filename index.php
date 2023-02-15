<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mica</title>
</head>

<body>
  <div>
    <?php
    if (isset($_POST['create'])) {
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $age = $_POST['age'];
      $email = $_POST['email'];
      $detail = $_POST['detail'];

      $sql = "INSERT INTO users (Fname, Lname, Age, Email, Detail) VALUES(?,?,?,?,?)";
      $stmtinsert = $db->prepare($sql);
      $result = $stmtinsert->execute([$fname, $lname, $age, $email, $detail]);
      if ($result) {
        echo 'Successfully saved.';
      } else {
        echo 'There is an error';
      }
    }
    ?>
  </div>
  <form action="index.php" method="POST">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname"><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname"><br>
    <label for="age">Age:</label><br>
    <input type="number" id="age" name="age"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>
    <label for="detail">Detail:</label><br>
    <textarea id="detail" name="detail"></textarea><br>
    <input type="submit" name="create" value="Submit">
</body>

</html>