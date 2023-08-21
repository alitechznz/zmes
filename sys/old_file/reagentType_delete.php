<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM reagentType WHERE reagentTypeID = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Reagent deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select reagent to delete first';
	}

	header('location: reagent_type.php');
	
?>