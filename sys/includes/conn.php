<?php
// Set error reporting level to exclude warnings
error_reporting(E_ALL & ~E_WARNING);
$conn = new mysqli('localhost', 'planning_zmes', '{Yk?z9S5^h.q', 'planningznz_testzmes');
// $conn = new mysqli('localhost', 'root', '', 'planning_zmes');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //echo "success";
}
