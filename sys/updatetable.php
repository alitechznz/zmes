<?php 
    include 'includes/conn.php';
    $querypsp = "SELECT * FROM `project_financing`"; 
    $resultpsp = mysqli_query($conn, $querypsp) or die("Error : ".mysqli_error($conn));
    $iter = 0;
    while($rowpsp = mysqli_fetch_array($resultpsp)) {	
        $getproject_ID=$rowpsp['Project'];
        $getsponser_ID=$rowpsp['SponsorID'];
         $gettype='';
        //update
        if(strpos($getsponser_ID, '178') !== false && strpos($getsponser_ID, ',') !== true) {
            $gettype ='Government';
        } elseif(strpos($getsponser_ID, '178') !== true){
            $gettype ='Development Partners';
        } elseif(strpos($getsponser_ID, '178') !== false && strpos($getsponser_ID, ',') !== false){
            $gettype ='SMZ & Donors';
        }

        $sql ="UPDATE `projecttb` SET `SponsorType`=' $gettype' WHERE `ID` = '$getproject_ID'";
  	    if (mysqli_query($conn, $sql)) {
             echo 'Data added successfully'; 
        } else {
            echo 'Error!'; 
        }

    }
?>