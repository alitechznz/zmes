<?php
//include the library
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new mPDF();
$mpdf->tabSpaces = 2;
$stylesheet = file_get_contents('../mpdf.css');

$code = $_GET['code'];
$analyst ="";
$head ="";
$datesubmit ="";
$dateexpiry ="";
$datemanuf ="";
$common="";
$brand ="";
$Offcer ="";
$headremark = "";
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
		 $headremark = $row['FHead_Comment'];
		 $Offcer = $row['Officer'];
		 $Qnt = $row['Quantity'];
		 $batch = $row['Batch'];
		 
		 $dattime = $row['Submissiondate'];
		 list($dtsub, $tmsub) = explode(' ', $dattime);
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
		      <img src="zfdb_logo.png" width="15%;" style="margin: 0px 1%;"><br />
			  
		  </td>
		  <td width="60%" style="text-align: center; padding-top: -20px;">
			  <p><b>FOOD SAMPLE SUBMISSION FOR ANALYSIS</b><br /><i style="font-size: 12px;">(Made under Section 103 of the ZFDC Act 2/2006)</i><br /><br /><i>(To be filled in duplicate)</i></p>
		  </td>
		 
		  <td width="20%" style="text-align: right; padding-top: -50px;">
		     <p><b><i>ZFDA/FSCD/FOM/003 <br /></b><i>Rev. #:04</i></p>
		  </td>
		</tr>
	</table><hr />';
$mpdf->SetHTMLHeader($dataheader);

            $barcodeText = "ZFDA12345";
            $barcodeType="code128";
            $barcodeDisplay="horizontal";
            $barcodeSize= 30;
            $printText=  "false";
//footer
$mpdf->SetHTMLFooter('
  <div class="">
	<hr />
	 <p style="text-align: center; margin-top: -10px;"><b>P.O.Box 3595, Mombasa Area, Changu Road, Zanzibar <br/> Tel: +255 24 2233959-, Fax: +255 24 2233959, Website www.zfda.go.tz<br /> Email: info@zfda.go.tz</b></p>
	
  </div>
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">Page {PAGENO} of {nbpg}</td>
        <td width="33%" style="text-align: right;">
		   
           <img class="barcode" alt="'.$barcodeText.'" src="barcode/barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'"/>
           </td>
    </tr>
</table>');



//create new pdf instance
// this for v7+ $mpdf = new \Mpdf\Mpdf(); 


//crate object will hold all html_entity_decode

$data .='<br /><br /><br /><br /><h5>TO</h5><p>LABORATORY</p>';

list($dddy, $dddm, $dddd) = explode('-', $datesubmit);

$data .='<p style="text-align: justify;">I,&emsp;<b>'.$Offcer.' </b> have this <b>'.$dddd.'</b> day of <b>'.$dddm.'/'.$dddy.' </b>received sample of the hereunder detailed product under powers vested in me under Section 103 of the Zanzibar Food, Drugs and Cosmetics Act No.2/ 2006 for further examination. 
		   </p>';
	
$data .='<h4>DETAILS OF THE SAMPLE</h4><p><b>Sample code number: &emsp;</b>'.$code.'<br /><b>Common Name: &emsp;</b>'.$common.'</p>';

//remark from the director of the lab
 $Honame ='';
 $Hremark ='';
 $Hrecdate ='';
 $Hreason ='';
$sql = "SELECT * FROM `lab_remark` WHERE SampleCode='$code'";
     $query = $conn->query($sql);
     if($row = $query->fetch_assoc()) {
		 $Honame =$row['HeadName'];
	     $Hremark  =$row['ConditionStatus'];
		 $Hrecdate =$row['ReceivingDate'];
		 $Hreason =$row['Reasons'];
	 }


//method
 $method ="";
$ProductSpecification ="";
$sql = "SELECT * FROM `labtestmethod` WHERE SampleID='$code'";
     $query = $conn->query($sql);
     if($row = $query->fetch_assoc()) {
		 $method =$row['method'];
		 $ProductSpecification =$row['ProductSpecification'];
	 }
	
	 
//test results
     $sql = "SELECT * FROM `labresult` WHERE SampleID='$code'";
     $query = $conn->query($sql);
	 $numres = 1;
     while ($row = $query->fetch_assoc()) {
		 $testParameter =$row['testParameter'];
		 $method =$row['method'];
         $specification =$row['specification'];
         $result=$row['result'];
         $remark =$row['remark'];
		 
		 $datares .='<tr>
				<td style="border: 1px solid black;">'.$testParameter.' </td>
				<td style="border: 1px solid black;">'.$method.'</td>
				<td style="border: 1px solid black;">'.$specification.'</td>
				<td style="border: 1px solid black;">'.$result.'</td>
				
			</tr>';
			$numres +=1;
	 }
	 
	 
	 $sql = "SELECT * FROM `lab_testsrequested` WHERE SampleID='$code'";
     $query = $conn->query($sql);
	 $numres = 1;
     while ($row = $query->fetch_assoc()) {
		 $testParameter =$row['Tests'];
		 
		 $datares1 .='<tr>
				<td style="border: 1px solid black;">'.$numres.' </td>
				<td style="border: 1px solid black;">'.$testParameter.'</td>
			</tr>';
			$numres +=1;
	 }
	 
	 //custodian information fetching
	 $DateIn ="";
	 $Custodian ="";
	 $sqlreag = "SELECT * FROM `custodian` WHERE SampleCode='$code'";
     $queryreag = $conn->query($sqlreag);
	 $numreg = 1;
     if($row = $queryreag->fetch_assoc()) {
		 $DateIn =$row['DateIn'];
		 $Custodian =$row['Custodian'];
		 
		 list($dtrec, $tmrec) = explode(' ',$DateIn); 
	 }
	
	
$data .='
          <table border="1" cellpadding="5" cellspacing="5" width="100%" style="border-collapse:collapse;">
                    <tr>
                       <th>Quantity/ Number</th>
                       <th> Batch /Lot Number</th>
                       <th> Manufacture date</th>
                       <th> Expiry Date</th>
                       
                    </tr>
					<tr>
						<td style="border: 1px solid black;">'.$Qnt.' </td>
						<td style="border: 1px solid black;">'.$batch.'</td>
						<td style="border: 1px solid black;">'.date("m-d-Y", strtotime($datemanuf)).'</td>
						<td style="border: 1px solid black;">'.date("m-d-Y", strtotime($dateexpiry)).'</td>
			       </tr>
		  </table>
        ';
		
		
$data .='<p>I consider it necessary to be analyzed by Analyst with the following tests;</p>';	
$data .='
          <table border="1" cellpadding="5" cellspacing="5" width="100%" style="border-collapse:collapse;">
                    <tr>
                       <th>S/N</th>
                       <th> Test requested</th>  
                    </tr>'.$datares1.'
		  </table>';
		  
$data .='<br /><table width="100%">
          <tr>
              <td width="33%">Submission time:&emsp;'.$tmsub.'</td>
			  <td width="33%">Signature:&emsp;......................</td>
              <td width="33%" style="text-align: right;">Date:&emsp;'.date("m-d-Y", strtotime($dtsub)).'</td>
		   </tr>
		 </table>
		 <table width="100%">
          <tr>
              <td width="50%">Name of Custodian:&emsp;'.$Custodian.'</td>
			  <td width="17%"></td>
              <td width="33%" style="text-align: right;">Signature:..........................</td>
		   </tr>
		 </table>
		 <table width="100%">
          <tr>
              <td width="50%">Receiving time:&emsp;'.$tmrec.'</td>
			  <td width="17%"></td>
              <td width="33%" style="text-align: right;">Date:&emsp;'.date("m-d-Y", strtotime($dtrec)).'</td>
		   </tr>
		 </table>
		 ';
		   
	
		
		
$data .='<p><b>LABORATORY REMARKS:&emsp;</b><br />';
       if($Hremark =='Accept') {
		   $data .='I accept to carry out tests specified above.<br /></p><br />';
	   } else {
		   $data .='I reject to carry out tests specified above.<br />Reason(s) (in case of rejection):'.$Hreason.'</p><br />';
	   }
 
 //list($hdt, $htm) =explode($Hrecdate 
  
             

$data .='<br /><br />
         <table width="100%">
          <tr>
              <td width="50%">'.$Honame.'</td>
              <td width="25%"><b>.....................</b></td>
			  <td width="25%" style="text-align: right;">'.date("m-d-Y", strtotime($Hrecdate)).'</td>
		   </tr>
		  </table>
		   <table width="100%">
          <tr>
              <td width="50%"><b>Name of Director of Laboratory Services</b></td>
              <td width="25%"><b>Signature</b></td>
			  <td width="25%" style="text-align: right;"><b>Date</b></td>
		   </tr>
		  </table><br />
         ';

//write mpdf from html_entity_decode
$mpdf->WriteHTML($data);

//make the output to the  browser
$mpdf->Output();
//$mpdf->Output("mypdf.pdf","D");
?>