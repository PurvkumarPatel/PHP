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
    $id = $_POST['id']; // Assuming you get the ID from the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $location = $_POST['location'];

    $sql = "UPDATE person SET first_name='$first_name', last_name='$last_name', dob='$dob', location='$location' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
