<?php

// #34
// $a = readfile('dbconnect.php');
// echo $a; // dfsgbfufd dfgipsdg fgosdfipngd 31
// here 31 show number of charcter read 

// readfile('dbconnect.php');// dfsgbfufd dfgipsdg fgosdfipngd 
// readfile('1.png');
// readfile('html.html');

// #35
$fpointer = fopen("html.html","r");//fopen return false if file is available
echo var_dump($fpointer);// Resource id #3 
// if use var dump /resource(3) of type (stream)
if(!$fpointer){
  echo "Unble to open file. file nameis wrong";
}
$contet = fread($fpointer,filesize("html.html"));// fread return file content
echo $contet;

fclose($fpointer);// close file

?>
