<?php
include '../includes/session.php';
include '../includes/conn.php';

        $DateSampleReceived = $_POST['date'];
		$NameOfProduct = $_POST['product'];
		$CustomerCode = $_POST['custCode'];
		$type=$_POST['type'];
		$SampleId=$_POST['sampleID'];
		$code=$_POST['code'];
		$name=$_POST['name'];

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = '../food.php?id='.$SampleId.'&type='.$type.'&samplename='.$name.'&code='.$code.'&role=""';
	}

	if(isset($_POST['Save'])){
		
          	$sql = "INSERT INTO `LabSampleInfo` (`LabSampleId`,`SampleSumbitId`,`DateReceived`, `NameOfProduct`, `AppNumber`,`Type`, `SampleID`) 
			         VALUES ('','$SampleId','$DateSampleReceived', '$NameOfProduct', '$CustomerCode','$type', '$code')";
			if($conn->query($sql)){
				
				$sqlh = "UPDATE `sample_submit` SET `Analyst_Status`='1' WHERE `SampleCode`='$code'";
			    $conn->query($sqlh);
				
				$_SESSION['success'] = 'Add sample successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
	} elseif(isset($_POST['Update'])){
	    $DateSampleReceived = $_POST['date'];
		$NameOfProduct = $_POST['product'];
		$CustomerCode = $_POST['custCode'];
		$type=$_POST['type'];
		$SampleId=$_POST['sampleID'];
			$sql = "UPDATE `LabSampleInfo` SET `DateReceived`='$DateSampleReceived', `NameOfProduct`='$NameOfProduct', `AppNumber`='$CustomerCode',`Type`='$type' WHERE SampleSumbitId='$SampleId'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Sample updated successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	}else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);


?>