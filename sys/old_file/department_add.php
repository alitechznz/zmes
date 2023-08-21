<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'department.php';
	}

	if(isset($_POST['save'])){
		$name = $_POST['name'];
		$leader = $_POST['leader'];
		$address = $_POST['address'];
		
            $dte = date("Y-m-d");
			$sql = "INSERT INTO `department`(`Name`, `Leader`, `Description`, `Status`, `CreatedOn`) 
						VALUES('$name', '$leader', '$address', '1', '$dte')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Add Department successfully';
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