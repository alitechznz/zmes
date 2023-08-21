<?php
include '../includes/session.php';
include '../includes/conn.php';

        $selectedMethod = $_POST['testMethod'];
		$productSpecification = $_POST['description'];
    	$type=$_POST['type'];
		$name=$_POST['name'];
		$SampleId=$_POST['sampleID'];
		$code=$_POST['code'];
		
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = '../food.php?id='.$SampleId.'&type='.$type.'&samplename='.$name.'&code='.$code.'&role=""';
	}

	if(isset($_POST['save'])){
		
		
          	$sql = "INSERT INTO `LabTestMethod` (`LabTestId`,`method`,`LabSubmitId`,`ProductSpecification`, `Type`, `SampleID`) 
			         VALUES ('','$selectedMethod','$SampleId', '$productSpecification', '$type', '$code')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Add sample successfully';
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