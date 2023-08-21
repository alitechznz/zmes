<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ZMES</title>
  <link rel="icon" type="image/jfif" href="download.jfif">
</head>
<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new Mpdf(['mode' => 'utf-8', 'orientation' => 'L', 'margin_bottom' => 30, 'margin_header' => 9, 'margin_footer' => 9]);

// require_once __DIR__ . '/vendor/autoload.php';
// $mpdf=new mPDF('utf-8-s','A4','','',15,15,13,45,5,5);

// require_once 'phpqrcode/qrlib.php';
// $path = 'images/';
// $qrcode = $path.time().".png";
// QRcode::png('https://www.makusanyo.alitech.co.tz', $qrcode);

//create header
$dataheader ='
    <div width="100%" style="text-align: center; font-family: Times New Roman, Times, serif;">
          <img src="images/smz-trans.png" style="width:15%;">
	  </div>
    <div width="100%" style="text-align: center;font-family: Times New Roman, Times, serif !important; ">
          <h2>ZANZIBAR PLANNING COMMISSION</h2>
		</div>
';
// $mpdf->SetHTMLHeader($dataheader);

$datafooter = '<table width="100%" style="margin: 0px;">
                  <tr>
                     <td width="33%">{DATE j-m-Y}</td>
                     <td width="33%" align="center">Page {PAGENO} of {nbpg}</td>
                     <td width="33%" align="right"><img src="'.$qrcode.'" alt="QR Code" /></td>
                  </tr>
               </table>';
$mpdf->SetHTMLFooter($datafooter);

$data = '<div width="100%" style="text-align: center; font-family: Times New Roman, Times, serif;">
            <img src="images/smz-trans.png" style="width:15%;">
         </div>
         <div width="100%" style="text-align: center;font-family: Times New Roman, Times, serif !important; ">
            <h2>ZANZIBAR PLANNING COMMISSION</h2>
         </div>';

$data .= '<br/><div style="">
            <h3>ANNUAL MONITORING FORM</h3>
            <p><b>A.	Monitoring and Evaluation Framework for Zanzibar Development Plan “ZADEP” (2021-2026) </b></p>
            <p>Theme: Blue Economy for Inclusive Growth and Sustainable Development</p>
         </div>';

$data .= '<br/>
     <table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
         <tr style="background-color: #e4f4ee; ">
            <th style="text-align:left;" rowspan="1">Indicators</th>
            <th style="text-align:left;" rowspan="1">Indicator definition</th>
            <th style="text-align:left;" rowspan="1">Baseline</th>
            <th style="text-align:left;" rowspan="1">Target (2026)</th>
            <th style="text-align:left;" colspan="1" >Status 2023</th>
            <th style="text-align:left;" rowspan="1">Data source</th>
            <th style="text-align:left;" rowspan="1">Frequency</th>
            <th style="text-align:left;" rowspan="1">Responsible Institution</th>
         </tr>
        
         <tr>
            <th style="text-align:left;" rowspan="1"></th>
            <th style="text-align:left;" rowspan="1"></th>
            <th style="text-align:left;" rowspan="1"></th>
            <th style="text-align:left;" rowspan="1"></th>
            <th style="text-align:left;" colspan="1"></th>
            <th style="text-align:left;" rowspan="1"></th>
            <th style="text-align:left;" rowspan="1"></th>
            <th style="text-align:left;" rowspan="1"></th>
         
         </tr>
         <tr>
            <th style="text-align:left;" rowspan="1"></th>
            <th style="text-align:left;" rowspan="1"></th>
            <th style="text-align:left;" rowspan="1"></th>
            <th style="text-align:left;" rowspan="1"></th>
            <th style="text-align:left;" colspan="1"></th>
            <th style="text-align:left;" rowspan="1"></th>
            <th style="text-align:left;" rowspan="1"></th>
            <th style="text-align:left;" rowspan="1"></th>
          
         </tr>
         
     </table>';
$mpdf->WriteHTML($data);
$mpdf->Output();

?>

<!-- Apart from configuration variables defined in ConfigVariables and FontVariables classes it can obtain variables which where the arguments from the constructor of mPDF < 7.0: mode, format, default_font_size, default_font, margin_left (formerly $mgl), margin_right (formerly $mgr), margin_top (formerly $mgt), $margin_bottom (formerly mgb), $margin_header (formerly $mgh), margin_footer (formerly $mgf), orientation. These variables with their defaults are described in the next section. -->
</html>