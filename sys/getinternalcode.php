<?php

include 'includes/conn.php';
$ID_get = $_GET['q'];
$sql="SELECT * FROM sector WHERE SectorID='$ID_get'";
$result = mysqli_query($conn, $sql);
$sectorCode ="";
if($row = mysqli_fetch_array($result)) {
    $sectorCode = $row['SectorCode'];
}
       $rowcount ="";
        $sqls="SELECT * FROM projecttb WHERE SectorID='$ID_get'";
        $results = mysqli_query($conn, $sqls);
        $count = mysqli_num_rows($results) + 1;
        if($count < 10) {
			$rowcount = "000".$count;
		} elseif($count < 100) {
		    $rowcount = "00".$count;
	    } elseif($count < 1000) {
		    $rowcount = "0".$count;
		} else {
			$rowcount = $count;
		}
        $date = date('Y');

   
        echo 'ZPC/'.$sectorCode.'/'.$rowcount.'/'.$date;
?>