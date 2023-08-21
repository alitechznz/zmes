<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ZMES</title>
  <link rel="icon" type="image/jfif" href="download.jfif">
</head>
<?php
use Mpdf\Mpdf;

require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new Mpdf(['mode' => 'utf-8', 'orientation' => 'L', 'margin_bottom' => 33, 'margin_header' => 9, 'margin_footer' => 9]);
require_once 'phpqrcode/qrlib.php';
$path = 'images/';
$qrcode = $path.time().".png";
QRcode::png('https://www.makusanyo.alitech.co.tz', $qrcode);

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

$link = 'otpauth://totp/test?secret=B3JX4VCVJDVNXNZ5&issuer=chillerlan.net';
// $qr_code = (new QRCode)->render($data);

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
            <h3>QUARTERLY MONITORING FORM</h3>
            <p><b>A.	Information About the Organization </b></p>
        </div>';

$data .='<font size="1">
        <table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
           <tr style="background-color: #e4f4ee; ">
              <th style="text-align:left;">Particular</th>
              <th style="text-align:left;">Description</th>
           </tr>
           <tr>
               <td><strong>Name of Institution</strong></td>
               <td></td>
           </tr>
           <tr>
               <td><strong>Type of Institution (Government, CSOs, Private Sector)</strong></td>
               <td></td>
           </tr>
           <tr>
               <td><strong>Postal Address</strong></td>
               <td></td>
           </tr>
           <tr>
               <td>Office Telephone</td>
               <td></td>
           </tr>
           <tr>
               <td>Office Email Address</td>
               <td></td>
           </tr>
           <tr>
               <td><strong>Name of M&E Focal Person</strong></td>
               <td></td>
           </tr>
           <tr>
               <td><strong>Contact details of M&E Focal Person</strong></td>
               <td></td>
           </tr>
           <tr>
               <td>  Telephone</td>
               <td></td>
           </tr>
           <tr>
               <td>  Email Address</td>
               <td></td>
           </tr>
           <tr>
               <td><strong>Period of Reporting</strong></td>
               <td></td>
           </tr>
           <tr>
               <td><strong>Date of Submission of the form</strong></td>
               <td></td>
           </tr>
        </table>
        </font>
           ';

$data .= '<br/><div>
           <p><b>B.	Information about the Program/Project </b></p>
         </div>
         <table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
            <tr >
               <th style="text-align: left;">
                  <p>Program/Project Name: </p><br />
                  <p>Starting Date: </p><br />
                  <p>End Date:     </p><br />
                  <p>Total cost of the Program/ Project: </p><br />
                  <p>Planned budget for the particular financial year.</p><br />
                  <p>Sponsor name:   </p><br />
                  <p>Objective of the Program/Project:    </p><br />
                  <p>Program/Project aligns with:-     </p>
               </th>
            </tr>
            <tr>
               <th style="text-align: left;">
                  <b>ZADEP- THEME: Blue Economy for Inclusive Growth and Sustainable Development</b>
               </th>
            </tr>
            <tr>
               <td style="text-align: left;">
                  <p>Strategic Area: </p><br />
                  <p>Priority Area: </p><br />
                  <p>Indicator: </p><br />
                  <p>Write your (Indicator Definition, Base line, Target (Year).</p>
               </td>
            </tr>
            <tr>
               <th style="text-align: left;">
                  <b>Sustainable Development Goals (SDGs)</b>
               </th>
            </tr>
            <tr>
               <td style="text-align: left;">
                  <p>Goal: </p><br />
                  <p>Indicator: </p><br />
               </td>
            </tr>
            <tr>
               <th style="text-align: left;">
                  <b>AFRICAN AGENDA 2063</b>
               </th>
            </tr>
            <tr>
               <td style="text-align: left;">
                  <p>Aspiration:</p><br />
                  <p>Goal: </p><br />
                  <p>Priority Area: </p><br />
                  <p>Indicator: </p><br />
               </td>
            </tr>
         </table>';

$data .= '<br/>
       <p>
            <input type="checkbox"  name="note" value="note" checked="checked"><span>:    Indicates Checked|Selected</span>
       </p>
       <table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
          <tr >
             <th style="text-align: left;">Type: </th>
             <td colspan="3">
                  <input type="checkbox" id="Programme" name="Programme" value="Programme" checked="checked">
                  <label for="vehicle1">Programme</label><br>
             </td>
             <td colspan="3">
                  <input type="checkbox" id="Project" name="Project" value="Project">
                  <label for="vehicle1">Project</label><br>
             </td>
          </tr>
          <tr>
             <th style="text-align: left;">Program/ Project aligned with  </th>
               <td colspan="1">
                     <input type="checkbox" checked="checked">
                     <label>ZADEP</label><br>
               </td>
               <td colspan="2">
                     <input type="checkbox">
                     <label>Sustainable Development Goals   </label><br>
               </td>
               <td colspan="2">
                     <input type="checkbox">
                     <label>Annual Development Plan    </label><br>
               </td>
               <td colspan="1">
                     <input type="checkbox" checked="checked">
                     <label>Agenda 2063 </label><br>
               </td>
          </tr>
          <tr >
             <th style="text-align: left;">Project Status:</th>
               <td colspan="1">
                     <input type="checkbox" checked="checked">
                     <label>IDENTIFICATION (The project is being scoped or planned)</label><br>
               </td>
               <td colspan="1">
                     <input type="checkbox">
                     <label>IMPLEMENTATION (The project is currently being implemented)  </label><br>
               </td>
               <td colspan="2">
                     <input type="checkbox">
                     <label>COMPLETION (Physical activity is complete or the final disbursement has been made) </label><br>
               </td>
               <td colspan="1">
                     <input type="checkbox">
                     <label>CANCELLED (The project has been cancelled)  </label><br>
               </td>
               <td colspan="1">
                     <input type="checkbox">
                     <label>SUSPENDED (The project has been temporarily suspended) </label><br>
               </td>
          </tr>
          <tr>
            <th style="text-align: left;">Description:</th>
            <td colspan="6">enter project description:</td>
          </tr>
          <tr>
            <th style="text-align: left;" colspan="4">Title/Name of the Program/ project:</th>
            <th colspan="3">Short title of the project: </th>
         </tr>
         <tr>
            <th style="text-align: left;" rowspan="4">Sector:</th>
            <td colspan="1">
               <input type="checkbox">
               <label>Hotel and Tourism </label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Agriculture</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Trade </label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Transport</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Industrial</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Economic</label><br>
            </td>
         </tr>
         <tr>
            <td colspan="1">
               <input type="checkbox">
               <label>Health </label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Fisheries</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Culture </label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Sport</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Construction</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Environment</label><br>
            </td>
         </tr>
         <tr>
            <td colspan="1">
               <input type="checkbox">
               <label>Water supply</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Energy and Electricity</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Oil and Gas </label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Gender</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Good Governance</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Settlement</label><br>
            </td>
         </tr> 
         <tr>
            <td colspan="2">
               <input type="checkbox">
               <label>Information and communication</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Social Service</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Land</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Finance</label><br>
            </td>
            <td colspan="1">
               <input type="checkbox">
               <label>Social Protection</label><br>
            </td>
         </tr>
         <tr>
            <th colspan="2">
              <p>Internal Code:</p>
            </th>
            <th colspan="2">
               <p>External Code:</p>
            </th>
            <th colspan="2">
               <p>Duration of the Program/Project: </p>
            </th>
            <th colspan="1">
              <p>Duration Unit: </p>
            </th>
         </tr>
         <tr>
            <th colspan="2">
              <p>Start Date:  dd/mm/yyyy</p>
            </th>
            <th colspan="2">
               <p>Expected End Date:</p>
            </th>
            <th colspan="1">
               <p>Phase: </p>
            </th>
            <th colspan="2">
              <p>Sponsor Type:  </p>
            </th>
         </tr>
       </table>';

$data .= '<br/><div>
       <p><b>C:  Implementation of the Program/Project </b></p>
     </div>
     <table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
         <tr style="background-color: #e4f4ee; ">
            <th style="text-align:left;" rowspan="2">Annual Planned Activities</th>
            <th style="text-align:left;" rowspan="2">Indicator</th>
            <th style="text-align:left;" rowspan="2">Definition of Indicator</th>
            <th style="text-align:left;" rowspan="2">Baseline</th>
            <th style="text-align:left;" colspan="2" >Target</th>
            <th style="text-align:left;" rowspan="2">Target	Percentage of Implementation</th>
            <th style="text-align:left;" rowspan="2">physically implementation</th>
            <th style="text-align:left;" rowspan="2">Activities which are not Implemented</th>
            <th style="text-align:left;" rowspan="2">Remarks</th>
         </tr>
         <tr style="background-color: #e4f4ee; ">
            <th style="text-align:left;" colspan="1">Annually</th>
            <th style="text-align:left;" colspan="1">Quarterly/Semi/ nine months annual</th>
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
            <th style="text-align:left;" rowspan="1"></th>
            <th style="text-align:left;" rowspan="1"></th>
         </tr>
         
     </table>';

$data .= '<br/><div>
     <p><b>D: Resource Tracking</b></p>
   </div>
   <table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
      <tr>
         <th>Name of the Program/Project</th>
         <th colspan="10"></th>
      </tr>
      <tr>
          <th style="text-align:left;" rowspan="2">Source of Funds</th>
          <th style="text-align:left;" colspan="2">SMZ (TZS)</th>
          <th style="text-align:left;" colspan="2">Development Partner (TZS)</th>
          <th style="text-align:left;" colspan="2">PPP </th>
          <th style="text-align:left;" colspan="2">SMZ & Donor (s)</th>
          <th style="text-align:left;" colspan="2">SMT & SMZ</th>
       </tr>
       <tr>
          <th style="text-align:left;" colspan="1">Grant</th>
          <th style="text-align:left;" colspan="1">Loan</th>
          <th style="text-align:left;" colspan="1">Grant</th>
          <th style="text-align:left;" colspan="1">Loan</th>
          <th style="text-align:left;" colspan="1">Grant</th>
          <th style="text-align:left;" colspan="1">Loan</th>
          <th style="text-align:left;" colspan="1">Grant</th>
          <th style="text-align:left;" colspan="1">Loan</th>
          <th style="text-align:left;" colspan="1">Grant</th>
          <th style="text-align:left;" colspan="1">Loan</th>
       </tr>
       <tr>
          <th style="text-align:left;" colspan="1">Planned Budget for the period of Reporting.
               (Quarterly, Semi  annual, Nine Months or Annual)
          </th>
          <th style="text-align:left;" colspan="2"></th>
          <th style="text-align:left;" colspan="2"></th>
          <th style="text-align:left;" colspan="2"> </th>
          <th style="text-align:left;" colspan="2"></th>
          <th style="text-align:left;" colspan="2"></th>
       </tr>
       <tr>
         <th style="text-align:left;" colspan="1">
            Actual Disbursement for the period of Reporting
         </th>
         <th style="text-align:left;" colspan="2"></th>
         <th style="text-align:left;" colspan="2"></th>
         <th style="text-align:left;" colspan="2"> </th>
         <th style="text-align:left;" colspan="2"></th>
         <th style="text-align:left;" colspan="2"></th>
      </tr>
      <tr>
         <th style="text-align:left;" colspan="1">
            Actual Expenditure for the period of Reporting
         </th>
         <th style="text-align:left;" colspan="2"></th>
         <th style="text-align:left;" colspan="2"></th>
         <th style="text-align:left;" colspan="2"> </th>
         <th style="text-align:left;" colspan="2"></th>
         <th style="text-align:left;" colspan="2"></th>
      </tr>
      <tr>
         <th style="text-align:left;" colspan="1">
               Percentage of Actual Disbursement against Planned Budget for the Period of Reporting
         </th>
         <th style="text-align:left;" colspan="2"></th>
         <th style="text-align:left;" colspan="2"></th>
         <th style="text-align:left;" colspan="2"> </th>
         <th style="text-align:left;" colspan="2"></th>
         <th style="text-align:left;" colspan="2"></th>
      </tr>
      <tr>
         <th style="text-align:left;" colspan="1">
               Percentage of Actual expenditure against Actual Disbursement for the period of Reporting
         </th>
         <th style="text-align:left;" colspan="2"></th>
         <th style="text-align:left;" colspan="2"></th>
         <th style="text-align:left;" colspan="2"> </th>
         <th style="text-align:left;" colspan="2"></th>
         <th style="text-align:left;" colspan="2"></th>
      </tr>
   </table>';


 $data .='<p><b>E: NARRATIVE MONITORING AND EVALUATION PROGRESS REPORT FORMAT</b></p>
         <p><strong>Backgroud and Objective of the Program/Project:</strong></p>
         <p><strong>Justification of the Program/Project/What outputs/results have been produced so far?</strong></p>
         <p><strong>Challeges during the Implementation of the Program/Project for the period of reporting.</strong></p>
         <p><strong>Which measure did you take to overcome challenges</strong></p>
         <p><strong>Recommendations </strong></p>
         <p><strong>What were the Lessons Learnt during the implementation of the project/programme</strong></p>
      ';  
$mpdf->WriteHTML($data);
$mpdf->Output();

?>

<!-- Apart from configuration variables defined in ConfigVariables and FontVariables classes it can obtain variables which where the arguments from the constructor of mPDF < 7.0: mode, format, default_font_size, default_font, margin_left (formerly $mgl), margin_right (formerly $mgr), margin_top (formerly $mgt), $margin_bottom (formerly mgb), $margin_header (formerly $mgh), margin_footer (formerly $mgf), orientation. These variables with their defaults are described in the next section. -->
</html>