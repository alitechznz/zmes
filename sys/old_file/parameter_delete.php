<?php
	include 'includes/session.php';

	
		$id = $_GET['sid'];
	//	var_dump($id);
	//	 exit;
		$sample = $_GET['sample'];
		$sql = "DELETE FROM lab_testsrequested WHERE id ='$id'";
		 //var_dump($sql);
		// exit;
		if($conn->query($sql)){
			$_SESSION['success'] = 'Parameter deleted successfully';
		}
		else{
		   
			$_SESSION['error'] = $conn->error;
		}


	header('location: sample_analysis.php?sample='.$sample);
	
?>