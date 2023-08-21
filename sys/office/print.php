<?php
	include 'includes/session.php';

	function generateRow($conn){
		$contents = '';
		
	

		return $contents;
	}

	require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('TechSoft - Employee Schedule');  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center">CERTIFICATE OF ANALYSIS</h2>
      	<h4 align="center">Made under section 109(1) of the ZFDC Act 2/2006</h4>
      	<p>Zanzibar Food and Drugs Agency Laboratory being the Goverment Agency for the purpose of the Zanzibar Food, Drugs and Cosmetic Act No. 2 of 2006 and its 
      	amendment of Act No 3 of 2017 of here by certify that, we have received <b>submission date</b> from Depertment of food Safety Control sealed sample 
      	pack marked <b>0558 -Dates</b> for analysis. Sample has been analysed and do hereby declare the results as follows:-</p><br>
      	
      	<table border="0" cellspacing="10" cellpadding="10" width="600px" style="margin-left:100px">
					<tr>
						<td>
						<strong>	Products:</strong>  <?php echo  ?>
						</td>
						
					</tr>
					<tr>
						<td>
						<strong>	Presentation:</strong>  <?php echo  ?>
						</td>
						
					</tr>
					<tr>
						<td>
						<strong>	Manufacturing date:</strong>  <?php echo  ?>
						</td>
						
					</tr>
					<tr>
						<td>
						<strong>	Expiry Date:</strong>  <?php echo  ?>
						</td>
						
					</tr>
					<tr>
						<td>
						<strong>	Batch number:</strong>  <?php echo  ?>
						</td>
						
					</tr>
					<tr>
						<td>
						<strong>	Product Specification:</strong>  <?php echo  ?>
						</td>
						
					</tr>
					<tr>
						<td>
						<strong>	Date of Analysis:</strong>  <?php echo  ?>
						</td>
						
					</tr>
				</table>
      	
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
           		<th width="23%" align="center"><b>Test</b></th>
                <th width="28%" align="center"><b>Ref.Method</b></th>
				<th width="23%" align="center"><b>Specification</b></th> 
				<th width="13%" align="center"><b>Result(s)</b></th>
				<th width="13%" align="center"><b>Remark(s)</b></th> 
           </tr>  
           
           <table border="0" cellspacing="10" cellpadding="10" width="600px" style="margin-left:100px">
					<tr>
						<td>
						<strong>	CONCLUSION REMARKS:</strong> &nbsp The sample comply with the tested parameter. 
						</td>
						
					</tr>
					
					<tr>
						<td>
						.................... 
						</td>
						<td style="align:right">
						.................... 
						</td>
					</tr>
				</table>
           
      ';  
    $content .= generateRow($conn); 
    $content .= '</table>';  
    
                
    $pdf->writeHTML($content);  
    $pdf->Output('print.pdf', 'I');

?>