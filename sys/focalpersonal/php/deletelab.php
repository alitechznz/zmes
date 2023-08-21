<?php
include '../includes/session.php';
include '../includes/conn.php';
        
		$site = $_GET['site'];
		$id=$_GET['id'];
    	$type=$_GET['type'];
		$SampleId=$_GET['sampid'];
	    $code=$_GET['code'];
	    $name=$_GET['name'];
		
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = '../food.php?id='.$SampleId.'&type='.$type.'&samplename='.$name.'&code='.$code.'&role=""';
	}

	if($site =="dlabmethod") {
          	$sql = "DELETE FROM `labtestmethod` WHERE LabTestId = $id";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Method deleted successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
	} else if($site == 'dlabequipment'){
		$sql = "DELETE FROM `labequipment` WHERE LabEquipementId = $id";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Equipment deleted successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	}  else if($site == 'dlabremark'){
		$sql = "DELETE FROM `labremark` WHERE labRemarkId = $id";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Remark deleted successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	} else if($site =='dlabresult'){
		$sql = "DELETE FROM `labresult` WHERE labResultId = $id";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Result deleted successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	} else if($site =='dlabreagent'){
		$sql = "DELETE FROM `labreagent` WHERE LabReagentId = $id";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Reagent deleted successfully';
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



