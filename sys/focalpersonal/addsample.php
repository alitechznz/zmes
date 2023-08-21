<?php
include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'submit.php';
	}

	if(isset($_POST['save'])){
		$name = $_POST['name'];
		$head = $_POST['head'];
		$code = $_POST['code'];
		$samplename = $_POST['samplename'];
		$quantity = $_POST['quantity'];
		$batch = $_POST['batch'];
		$manudate = $_POST['manudate'];
		$expirydate = $_POST['expirydate'];
		$subdate = $_POST['subdate'];
		$year = date('Y');
		
            $dte = date("Y-m-d");
			$sql = "INSERT INTO `sample_submit`(`Officer`, `HeadofLab`, `SampleCode`, `CommonName`, `Quantity`, `Batch`, `Mandate`, `Expirydate`, `Submissiondate`, `UpdatedOn`, `UpdatedBy`, `Year`) 
			         VALUES ('$name', '$head', '$code', '$samplename', '$quantity', '$batch', '$manudate', '$expirydate', '$subdate', '', '', '$year')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Add sample successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);


?>