<?php
//include the library
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new mPDF();
$mpdf = new mPDF('utf-8', 'A4');
$mpdf = new mPDF('',    // mode - default ''
	 '',    // format - A4, for example, default ''
	 0,     // font size - default 0
	 '',    // default font family
	 15,    // margin_left
	 15,    // margin right
	 16,     // margin top
	 16,    // margin bottom
	 9,     // margin header
	 9,     // margin footer
	 'L');  // L - landscape, P - portrait
	 
//create header
$dataheader ='
    <div width="100%" style="text-align: center; font-family: Times New Roman, Times, serif;">
	  <h1>
	     ZANZIBAR PLANNING COMMISSION
	  </h1>
	</div>
    <table width="100%" style="font-family: Times New Roman, Times, serif !important; ">
	   <tr>
	       <td width="45%" style="text-align: left;">
		       <p><b>E-mail: <span style="margin-left: 60%;">info@zfda.go.tz</span></b>,<br/><b>Tel No: +255-24-2233959</b>,<br /><b>Fax No: +255-24-2233959</b>, <br/> <b>Website: www.zfda.go.tz</b>
		        </p>
		   </td>
	
	      <td width="33%">
		      <img src="images/smz-trans.png" width="20%;" style="margin: 0px 28%;">
		  </td>
		 
		  <td width="22%" style="text-align: right;">
		     <p><b>Vuga,</b><br/><b>P.O.Box 874, </b><br/><b>Zanzibar, </b><br /> <b>Tanzania.</b></p>
		  </td>
		</tr>
	</table>
	 <table width="100%" style="border-top: 2px double black; border-bottom: 1px solid black; font-family: Times New Roman, Times, serif; ">
          <tr>
              <td width="50%"><b>Ref.No.ZFDA/MTUC.A/1VOL.VI </b></td>
              <td width="50%" style="text-align: right;"><b>'.date("d-m-Y").'</b></td>
		   </tr>
	  </table>';
$mpdf->SetHTMLHeader($dataheader);
//$mpdf->WriteHTML('<p>Your first taste of creating PDF from HTML</p>');
$mpdf->Output();
?>