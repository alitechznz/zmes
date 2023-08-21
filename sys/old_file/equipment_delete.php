<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM Equipment WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Equipment deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select department to delete first';
	}

	header('location: add_equipment.php');
	
?>