<!DOCTYPE html>
<html>
<head>
	<title>PHP Basic</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<style>
		.container {
			margin-top: 50px;
		}
		h2 {
			margin-top: 30px;
			margin-bottom: 10px;
			text-align: center;
			color: #007bff;
		}
		h3 {
			margin-top: 30px;
			margin-bottom: 10px;
		}
		p {
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>UI21CS43 WE AS-3 PHP</h2>
		<div class="row">
			<div class="col-md-12">
				<h3>Task - 1</h3>
				<p>This task displays all the details of the web server using the phpinfo() function.</p>
				<?php
				//phpinfo();
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3>Task - 2</h3>
				<p>This task checks the student grade based on the marks using if-else statements.</p>
				<?php
				$marks = 50;
				if ($marks >= 60) {
				    echo "<p>First Division</p>";
				} elseif ($marks >= 45 && $marks <= 59) {
				    echo "<p>Second Division</p>";
				} elseif ($marks >= 33 && $marks <= 44) {
				    echo "<p>Third Division</p>";
				} else {
				    echo "<p>Fail</p>";
				}
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3>Task - 3</h3>
				<p>This task calculates the factorial of a number using a for loop in PHP.</p>
				<?php
				$number = 10; 
				$factorial = 1;

				for ($i = 1; $i <= $number; $i++) {
				    $factorial *= $i;
				}

				echo "<p>The factorial of $number is $factorial</p>";
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3>Task - 4</h3>
				<p>This task finds the factorial of a number using a recursive function in PHP.</p>
				<?php
				function factorial($n) {
				    if ($n <= 1) {
				        return 1;
				    } else {
				        return $n * factorial($n - 1);
				    }
				}

				$number = 5;
				echo "<p>The factorial of $number is " . factorial($number) . "</p>";
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3>Task - 5</h3>
				<p>This task calculates the electricity bill in PHP based on the number of units consumed.</p>
				<?php
				$units = 150;
				$totalBill = 0;

				if ($units <= 50) {
				    $totalBill = $units * 3.50;
				} elseif ($units <= 150) {
				    $totalBill = 50 * 3.50 + ($units - 50) * 4.00;
				} elseif ($units <= 250) {
				    $totalBill = 50 * 3.50 + 100 * 4.00 + ($units - 150) * 5.20;
				} else {
				    $totalBill = 50 * 3.50 + 100 * 4.00 + 100 * 5.20 + ($units - 250) * 6.50;
				}

				echo "<p>The electricity bill for $units units is Rs. " . $totalBill . "</p>";
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3>Task - 6</h3>
				<p>This task removes a specific element by value from an array using PHP array_search(), array_diff() functions, and a foreach loop.</p>
				<?php
				$months = ["January", "February", "March", "April", "May"];
				$valueToDelete = "March";

				if (($key = array_search($valueToDelete, $months)) !== false) {
				    unset($months[$key]);
				}

				$delete_item = "April";
				foreach (array_keys($months, $delete_item) as $key) {
				    unset($months[$key]);
				}

				$valueToDelete = "February";
				$filteredArray = array_diff($months, [$valueToDelete]);

				echo "<p>" . implode(", ", $filteredArray) . "</p>";
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3>Task - 7</h3>
				<p>This task generates a list of the first 20 prime numbers using a while loop and for loop in PHP.</p>
				<?php
				$count = 0;
				$number = 2;

				while ($count < 20) {
				    $is_prime = true;

				    for ($i = 2; $i <= $number / 2; $i++) {
				        if ($number % $i == 0) {
				            $is_prime = false;
				            break;
				        }
				    }

				    if ($is_prime) {
				        echo "<p>" . $number . "</p>";
				        $count++;
				    }

				    $number++;
				}
				?>
			</div>
		</div>
	</div>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>