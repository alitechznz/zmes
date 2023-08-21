<?php
	include 'includes/session.php';

	
		$sid = $_GET['sid'];
		$id = $_GET['id'];
		$code = $_GET['code'];
		$sql = "DELETE FROM lab_testsrequested WHERE id = '$sid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Parameter deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}


	header('location: add_parameter.php?code='.$code.'&id='.$id);
	
?>