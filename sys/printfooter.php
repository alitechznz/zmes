<?php
   $barcodeText = "ZFDA12345";
   $barcodeType="code128";
   $barcodeDisplay="horizontal";
   $barcodeSize= 30;
   $printText=  "false";
   
  $printfooter ='
	<hr />

<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">Page {PAGENO} of {nbpg}</td>
        <td width="33%" style="text-align: right;">
		   
           <img class="barcode" alt="'.$barcodeText.'" src="barcode/barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'"/>
           </td>
    </tr>
</table>
    ';

?>