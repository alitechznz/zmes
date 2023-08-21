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

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'orientation' => 'L', 'margin_top' =>55, 'margin_bottom' => 40, 'margin_header' => 9, 'margin_footer' => 9]);
require_once 'phpqrcode/qrlib.php';
$path = 'images/';
$qrcode = $path.time().".png";
QRcode::png('https://www.makusanyo.alitech.co.tz', $qrcode);

$dataheader ='
    <div width="100%" style="text-align: center; font-family: Times New Roman, Times, serif;">
          <img src="images/smz-trans.png" style="width:15%;">
	  </div>
    <div width="100%" style="text-align: center;font-family: Times New Roman, Times, serif !important; ">
          <h2>ZANZIBAR PLANNING COMMISSION</h2>
          <h5>KPI DETAILS</h5>
		</div>
';
$mpdf->SetHTMLHeader($dataheader);

$datafooter = '<table width="100%" style="margin: 0px;">
                  <tr>
                     <td width="33%">{DATE j-m-Y}</td>
                     <td width="33%" align="center">Page {PAGENO} of {nbpg}</td>
                     <td width="33%" align="right"><img src="'.$qrcode.'" alt="QR Code" /></td>
                  </tr>
               </table>';
$mpdf->SetHTMLFooter($datafooter);

$data ='';
//variable declaration
$get_kpi_id = 0;

$plan =0;
$kpi='';
$goal ='';
$goal_type ='';
$kpi_definition ='';
$kpi_baseline = '';
$kpi_target = '';
$kpi_status = '';
$kpi_datasource ='';
$kpi_frequency = '';
$kpi_responsible_sector = '';

$kpi_definition = array();
$kpi_baseline = array();
$kpi_target = array();
$kpi_datasource = array();
$kpi_frequency = array();

$kpi_definition_v = '';
$kpi_baseline_v = '';
$kpi_target_v = '';
$kpi_datasource_v = '';
$kpi_frequency_v = '';

require('includes/conn.php');
$sql ="";
$num = 0;

if(isset($_GET['xyz'])){
   $get_kpi_id = $_GET['xyz'];
   $sql = "SELECT * FROM kpi_baseline, keyarea, agendatb WHERE kpi_baseline.kpi_id = keyarea.IDNo AND agendatb.ID =keyarea.AgendaID AND keyarea.IDNo='$get_kpi_id'"; 

   $query = $conn->query($sql);
   while($row = $query->fetch_assoc()) {
      $SectorName ='';
      $sector_temp = '';
      $num_array = 0;
      echo $num;
      $array = explode(':', $row['sector']);
      foreach ($array as $values){
        
         $query2 = "SELECT * FROM organizationtb WHERE ID = '$values'"; 
         $result2 = mysqli_query($conn, $query2) or die("Error : ".mysqli_error($conn));
         if($row2 = mysqli_fetch_array($result2)){
            if($num_array == 0){
               $SectorName = $row2['Name'];
               $sector_temp = $SectorName;
            } else {
               if($row2['Name'] != $sector_temp){
                  $sector_temp = $row2['Name'];
                  $SectorName = $SectorName.'<br />'.$row2['Name'];
               }
            }
            $num_array +=1;
         }
      }
         $plan = $row['Name'];
         $kpi_goal = $row['goal'];
         $kpi = $row['KeyArea'];
         $goal_type = $row['goal_type'];
         $priority_area = $row['priority_area'];
         

         $kpi_definition[$num] = $row['kpi_definition'];
         $kpi_baseline[$num] = $row['baseline_name'];
         $kpi_target[$num] = $row['target_name'];
         $kpi_datasource[$num] = $row['data_source'];
         $kpi_frequency[$num] = $row['frequency'];
         $num +=1;   
   }

   $sqlss ="SELECT * FROM strategy_area WHERE strategy_area_id='$kpi_goal'"; 
   $resultss = mysqli_query($conn, $sqlss);
   if($rows = mysqli_fetch_array($resultss)){
      $kpi_goal = $rows['strategy_area_name'];
   }

   $sqlss1 ="SELECT * FROM priorityarea_goal WHERE priorityarea_goal_id='$priority_area'"; 
   $resultss1 = mysqli_query($conn, $sqlss1);
   if($rows1 = mysqli_fetch_array($resultss1)){
      $priority_area = $rows1['priorityarea_goal_name'];
   }

   
   $data_detail = '<h5>KPI Information:</h5>
                   <p><b>Plan</b> : &nbsp; '.$plan.'</p>';
              
   if($goal_type =='goal'){
      $data_detail .= '<p><b>Goal</b> : &nbsp; '.$kpi_goal.'</p>';	
   } else {
      $data_detail .= '<p><b>Strategy Area</b> : &nbsp; '.$kpi_goal.'</p>';	
   }          
   $data_detail .='<p><b>Priority Area</b> : &nbsp; '.$priority_area.'</p>';

   $data .= '<table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
               <tr style="background-color: #e4f4ee; ">
                  <th style="text-align:left;" rowspan="1">Indicators</th>
                  <th style="text-align:left;" rowspan="1">Indicator definition</th>
                  <th style="text-align:left;" rowspan="1">Baseline</th>
                  <th style="text-align:left;" rowspan="1">Target</th>
                  <th style="text-align:left;" rowspan="1">Data source</th>
                  <th style="text-align:left;" rowspan="1">Frequency</th>
                  <th style="text-align:left;" rowspan="1">Responsible Institution</th>
               </tr>';
               
               $arrayLength = count($kpi_baseline);
               $arry_length = 1+$arrayLength;
               for($i = 0; $i < $arrayLength; $i++) {
                  if($i == 0){
                     $data .='<tr>
                              <td style="text-align:left;" rowspan="'.$arrayLength.'">'.$kpi.'</td>
                              <td style="text-align:left;" rowspan="'.$arrayLength.'">'.$kpi_definition[$i].'</td>
                              <td style="text-align:left;" rowspan="1">'.$kpi_baseline[$i].'</td>
                              <td style="text-align:left;" rowspan="1">'.$kpi_target[$i].'</td>
                              <td style="text-align:left;" rowspan="1">'.$kpi_datasource[$i].'</td>
                              <td style="text-align:left;" rowspan="1">'.$kpi_frequency[$i].'</td>
                              <td style="text-align:left;" rowspan="1">'.$SectorName.'</td>
                           </tr>';
                  } else {
                     $data .='<tr>
                              <td style="text-align:left;" rowspan="1">'.$kpi_baseline[$i].'</td>
                              <td style="text-align:left;" rowspan="1">'.$kpi_target[$i].'</td>
                              <td style="text-align:left;" rowspan="1">'.$kpi_datasource[$i].'</td>
                              <td style="text-align:left;" rowspan="1">'.$kpi_frequency[$i].'</td>
                              <td style="text-align:left;" rowspan="1">'.$SectorName.'</td>
                           </tr>';
                  }
                  
               }
            $data .='</table>';
            $mpdf->WriteHTML($data_detail);

} else {
   $data .= '<table border="1" cellpadding="10" cellspacing="1" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; text-align:justify;page-break-inside: avoid;">
               <tr style="background-color: #e4f4ee; ">
                  <th style="text-align:left;" rowspan="1">Indicators</th>
                  <th style="text-align:left;" rowspan="1">Indicator definition</th>
                  <th style="text-align:left;" rowspan="1">Baseline</th>
                  <th style="text-align:left;" rowspan="1">Target</th>
                  <th style="text-align:left;" rowspan="1">Data source</th>
                  <th style="text-align:left;" rowspan="1">Frequency</th>
                  <th style="text-align:left;" rowspan="1">Responsible Institution</th>
               </tr>';
               
   foreach($_POST['select'] as $selected) {
      $sql = "SELECT * FROM kpi_baseline, keyarea, agendatb WHERE kpi_baseline.kpi_id = keyarea.IDNo AND agendatb.ID =keyarea.AgendaID AND keyarea.IDNo='$selected'"; 
      $query = $conn->query($sql);
      while($row = $query->fetch_assoc()) {
         $SectorName ='';
         $sector_temp = '';
         $num_array = 0;
         echo $num;
         $array = explode(':', $row['sector']);
         foreach ($array as $values){
            $query2 = "SELECT * FROM organizationtb WHERE ID = '$values'"; 
            $result2 = mysqli_query($conn, $query2) or die("Error : ".mysqli_error($conn));
            if($row2 = mysqli_fetch_array($result2)){
               if($num_array == 0){
                  $SectorName = $row2['Name'];
                  $sector_temp = $SectorName;
               } else {
                  if($row2['Name'] != $sector_temp){
                     $sector_temp = $row2['Name'];
                     $SectorName = $SectorName.'<br />'.$row2['Name'];
                  }
               }
               $num_array +=1;
            }
         }
            $plan = $row['Name'];
            $kpi_goal = $row['goal'];
            $kpi = $row['KeyArea'];
            $goal_type = $row['goal_type'];
            $priority_area = $row['priority_area'];
            
   
            $kpi_definition[$num] = $row['kpi_definition'];
            $kpi_baseline[$num] = $row['baseline_name'];
            $kpi_target[$num] = $row['target_name'];
            $kpi_datasource[$num] = $row['data_source'];
            $kpi_frequency[$num] = $row['frequency'];
            $num +=1;   
      }
            $kpi_goa_value ='';
            $priority_area ='';
            $sqlss ="SELECT * FROM strategy_area WHERE strategy_area_id='$kpi_goal'"; 
            $resultss = mysqli_query($conn, $sqlss);
            if($rows = mysqli_fetch_array($resultss)){
               $kpi_goa_value = $rows['strategy_area_name'];
            }
         
            $sqlss1 ="SELECT * FROM priorityarea_goal WHERE priorityarea_goal_id='$priority_area'"; 
            $resultss1 = mysqli_query($conn, $sqlss1);
            if($rows1 = mysqli_fetch_array($resultss1)){
               $priority_area = $rows1['priorityarea_goal_name'];
            }
            $data .='<tr>
                        <th style="text-align:left;" colspan="7"><b>Plan</b> : &nbsp; '.$plan.'</th>
                     </tr>
                     <tr>
                        <th style="text-align:left;" colspan="7"><b>Goal</b> : &nbsp; '.$kpi_goa_value.'</th>
                     </tr>
                     <tr>
                        <th style="text-align:left;" colspan="7"><b>Priority Area</b> : &nbsp; '.$priority_area.'</th>
                     </tr>';

                  $arrayLength = count($kpi_baseline);
                  for($i = 0; $i < $arrayLength; $i++) {
                     if($i == 0){
                        $data .='
                              
                              <tr>
                                 <td style="text-align:left;" rowspan="'.$arrayLength.'">'.$kpi.'</td>
                                 <td style="text-align:left;" rowspan="'.$arrayLength.'">'.$kpi_definition[$i].'</td>
                                 <td style="text-align:left;" rowspan="1">'.$kpi_baseline[$i].'</td>
                                 <td style="text-align:left;" rowspan="1">'.$kpi_target[$i].'</td>
                                 <td style="text-align:left;" rowspan="1">'.$kpi_datasource[$i].'</td>
                                 <td style="text-align:left;" rowspan="1">'.$kpi_frequency[$i].'</td>
                                 <td style="text-align:left;" rowspan="1">'.$SectorName.'</td>
                              </tr>';
                     } else {
                        $data .='<tr>
                                 <td style="text-align:left;" rowspan="1">'.$kpi_baseline[$i].'</td>
                                 <td style="text-align:left;" rowspan="1">'.$kpi_target[$i].'</td>
                                 <td style="text-align:left;" rowspan="1">'.$kpi_datasource[$i].'</td>
                                 <td style="text-align:left;" rowspan="1">'.$kpi_frequency[$i].'</td>
                                 <td style="text-align:left;" rowspan="1">'.$SectorName.'</td>
                              </tr>';
                     }
                     
                  }
   }
   $data .='</table>';

   //selected items
   // $sql = "SELECT * FROM keyarea, sector, agendatb WHERE keyarea.IDNo='$get_kpi_id' AND keyarea.sector = sector.SectorID AND agendatb.ID = keyarea.AgendaID";
}



     

$mpdf->WriteHTML($data);
$mpdf->Output();
