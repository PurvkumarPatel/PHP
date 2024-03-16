<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "my_db";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $location = $_POST['location'];

    $sql = "INSERT INTO person (first_name, last_name, dob, location) VALUES ('$first_name', '$last_name', '$dob', '$location')";

    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
