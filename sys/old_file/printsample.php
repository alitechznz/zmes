<?php
$from1 = $_GET['from'];
$to = $_GET['to'];

require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new mPDF();
$mpdf->tabSpaces = 2;

if(isset($_GET['code'])){
	$code = $_GET['code'];
} else {
	$code = "";
}

$analyst ="";
$head ="";
$datesubmit ="";
$dateexpiry ="";
$datemanuf ="";
$common="";
$brand ="";

require('includes/conn.php');
     $sql = "SELECT * FROM `sample_submit` WHERE SampleCode='$code'";
     $query = $conn->query($sql);
     if($row = $query->fetch_assoc()) {
		 $analyst =$row['Analyst'];
		 $head =$row['HeadofLab'];
         $datesubmit =$row['DateSubmission'];
         $common=$row['CommonName'];
         $brand =$row['Brand'];
		 $dateexpiry =$row['Expirydate'];
         $datemanuf =$row['Mandate'];
	 }
	 
	 if($brand == "") {
		 $common = $common;
	 } else {
		 $common = $common." (".$brand.")";
	 }

//create header
$dataheader ='
  
    <table width="100%">
	   <tr>
	      <td width="20%">
		      <img src="zfdb_logo.png" width="25%;" style="margin: 0px 1%;"><br />
			  <p>Lab code #:&emsp;'.$code.'</p>
		  </td>
		  <td width="60%">
			  <p>CUSTODIAN SAMPLE RECEIVED LIST<br /><i></p>
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
 
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">Page {PAGENO} of {nbpg}</td>
        <td width="33%" style="text-align: right;">
		   
           <img class="barcode" alt="'.$barcodeText.'" src="barcode/barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'"/>
           </td>
    </tr>
</table>');

include ('includes/conn.php');
	$datefrom1 = date_create($from1);
    $df = date_format($datefrom1,"Y-m-d");
	
	$dateto=date_create($to);
	$dt1 = date_format($dateto,"Y-m-d");
   
$type ="Food";
$sql="SELECT * FROM sample_submit WHERE type='$type' AND DateSubmission BETWEEN '$df' AND '$dt1'";
 '<input type="hidden" value="'.$sql.'"/>';

$result = mysqli_query($conn, $sql);

		$data .=" <br /><br /><br /><br /><br /><br /><br />
		   <h5 style='text-align: center;'>LIST OF SAMPLE(S)</h5>
		   <p>Date Range :".$from1." - ".$to."</p><br />
		  <table border='1' cellpadding='5' cellspacing='5' width='100%' style='border-collapse:collapse;'>
          <thead>
                <tr>
				  <th>Sample Code</th>
                  <th>Sample Name</th>
				  <th>Submitted By</th>
				  <th>Date Submitted</th>
                  <th>Assigned To</th>
                  <th>Date Remarked</th>
                  <th>Status</th>
				 
                </tr>
                </thead>
               <tbody>";
			   
					$rdate = '';	
                    $Lstatus = '';
                  while($row = mysqli_fetch_assoc($result)) {
                     // echo "tsssssssssssssssss";
                            $SID = $row['SampleCode'];
					    	$sql1 = "SELECT * FROM `lab_remark` WHERE `SampleCode` ='$SID'";
                            $query1 = $conn->query($sql1);
                            if($row1 = $query1->fetch_assoc()) {
                                $rdate = $row1['ReceivingDate'];
                                $Lstatus = $row1['ConditionStatus'];
                            }
			
			$data .="<tr>
					<td>".$row['SampleCode']."</td>
                          <td>".$row['CommonName']."</td>
                          <td>".$row['Officer']."</td>
                          <td>".$row['Submissiondate']."</td>
                          <td>".$row['HeadofLab']."</td>
						  <td>".$rdate."</td>";
						  
						  
    
					    if($Lstatus =="Accept") {
								  $data .='<td><span class="label label-success">Accepted</span></td>
								          ';
							 } else if($Lstatus =="Reject") {
								  $data .= '<td><span class="label label-danger">Rejected</span></td>
								        ';
							 } else {
						           $data .='<td><span class="label label-primary">Processing</span></td>
						                 ';
							 }
				
							 
			$data	.="</tr>";
			
			 }
													
		$data .=	"</tbody></table>";
	
	
$mpdf->WriteHTML($data);

$mpdf->Output();
//mysqli_close($conn);
?>
