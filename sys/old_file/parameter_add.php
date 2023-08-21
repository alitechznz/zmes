<?php
include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
	    	$code = $_POST['sampleCode'];
	    	$ccd =$code;
		   $return = "sample_analysis.php?sample=$ccd";
	}

	if(isset($_POST['add'])){
		$code = $_POST['sampleCode'];
		$parameter = $_POST['parameter'];
		$user1 = $user['Fullname'];
		
            $dte = date("Y-m-d");
			$sql = "INSERT INTO `lab_testsrequested`(`SampleID`, `Tests`, `CreatedBy`,`CreatedOn`) 
			         VALUES ('$code', '$parameter', '$user1', '$dte')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Parameter added successfully';
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