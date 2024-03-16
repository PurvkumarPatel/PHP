<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "my_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get all table names
$sql = "SHOW TABLES FROM $database";
$result = $conn->query($sql);

if (!$result) {
    die("Error fetching table names: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Output the table names
    echo "<ul>";
    while ($row = $result->fetch_row()) {
        echo "<li>" . $row[0] . "</li>";
    }
    echo "</ul>";
} else {
    echo "0 results";
}

$conn->close();
?>
