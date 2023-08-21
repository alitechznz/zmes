<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM sample_submit WHERE Submit_ID = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Sample deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select sample to delete first';
	}

	header('location: Samplelist.php');
	
?>