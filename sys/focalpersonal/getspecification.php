<?php 
$q = $_GET['q'];
$code = $_GET['code'];

include ('includes/conn.php');

$desc ="";
$sql="SELECT * FROM labtestmethod WHERE method ='$q' and SampleID='$code'";
//var_dump($sql);
//exit;
$sresult = mysqli_query($conn, $sql);
if($srow = mysqli_fetch_array($sresult)) { 
   $desc = $srow['ProductSpecification'];
     echo $desc;
		
	 } 
mysqli_close($conn);
?>