<?php

$from1 = $_GET['from'];
$to = $_GET['to'];

require_once __DIR__ . '../vendor/autoload.php';
$mpdf = new mPDF();
$mpdf->tabSpaces = 2;

include 'includes/session.php';

require('includes/conn.php');
     

//create header
$dataheader ='
  
    <table width="100%">
	   <tr>
	      <td width="20%">
		      <img src="zfdb_logo.png" width="22%;" style="margin: 0px 1%;"><br />
			  <p>Lab code #:&emsp;'.$code.'</p>
		  </td>
		  <td width="60%" style="text-align: center;">
			  <p><b>SAMPLES SUMMARY REPORT</b><br /><i></p>
		  </td>
		 
		  <td width="20%" style="text-align: right;">
		     <p><b><i>ZFDA/FSCD/FOM/003 <br />Rev. #:01</i></b></p>
		  </td>
		</tr>
	</table><hr />
';
$mpdf->SetHTMLHeader($dataheader);
            $barcodeText = "ZFDA12345";
            $barcodeType="code128";
            $barcodeDisplay="horizontal";
            $barcodeSize= 30;
            $printText=  "false";

$mpdf->SetHTMLFooter('
 <hr />
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">Page {PAGENO} of {nbpg}</td>
        <td width="33%" style="text-align: right;">
		   
           <img class="barcode" alt="'.$barcodeText.'" src="barcode/barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'"/>
           </td>
    </tr>
</table>');
$datefrom1 = date_create($from1);
    $df = date_format($datefrom1,"Y-m-d");
	
	$dateto=date_create($to);
	$dt1 = date_format($dateto,"Y-m-d");
	
include ('includes/conn.php');
 $num =1;
                      $ffn =0;
					  $ffnf =0;
					  $ffnd =0;
					  
					  $ppn =0;
					  $ppnf =0;
					  $ppnd =0;
					  
                     $tnum =0;
					 $tnumf =0;
					 $tnumd =0;
					 
					 $anum =0;
					 $anumf =0;
					 $anumd =0;
					 
					 $rnum =0;
					 $rnumf =0;
					 $rnumd =0;
					 
					 $pnum =0;
					 $pnumf =0;
					 $pnumd =0;
					 
					 $cnum =0;
					 $cnumf =0;
					 $cnumd =0;
					 
					 $onum =0;
					 $onumf =0;
					 $onumd =0;
					 
					 $type="";
					 $code ="";
					 $headremark ="";
                    $sql = "SELECT * FROM `sample_submit` WHERE DateSubmission BETWEEN '$df' AND '$dt1'";
                    $query = $conn->query($sql);
					$num =1;
                    while($row = $query->fetch_assoc()){
                       $tnum  +=1;  
					   
					   $type = $row['type'];
					   $headremark = $row['FHead_Comment'];
					   if($type =='Food'){
						   $tnumf +=1;
					   } else {
						    $tnumd +=1;
					   }
					   
					   //checking fail and passed sample
					   if($headremark=='Pass'){
						  $ppn +=1;
						    if($type =='Food'){
						     $ppnf +=1;
					       } else {
						     $ppnd +=1;
					        }
					   } else {
						     $ffn +=1;
						   if($type =='Food'){
						     $ffnf +=1;
					       } else {
						     $ffnd +=1;
					        }
						  
					   }
					   
					$code = $row['SampleCode'];
					$status ="";
					$sql1 = "SELECT * FROM `lab_remark` WHERE SampleCode='$code' AND ConditionStatus='' AND ReceivingDate BETWEEN '$df' AND '$dt1'";
                    $query1 = $conn->query($sql1);
					$anum =1;
                      if($row1 = $query1->fetch_assoc()){
						  $status = $row1['ConditionStatus'];
 					
					     if($status =='Accept'){
							  $anum  +=1; 
                              if($type =='Food'){
						         $anumf +=1;
					          } else {
						         $anumd +=1;
					          }		
						 } else if($status =='Reject') {
							 $rnum  +=1; 
                             if($type =='Food'){
						        $rnumf +=1;
					         } else {
						        $rnumd +=1;
					         }	 		
						 } else {
							 $pnum  +=1; 
                             if($type =='Food'){
						        $pnumf +=1;
					         } else {
						        $pnumd +=1;
					         }	 		
						 }
                      			   
					 }
					   
					}
					
					$sql = "SELECT * FROM `sample_submit` WHERE FHead_Status='1' AND DateSubmission BETWEEN '$df' AND '$dt1'";
                    $query = $conn->query($sql);
					$num =1;
                    while($row = $query->fetch_assoc()){
                       $cnum  +=1; 
					    $type = $row['type'];
					   if($type =='Food'){
						   $cnumf +=1;
					   } else {
						    $cnumd +=1;
					   }
					}
					
					$sql = "SELECT * FROM `sample_submit` WHERE FHead_Status='0' AND DateSubmission BETWEEN '$df' AND '$dt1'";
                    $query = $conn->query($sql);
					$num =1;
                    while($row = $query->fetch_assoc()){
                       $onum  +=1; 
                         $type = $row['type'];
					   if($type =='Food'){
						   $onumf +=1;
					   } else {
						    $onumd +=1;
					   }					   
					}

	
   
$type ="Food";

		$data .=" <br /><br /><br /><br /><br /><br /><br />
		   
		   <p>Date Range :".$from1." - ".$to."</p>";
							
		$data .="<div class='col-md-12'><h5>TOTAL SUMMARY INFORMATION</h5><table  border='1' cellpadding='5' cellspacing='5' width='100%' style='border-collapse:collapse;'> 
            <thead>
				  <tr>
				  <th>Total Sample</th>
                  <th># Accepted</th>
                  <th># Rejected </th>
				  <th># Pending </th>
                  <th># Completed</th>
                  <th># Ongoing</th>
				
				  </tr>
                </thead>
                <tbody style='text-align: center !important;'>
				     <tr style='text-align: center !important;'> 
					      <td>".$tnum."</td>
				          <td >".$anum."</td>
						  <td style='text-align: center !important;'>".$rnum."</td>
						  <td style='text-align: center !important;'>".$pnum."</td>
						  <td style='text-align: center !important;'>".$cnum."</td>
						  <td style='text-align: center !important;'>".$onum."</td>
			          </tr>
								
		          </tbody></table></div>";
		       
        $data .='<div class="col-md-12">
				<h5>FOOD SAMPLE SUMMARY</h5>
				    <table id="example111" border="1" cellpadding="5" cellspacing="5" width="100%" style="border-collapse:collapse;">
                <thead>
				  <tr>
				  <th>Total Sample</th>
                  <th># Accepted</th>
                  <th># Rejected </th>
				  <th># Pending </th>
                  <th># Completed</th>
                  <th># Ongoing</th>
				
				  </tr>
                </thead>
                <tbody style="text-align: center;">
                    <tr> <td>'.$tnumf.'</td>
				          <td>'.$anumf.'</td>
						  <td>'.$rnumf.'</td>
						  <td>'.$pnumf.'</td>
						  <td>'.$cnumf.'</td>
						  <td>'.$onumf.'</td>
			          </tr>
                </tbody>
              </table>
				
				</div>
             
			<div class="col-md-12">
				<h5>DRUGS & COSMETICS SAMPLE SUMMARY</h5>
				    <table id="example1111" border="1" cellpadding="5" cellspacing="5" width="100%" style="border-collapse:collapse;">
                <thead>
				  <tr>
				  <th>Total Sample</th>
                  <th># Accepted</th>
                  <th># Rejected </th>
				  <th># Pending </th>
                  <th># Completed</th>
                  <th># Ongoing</th>
				
				  </tr>
                </thead>
                <tbody style="text-align: center;">
                  <tr> <td>'.$tnumd.'</td>
				          <td>'.$anumd.'</td>
						  <td>'.$rnumd.'</td>
						  <td>'.$pnumd.'</td>
						  <td>'.$cnumd.'</td>
						  <td>'.$onumd.'</td>
			          </tr>
                </tbody>
              </table>
				
				</div>
				
				<div class="col-md-12">
				<h5>SAMPLES FAILED </h5>
				    <table id="example1111" border="1" cellpadding="5" cellspacing="5" width="100%" style="border-collapse:collapse;">
                <thead>
				  <tr>
				  <th>Total Sample</th>
                  <th># Food</th>
                  <th># Drugs  & Cosmetics </th>
				  </tr>
                </thead>
                <tbody style="text-align: center;">
                  <tr> <td>'.$ffn.'</td>
				          <td>'.$ffnf.'</td>
						  <td>'.$ffnd.'</td>
						  
			          </tr>
                </tbody>
              </table>
				
				</div>
				
				
				<div class="col-md-12">
				<h5>SAMPLES PASS</h5>
				    <table id="example1111" border="1" cellpadding="5" cellspacing="5" width="100%" style="border-collapse:collapse;">
                <thead>
				  <tr>
				  <th>Total Sample</th>
                  <th># Food</th>
                  <th># Drugs  & Cosmetics </th>
				  </tr>
                </thead>
                <tbody style="text-align: center;">
                  <tr> <td>'.$ppn.'</td>
				          <td>'.$ppnf.'</td>
						  <td>'.$ppnd.'</td>
			          </tr>
                </tbody>
              </table>
				
				</div>';
				
		$data .='<br /><br />
		   <table width="100%">
          <tr>
              <td width="50%"><b>Name:&emsp;'.$user['Fullname'].'</b></td>
              <td width="50%" style="text-align: right;"><b>Signature</b></td>
		   </tr>
		  </table><br /><br />
		  
         ';
	
	
$mpdf->WriteHTML($data);

$mpdf->Output();
//mysqli_close($conn);
?>
