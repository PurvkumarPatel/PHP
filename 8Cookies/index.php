<?php
// #38
echo "cookies";
// cookies - use to store catagroy or etc normal info at user end
// session - is used to store sensetive data on server side 
setcookie("category","Books",time()+ 86400, "/");// name , value, exipry time in sec, domian where u want to use
echo "cookiee set";
?>
