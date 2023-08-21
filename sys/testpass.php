<?php 
$password = "1234567";
echo $password;
$password = password_hash($password, PASSWORD_DEFAULT);
echo $password;
$password = "123456";
$password = md5($password);
echo '<br />'.$password;

?>