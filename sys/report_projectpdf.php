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
$mpdf = new Mpdf(['mode' => 'utf-8', 'orientation' => 'P', 'margin_bottom' => 40, 'margin_header' => 9, 'margin_footer' => 9]);


require_once 'phpqrcode/qrlib.php';
$path = 'images/';
$qrcode = $path.time().".png";
QRcode::png('https://www.zmes.planningznz.go.tz/verify/', $qrcode);

$datafooter = '<table width="100%" style="margin: 0px;">
                  <tr>
                     <td width="33%">{DATE j-m-Y}</td>
                     <td width="33%" align="center">Page {PAGENO} of {nbpg}</td>
                     <td width="33%" align="right"><img src="'.$qrcode.'" alt="QR Code" /></td>
                  </tr>
               </table>';
$mpdf->SetHTMLFooter($datafooter);

include 'includes/conn.php'; 
if(isset($_GET['xyz'])){
    $getid =$_GET['xyz'];
} else {
   $getid =0;
}
 
   $ptitle ="";
   $short = "";
   $status ="";
   $duration = "";
   $d_unit = "";
      $type = "";
      $description = "";
      $code = "";
      $StartDate = "";
      $EndDate = "";
      $agenda = "";
      $sector = "";
      $UnderProgram = 0;
      $Phase = "";
      $ExternalCode = "";
      $utility = "";
      $risk_factors ="";
      $sponsor_type ="";

      $p_wizara_submit_by ='';
      $p_wizara_submit_date ='';
      $p_wizara_submit_comment = '';

      $p_wizara_approve_by = '';
      $p_wizara_approve_date ='';
      $p_wizara_approve_action ='';
      $p_wizara_approve_comment ='';

      $p_wizara_confirm_by  ='';
      $p_wizara_confirm_date ='';
      $p_wizara_confirm_action ='';
      $p_wizara_confirm_comment  ='';

      $p_zpc_approve_by ='';
      $p_zpc_approve_date ='';
      $p_zpc_approve_comment  ='';
      $p_zpc_approve_action ='';

      $budget_term ="-";

   $query = "SELECT * FROM `projecttb` WHERE `ID`='$getid'"; 
   $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
   $num = 0;
   if($row = mysqli_fetch_array($result)) {	
      $ptitle =$row['pTitle'];
      $short = $row['Short title'];
      $status = $row['Status'];
      $duration = $row['Duration'];
      $d_unit = $row['Duration Unit'];
      $type = $row['pType'];
      $description = $row['Description'];
      $code = $row['Code'];
      $StartDate = $row['StartDate'];
      $EndDate = $row['EndDate'];
      $agenda = $row['AgendaID'];
      $sponsor_type = $row['SponsorType'];
      $risk_factors = $row['risk_factors'];
      $utility = $row['utility'];
      $ExternalCode = $row['ExternalCode'];
      $Phase = $row['Phase'];
      $UnderProgram = $row['UnderProgram'];
      $sector = $row['SectorID'];

      $p_wizara_submit_by =$row['p_wizara_submit_by'];
      $p_wizara_submit_date =$row['p_wizara_submit_date'];
      $p_wizara_submit_comment = $row['p_wizara_submit_comment'];

      $p_wizara_approve_by = $row['p_wizara_approve_by'];
      $p_wizara_approve_date =$row['p_wizara_approve_date'];
      $p_wizara_approve_action =$row['p_wizara_approve_action'];
      $p_wizara_approve_comment =$row['p_wizara_approve_comment'];

      $p_wizara_confirm_by  =$row['p_wizara_confirm_by'];
      $p_wizara_confirm_date =$row['p_wizara_confirm_date'];
      $p_wizara_confirm_action =$row['p_wizara_confirm_action'];
      $p_wizara_confirm_comment  =$row['p_wizara_confirm_comment'];

      $p_zpc_approve_by =$row['p_zpc_approve_by'];
      $p_zpc_approve_date =$row['p_zpc_approve_date'];
      $p_zpc_approve_comment  =$row['p_zpc_approve_comment'];
      $p_zpc_approve_action =$row['p_zpc_approve_action'];
   }

   //find the budget term of the project
   $xyz_num = 0;
   $query_budgetterm = "SELECT * FROM budgetterm";
   $resultp_budgetterm = mysqli_query($conn, $query_budgetterm) or die("Error : ".mysqli_error($conn));
   while($row_budgetterm = mysqli_fetch_array($resultp_budgetterm)) {	
      if($StartDate >= $row_budgetterm['Duration'] AND $StartDate < $row_budgetterm['DurationTo'] ){
         if($xyz_num == 0){
            $budget_term = $row_budgetterm['Item'];
         } else {
            $budget_term .=', '.$row_budgetterm['Item'];
         }
      }
      if($EndDate > $row_budgetterm['Duration'] AND $EndDate > $row_budgetterm['DurationTo'] ){
         if($xyz_num == 0){
            $budget_term = $row_budgetterm['Item'];
         } else {
            $budget_term .=', '.$row_budgetterm['Item'];
         }
      }

      $xyz_num +=1;
   }

   $queryp_user = "SELECT * FROM `userinfo` WHERE `id` IN ('$p_zpc_approve_by', '$p_wizara_confirm_by', '$p_wizara_approve_by', '$p_wizara_submit_by')"; 
   $resultp_user = mysqli_query($conn, $queryp_user) or die("Error : ".mysqli_error($conn));
   while($row_user = mysqli_fetch_array($resultp_user)) {	
      if($row_user['id'] == $p_zpc_approve_by){
         $p_zpc_approve_by =$row_user['Fullname'];
      }
      if($row_user['id'] == $p_wizara_confirm_by){
         $p_wizara_confirm_by =$row_user['Fullname'];
      }
      if($row_user['id'] == $p_wizara_approve_by){
         $p_wizara_approve_by =$row_user['Fullname'];
      }
      if($row_user['id'] == $p_wizara_submit_by){
         $p_wizara_submit_by =$row_user['Fullname'];
      }
   }

   $query_act = "SELECT * FROM `project_activity` WHERE `Project`='$getid'"; 
   $result_act = mysqli_query($conn, $query_act) or die("Error : ".mysqli_error($conn));
   $result_act2 = mysqli_query($conn, $query_act) or die("Error : ".mysqli_error($conn));
   $num = 0;

   $query_loc = "SELECT * FROM project_location, wilayatb, regiontb WHERE project_location.Project='$getid' AND project_location.Wilaya = wilayatb.WilayaID AND wilayatb.MkoaID = regiontb.ID"; 
   $result_loc = mysqli_query($conn, $query_loc) or die("Error : ".mysqli_error($conn));

   $query_imp = "SELECT * FROM project_targetgroup
               INNER JOIN projecttb ON project_targetgroup.Project=projecttb.ID 
               INNER JOIN organizationtb ON project_targetgroup.Institution = organizationtb.ID
               INNER JOIN userinfo ON project_targetgroup.FocalPerson = userinfo.id
               WHERE project_targetgroup.Project ='$getid'";
   $result_imp = mysqli_query($conn, $query_imp) or die("Error : ".mysqli_error($conn));

   $query_file = "SELECT * FROM `project_file` WHERE `Project`='$getid'"; 
   $result_file = mysqli_query($conn, $query_file) or die("Error : ".mysqli_error($conn));


   $queryp = "SELECT * FROM `projecttb` WHERE `ID`='$UnderProgram'"; 
   $resultp = mysqli_query($conn, $queryp) or die("Error : ".mysqli_error($conn));
   if($rowp = mysqli_fetch_array($resultp)) {	
      $UnderProgram =$rowp['pTitle'];
   } else {
      $UnderProgram ='-';
   }

   $queryp = "SELECT * FROM `sector` WHERE `SectorID`='$sector'"; 
   $resultp = mysqli_query($conn, $queryp) or die("Error : ".mysqli_error($conn));
   if($rowp = mysqli_fetch_array($resultp)) {	
      $sector =$rowp['SectorName'];
   } else {
      $sector ='-';
   }

   $data .='
               <div width="100%" style="text-align: center; font-family: Times New Roman, Times, serif;">
                     <img src="images/smz-trans.png" style="width:15%;">
               </div>
               <div width="100%" style="text-align: center;font-family: Times New Roman, Times, serif !important; ">
                     <h2>ZANZIBAR PLANNING COMMISSION</h2>
                     <h5>PROJECT DETAIL REPORT</h5>
               </div>'; 

$data .= '<div style="">
            <h3>A:   PROJECT DETAILS</h3>
         </div>';

$data .= '<table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
            <tr style="background-color: #e4f4ee; ">
               <th style="text-align:left;" rowspan="1">Item</th>
               <th style="text-align:left;" rowspan="1"></th>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Project Type</td>
               <td style="text-align:left;" rowspan="1">'.$type.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Under Program</td>
               <td style="text-align:left;" rowspan="1">'.$UnderProgram.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Project Name</td>
               <td style="text-align:left;" rowspan="1">'.$ptitle.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Short Tittle</td>
               <td style="text-align:left;" rowspan="1">'.$short.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Project Status</td>
               <td style="text-align:left;" rowspan="1">'.$status.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Sponsor Type</td>
               <td style="text-align:left;" rowspan="1">'.$sponsor_type.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Assign to the Project Plans</td>
               <td style="text-align:left;" rowspan="1">'.$agenda.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Description</td>
               <td style="text-align:left;" rowspan="1">'.$description.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Duration</td>
               <td style="text-align:left;" rowspan="1">'.$duration.'/'.$d_unit.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Start Date</td>
               <td style="text-align:left;" rowspan="1">'.$StartDate.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Expected End Date</td>
               <td style="text-align:left;" rowspan="1">'.$EndDate.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Budget Term</td>
               <td style="text-align:left;" rowspan="1">'.$budget_term.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Sector</td>
               <td style="text-align:left;" rowspan="1">'.$sector.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Internal Code</td>
               <td style="text-align:left;" rowspan="1">'.$code.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">External Code</td>
               <td style="text-align:left;" rowspan="1">'.$ExternalCode.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Needs (Utility) </td>
               <td style="text-align:left;" rowspan="1">'.$utility.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Risk Factors </td>
               <td style="text-align:left;" rowspan="1">'.$risk_factors.'</td>
            </tr>
            <tr>
               <td style="text-align:left;" rowspan="1">Phase </td>
               <td style="text-align:left;" rowspan="1">'.$Phase.'</td>
            </tr>
            
         </table>';

   
$data .= '<br/><div style="">
            <h3>B:   PLANNED ACTIVITIES AND FINANCING</h3>
         </div>';

$data .= '<table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
            <tr style="background-color: #e4f4ee; ">
               <th style="text-align:left;" rowspan="1">Activity</th>
               <th style="text-align:left;" rowspan="1">Resources</th>
               <th style="text-align:left;" rowspan="1">Start Date</th>
               <th style="text-align:left;" rowspan="1">End Date</th>
            </tr>';
            while($row_act = mysqli_fetch_array($result_act)) {	
               $data .='<tr>
                        <td style="text-align:left;" rowspan="1">'.$row_act['Activity'].'</td>
                        <td style="text-align:left;" rowspan="1">'.$row_act['Resource'].'</td>
                        <td style="text-align:left;" rowspan="1">'.$row_act['StartDate'].'</td>
                        <td style="text-align:left;" rowspan="1">'.$row_act['EndDate'].'</td>
                     </tr>';
            }
         $data .= '</table><br />';
         $grand_total = 0;
         $grand_total_smz = 0;
         $grand_total_wm = 0;

         $data .= '<table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
                     <tr style="background-color: #e4f4ee; ">
                        <th style="text-align:left;" rowspan="1">Activity</th>
                        <th style="text-align:left;" rowspan="1">Activity Amount (Government, SMZ)</th>
                        <th style="text-align:left;" rowspan="1">Activity Amount (Development Partner, WM)</th>
                        <th style="text-align:left;" rowspan="1">Total, TZS</th>
                     </tr>';
                        while($row_act2 = mysqli_fetch_array($result_act2)) {
                              $total = $row_act2['Amount'] + $row_act2['amountWM'];
                              $grand_total += $total;
                              $grand_total_smz += $row_act2['Amount'];
                              $grand_total_wm += $row_act2['amountWM'];
                              $total = number_format($total, 2, '.', ',');
                           
                           $data .='<tr>
                                    <td style="text-align:left;" rowspan="1">'.$row_act2['Activity'].'</td>
                                    <td style="text-align:left;" rowspan="1">'.number_format($row_act2['Amount'], 2, '.', ',').'</td>
                                    <td style="text-align:left;" rowspan="1">'.number_format($row_act2['amountWM'], 2, '.', ',').'</td>
                                    <td style="text-align:left;" rowspan="1">'.$total.'</td>
                                 </tr>';
                        }
         $data .='<tr>
                     <th style="text-align:left;" rowspan="1">Grand Total, (TZS)</th>
                     <th style="text-align:left;" rowspan="1">'.number_format($grand_total_smz, 2, '.', ',').'</th>
                     <th style="text-align:left;" rowspan="1">'.number_format($grand_total_wm, 2, '.', ',').'</th>
                     <th style="text-align:left;" rowspan="1">'.number_format($grand_total, 2, '.', ',').'</th>
                  </tr>';
      $data .= '</table>';

         
      $data .= '<br/><div style="">
                  <h3>C:   PROJECT LOCATION</h3>
                  </div>';
      $data .= '<table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
                  <tr style="background-color: #e4f4ee; ">
                     <th style="text-align:left;" rowspan="1">Region</th>
                     <th style="text-align:left;" rowspan="1">District</th>
                     <th style="text-align:left;" rowspan="1">GPS Coordinate</th>
                  </tr>';
                  while($row_loc = mysqli_fetch_array($result_loc)) {
                     $data .='<tr>
                              <td style="text-align:left;" rowspan="1">'.$row_loc['Name'].'</td>
                              <td style="text-align:left;" rowspan="1">'.$row_loc['JinaLaWilaya'].'</td>
                              <td style="text-align:left;" rowspan="1">'.$row_loc['coordinate_location'].'</td>
                           </tr>';
                  }
               $data .='</table>';

$data .= '<br/><div style="">
            <h3>D:   IMPLEMENTOR INFORMATION</h3>
         </div>';

$data .= '<table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
         <tr style="background-color: #e4f4ee; ">
            <th style="text-align:left;" rowspan="1">S.N</th>
            <th style="text-align:left;" rowspan="1">Responsible Ministry</th>
            <th style="text-align:left;" rowspan="1">Responsible Officer</th>
            <th style="text-align:left;" rowspan="1">Contact #</th>
         </tr>';
         $num =1;
         while($row_imp = mysqli_fetch_array($result_imp)) {
            $data .='<tr>
                      <td style="text-align:left;" rowspan="1">'.$num.'</td>
                     <td style="text-align:left;" rowspan="1">'.$row_imp['Name'].'</td>
                     <td style="text-align:left;" rowspan="1">'.$row_imp['Fullname'].'</td>
                     <td style="text-align:left;" rowspan="1">'.$row_imp['PhoneNumber'].'</td>
                  </tr>';
            $num +=1;
         }
$data .='</table>';


$data .= '<br/><div style="">
            <h3>E:   ATTACHMENTS</h3>
         </div>';
$data .= '<table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
         <tr style="background-color: #e4f4ee; ">
            <th style="text-align:left;" rowspan="1">S.N</th>
            <th style="text-align:left;" rowspan="1">File Name</th>
         </tr>';   
         $num = 1;
         while($row_file = mysqli_fetch_array($result_file)) {
            $data .='<tr>
                      <td style="text-align:left;" rowspan="1">'.$num.'</td>
                     <td style="text-align:left;" rowspan="1">'.$row_file['Filename'].'</td>
                  </tr>';
            $num +=1;
         }
$data .='</table>';

$data .= '<br /><table width="100%" style="font-family: Times New Roman, Times, serif; ">
               <tr>
                  <td width="100%"> <h3>F:   SUBMISSION SUMMARY REPORT</h3></td>
               </tr><br />
               <tr>
                  <td width="100%"><h5>MDA SUBMISSION:</h5></td>
               </tr><br />
               <tr>
                  <td width="100%"><b>Registered and Submitted by:</b>&nbsp; '.$p_wizara_submit_by.'</td>
               </tr>
               <tr>
                  <td width="100%"><b>Submitted on: </b>&nbsp; '.$p_wizara_submit_date.' </td>
               </tr>
               <tr>
                  <td width="100%"><b>Submitted on: </b>&nbsp; '.$p_wizara_submit_comment.'</td>
               </tr>
               <tr>
                  <td width="100%"><b>Position :</b>&nbsp; MDA Focal Person</td><br />
               </tr>
              
            </table><br /> 
         ';

$data .= '<br /><table width="100%" style="font-family: Times New Roman, Times, serif; ">
         <tr>
            <td width="100%"><h5>MDA APPROVAL:</h5></td>
         </tr>
         <tr>
            <td width="100%"><b>Received and Approved by:&nbsp;</b>'.$p_wizara_approve_by.'</td>
         </tr>
         <tr>
            <td width="100%"><b>Approved on: </b>&nbsp; '.$p_wizara_approve_date.'</td>
         </tr>
         <tr>
            <td width="100%"><b>Position : MDA DPPR</b></td>
         </tr>
         <tr>
            <td width="100%"><b>Approved Status : </b>&nbsp;'.$p_wizara_approve_action.'</td>
         </tr>
         <tr>
            <td width="100%"><b>Comment : </b>&nbsp; '.$p_wizara_approve_comment.'</td>
         </tr>
      </table><br /> 
   ';

   $data .= '<br /><table width="100%" style="font-family: Times New Roman, Times, serif; ">
              
               <tr>
                  <td width="100%"><h5>MDA CONFIRMATION:</h5></td>
               </tr>
               <tr>
                  <td width="100%"><b>Confirmed by:</b>&nbsp;'.$p_wizara_confirm_by.'</td>
               </tr>
               <tr>
                  <td width="100%"><b>Confirmed on: </b>&nbsp; '.$p_wizara_confirm_date.'</td>
               </tr>
               <tr>
                  <td width="100%"><b>Position : Principle Secretary</b></td>
               </tr>
               <tr>
                  <td width="100%"><b>Confirmed Status : </b>&nbsp; '.$p_wizara_confirm_action.'</td>
               </tr>
               <tr>
                  <td width="100%"><b>Comment : </b>&nbsp; '.$p_wizara_confirm_comment.'</td>
               </tr>
            </table><br />
         ';

   

   $data .= '<br /><table width="100%" style="font-family: Times New Roman, Times, serif; ">
         <tr>
            <td width="100%"><h5>ZPC ACCEPTANCE:</h5></td>
         </tr>
         <tr>
            <td width="100%"><b>Accepted by:</b>&nbsp; '.$p_zpc_approve_by.'</td>
         </tr>
         <tr>
            <td width="100%"><b>Accepted on: </b>&nbsp; '.$p_zpc_approve_date.'</td>
         </tr>
         <tr>
            <td width="100%"><b>Position : </b></td>
         </tr>
         <tr>
            <td width="100%"><b>Accepted Status : </b>&nbsp; '.$p_zpc_approve_action.'</td>
         </tr>
         <tr>
            <td width="100%"><b>Comment : </b>&nbsp; '.$p_zpc_approve_comment.'</td>
         </tr>
      </table><br />
     
   ';
$mpdf->WriteHTML($data);
$mpdf->Output();

?>

<!-- Apart from configuration variables defined in ConfigVariables and FontVariables classes it can obtain variables which where the arguments from the constructor of mPDF < 7.0: mode, format, default_font_size, default_font, margin_left (formerly $mgl), margin_right (formerly $mgr), margin_top (formerly $mgt), $margin_bottom (formerly mgb), $margin_header (formerly $mgh), margin_footer (formerly $mgf), orientation. These variables with their defaults are described in the next section. -->
</html>