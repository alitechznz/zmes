<?php
	include 'includes/session.php';
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'add_method.php';
	}

	if(isset($_POST['save'])){
		$method = $_POST['method'];
		$comment = $_POST['comment'];
		$status = $_POST['status'];
			$createdby = $user['Fullname'];
			
            $dte = date("Y-m-d");
			$sql = "INSERT INTO `lab_method`(`Method`, `Specification`, `CreatedOn`, `CreatedBy`, `Status`) 
			        VALUES('$method', '$comment', '$dte', '$createdby', '$status')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Add method successfully';
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