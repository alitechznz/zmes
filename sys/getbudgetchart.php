<?php 
//index.php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
//$_SESSION['taasisi'];

if(isset($_GET['budget'])){
    include 'includes/conn.php';
    $mwaka_budget = $_GET['budget'];
    $mwaka_taasisi = array();
    $mwaka1 = '';
    $num = 0;

    $push_data_SMZ = '';
    $push_data_WM = '';

$num_mradi = 0;
$numSMZ_1 = 0;
$numWM_1 = 0;
$numSMZ_2 = 0;
$numWM_2 = 0;
$numSMZ_3 = 0;
$numWM_3 = 0;
$numSMZ_4 = 0;
$numWM_4 = 0;
$numSMZ_5 = 0;
$numWM_5 = 0;
$numSMZ_6 = 0;
$numWM_6 = 0;
$numSMZ_7 = 0;
$numWM_7 = 0;
$numSMZ_8 = 0;
$numWM_8 = 0;
$numSMZ_9 = 0;
$numWM_9 = 0;
$numSMZ_10 = 0;
$numWM_10 = 0;
$numSMZ_11 = 0;
$numWM_11 = 0;
$numSMZ_12 = 0;
$numWM_12 = 0;
    
    $taasisi_code = array();
    $query = "SELECT * FROM miradi WHERE Mwaka='$mwaka_budget' ORDER BY Mwaka";
    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
    while($row = mysqli_fetch_array($result))
    {   
        $numSMZ_1 =$numSMZ_1 + (int)$row['JanuariSMZ'];
        $numWM_1 = $numWM_1  + (int)$row['JanuariWM'];
        $numSMZ_2 = $numSMZ_2 + (int)$row['FebruariSMZ'];
        $numWM_2 += (int)$row['FebruariWM'];
        $numSMZ_3 += (int)$row['MachiSMZ'];
        $numWM_3 += (int)$row['MachiWM'];
        $numSMZ_4 += (int)$row['ApriliSMZ'];
        $numWM_4 += (int)$row['ApriliWM'];
        $numSMZ_5 += (int)$row['MeiSMZ'];
        $numWM_5 += (int)$row['MeiWM'];
        $numSMZ_6 += (int)$row['JuniSMZ'];
        $numWM_6 += (int)$row['JuniWM'];
        $numSMZ_7 += (int)$row['JulaiSMZ'];
        $numWM_7 += (int)$row['JulaiWM'];
        $numSMZ_8 += (int)$row['AgostiSMZ'];
        $numWM_8 += (int)$row['AgoastiWM'];
        $numSMZ_9 += (int)$row['SeptembaSMZ'];
        $numWM_9 += (int)$row['SeptembaWM'];
        $numSMZ_10 += (int)$row['OktobaSMZ'];
        $numWM_10 += (int)$row['OktobaWM'];
        $numSMZ_11 += (int)$row['NovembaSMZ'];
        $numWM_11 += (int)$row['NovembaWM'];
        $numSMZ_12 += (int)$row['DisembaSMZ'];
        $numWM_12 += (int)$row['DisembaWM'];

            
        
       // $json['summary'][]=$row;
    //echo json_encode($row);
    $num +=1;
    } //end of kusoma mwaka

    $push_data_SMZ = $numSMZ_1.','.$numSMZ_2.','.$numSMZ_3.','.$numSMZ_4.','.$numSMZ_5.','.$numSMZ_6.','.$numSMZ_7.','.$numSMZ_8.','.$numSMZ_9.','.$numSMZ_10.','.$numSMZ_11.','.$numSMZ_12;
    $push_data_WM = $numWM_1.','.$numWM_2.','.$numWM_3.','.$numWM_4.','.$numWM_5.','.$numWM_6.','.$numWM_7.','.$numWM_8.','.$numWM_9.','.$numWM_10.','.$numWM_11.','.$numWM_12;
    
    $push_data_comb = $push_data_SMZ.'"'.$push_data_WM;
    echo json_encode($push_data_comb);
    mysqli_close($conn);
}

?>