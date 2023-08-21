<?php 
//index.php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
//$_SESSION['taasisi'];

if(isset($_GET['budget'])){
    include 'php/conn.php';
    $mwaka_budget = $_GET['budget'];
    $chart_data_miradi = array();
    $chart_data_plan = array();
    $chart_data_release = array();
    $mwaka_taasisi = array();
    $mwaka1 = '';
    $num = 0;

    $taasisi_name ="";
    $push_data;
    $push_data_comb;
    $push_data_mradi;
    $push_data_idadi;
    $push_data_ppesa;
    $push_data_rpesa;
    
    $taasisi_code = array();
    $query = "SELECT * FROM summary WHERE Mwaka='$mwaka_budget' ORDER BY Mwaka";
    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
    while($row = mysqli_fetch_array($result))
    {   
        $taasisi = $row['TaasisiID'];
        $chart_data_miradi[$num] = (int)$row['MiradiJumla'];
        $chart_data_plan[$num] = (float)$row['PlanAsilimiaJumla'];
        $chart_data_release[$num] = (float)$row['ReleaseAsilimiaJumla'];
        $taasisi_code[$num] = $row['TaasisiCode'];

        
        $codenm = $row['TaasisiCode'];
        if($num == 0){
           
            $push_data_mradi = "$codenm";
            $push_data_idadi = $row['MiradiJumla'];
            $push_data_ppesa = $row['PlanAsilimiaJumla'];
            $push_data_rpesa = $row['ReleaseAsilimiaJumla'];

            $push_data_mradi .= $row['TaasisiCode'];
            $push_data = '{category:'.$row['TaasisiCode'].', value1:'.(float)$row['PlanAsilimiaJumla'].', value2:'.(int)$row['MiradiJumla'].', value3:'.(float)$row['ReleaseAsilimiaJumla'].'}';
        } else {
           // $push_data_mradi .=','.$row['TaasisiCode'];
            $push_data_mradi .= ','."$codenm";
            $push_data_idadi .=','.$row['MiradiJumla'];
            $push_data_ppesa .=','.$row['PlanAsilimiaJumla'];
            $push_data_rpesa .=','.$row['ReleaseAsilimiaJumla'];

            $push_data .= ',{category:'.$row['TaasisiCode'].', value1:'.(float)$row['PlanAsilimiaJumla'].', value2:'.(int)$row['MiradiJumla'].', value3:'.(float)$row['ReleaseAsilimiaJumla'].'}';
        }
        
        
       // $json['summary'][]=$row;
    //echo json_encode($row);
    $num +=1;
    } //end of kusoma mwaka
     
   
    $push_data_comb = $push_data_mradi.'"'.$push_data_idadi.'"'.$push_data_ppesa.'"'.$push_data_rpesa.'"';
    //$_SESSION['taasisi'] = $taasisi_code;
    echo json_encode($push_data_comb);
    mysqli_close($conn);
}

//echo json_encode($taasisi_code);

/*
$chart_data = substr($chart_data, 0, -2);
$CatTotchart_data = substr($CatTotchart_data, 0, -2);
$Totchart_data = substr($Totchart_data, 0, -2);
*/
?>