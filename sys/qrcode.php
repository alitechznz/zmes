<?php 
require_once 'phpqrcode/qrlib.php';
$path = 'images/';
$qrcode = $path.time().".png";
QRcode::png("Ali Omar Ali", $qrcode);
echo "<img src='".$qrcode."'>";
?>