<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$edit_name = $_POST['edit_name'];
		$edit_leader = $_POST['edit_comment'];
	
		$sql = "UPDATE lab_method SET Method  = '$edit_name', Specification = '$edit_leader' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Method updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select method to edit first';
	}

	header('location: add_method.php');
?>