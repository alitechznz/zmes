<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$edit_name = $_POST['edit_name'];
		$edit_leader = $_POST['edit_code'];
		$edit_description = $_POST['edit_calibration'];
		
		$sql = "UPDATE Equipment SET Name = '$edit_name', CodeNumber = '$edit_leader', CalibrationStatus = '$edit_description' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Equipment updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select department to edit first';
	}

	header('location: add_equipment.php');
?>