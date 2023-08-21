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
$Offcer="";
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
	 }
	 
	 if($brand == "") {
		 $common = $common;
	 } else {
		 $common = $common." (".$brand.")";
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

//create header
$dataheader ='<table width="100%">
	   <tr>
	       <td width="23%">
		      <img src="zfdb_logo.png" width="20%;" style="margin: 0px 0%;">
		  </td>
	       <td width="44%" style="text-align: center;">
		       <br /><br />
		      <h4>
	             SAMPLE ANALYSIS REQUEST FORM
	           </h4>
		   </td>
		  <td width="33%" style="text-align: right; margin-top: -20px;">
		     <p style="font-size:11px;"><i>FO1/LSD/SOP/004 Rev. #: 02</i></p>
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
$mpdf->SetHTMLFooter('<hr />
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
//test results
     $sql = "SELECT * FROM `lab_testsrequested` WHERE SampleID='$code'";
     $query = $conn->query($sql);
	 $numres = 1;
     while ($row = $query->fetch_assoc()) {
		 $testParameter =$row['Tests'];
		 
		 
		       if($numres > 1) { 
					
				  $datares .= '<tr>
						<td style="border: 1px solid black;"></td>
						<td style="border: 1px solid black;"></td>
				        <td style="border: 1px solid black;">'.$testParameter.' </td>
					</tr>';
			   } else {
				  $datares .= '<tr>
						<td style="border: 1px solid black;">'.$code.' </td>
						<td style="border: 1px solid black;">'.$common.'</td>
						<td style="border: 1px solid black;">'.$testParameter.'</td>
				
					</tr>';
			   } 
		       
			$numres +=1;
	 }


//crate object will hold all html_entity_decode
$data .='';
$data ='<br /><br /><br /><br /><br /><br />
           <p><b>Sample assigned to:</b></p>';
		   
$data .='<table width="100%">
          <tr>
              <td width="50%">Name:&emsp;'.$Offcer.'</td>
              <td width="50%" style="text-align: right;">Date:..........................</td>
		   </tr>
		   </table>';
$data .=' <p><b>
            Sample assigned by:
          </b></p>
         <table width="100%">
          <tr>
              <td width="50%">Name:&emsp;'.$head.'.<br />(Director of Laboratory Services Department)</td>
              <td width="50%" style="text-align: right;">Signature:&emsp;..........................</td>
		   </tr>
		   </table>';
		   
$data .=' <p><b>
            Sample issued by:
          </b></p>
         <table width="100%">
          <tr>
              <td width="33%">Name:&emsp;'.$Custodian.'<br />(Sample Custodian)</td>
			  <td width="33%">Signature:&emsp;..........................</td>
              <td width="33%" style="text-align: right;">Date:&emsp;'.date("m/d/Y", strtotime($dtrec)).'</td>
		   </tr>
		   </table>';

$data .='<br />
          <table border="1" cellpadding="5" cellspacing="5" width="100%" style="border-collapse:collapse; font-family: Times New Roman, Times, serif; ">
                    <tr>
                       <th>Sample Code Number</th>
                       <th> Product /Sample Name</th>
                       <th> Tests Requested</th>
                    </tr>'.$datares.'
		  </table>';
	
	
//sample info
 $data .='<br /><p><b>DLSD comment(s) if any</b><br />
 ................................................................................................................................................................
 ................................................................................................................................................................</p>';
 
 $data .='<p><b>Analyst comment(s) if any</b><br />
 ................................................................................................................................................................
 ................................................................................................................................................................</p>';
 
$data .='<p><b>Analysis done by</b><br />
.................................................................................................................................................................
 ................................................................................................................................................................</p>';
 


$data .='<br />
         <table width="100%">
          <tr>
              <td width="50%"><b>Date of completion of analysis.....................</b></td>
              <td width="50%" style="text-align: right;"><b>Signature.....................</b></td>
		   </tr>
		  </table>';

//write mpdf from html_entity_decode
$mpdf->WriteHTML($data);

//make the output to the  browser
$mpdf->Output();
//$mpdf->Output("mypdf.pdf","D");
?>