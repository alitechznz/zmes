<?php
include '../includes/session.php';
include '../includes/conn.php';
$testParameter = $_POST['TestParameters'];
		$method = $_POST['testMethod'];
		$specification = $_POST['Specifications'];
		$result = $_POST['Results'];
		$remarks = $_POST['Remarks'];
    	$type=$_POST['type'];
		$SampleId=$_POST['sampleID'];
		$name=$_POST['name'];
			$code=$_POST['code'];
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = '../food.php?id='.$SampleId.'&type='.$type.'&samplename='.$name.'&code='.$code.'&role=""';
	}

	if(isset($_POST['save'])){
		
		
          	$sql = "INSERT INTO `labResult` (`labResultId`,`labSubmitId`,`testParameter`,`method`, `specification`,`result`,`remark`,`type`, `SampleID`) 
			         VALUES ('','$SampleId','$testParameter', '$method', '$specification','$result','$remarks','$type', '$code')";
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