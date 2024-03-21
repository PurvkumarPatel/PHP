<?php
  include 'dbconnect.php';
  // include 'dbconnect1.php';// it only gives an warning not an error
  // require 'dbconnect1.php';// it gives error bcz fileis not exist 
  $sql = "SHOW DATABASES";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      echo "<table>";
      echo "<tr><th>Database Name</th></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row['Database'] . "</td></tr>";
      }
      echo "</table>";
  } else {
      echo "No databases found.";
  }
?>

<!-- output -->
<!-- Connection was successful
Database Name
goodvibes
information_schema
my_db
mysql
notes
performance_schema
phpmyadmin
test -->