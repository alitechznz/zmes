<?php
//include the library
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new mPDF();
$mpdf->tabSpaces = 2;
//$stylesheet = file_get_contents('../mpdf.css');

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
	      <td width="50%">
		      <img src="zfdb_logo.png" width="16%;" style="margin: 0px 1%;"><br />
			  <p>Lab code #:&emsp;'.$code.'</p>
		  </td>
		 
		  <td width="50%" style="text-align: right;">
		     <p><b><i>F03/LSD/SOP/004 Rev. #:01</i></b></p>
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
//footer
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


$data ='';
$data .='<br /><br /><br /><p style="text-align: center; margin-top: 10%;"><b>LABORATORY WORK SHEET MICROBIOLOGY ANALYSIS</b></p><br />';

	
 $sql = "SELECT * FROM `sample_submit` WHERE SampleCode='$code'";
     $query = $conn->query($sql);
     if($row = $query->fetch_assoc()) {
		 $analyst =$row['Analyst'];
		 $head =$row['HeadofLab'];
         $datesubmit =$row['DateSubmission'];
         $common=$row['CommonName'];
         $brand =$row['Brand'];
	 }

//sample info
 $DateReceived ='';
 $NameOfProduct ='';
 $AppNumber ='';
$sql = "SELECT * FROM `labsampleinfo` WHERE SampleID='$code'";
     $query = $conn->query($sql);
     if($row = $query->fetch_assoc()) {
		 $DateReceived =$row['DateReceived'];
		 $NameOfProduct =$row['NameOfProduct'];
         $AppNumber =$row['AppNumber'];
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
	 


//sample preparation
$SamplePrep="";
$sql = "SELECT * FROM `labsampleprepparation` WHERE SampleID='$code'";
     $query = $conn->query($sql);
     if($row = $query->fetch_assoc()) {
		$SamplePrep =$row['Description'];
	 }
	 
	 
	
//test calculation
$calculation ="";
$sql = "SELECT * FROM `labtestperformed` WHERE SampleID='$code'";
     $query = $conn->query($sql);
     if($row = $query->fetch_assoc()) {
		 $calculation =$row['Description'];
	 }
	
	
//test remark
$remarks ="";
$analysedBy ="";
$dateanalysis ="";
$sql = "SELECT * FROM `labremark` WHERE SampleID='$code'";
     $query = $conn->query($sql);
     if($row = $query->fetch_assoc()) {
		 $remarks =$row['remarks'];
		 $analysedBy =$row['analysedBy'];
         $dateanalysis =$row['date'];
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
		 
		 $datares .='<tr><td style="border: 1px solid black;">'.$numres.'</td>
				<td style="border: 1px solid black;">'.$testParameter.' </td>
				<td style="border: 1px solid black;">'.$method.'</td>
				<td style="border: 1px solid black;">'.$specification.'</td>
				<td style="border: 1px solid black;">'.$result.'</td>
				<td style="border: 1px solid black;">'.$remark.'</td>
			</tr>';
			$numres +=1;
	 }
	
	 
//test reagent
     $sqlreag = "SELECT * FROM `labreagent` WHERE SampleID='$code'";
     $queryreag = $conn->query($sqlreag);
	 $numreg = 1;
     while($row = $queryreag->fetch_assoc()) {
		 $Name =$row['Name'];
		 $BatchNo =$row['BatchNo'];
         $Grade =$row['Grade'];
         $ExpireDate=$row['ExpireDate'];
        
		$datareag .='<tr><td style="border: 1px solid black;">'.$numreg.'</td>
				<td style="border: 1px solid black;">'.$Name.' </td>
				<td style="border: 1px solid black;">'.$BatchNo.'</td>
				<td style="border: 1px solid black;">'.$Grade.'</td>
				<td style="border: 1px solid black;">'.$ExpireDate.'</td>
			</tr>';
			$numreg +=1;
	 }

//equipment
            $sqleq = "SELECT * FROM `labequipment` WHERE SampleID ='$code'";
            $queryeq = $conn->query($sqleq);
			$num =1;
			   while($row = $queryeq->fetch_assoc()) {
		      $Name =$row['Name'];
		      $CodeNumber =$row['CodeNumber'];
              $CallibrationStatus =$row['CallibrationStatus'];
            
		      $datatr .='<tr style=""><td style="border: 1px solid black; ">'.$num.'</td>
				<td style="border: 1px solid black; ">'.$Name.' </td>
				<td style="border: 1px solid black; ">'.$CodeNumber.'</td>
				<td style="border: 1px solid black; ">'.$CallibrationStatus.'</td>
			</tr>';
			$num +=1;
			}

$data .='
  
    <span><b>1.0&emsp;Sample Information</b><br />
	     <span>1.1&emsp;Date sample received by Analyst:&emsp;'.$DateReceived.'</span><br />
         <span>1.2&emsp;Name of the Product:&emsp;'.$NameOfProduct.'</span><br />
		 <span>1.3&emsp;Active ingredient(s) and strength (if applicable):&emsp;'.$AppNumber.'</span><br />
		 <span>1.4&emsp;Application no/Customer code number (if applicable):&emsp;'.$AppNumber.'</span>
	</span><br />
	
    <span><br /><b>2.0&emsp;Test Method/Specification</b><br />
	     <span>2.1&emsp;Pharmacopoeia/Standard method: Indicate type (USP, BP, IP, EP, TZS, GPHFetc) indicate edition and the year of issue, and page number (if applicable):&emsp;'.$method.'</span><br />
         <span>2.2&emsp;Manufacturs Method: (Indicate registration dossier number)&emsp;'.$ProductSpecification.'</span><br />
		 <span>2.3&emsp;In-house Method(Indicate method number and date of validation)&emsp;'.$ProductSpecification.'</span><br />
	</span><br />

    <span style="height:600px;"><b>3.0&emsp;Equipment</b><br /> <p></p>
	     <table border="1" cellpadding="5" cellspacing="5" width="100%" style="border-collapse:collapse;">
			<tr>
				<td><b>S/N</b></td>
				<td><b>Name</b></td>
				<td><b>Equipment No</b></td>
				<td><b>Calibration Status</b></td>
			</tr>'.$datatr.'
			 
      </table></span><br />';
	
$mpdf->WriteHTML($data);
$mpdf->AddPage();
$mpdf->SetHTMLHeader($dataheader);
	
	$data1 ='<br /><br /><br /><br /><br /><br />
	<span style="height:600px;"><b>3.1&emsp; Glassware</b><br /> <p></p>
	     <table border="1" cellpadding="5" cellspacing="5" width="100%" style="border-collapse:collapse;">
			<tr>
				<td><b>S/N</b></td>
				<td><b>Name</b></td>
			</tr>
			 
      </table></span><br />
	
	<br /><span style="height:450px;"><b>4.0&emsp;Reagent and Chemicals</b><br />
	    <p></p>
	     <table border="1" cellpadding="5" cellspacing="5" width="100%" style="border-collapse:collapse;">
			<tr>
				<td><b>S/N</b></td>
				<td><b>Name</b></td>
				<td><b>Batch No</b></td>
				<td><b>Grade (if applicable)</b></td>
				<td><b>Expiry date</b></td>
			</tr>'.$datareag.'
			
		</table></span><br />';
	
	$mpdf->WriteHTML($data1);
	$mpdf->AddPage();
    $mpdf->SetHTMLHeader($dataheader);
	$data2 .='<br /><br /><br /><br /><br /><br /><br />
	  <p style="height: 300px;"><b>5.0&emsp;Sample Preparation and Procedure</b></p><br />
		<p>'.$SamplePrep.'</p>
   
   <span><b>6.0&emsp;Test performed/Dilution/Weights taken/Calculations</b>
	   <div style="width:100%; height: 700px; border: 1px solid black;">
	        '.$calculation.'
	   </div>
	</span><br />';
	$mpdf->WriteHTML($data2);
	
	
	$mpdf->AddPage();
    $mpdf->SetHTMLHeader($dataheader);
	$data21 .='<br /><br /><br /><br /><br /><br /><br />
	  <span style="height:450px;"><b>6.0&emsp;Reference Standard/ Microorganisms (if applicable)</b><br />
	    <p></p>
	     <table border="1" cellpadding="5" cellspacing="5" width="100%" style="border-collapse:collapse;">
			<tr>
				<td><b>Namen of standard/ reference microorganism</b></td>
				<td><b>Batch No</b></td>
				<td><b>Expiry date</b></td>
			</tr>
			
		</table></span><br />
   
     <span><b>7.0&emsp;Control</b>
	   <div style="width:100%;">
	       <p>Positive Control <span style="padding: 0px 400px;">.........................</span></p>
		   <p>Negative Control <span style="padding: 0px 400px;">.........................</span></p>
		   <p>Blank/phosphate Buffer Saline <span style="padding: 0px 400px;">.........................</span></p>
		   <p>Air Settlement Plate Results <span style="padding: 0px 400px;">.........................</span></p>
		   <p>Sterility Check Plate <span style="padding: 0px 400px;">.........................</span></p>
	   </div>
	</span><br />';
	$mpdf->WriteHTML($data21);
	
	
	$mpdf->AddPage();
    $mpdf->SetHTMLHeader($dataheader);
	$data22 .='<br /><br /><br /><br /><br /><br /><br />
   <span><b>8.0&emsp;Calculation and/ or Test Results</b>
	   <div style="width:100%; height: 900px; border: 1px solid black;">
	        '.$calculation.'
	   </div>
	</span><br />';
	$mpdf->WriteHTML($data22);
	
	
	$mpdf->AddPage();
    $mpdf->SetHTMLHeader($dataheader);
	$data3 .='<br /><br /><br /><br /><br /><br /><br />
	<span style="height:450px;"><b>9.0&emsp;Results</b><br /> <p></p>
	     <table border="1" cellpadding="5" cellspacing="5" width="100%" style="border-collapse:collapse;">
			<tr>
				<td><b>S/N</b></td>
				<td><b>Test Parameters</b></td>
				<td><b>Method</b></td>
				<td><b>Specification</b></td>
				<td><b>Results</b></td>
				<td><b>Remarks</b></td>
			</tr>'.$datares.'
		</table>
	</span><br />
	
	<span style="height:450px;"><b>10.0&emsp;Remarks</b>
	    <br />
	    <p>'.$remarks.'</p>
		
 
	    <br /><table width="100%" style="font-size: 14px;">
          <tr>
              <td width="33%"><b>Analysed by&emsp;'.$analysedBy.'</b></td>
              <td width="33%" ><b>Signature&emsp;...........................</b></td>
			   <td width="33%" ><b>Date&emsp;'.$dateanalysis.'</b></td>
		   </tr>
		  </table><br />
		  <table width="100%">
          <tr>
              <td width="33%"><b>Checked by&emsp;'.$analysedBy.'</b></td>
              <td width="33%" ><b>Signature&emsp;.............................</b></td>
			  <td width="33%" ><b>Date&emsp;'.$dateanalysis.'</b></td>
		   </tr>
		  </table><br />
		  <p>
              <b>Approved by Head of Laboratory Services Department</b>
		   </p><br />
		  <table width="100%">
		    <tr>
              <td width="33%"><b>Name&emsp;'.$head.'</b></td>
              <td width="33%" ><b>Signature&emsp;................................</b></td>
			   <td width="33%" ><b>Date&emsp;'.$dateanalysis.'</b></td>
		   </tr>
		  </table>
		 
	</span><br />';
$mpdf->WriteHTML($data3);

//write mpdf from html_entity_decode
//$mpdf->WriteHTML($data);

//make the output to the  browser
$mpdf->Output();
//$mpdf->Output("mypdf.pdf","D");
?>