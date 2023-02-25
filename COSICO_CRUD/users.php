<?php
require_once 'database.php';
$sql = "SELECT * FROM users";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
<div class ="container mt-2 ">
<button class = "btn btn-primary my-5"> <a href ="login.php" class= "text-light">Back </a>
</div>
<div class="container mb-4 mt-5">
	<?php
		// Determine the current page number
		if (!isset($_GET['page'])) {
			$page = 1;
		} else {
			$page = $_GET['page'];
		}

		// Determine the number of records to display per page
		$records_per_page = 10;

		// Calculate the starting record for the current page
		$start = ($page - 1) * $records_per_page;

		// Get the total number of records
		$sql = "SELECT COUNT(*) as total FROM users";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$total_records = $row['total'];

		// Calculate the total number of pages
		$total_pages = ceil($total_records / $records_per_page);

		// Retrieve the records to display on the current page
		$sql = "SELECT * FROM users LIMIT $start, $records_per_page";
		$result = mysqli_query($conn, $sql);

		// Display the records in a table
		echo "<table class='table'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>id</th>";
		echo "<th>username</th>";
		echo "<th>firstname</th>";
		echo "<th>middlename</th>";
		echo "<th>lastname</th>";
		echo "<th>age</th>";
		echo "<th>birthday</th>";
		echo "<th>address</th>";
		
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['username'] . "</td>";
			echo "<td>" . $row['firstname'] . "</td>";
			echo "<td>" . $row['middlename'] . "</td>";
			echo "<td>" . $row['lastname'] . "</td>";
			echo "<td>" . $row['age'] . "</td>";
			echo "<td>" . $row['birthday'] . "</td>";
			echo "<td>" . $row['address'] . "</td>";
			
			
	}
	echo "</tbody>";
		echo "</table>";

		// Display pagination links
		echo "<ul class='pagination'>";
		for ($i = 1; $i <= $total_pages; $i++) {
			if ($i == $page) {
				echo "<li class='page-item active'><a class='page-link' href='?page=$i'>$i</a></li>";
			} else {
				echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
			}
		}
		echo "</ul>";
	?>
</div>

</body>
</html>

