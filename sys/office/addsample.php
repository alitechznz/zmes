<?php
include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		if(isset($_POST['save'])){
			$return = 'submit.php';
		}
		if(isset($_POST['dsave'])){
			$return = 'drug.php';
		}
		
	}
	
	    $name = $_POST['name'];
		$head = $_POST['head'];
		$code = $_POST['code'];
		$samplename = $_POST['samplename'];
		$quantity = $_POST['quantity'];
		$batch = $_POST['batch'];
		$aina = $_POST['aina'];
		
		$manudate = $_POST['manudate'];
		//$manudate = date_format($manudate,"Y-m-d");
		
		$expirydate = $_POST['expirydate'];
		//$expirydate = date_format($expirydate,"Y-m-d");
		
		$subdate = $_POST['subdate'];
		//$subdate = date_format($subdate,"Y-m-d");
		
		$duedate = $_POST['duedate'];
		//$duedate = date_format($duedate,"Y-m-d");
		
		$year = date('Y');
        $customer = $_POST['customer'];
	if(isset($_POST['save'])){
            $dte = date("Y-m-d");
			$sql = "INSERT INTO `sample_submit`(`Officer`, `HeadofLab`, `SampleCode`, `CommonName`, `Quantity`, `Batch`, `Mandate`, `Expirydate`, `Submissiondate`, `DateSubmission`, `UpdatedOn`, `UpdatedBy`, `Year`, `DueDate`, `type`, `CustomerID`, `Office_status`) 
			         VALUES ('$name', '$head', '$code', '$samplename', '$quantity', '$batch', '$manudate', '$expirydate', '$subdate', '$dte', '', '', '$year', '$duedate', '$aina', '$customer', 1)";

			if($conn->query($sql)){
				$_SESSION['success'] = 'Add sample successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	} else if(isset($_POST['dsave'])){
		    $gradient = $_POST['gradient'];
		    $brand = $_POST['brand'];
		    $dte = date("Y-m-d");
			$sql = "INSERT INTO `sample_submit`(`Officer`, `HeadofLab`, `SampleCode`, `CommonName`, `Quantity`, `Batch`, `Mandate`, `Expirydate`, `Submissiondate`, `DateSubmission`, `UpdatedOn`, `UpdatedBy`, `Year`, `DueDate`, `type`,`Office_status`, `Brand`, `Ingredient`, `CustomerID`) 
			         VALUES ('$name', '$head', '$code', '$samplename', '$quantity', '$batch', '$manudate', '$expirydate', '$subdate', '$dte', '', '', '$year', '$duedate', '$aina',1, '$brand', '$gradient', '$customer')";

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