<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$edit_name = $_POST['edit_name'];
		$edit_leader = $_POST['edit_leader'];
		$edit_description = $_POST['edit_description'];
		
		$sql = "UPDATE department SET Name = '$edit_name', Leader = '$edit_leader', Description = '$edit_description' WHERE Dep_ID = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Department updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select department to edit first';
	}

	header('location: department.php');
?>