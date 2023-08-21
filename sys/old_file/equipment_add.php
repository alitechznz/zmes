<?php
	include 'includes/session.php';
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'add_equipment.php';
	}

	if(isset($_POST['save'])){
		$name = $_POST['name'];
		$codenumber = $_POST['codenumber'];
		$calibration = $_POST['calibration'];
		$status = $_POST['status'];
			$createdby = $user['Fullname'];
			
            $dte = date("Y-m-d");
			$sql = "INSERT INTO `Equipment`(`Name`, `CodeNumber`, `CalibrationStatus`, `CreatedBy`, `CreatedOn`) 
			         VALUES('$name', '$codenumber', '$calibration', '$createdby', '$dte')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Add equipment successfully';
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