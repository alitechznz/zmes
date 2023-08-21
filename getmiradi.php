<?php 
//index.php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
//$_SESSION['taasisi'];
//echo json_encode($push_data_comb);
include 'php/conn.php';
$query = "SELECT * FROM summary ORDER BY Mwaka";
$result = mysqli_query($conn, $query);

$chart_data = '';
$chart_data_d2 = '';

$num_mradi = 0;
$num_mradi_SMZ = 0;
$num_mradi_WM = 0;
$num_mradi_WOTE = 0;
$mwaka = array();
$mwaka1 = '';
$num = 0;


while($row = mysqli_fetch_array($result))
{   
    if($num == 0) {
		$mwaka[$num] = $row["Mwaka"];
	    $num +=1;
		$mwaka1 = $row["Mwaka"];
	} else {
		if($row["Mwaka"] != $mwaka1){   //mwaka tofauti
			$mwaka[$num] = $row["Mwaka"];
			$num +=1;
			$mwaka1 = $row["Mwaka"];
		}
	}
	
} //end of kusoma mwaka

$arrlength = count($mwaka); // get the length of the array
$num_start = 0;
for($x = 0; $x < $arrlength; $x++) {
   
    if(empty($mwaka[$x])){
       $num_start = $x+1;
    } else {
        $queryf = "SELECT * FROM summary WHERE Mwaka='$mwaka[$x]' ORDER BY Mwaka";
        $resultf = mysqli_query($conn, $queryf);
        while($rowf = mysqli_fetch_array($resultf)) {
            $num_mradi +=$rowf['MiradiJumla'];
            $num_mradi_SMZ +=$rowf['MiradiNoSMZ'];
            $num_mradi_WM +=$rowf['MiradiNoWM'];
            $num_mradi_WOTE +=$rowf['MiradiWote'];
        }
        
        // { "BudgetTerm": "USA", "project": 4025 }
        if($x == $num_start){
            $chart_data = '{ "BudgetTerm":"'.$mwaka[$x].'", "project":'.$num_mradi.'}';
            $chart_data_d2 = '{ "category":"'.$mwaka[$x].'", "first":'.$num_mradi_SMZ.', "second":'.$num_mradi_WM.', "third":'.$num_mradi_WOTE.'}';
        } else {
            $chart_data = ',{ "BudgetTerm":"'.$mwaka[$x].'", "project":'.$num_mradi.'}';
            $chart_data_d2 .= ',{ "category":"'.$mwaka[$x].'", "first":'.$num_mradi_SMZ.', "second":'.$num_mradi_WM.', "third":'.$num_mradi_WOTE.'}';
        }
        $num_mradi_SMZ = 0;
        $num_mradi_WM = 0;
        $num_mradi_WOTE = 0;
        $num_mradi = 0;
    }
}
 // echo $chart_data;
//$chart_data = substr($chart_data, 0, -2);
//mysqli_close($conn);

?>

