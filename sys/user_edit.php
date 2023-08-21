<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$firstname = $_POST['fullname'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$position = $_POST['position'];
		
		$sql = "UPDATE userinfo SET Fullname = '$firstname', Address = '$address', PhoneNumber = '$contact', Role = '$position' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'User updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select user to edit first';
	}

	header('location: user.php');
?>