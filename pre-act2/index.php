<!DOCTYPE html>
<html>
<head>
    <title>Mejarito_J2S</title>
</head>
<body>
    <h1>Mejarito Users</h1>

    <!-- Create User Form -->
    <h2>Create User</h2>
    <form action="create_user.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name"><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name"><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>

        <label for="detail">Detail:</label>
        <textarea id="detail" name="detail"></textarea><br>

        <input type="submit" value="Create">
    </form>

    <!-- Read Users -->
    <h2>Read Users</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'read_users.php';
            $users = get_users();
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>{$user['id']}</td>";
                echo "<td>{$user['FirstName']}</td>";
                echo "<td>{$user['LastName']}</td>";
                echo "<td>{$user['Age']}</td>";
                echo "<td>{$user['EMail']}</td>";
                echo "<td>{$user['Detail']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Update User Form -->
    <h2>Update User</h2>
    <form action="update_user.php" method="post">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id"><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name"><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name"><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>

        <label for="detail">Detail:</label>
        <textarea id="detail" name="detail"></textarea><br>

        <input type="submit" value="Update">
    </form>

    <!-- Delete User Form -->
    <h2>Delete User</h2>
    <form action="delete_user.php" method="post">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id"><br>

        <input type="submit" value="Delete">
    </form>
</body>
</html>
