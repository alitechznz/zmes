<?php

$username = "root"; 
$password = ""; 
//$password="iRPw-L$w6@WI56xzsd@986/yht+})&^";
$host = "localhost"; 
$dbname = "elabdb"; 
//echo "Connected successfully";
// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
//echo "Connected successfully";
}



?>