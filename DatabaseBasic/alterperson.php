<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "my_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL to add id column
$sql = "ALTER TABLE person ADD id INT AUTO_INCREMENT PRIMARY KEY";

if (mysqli_query($conn, $sql)) {
    echo "Column 'id' added successfully";
} else {
    echo "Error adding column: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
