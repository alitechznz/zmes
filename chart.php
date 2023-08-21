<?php 
//index.php
 include 'php/conn.php';
$query = "SELECT * FROM `projecttb` ORDER BY ID";
$result = mysqli_query($conn, $query);

$chart_data = '';

$num_lga =0;
$num_nat =0;

$pnum_medical = 0;

$mwaka = array();
$mwaka1 = '';
$num = 0;

while($row = mysqli_fetch_array($result))
{   
    if($num == 0) {
        //$yearvar = date_format($row["StartDate"], 'Y');
        $yearvar = date('Y', strtotime($row["StartDate"]));
		$mwaka[$num] = $yearvar;
	    $num +=1;
		$mwaka1 = $yearvar;
	} else {
		if(date('Y', strtotime($row["StartDate"])) != $mwaka1){   //mwaka tofauti
			$mwaka[$num] = date('Y', strtotime($row["StartDate"]));
			$num +=1;
			$mwaka1 = date('Y', strtotime($row["StartDate"]));
		}
	}
	
	
	
} //end of kusoma mwaka

$arrlength = count($mwaka); // get the length of the array
for($x = 0; $x < $arrlength; $x++) {
   //call for determination of each
   //National
   $num_nat = 0;
   $num_lga = 0;
   
   $queryf = "SELECT * FROM `projecttb` WHERE `pType`='Project' and `pTypeGroup`='National' ORDER BY ID";
   $resultf = mysqli_query($conn, $queryf);
     while($rowf = mysqli_fetch_array($resultf)) {
         if(date('Y', strtotime($row["StartDate"])) == $mwaka[$x]) {
             $num_nat +=1;
         }
		
	 }
	 
	  //LGAs
   $queryd = "SELECT * FROM `projecttb` WHERE `pType`='Project' and `pTypeGroup`='LGA' ORDER BY ID";
   $resultd = mysqli_query($conn, $queryd);
     while($rowd = mysqli_fetch_array($resultd)) {
		  if(date('Y', strtotime($row["StartDate"])) == $mwaka[$x]) {
             $num_lga +=1;
         }
		
	 }
	 
	 
	 $chart_data .= "{ year:'".$mwaka[$x]."', national:".$num_nat.", lga:".$num_lga."}, ";
	 
}

  
$chart_data = substr($chart_data, 0, -2);

?>