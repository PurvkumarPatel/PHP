<?php

// #34
// $a = readfile('dbconnect.php');
// echo $a; // dfsgbfufd dfgipsdg fgosdfipngd 31
// here 31 show number of charcter read 

// readfile('dbconnect.php');// dfsgbfufd dfgipsdg fgosdfipngd 
// readfile('1.png');
// readfile('html.html');

// #35
// $fpointer = fopen("html.html","r");//fopen return false if file is available
// echo var_dump($fpointer);// Resource id #3 
// // if use var dump /resource(3) of type (stream)
// if(!$fpointer){
//   echo "Unble to open file. file nameis wrong";
// }
// $contet = fread($fpointer,filesize("html.html"));// fread return file content
// echo $contet;

// fclose($fpointer);// close file

// #36
//$fpointer = fopen("dbconnect.php","r");//fgets readfile line by line
// echo fgets($fpointer);// read first line
// echo fgets($fpointer);// read second line 
// echo var_dump(fgets($fpointer));// bool(false)
/* read file line by line
while($a = fgets($fpointer)){// read whole file
  echo $a;
}
*/
/*
//read file char by char
while($a = fgetc($fpointer)){// read whole file
  echo $a;//L
  break;
}

while($a = fgetc($fpointer)){
  echo $a;
  if($a == "."){
      break;
  }
}
fclose($fpointer);
*/

// #37
echo "Wlc to write in file";
$fptr = fopen("Myfile.txt","w");// it will create file if it was not available and if alredy exist all content will be removed
fwrite($fptr,"ok write in file");// overwrite content on file
fwrite($fptr,"ok rewrite in file");// append on exist content after fptr where it was pointing
fclose($fptr);

$fptr = fopen("Myfile.txt","a");
fwrite($fptr,"ok appended in file");
fclose($fptr);
?>
