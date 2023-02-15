<!DOCTYPE html>
<html>
<head>
	<title>User Form</title>
</head>
<body>
    <h1>User Details Form</h1>
    <form method="post" action="submit.php">
      <label for="fname">First Name:</label>
      <input type="text" name="fname" id="fname" required><br><br>
      <label for="lname">Last Name:</label>
      <input type="text" name="lname" id="lname" required><br><br>
      <label for="age">Age:</label>
      <input type="number" name="age" id="age" required><br><br>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required><br><br>
      <label for="detail">Additional Details:</label><br>
      <textarea name="detail" id="detail" rows="5" cols="30"></textarea><br><br>
      <input type="submit" value="Submit">
    </form>

<?php
// Set up the database connection
$host = 'localhost'; // Change this to your database server
$dbname = 'delossantos'; // Change this to your database name
$username = 'user'; // Change this to your database username
$password = 'useruser1'; // Change this to your database password
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$dbh = new PDO($dsn, $username, $password, $options);

// Get the form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$email = $_POST['email'];
$detail = $_POST['detail'];

// Insert the data into the database
$stmt = $dbh->prepare("INSERT INTO users (fname, lname, age, email, detail) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$fname, $lname, $age, $email, $detail]);

// Redirect the user to a confirmation page
header('Location: confirmation.html');
exit;
?>

</body>
</html>

