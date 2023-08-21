<?php
include '../includes/session.php';
include '../includes/conn.php';

        $equipment = $_POST['equipment'];
		$codenumber = $_POST['codenumber'];
		$calibration = $_POST['calibration'];
		$type=$_POST['type'];
		$SampleId=$_POST['sampleID'];
        $NameOfProduct=$_POST['samplename'];
        	$code=$_POST['code'];
        $name=$_POST['name'];
		
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = '../food.php?id='.$SampleId.'&type='.$type.'&samplename='.$name.'&code='.$code.'&role=""';
	}

	if(isset($_POST['save'])){
		
          	$sql = "INSERT INTO `LabEquipment`(`LabEquipementId`, `LabEqSubmitId`, `Name`, `CodeNumber`, `CallibrationStatus`, `Type`, `SampleID`) 
          	          VALUES('','$SampleId','$equipment', '$codenumber', '$calibration','$type', '$code')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Equipment selected successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
	} elseif(isset($_POST['Update'])){
	    
        $equipment = $_POST['equipment'];
		$codenumber = $_POST['codenumber'];
		$calibration = $_POST['calibration'];
		$type=$_POST['type'];
		$SampleId=$_POST['sampleID'];
		
			$sql = "UPDATE `LabEquipment` SET `Name`=' $equipment', `CodeNumber`='$codenumber', `CallibrationStatus`='$calibration',`Type`='$type' WHERE LabEqSubmitId='$SampleId'";
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