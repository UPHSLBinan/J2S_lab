<!DOCTYPE html>
<html>
  <head>
    <title>User Details Form</title>
  </head>
  <body>
    <h1>User Details Form</h1>
    <form method="post" action="bago2.php">
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

  </body>
</html>