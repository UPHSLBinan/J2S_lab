<?php

function get_users() {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", 'mejarito');

    // Check for errors
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Build the SQL query to retrieve all users
    $sql = "SELECT * FROM users";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check for errors
    if (!$result) {
        die("Error executing query: " . mysqli_error($conn));
    }

    // Store the results in an array
    $users = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    // Close the connection and return the results
    mysqli_close($conn);
    return $users;
}
