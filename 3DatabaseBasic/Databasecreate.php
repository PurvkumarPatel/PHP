<?php
echo "Welcome to the stage where we are ready to get connected to a database <br>";

$servername = "localhost";
$username = "root";
$password = "";
$database = "my_db";
$conn = mysqli_connect($servername, $username, $password);

if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was successful";
}

$sql1 = "CREATE DATABASE IF NOT EXISTS my_db";
if (mysqli_query($conn, $sql1)) {
    echo "Database created successfully!<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

// Selecting the database
mysqli_select_db($conn, $database);

$sql2 = "CREATE TABLE IF NOT EXISTS person (
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    age INT,
    dob DATE,
    location VARCHAR(100)
)";
if (mysqli_query($conn, $sql2)) {
    echo "Table created successfully!<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

$sql3 = "INSERT INTO person (first_name, last_name, age, dob, location) VALUES
('John', 'Doe', 30, '1992-05-21', 'New York'),
('Jane', 'Smith', 25, '1997-11-15', 'Los Angeles'),
('Jim', 'Jimenez', 28, '1994-08-03', 'San Francisco'),
('Emma', 'Emerson', 32, '1989-02-17', 'Chicago'),
('Michael', 'Miller', 35, '1986-09-05', 'Boston'),
('Sophia', 'Solomon', 29, '1993-06-22', 'Seattle'),
('David', 'Davis', 33, '1990-03-10', 'Denver'),
('Olivia', 'Oliver', 27, '1995-08-08', 'Washington D.C.'),
('William', 'Williams', 31, '1991-12-15', 'Miami'),
('Ethan', 'Ethan', 26, '1996-04-23', 'Phoenix')";

if (mysqli_query($conn, $sql3)) {
    echo "Records inserted successfully!<br>";
} else {
    echo "Error inserting records: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);
?>
