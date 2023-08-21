<?php 

require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new mPDF();
$mpdf->tabSpaces = 2;
$stylesheet = file_get_contents('../mpdf.css');

include 'printheader.php';
include 'printfooter.php';

$mpdf->SetHTMLHeader($printheader);
$mpdf->SetHTMLFooter($printfooter);

$table_header ='<table id="example2" class="table table-bordered table-hover">
                <thead>
                  <th>S.N</th>
                  <th>Title</th>
                  <th>Implementor(s)</th>
                  <th>Sponser(s)</th>
                  <th>Duration</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody id="searchResult">
                
                </tbody>
                </table>';
               

//write mpdf from html_entity_decode
$mpdf->WriteHTML($table_header);

//make the output to the  browser
$mpdf->Output();
//$mpdf->Output("mypdf.pdf","D");


?>