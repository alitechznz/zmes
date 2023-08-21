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
		  $sealed = $row['Sealed'];
	 }
	 
	 if($sealed =="") {
		  $sealed = "sealed";
	 } 
	 
	 if($brand == "") {
		 $common = $common;
	 } else {
		 $common = $common." (".$brand.")";
	 }

//create header
$dataheader ='
    <div width="100%" style="text-align: center; font-family: Times New Roman, Times, serif;">
	  <h1>
	     ZANZIBAR FOOD AND DRUGS BOARD
	  </h1>
	</div>
    <table width="100%" style="font-family: Times New Roman, Times, serif !important; ">
	   <tr>
	       <td width="45%" style="text-align: left;">
		       <p><b>E-mail: <span style="margin-left: 60%;">info@zfda.go.tz</span></b>,<br/><b>Tel No: +255-24-2233959</b>,<br /><b>Fax No: +255-24-2233959</b>, <br/> <b>Website: www.zfda.go.tz</b>
		        <br /><br /><b>All letters should be addressed to the Executive Director</b></p>
		   </td>
	
	      <td width="33%">
		      <img src="zfdb_logo.png" width="20%;" style="margin: 0px 30%;">
		  </td>
		 
		  <td width="22%" style="text-align: right;">
		     <p><b>Changu Road,</b><br/><b>Mombasa Area,</b><br /><b>P.O.Box 3595, </b><br/><b>Zanzibar, </b><br /> <b>Tanzania.</b></p>
		  </td>
		</tr>
	</table>
	 <table width="100%" style="border-top: 2px double black; border-bottom: 1px solid black; font-family: Times New Roman, Times, serif; ">
          <tr>
              <td width="50%"><b>Ref.No.ZFDA/MTUC.A/1VOL.VI </b></td>
              <td width="50%" style="text-align: right;"><b>'.date("d-m-Y").'</b></td>
		   </tr>
	  </table>
	
';
$mpdf->SetHTMLHeader($dataheader);

            $barcodeText = "ZFDA12345";
            $barcodeType="code128";
            $barcodeDisplay="horizontal";
            $barcodeSize= 30;
            $printText=  "false";
//footer
$mpdf->SetHTMLFooter('
  <div class="">
    <p style="font-size:11px; text-align: center;"><i>NB:  This certificate of analysis shall not be reproduced except in full written approval of the laboratory. </i></p><br />
	 <p style="font-size:11px; text-align: center;"><i> The sample was analysed as received </i></p>
	<hr />
	<h5 style="text-align: center; margin-top: -10px; font-family: Brush Script MT;"><i>Together we Protect Public Health</i></h5>
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
$data .='';
$data ='<br /><br /><br /><br /><br /><p style="text-align: center; margin-top: 10%; font-family: Times New Roman, Times, serif; "><b>CERTIFICATE OF ANALYSIS</b><br />
           <span style="text-align: center; font-family: Times New Roman, Times, serif; "><b>Made under section 109(1) of the ZFDC Act 2/2006</b></span>';

$data .='<p style="text-align: justify; font-family: Times New Roman, Times, serif; ">Zanzibar Food and Drugs Agency Laboratory being the Government Agency for the purpose of Zanzibar Food. Drugs and Cosmetics Act No. 2 of 2006
           and its amendment of Act No 3 of 2017 do hereby certify that, we have received on <b>'.$datesubmit.'</b> from Department of Food Safety Control '.$sealed.' sample pack
		   marked <b>'.$common.'</b> for analysis. Sample has been analyzed and do hereby declare the results as follows:-
		   </p>';
	
	
//sample info
 $DateReceived ='';
 
$sql = "SELECT * FROM `labsampleinfo` WHERE SampleID='$code'";
     $query = $conn->query($sql);
     if($row = $query->fetch_assoc()) {
		 $DateReceived =$row['DateReceived'];
	
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
		 
		 $datares .='<tr style="font-family: Times New Roman, Times, serif; ">
				<td style="border: 1px solid black;">'.$testParameter.' </td>
				<td style="border: 1px solid black;">'.$method.'</td>
				<td style="border: 1px solid black;">'.$specification.'</td>
				<td style="border: 1px solid black;">'.$result.'</td>
				<td style="border: 1px solid black;">'.$remark.'</td>
			</tr>';
			$numres +=1;
	 }
	 
	 $BatchNo ="";
	  $sqlreag = "SELECT * FROM `labreagent` WHERE SampleID='$code'";
     $queryreag = $conn->query($sqlreag);
	 $numreg = 1;
     if($row = $queryreag->fetch_assoc()) {
		 $BatchNo =$row['BatchNo'];
	 }
	
	$mandate ="";
	$expirydate ="";
	
 $sql = "SELECT * FROM `sample_submit` WHERE SampleCode='$code'";
     $query = $conn->query($sql);
     if($row = $query->fetch_assoc()) {
		 $analyst =$row['Analyst'];
		 $head =$row['HeadofLab'];
         $datesubmit =$row['DateSubmission'];
         $common=$row['CommonName'];
         $brand =$row['Brand'];
		 $mandate =$row['Mandate'];
	     $expirydate =$row['Expirydate'];
		
	 }
	 
	

$data .='<table width="100%" style="font-family: Times New Roman, Times, serif; ">
          <tr>
              <td width="33%"><b>Product:&emsp;</b></td>
              <td width="33%">'.$common.'</td><td width="33%"></td>
		   </tr>
		  
         <br />';
$data .='
          <tr>
              <td width="33%"><b>Presentation:&emsp;</b></td>
              <td width="33%">'.$common.'</td><td width="33%"></td>
		   </tr>
		 
         <br />';
$data .='
          <tr>
              <td width="33%"><b>Manufacturing date:&emsp;</b></td>
              <td width="33%">'.$mandate.'</td><td width="33%"></td>
		   </tr>
		  
         <br />';
$data .='
          <tr>
              <td width="33%"><b>Expiry date:&emsp;</b></td>
              <td width="33%">'.$expirydate.'</td><td width="33%"></td>
		   </tr>
		  
         <br />';
$data .='
          <tr>
              <td width="33%"><b>Batch number:&emsp;</b></td>
              <td width="33%">'.$BatchNo.'</td><td width="33%"></td>
		   </tr>
		  
         <br />';
$data .='
          <tr>
              <td width="33%"><b>Product specification:&emsp;</b></td>
              <td width="33%">'.$ProductSpecification.'</td><td width="33%"></td>
		   </tr>
		  
         <br />';
$data .='
          <tr>
              <td width="33%"><b>Date of analysis:&emsp;</b></td>
              <td width="33%">'.$DateReceived.'</td><td width="33%"></td>
		   </tr>
		  </table>
         <br />';
		 


$data .='<br />
          <table border="1" cellpadding="5" cellspacing="5" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; ">
                    <tr>
                       <th>Test</th>
                       <th> Ref.Method</th>
                       <th> Specification(s)</th>
                       <th> Result(s)</th>
                       <th> Remark(s)</th>
                    </tr>'.$datares.'
		  </table>
        ';
		
		if($headremark =="Fail"){
			$statement = '<span style="font-family: Times New Roman, Times, serif; ">The sample does not comply with the tested parameters</span>';
		} else  {
			$statement = '<span style="font-family: Times New Roman, Times, serif; ">The sample comply with the tested parameters</span>';
		}
$data .='<p style="font-family: Times New Roman, Times, serif; "><b>CONCLUSION REMARKS:&emsp;</b>'.$statement.'<br />';

$data .='<br /><br />
         <table width="100%"  style="font-family: Times New Roman, Times, serif; ">
          <tr>
              <td width="50%"><b>.....................</b></td>
              <td width="50%" style="text-align: right;"><b>.....................</b></td>
		   </tr>
		  </table>
		   <table width="100%" style="font-family: Times New Roman, Times, serif; ">
          <tr>
              <td width="50%"><b>Signature</b></td>
              <td width="50%" style="text-align: right;"><b>Signature</b></td>
		   </tr>
		  </table><br /><br />
		   <table width="100%" style="font-family: Times New Roman, Times, serif; ">
          <tr>
              <td width="50%">Name:&emsp;'.$analyst.'<br /><b>Lab analyst</b><br /><b>Date:</b>&emsp;'.date("d-m-Y").'</td>
              <td width="50%" style="text-align: right;">Approved by:&emsp; '.$head.'<br /><b>Head of Laboratory Services</b><br /><b>Date:</b>&emsp;'.date("d-m-Y").'</td>
		   </tr>
		  </table>
		 
         ';

//write mpdf from html_entity_decode
$mpdf->WriteHTML($data);

//make the output to the  browser
$mpdf->Output();
//$mpdf->Output("mypdf.pdf","D");
?>