<?php
// #39
// session is used to manage ingormation across different pages
//verify user and start session
session_start();
$_SESSION["user"]="Patel";
$_SESSION["favCatgory"]="Books";
echo "session started, saved and you are verified";
?>
