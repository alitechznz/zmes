<?php
include '../includes/session.php';
include '../includes/conn.php';

        $inhouse = $_POST['inhouse'];
		$manufacture = $_POST['manufacture'];
		
		
    	$mtype=$_POST['mtype'];
		$edition=$_POST['edition'];
		$tdate=$_POST['tdate'];
		$page=$_POST['page'];
		$standard = $mtype.",".$edition.",".$tdate.",".$page;
		
		$type=$_POST['type'];
		$name=$_POST['name'];
		$SampleId=$_POST['sampleID'];
		$code=$_POST['code'];
		$gradient = $_POST['gradient'];
		
		
		
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = '../drug.php?id='.$SampleId.'&type='.$type.'&samplename='.$name.'&code='.$code.'&gradient='.$gradient.'&role=""';
	}

	if(isset($_POST['save'])){
		
		
          	$sql = "INSERT INTO `labtestmethod` (`LabTestId`,`LabSubmitId`,`Manufacture`, `Type`, `Standard`, `Inhouse`,`SampleID`) 
			         VALUES ('','$SampleId', '$manufacture', '$type', '$standard', '$inhouse', '$code')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Method added successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);


?>