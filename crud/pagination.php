<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userprofile";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Pagination
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$perPage = 6;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// Query to get total number of users
$totalUsers = mysqli_query($conn, "SELECT COUNT(*) as total FROM user");
$totalUsers = mysqli_fetch_assoc($totalUsers);
$totalPages = ceil($totalUsers['total'] / $perPage);

// Query to get users for current page
$sql = "SELECT * FROM user LIMIT $start, $perPage";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Profiles</title>
</head>
<body>
  <h1>User Profiles</h1>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Birthday</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['middlename']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['birthday']; ?></td>
        <td><?php echo $row['address']; ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <div class="pagination">
    <?php if ($page > 1): ?>
    <a href="?page=<?php echo ($page - 1); ?>">Previous</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
    <a href="?page=<?php echo ($page + 1); ?>">Next</a>
    <?php endif; ?>
  </div>

</body>
</html>

<?php

// Display 
echo '<form action="register.php" method="post">';
echo '<input type="submit" name="delete" value="Go Back">';
echo '</form>';

// Close connection
mysqli_close($conn);
?>