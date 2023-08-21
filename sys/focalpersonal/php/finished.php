<?php
include '../includes/session.php';
include '../includes/conn.php';
       
		//$SampleId=$_POST['sampleID'];
		//$name=$_POST['name'];
		
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = '../index.php';
	}

	if(isset($_GET['Fanalyst'])){
	     	$code=$_GET['code'];
		    $date1 =$_POST['Date'];
          	$sql = "UPDATE `sample_submit` SET `FAnalyst_Status`='1', `FAnalyst_date`='$date1' WHERE `SampleCode`='$code'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Submitted successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
	} 
	
    if(isset($_POST['FChecker'])){
		$code=$_POST['code'];
		$comment=$_POST['comment'];
		$date1 =$_POST['Date'];
		$sql = "UPDATE `sample_submit` SET `FChecker_Status`='1',`FChecker_Comment`='$comment', `FChecker_date`='$date1' WHERE `SampleCode`='$code'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Submitted successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		
	}  
	
	if(isset($_GET['FHead'])){
		$code=$_POST['code'];
		$comment=$_POST['comment'];
		$sql = "UPDATE `sample_submit` SET `FHead_Status`='1',`FHead_Comment`='$comment' WHERE `SampleCode`='$code'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Submitted successfully';
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