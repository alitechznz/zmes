<?php
	include 'includes/session.php';

	if(isset($_POST['view_info'])){
		$empid = $_POST['id'];
		$editVolume = $_POST['volume'];
		$editUnit = $_POST['unit'];
		$editBatch = $_POST['batch'];
		$editContamination = $_POST['contamination'];
		$editConcentration = $_POST['concentration'];
		$editUnitCon = $_POST['conUnit'];
		$editExpiryDate = $_POST['expiryDate'];
		$editComment = $_POST['comment'];
		$editDateCreated = $_POST['manufacturedDate'];
	
		$sql = "UPDATE reagent SET Volume_unit  = '$editUnit', NameBatch = '$editBatch', Contamination = '$editContamination', Concentration = '$editConcentration',
		Cont_Unit = '$editUnitCon', ExpiryDate = '$editExpiryDate', Comment = '$editComment', DateCreated = '$editDateCreated', Volume_Qnt = '$editVolume'
		WHERE ReagentID = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'success';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select method to edit first';
	}

	header('location: add_reagent.php');
?>