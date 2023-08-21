<?php
$foo = 'hello world!';
$foo = ucfirst($foo);             // Hello world!

$bar = 'HELLO WORLD!';
$bar = ucfirst($bar);             // HELLO WORLD!
$bar = ucfirst(strtolower($bar)); // Hello world!

ucwords("hello world"); // Hello World
ucfirst("hello world"); // Hello world

$lowercase = "this is lower case";
$uppercase = strtoupper($lowercase);

echo $uppercase;

$str_first_cap = "hang on, this is first letter capital example!";
echo ucwords($str_first_cap);

?>