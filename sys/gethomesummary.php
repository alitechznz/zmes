<?php 

include 'includes/conn.php';
$query = "SELECT * FROM summary ORDER BY Mwaka";
$result = mysqli_query($conn, $query);

$chart_data = '';
$chart_data_d2 = '';

$num_sponsortype = 0;
$num_mradi = 0;
$num_mradi_SMZ = 0;
$num_mradi_WM = 0;
$num_mradi_WOTE = 0;

$per_mradi_SMZ = 0.00;
$per_mradi_WM = 0.00;
$per_mradi_WOTE = 0.00;

$mwaka = array();
$mwaka1 = '';
$num = 0;


while($row = mysqli_fetch_array($result))
{   
    $num_mradi +=$row['MiradiJumla'];
    $num_mradi_SMZ +=$row['MiradiNoSMZ'];
    $num_mradi_WM +=$row['MiradiNoWM'];
    $num_mradi_WOTE +=$row['MiradiWote'];
} //end of kusoma mwaka

$arrlength = 3; // get the length of the array
$num_start = 0;
$pie_legend ='';
$label = '';

$color="#f56954";
for($x = 0; $x < $arrlength; $x++) {
   if($x == 0){
    $color="#f56954";
    $pie_legend = '<li><i class="fa fa-circle-o text-red"></i> Government (RGoZ)</li>';
    $num_sponsortype = $num_mradi_SMZ;
    $label = 'Government (RGoZ)';
   } elseif($x == 1){
    $color="#00a65a";
    $pie_legend .= '<li><i class="fa fa-circle-o text-green"></i> Development Partners (DPs)</li>';
    $num_sponsortype = $num_mradi_WM;
    $label = 'Development Partners (DPs)';
   } elseif($x == 2){
    $color="#f39c12";
    $pie_legend .= '<li><i class="fa fa-circle-o text-yellow"></i> RGoZ & DPs</li>';
    $num_sponsortype = $num_mradi_WOTE;
    $label = 'RGoZ & DPs';
   } elseif($x == 3){
    $color="#00c0ef";
    $pie_legend .= '<li><i class="fa fa-circle-o text-aqua"></i> Others</li>';
    $num_sponsortype = 0;
   } elseif( $x == 4){
    $color="#3c8dbc";
    $pie_legend .= '<li><i class="fa fa-circle-o text-light-blue"></i> Others</li>';
   }


   
        // { "BudgetTerm": "USA", "project": 4025 }
        if($x == 0) {
            $chart_data = "{ value:".$num_sponsortype.", color:'".$color."', highlight:'".$color."', label:'".$label."'}";
            //$chart_data_d2 = '{ "category":"'.$mwaka[$x].'", "first":'.$num_mradi_SMZ.', "second":'.$num_mradi_WM.', "third":'.$num_mradi_WOTE.'}';
        } else {
            $chart_data .= ",{ value:".$num_sponsortype.", color:'".$color."', highlight:'".$color."', label:'".$label."'}";
           // $chart_data_d2 .= ',{ "category":"'.$mwaka[$x].'", "first":'.$num_mradi_SMZ.', "second":'.$num_mradi_WM.', "third":'.$num_mradi_WOTE.'}';
        }
        $num_sponsortype = 0;
        
}


$per_mradi_SMZ = round (($num_mradi_SMZ/$num_mradi) * 100, 2);
$per_mradi_WM = round (($num_mradi_WM/$num_mradi) * 100, 2);
$per_mradi_WOTE = round (($num_mradi_WOTE/$num_mradi) * 100, 2);

 //echo $chart_data;
//$chart_data = substr($chart_data, 0, -2);
//mysqli_close($conn);

?>