<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$empid = $_POST['id'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$filename);	
		}
		
		$sql = "UPDATE userinfo SET ProfileImage = '$filename' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'User photo updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select user to update photo first';
	}

	header('location: user.php');
?>