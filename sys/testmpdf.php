<?php
//include the library
require_once __DIR__ . '/vendor/autoload.php';

//grab the variable
//$fname =$_post[''];
$fname ='ali omar ali';

//create new pdf instance
// this for v7+ $mpdf = new \Mpdf\Mpdf(); 
$mpdf = new mPDF();

//crate object will hold all html_entity_decode
$data ="";
$data .='<h1> MY FIRST PDF </h1><br />';
$data .='<strong> my name is: '.$fname.'</strong>';

//write mpdf from html_entity_decode
$mpdf->WriteHTML($data);

//make the output to the  browser
$mpdf->Output("mypdf.pdf","D");
?>