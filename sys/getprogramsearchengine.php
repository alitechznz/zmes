<?php

include 'includes/conn.php';
$program = $_GET['program'];
$sector = $_GET['sector'];
$sponser = $_GET['sponser'];
$kra = $_GET['kra'];
$budget = $_GET['budget'];

$datet = $_GET['datet'];
$datef = $_GET['datef'];
$datefrom1 = date_create($datef);
$df = date_format($datefrom1,"Y-m-d");

$dateto=date_create($datet);
$dt1 = date_format($dateto,"Y-m-d");
$row_project ='';
$query = "";

//check if the selected
   if($kra > 0 && $program <= 0  && $budget <= 0 && $sponser <= 0 && $sector <= 0){
        $querykra = "SELECT * FROM `project_kra` WHERE `KRA` ='$kra'"; 
        $resultkra = mysqli_query($conn, $querykra) or die("Error : ".mysqli_error($conn));
        while($rowkra = mysqli_fetch_array($resultkra)) {	
            $row_project = $rowkra['Project'];
            $query = "SELECT * FROM `projecttb` WHERE `pType` ='Project' AND `ID`='$row_project'";
          //   var_dump($query);
          //   exit;
            include 'runquery.php';
        }
   }
   
   if($kra <= 0 && $program > 0  && $budget <= 0 && $sponser <= 0 && $sector <= 0){
            $query = "SELECT * FROM `projecttb` WHERE `pType` ='Project' AND `UnderProgram`='$program'"; 
            include 'runquery.php';
   }
   
   if($kra <= 0  && $program <= 0  && $budget <= 0 && $sponser > 0 && $sector <= 0){
            $sponser_name ="";
            if($sponser == 1){
                $sponser_name = "Government";
            } elseif($sponser == 2){
                $sponser_name = "Private";
            } elseif($sponser == 3){
                 $sponser_name = "PPP";
            } elseif($sponser == 4){
                 $sponser_name = "Development Partners";
            } elseif($sponser == 5){
                 $sponser_name = "SMZ & Donor";
            }
            $query = "SELECT * FROM `projecttb` WHERE `pType` ='Project' AND `SponsorType`='$sponser_name'";
            include 'runquery.php';
   }
   
    if($kra <= 0  && $program <= 0  && $budget <= 0 && $sponser <= 0 && $sector > 0){
            $query = "SELECT * FROM `projecttb` WHERE `pType` ='Project' AND `SectorID`='$sector'";
            include 'runquery.php';
   }
   
   if($kra >0 && $program > 0) {
        $querykra = "SELECT * FROM `project_kra` WHERE `KRA` ='$kra'"; 
        $resultkra1 = mysqli_query($conn, $querykra) or die("Error : ".mysqli_error($conn));
        while($rowkra1 = mysqli_fetch_array($resultkra1)) {	
            $row_project = $rowkra1['Project'];
            $query = "SELECT * FROM `projecttb` WHERE `pType` ='Project' AND `ID`='$row_project' AND `UnderProgram`='$program'"; 
            include 'runquery.php';
        }
   }
   
   if($sector >0 && $program > 0) {
            $query = "SELECT * FROM `projecttb` WHERE `pType` ='Project' AND `SectorID`='$row_project' AND `UnderProgram`='$program'"; 
            include 'runquery.php';
   }
   
   if($sector >0 && $sponser > 0) {
            $sponser_name ="";
            if($sponser == 1){
                $sponser_name = "Government";
            } elseif($sponser == 2){
                $sponser_name = "Private";
            } elseif($sponser == 3){
                 $sponser_name = "PPP";
            } elseif($sponser == 4){
                 $sponser_name = "Development Partners";
            } elseif($sponser == 5){
                 $sponser_name = "SMZ & Donor";
            }
            $query = "SELECT * FROM `projecttb` WHERE `pType` ='Project' AND `SectorID`='$row_project' AND `SponsorType`='$sponser_name'"; 
            include 'runquery.php';
   }
   
    if($sponser >0 && $program > 0) {
         $sponser_name ="";
            if($sponser == 1){
                $sponser_name = "Government";
            } elseif($sponser == 2){
                $sponser_name = "Private";
            } elseif($sponser == 3){
                 $sponser_name = "PPP";
            } elseif($sponser == 4){
                 $sponser_name = "Development Partners";
            } elseif($sponser == 5){
                 $sponser_name = "SMZ & Donor";
            }
            $query = "SELECT * FROM `projecttb` WHERE `pType` ='Project' AND `SponsorType`='$sponser_name' AND `UnderProgram`='$program'";
            include 'runquery.php';
   }
   
   /*
   $querysponser = "SELECT * FROM `project_financing` WHERE `SponsorID` ='$sponser'"; 
        $resultsponser = mysqli_query($conn, $querysponser) or die("Error : ".mysqli_error($conn));
        while($rowsponser = mysqli_fetch_array($resultsponser)) {	
            $row_project = $rowsponser['Project'];
            $query = "SELECT * FROM `projecttb` WHERE `pType` ='Project' AND `ID`='$row_project'";
            include 'runquery.php';
        }
   */

                   
?>