<!DOCTYPE html>
<html>
<head>
	<title>Registered Users</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
	</style>
</head>
<body>

	<h2>Registered Users</h2>

	<a href="register.php"><button>Register</button></a>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Age</th>
				<th>Birthday</th>
				<th>Address</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Connect to database
				$servername = "localhost";
				$username = "Tundra";
				$password = "akositundra123";
				$dbname = "tundra";
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				// Query the database
				$sql = "SELECT id, fname, lname, age, birthday, address FROM register";
				$result = mysqli_query($conn, $sql);

				// Output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row["id"] . "</td>";
					echo "<td>" . $row["fname"] . "</td>";
					echo "<td>" . $row["lname"] . "</td>";
					echo "<td>" . $row["age"] . "</td>";
					echo "<td>" . $row["birthday"] . "</td>";
					echo "<td>" . $row["address"] . "</td>";
					echo "</tr>";
				}

				// Close database connection
				mysqli_close($conn);
			?>
		</tbody>
	</table>

</body>
</html>