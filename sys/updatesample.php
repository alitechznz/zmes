<?php
	include 'includes/session.php';

	if(isset($_POST['update'])){
		$empid = $_POST['id'];
		$name = $_POST['name'];
		$head = $_POST['head'];
		$code = $_POST['code'];
		$samplename = $_POST['samplename'];
		$quantity = $_POST['quantity'];
		$batch = $_POST['batch'];
		$manudate = $_POST['manudate'];
		$expirydate = $_POST['expirydate'];
		$subdate = $_POST['subdate'];
		$duedate = $_POST['duedate'];
		
		$sql = "UPDATE sample_submit SET `Officer`='$name',`HeadofLab`='$head',`SampleCode`='$code',`CommonName`='$samplename',`Quantity`='$quantity',`Batch`='$batch',`Mandate`='$manudate',`Expirydate`='$expirydate',`UpdatedOn`='$subdate',`UpdatedBy`='$head',`DueDate`='$duedate' WHERE `Submit_ID`='$empid'";
		//var_dump($sql);
		//exit;
		if($conn->query($sql)){
			$_SESSION['success'] = 'Sample updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select sample to edit first';
	}

	header('location: Samplelist.php');
?>