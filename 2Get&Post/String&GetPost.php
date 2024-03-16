
<!-- Task 1: PHP Function for Checking Lowercase -->
<?php
function lowercheck($a){
    if($a === strtolower($a)){
        echo " Lowercase";
    } else{
        echo " No Lowercase";
    }
    echo "<br>";
}
$s1 = "Purv";
$s2 = "purv";
echo "<h2>PHP String Manupulation</h2>";
echo "<h3>Task 1:</h3>";
echo "Check for string $s1 :";
lowercheck($s1);

echo "Check for string $s2 :";
lowercheck($s2);
?>

<!-- Task 2: PHP Function for Removing Whitespaces -->
<?php
function whitespaceremove($a){
    $no_ws='';
    for($i=0; $i<strlen($a); $i++){
        if($a[$i]!==' '){
            $no_ws=$no_ws.$a[$i];
        }
    }
    echo $no_ws;
    echo "<br>";
}
$s1 = "   Purv ghjk  ";
$s2 = "   purv hlkj b ";

echo "<h3>Task 2:</h3>";
echo "Check for string : $s1". "Whitespace Removed :";
whitespaceremove($s1);
echo "Check for string : $s2 ". "Whitespace Removed :";
whitespaceremove($s2);
?>

<!-- Task 3: Check for Substring in PHP -->
<?php
$s = "Hello, kem cho !";
echo "<h3>Task 3:</h3>";
echo "String in input : $s";
echo "<br>";
if (strpos($s, "kem cho") !== false) {
    echo "The string contains 'kem cho'";
} else {
    echo "The string does not contain 'kem cho'";
}
echo "<br>";
?>

<!-- Task 4: PHP Email Validation -->
<?php
function email_validation($str) { 
    return (!preg_match( "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $str)) ? FALSE : TRUE; 
}

$email = "test@example.com";
echo "<h3>Task 4:</h3>";
echo "Test Email : $email";
echo "<br>";
email_validation($email);
echo "<br>";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Valid email";
} else {
    echo "Invalid email";
}
echo "<br>";
?>

<!-- Task 5: PHP Array Implode and Foreach -->
<?php
$colors = array('white', 'green', 'red');
echo "<h3>Task 5:</h3>";
echo "Output: " . implode(', ', $colors) . "<br>";
foreach ($colors as $color) {
    echo "• " . $color . "<br>";
}
echo "<br>";
?>

<!-- Task 6: PHP String Replacement -->
<?php
$string = 'the IIIT Surat is located in Kholvad, Kamrej';
echo "<h3>Task 6:</h3>";
echo $string."<br>";
$new_string = preg_replace('/\bthe\b/', 'That', $string, 1);
echo $new_string."<br>";
?>

<!-- Task 7: PHP Function to Add 'if' Prefix -->
<?php
function add_if($string) {
    if (substr($string, 0, 2) !== 'if') {
        $string = 'if ' . $string;
    }
    return $string;
}
$s1="if else";
$s2="else";
$s3="if";

echo "<h3>Task 7:</h3>";
echo add_if($s1) . "<br>";
echo add_if($s2) . "<br>";
echo add_if($s3) . "<br>";
?>

<!-- Task 8: HTML Form using GET and POST Methods -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Task 8:</h3>
    <h4>GET METHOD</h4> 
    <form method="get" action="get.php">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    <input type="submit" value="Submit">
    </form>

    <h4>POST METHOD</h4> 
    <form method="post" action="post.php">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    <input type="submit" value="Submit">
    </form>
</body>
</html>
