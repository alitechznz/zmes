<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'reagent_type.php';
	}

	if(isset($_POST['save'])){
		$reagentName = $_POST['reagentName'];
		$description = $_POST['description'];
		$createdBy = $user['Fullname'];
		//$createdOn = $_POST['createdOn'];
		$status = $_POST['status'];
		
		
            $dte = date("Y-m-d");
			$sql = "INSERT INTO `reagentType`(`reagentName`, `createdBy`, `createdOn`, `description`, `statusActive`) 
						VALUES('$reagentName', '$createdBy', '$dte', '$description', '$status')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Reagent Added successfully';
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