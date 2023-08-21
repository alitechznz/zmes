<?php 

include 'includes/conn.php';
$query = "SELECT * FROM projecttb ORDER BY SponsorType";
$result = mysqli_query($conn, $query);

$chart_data = '';
$chart_data_d2 = '';

$num_sponsortype = 0;

$mwaka = array();
$mwaka1 = '';
$num = 0;


while($row = mysqli_fetch_array($result))
{   
    if($num == 0) {
		$mwaka[$num] = $row["SponsorType"];
	    $num +=1;
		$mwaka1 = $row["SponsorType"];
	} else {
		if($row["SponsorType"] != $mwaka1){   //mwaka tofauti
			$mwaka[$num] = $row["SponsorType"];
			$num +=1;
			$mwaka1 = $row["SponsorType"];
		}
	}
	
} //end of kusoma mwaka

$arrlength = count($mwaka); // get the length of the array
$num_start = 0;
$pie_legend ='';

$color="#f56954";
for($x = 0; $x < $arrlength; $x++) {
   if($x == 0){
    $color="#f56954";
    $pie_legend = '<li><i class="fa fa-circle-o text-red"></i> '.$mwaka[$x].'</li>';
   } elseif($x == 1){
    $color="#00a65a";
    $pie_legend .= '<li><i class="fa fa-circle-o text-green"></i> '.$mwaka[$x].'</li>';
   } elseif($x == 2){
    $color="#f39c12";
    $pie_legend .= '<li><i class="fa fa-circle-o text-yellow"></i> '.$mwaka[$x].'</li>';
   } elseif($x == 3){
    $color="#00c0ef";
    $pie_legend .= '<li><i class="fa fa-circle-o text-aqua"></i> '.$mwaka[$x].'</li>';
   } elseif( $x == 4){
    $color="#3c8dbc";
    $pie_legend .= '<li><i class="fa fa-circle-o text-light-blue"></i> '.$mwaka[$x].'</li>';
   }


    if(empty($mwaka[$x])){
       $num_start = $x+1;
    } else {
        $queryf = "SELECT * FROM projecttb WHERE SponsorType='$mwaka[$x]' ORDER BY SponsorType";
        $resultf = mysqli_query($conn, $queryf);
        while($rowf = mysqli_fetch_array($resultf)) {
            $num_sponsortype +=1;
        }
        

        // { "BudgetTerm": "USA", "project": 4025 }
        if($x == $num_start) {
            $chart_data = "{ value:".$num_sponsortype.", color:'".$color."', highlight:'".$color."', label:'".$mwaka[$x]."'}";
            //$chart_data_d2 = '{ "category":"'.$mwaka[$x].'", "first":'.$num_mradi_SMZ.', "second":'.$num_mradi_WM.', "third":'.$num_mradi_WOTE.'}';
        } else {
            $chart_data .= ",{ value:".$num_sponsortype.", color:'".$color."', highlight:'".$color."', label:'".$mwaka[$x]."'}";
           // $chart_data_d2 .= ',{ "category":"'.$mwaka[$x].'", "first":'.$num_mradi_SMZ.', "second":'.$num_mradi_WM.', "third":'.$num_mradi_WOTE.'}';
        }
        $num_sponsortype = 0;
        
    }
}
 //echo $chart_data;
//$chart_data = substr($chart_data, 0, -2);
//mysqli_close($conn);

?>