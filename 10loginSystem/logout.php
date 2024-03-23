<?php
require 'C:\xampp\htdocs\WE_Purv\partials\_nav.php';
session_start();
session_unset();
session_destroy();

header("location: login.php");
?>
