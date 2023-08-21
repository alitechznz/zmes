<?php
	include 'includes/session.php';
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'add_product.php';
	}

	if(isset($_POST['save'])){
		$product = $_POST['method'];
		$comment = $_POST['comment'];
		$status = $_POST['status'];
			$createdby = $user['Fullname'];
			
            $dte = date("Y-m-d");
			$sql = "INSERT INTO `productSpecification`(`Product`, `Comment`, `CreatedOn`, `UpdatedBy`, `Status`) 
			        VALUES('$product', '$comment', '$dte', '$createdby', '$status')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Add product successfully';
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