<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$editReagentName = $_POST['reagentName'];
		$editDescription = $_POST['description'];
	
		$sql = "UPDATE reagentType SET reagentName  = '$editReagentName', description = '$editDescription' WHERE reagentTypeID = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Reagent updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select method to edit first';
	}

	header('location: reagent_type.php');
?>