<?php
include '../includes/session.php';
include '../includes/conn.php';
$remarks = $_POST['Remarks'];
		$analysedBy = $_POST['analysedBy'];
		$date=$_POST['Date'];
    	$type=$_POST['type'];
		$SampleId=$_POST['sampleID'];
			$code=$_POST['code'];
			$name=$_POST['name'];
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = '../food.php?id='.$SampleId.'&type='.$type.'&samplename='.$name.'&code='.$code.'&role=""';
	}

	if(isset($_POST['save'])){
		
		
          	$sql = "INSERT INTO `labRemark` (`labRemarkId`,`labRemarkSubmtId`,`remarks`,`analysedBy`,`date`, `Type`, `SampleID`) 
			         VALUES ('','$SampleId','$remarks', '$analysedBy','$date', '$type', '$code')";
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