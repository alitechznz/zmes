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
$mpdf = new Mpdf(['mode' => 'utf-8', 'orientation' => 'L', 'margin_bottom' => 35, 'margin_header' => 9, 'margin_footer' => 9]);

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    } else {
        $id = 0;
    }
                      
    include 'includes/conn.php';
    $query = "SELECT * FROM `projecttb`where ID = $id"; 
    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
    $row = mysqli_fetch_array($result);

    $get_proj_type = $row['pType'];
    $get_proj_status = $row['Status'];
    $get_proj_sector = $row['SectorID'];


    //get the financing details
    $query_fi = "SELECT * FROM `project_financing` WHERE `Project`='$id'"; 
    $result_fi = mysqli_query($conn, $query_fi) or die("Error : ".mysqli_error($conn));
    $num = 0;
    $_SESSION['total_tshs'] = 0;
    $_SESSION['total_f'] = 0;
    $_SESSION['disbursed_tshs'] = 0;
    $_SESSION['disbursed_f'] = 0;

       
//create header
// $mpdf->SetHTMLHeader($dataheader);
require_once 'phpqrcode/qrlib.php';
$path = 'images/';
$qrcode = $path.time().".png";
QRcode::png('https://www.makusanyo.alitech.co.tz', $qrcode);
// echo "<img src='".$qrcode."'>";

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


$data .= '<br/><div>
            <h3>PROGRAMM|PROJECT INFORMATION</h3>
           <p><b>A.	Information about the Program/Project </b></p>
         </div>
         <table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;">
            <tr >
               <td style="text-align: left;">
                  <p><b>Program/Project Name:</b> &emsp; '.$row['pTitle'].'</p><br />
                  <p><b>Starting Date:</b> &emsp; '.$row['StartDate'].'</p><br />
                  <p><b>End Date:</b>&emsp;    '.$row['EndDate'].' </p><br />
                  <p><b>Total cost of the Program/ Project:</b>&emsp; </p><br />
                  <p><b>Planned budget for the particular financial year.</b>&emsp;</p><br />
                  <p><b>Sponsor name:</b>&emsp; '.$row['SponsorType'].'  </p><br />
                  <p><b>Objective of the Program/Project:</b>&emsp; '.$row['Description'].'   </p><br />
                  <p><b>Program/Project aligns with:-</b>&emsp; '.$row['AgendaID'].'    </p>
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
                  <p>'.$get_proj_type.'</p>
             </td>
             <td colspan="3">
                  
             </td>
          </tr>
          <tr >
             <th style="text-align: left;">Project Status:</th>
               <td colspan="6">
                     <p>'.$get_proj_status.'</p>
               </td>
          </tr>
          <tr>
            <th style="text-align: left;">Description:</th>
            <td colspan="6">enter project description:&emsp; '.$row['Description'].'</td>
          </tr>
          <tr>
            <th style="text-align: left;" colspan="4">Title/Name of the Program/ project:&emsp; '.$row['pTitle'].'</th>
            <th colspan="3">Short title of the project:&emsp; '.$row['Short title'].' </th>
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
              <p>Internal Code: &emsp;'.$row['Code'].'</p>
            </th>
            <th colspan="2">
               <p>External Code: &emsp;'.$row['ExternalCode'].'</p>
            </th>
            <th colspan="2">
               <p>Duration of the Program/Project: &emsp;'.$row['Duration'].' </p>
            </th>
            <th colspan="1">
              <p>Duration Unit: &emsp;'.$row['Duration Unit'].'</p>
            </th>
         </tr>
         <tr>
            <th colspan="2">
              <p>Start Date:  &emsp;'.$row['StartDate'].'</p>
            </th>
            <th colspan="2">
               <p>Expected End Date: &emsp;'.$row['EndDate'].'</p>
            </th>
            <th colspan="1">
               <p>Phase: &emsp;'.$row['Phase'].'</p>
            </th>
            <th colspan="2">
              <p>Sponsor Type: &emsp;'.$row['SponsorType'].'  </p>
            </th>
         </tr>
       </table>';

$data .= '<br/><div>
       <p><b>B: Project Financing</b></p>
     </div>
     <table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
        <tr>
           <th>Name of the Program/Project: &emsp; </th>
           <th colspan="5">'.$row['pTitle'].'</th>
        </tr>
        <tr>
            <th style="text-align:left;" rowspan="1">SN.</th>
            <th style="text-align:left;" colspan="1">Financing Type</th>
            <th style="text-align:left;" colspan="1">Sponsor Name</th>
            <th style="text-align:left;" colspan="1">Period Time</th>
            <th style="text-align:left;" colspan="1">Total Amount</th>
            <th style="text-align:left;" colspan="1">Amount Disbursed</th>
         </tr>';

         while($row_fi = mysqli_fetch_array($result_fi)) {	
            $num +=1;
            $id_get = $row_fi['financing_ID'];
            $Financing = $row_fi['Financing'];
            $unit = $row_fi['Currency'].' '.$row_fi['Unittype'];
            $_SESSION['total_tshs'] += $row_fi['TotalAmount'];
            $_SESSION['disbursed_tshs'] += $row_fi['Disbursed'];
                                              
            $TotalAmount = $row_fi['TotalAmount'];
            $disbursed = $row_fi['Disbursed'];
            $sponsor_id = $row_fi['SponsorID'];
            $report_time = $row_fi['ReportFrom'].'-'.$row_fi['ReportTo'];

            $query_org = "SELECT * FROM `organizationtb`where ID = $sponsor_id"; 
            $result_org = mysqli_query($conn, $query_org) or die("Error : ".mysqli_error($conn));
            $row_org = mysqli_fetch_array($result_org);
            $name_org = $row_org['Name'];

            $data .='<tr>
                        <td style="text-align:left;" colspan="1">'.$num.'</td>
                        <td style="text-align:left;" colspan="1">'.$Financing.'</td>
                        <th style="text-align:left;" colspan="1">'.$name_org.'</th>
                        <th style="text-align:left;" colspan="1">'.$report_time.'</th>
                        <th style="text-align:left;" colspan="1">'.number_format($TotalAmount, 2, ".", ",")."/".$unit.'</th>
                        <th style="text-align:left;" colspan="1">'.number_format($disbursed, 2, ".", ",")."/".$unit.'</th>
                    </tr>';
         }
         
$data .='<tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Sub Total</td>
            <td>'.number_format($_SESSION['total_tshs'], 2, ".", ",")."/Tz".'</td>
            <td>'.number_format($_SESSION['disbursed_tshs'], 2, ".", ",")."/Tz".'</td>
        </tr>
    </table>';


$query_imp = "SELECT *
    FROM project_targetgroup
    INNER JOIN projecttb ON project_targetgroup.Project=projecttb.ID 
    INNER JOIN organizationtb ON project_targetgroup.Institution = organizationtb.ID
    INNER JOIN userinfo ON project_targetgroup.FocalPerson = userinfo.id
    WHERE project_targetgroup.Project ='$id'";
$result_imp = mysqli_query($conn, $query_imp) or die("Error : ".mysqli_error($conn));
$num_imp = 0;
if($row_imp = mysqli_fetch_array($result_imp)) {
    $org_name = $row_imp['Name'];
    $org_type = $row_imp['Type'];
    $org_PostalAddress = $row_imp['PostalAddress'];
    $org_Telephone = $row_imp['Telephone'];
    $org_Email_org = $row_imp['Email_org'];
    $org_Fullname = $row_imp['Fullname'];
    $org_Email = $row_imp['Email'];
    $org_Address = $row_imp['Address'];

 }

$data .='<font size="1">
            <div>
                <p><b>C:  Project Implementor </b></p>
            </div>
        <table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;">
           <tr style="background-color: #e4f4ee; ">
              <th style="text-align:left;">Particular</th>
              <th style="text-align:left;">Description</th>
           </tr>
           <tr>
               <td><strong>Name of Institution</strong></td>
               <td>'.$org_name.'</td>
           </tr>
           <tr>
               <td><strong>Type of Institution (Government, CSOs, Private Sector)</strong></td>
               <td>'.$org_type.'</td>
           </tr>
           <tr>
               <td><strong>Postal Address</strong></td>
               <td>'.$org_PostalAddress.'</td>
           </tr>
           <tr>
               <td>Office Telephone</td>
               <td>'.$org_Telephone.'</td>
           </tr>
           <tr>
               <td>Office Email Address</td>
               <td>'.$org_Email_org.'</td>
           </tr>
           <tr>
               <td><strong>Name of M&E Focal Person</strong></td>
               <td>'.$org_Fullname.'</td>
           </tr>
           <tr>
               <td><strong>Contact details of M&E Focal Person</strong></td>
               <td></td>
           </tr>
           <tr>
               <td>Telephone</td>
               <td>'.$org_Email.'</td>
           </tr>
           <tr>
               <td>Email Address</td>
               <td>'.$org_Address.'</td>
           </tr>
          
        </table>
    </font>';

    $kra_details =" ";
    $query_act = "SELECT * FROM `project_activity` WHERE `Project`='$id'"; 
    $result_act = mysqli_query($conn, $query_act) or die("Error : ".mysqli_error($conn));
    $num_act = 0;
     
$data .= '<br/><div>
                <p><b>D:  Project Activity </b></p>
            </div>
     <table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;">
         <tr style="background-color: #e4f4ee; ">
            <th style="text-align:left;" rowspan="1">SN.</th>
            <th style="text-align:left;" rowspan="1">Activity</th>
            <th style="text-align:left;" rowspan="1">Resource</th>
            <th style="text-align:left;" rowspan="1">Duration</th>
            <th style="text-align:left;" colspan="1">Amount</th>
         </tr>';
         while($row_act = mysqli_fetch_array($result_act)) {	
            $num_act +=1;
            $id_get = $row_act['activityID'];
            $Name_act = $row_act['Activity'];
              $data .="<tr>
                        <td>".$num_act."</td>
                        <td>".$Name_act."</td>
                        <td>".$row_act['Resource']."</td>
                        <td>".$row_act['StartDate']." - ".$row_act['EndDate']."</td>
                        <td>".$row_act['Amount']." (".$row_act['ActCurrency'].")</td>
                    </tr>";
        }
         
    $data .= '</table>';

$mpdf->WriteHTML($data);
$mpdf->Output();

?>

<!-- Apart from configuration variables defined in ConfigVariables and FontVariables classes it can obtain variables which where the arguments from the constructor of mPDF < 7.0: mode, format, default_font_size, default_font, margin_left (formerly $mgl), margin_right (formerly $mgr), margin_top (formerly $mgt), $margin_bottom (formerly mgb), $margin_header (formerly $mgh), margin_footer (formerly $mgf), orientation. These variables with their defaults are described in the next section. -->
</html>