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
    $search_param = $_POST['search_param'];
    $search_query = $_POST['search_query'];

    $sql = "SELECT * FROM person WHERE $search_param LIKE '%$search_query%'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>Age</th><th>DOB</th><th>Location</th><th>ID</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['age'] . "</td><td>" . $row['dob'] . "</td><td>" . $row['location'] . "</td><td>" . $row['id'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No results found";
    }
}

mysqli_close($conn);
?>
