<?php
// start session and get data 
session_start();
if(isset( $_SESSION["user"])){
echo "wlc you logged as ". $_SESSION["user"];
echo "<br> your favourite catagory is ". $_SESSION["favCatgory"];
echo "<br>";
}else{
  echo "session is ended.login again";
}
?>