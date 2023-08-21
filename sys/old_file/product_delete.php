<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM productSpecification WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Product deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select product to delete first';
	}

	header('location: add_product.php');
	
?>