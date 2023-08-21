<?php
include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'submit.php';
	}

	if(isset($_POST['update'])){
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
		$id = $_POST['submit_id'];
		$year = date('Y');
		
            $dte = date("Y-m-d");
			$sql = "UPDATE `sample_submit` set `Quantity`= `$quantity`, `Batch`=`$batch`,`Mandate`=`$manudate`,`Expirydate`=`$expirydate`,`Submissiondate`=`$subdate` WHERE Submit_ID='$id'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Update sample successfully';
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