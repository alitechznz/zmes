<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$edit_name = $_POST['edit_name'];
		$edit_comment = $_POST['edit_comment'];
	
		$sql = "UPDATE productSpecification SET Product  = '$edit_name', Comment = '$edit_comment' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Product updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select product to edit first';
	}

	header('location: add_product.php');
?>