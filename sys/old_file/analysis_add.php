<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'Samplelist.php';
	}

	if(isset($_POST['save'])){
		$dateassigned = $_POST['dateassigned'];
		$condition = $_POST['ass_condition'];
		$reasons = $_POST['ass_reasons'];
		$sampleId = $_POST['ass_code'];
		$head = $_POST['ass_head'];
		
            $dte = date("Y-m-d");
			$sql = "INSERT INTO `lab_remark`(`HeadName`, `ReceivingDate`, `ConditionStatus`, `Reasons`, `SampleCode`)
			                     VALUES('$head', '$dateassigned', '$condition', '$reasons', '$sampleId')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Add Analysis successfully';
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