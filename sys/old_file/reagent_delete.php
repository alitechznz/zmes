<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM reagent WHERE reagentID = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select reagent to delete first';
	}

	header('location: add_reagent.php');
	
?>