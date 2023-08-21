<?php
include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else {
			$return = 'customer.php';
	}
	
	   
		
	if(isset($_POST['save'])){
		    $name = $_POST['name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$status = $_POST['status'];
		$user = $user['Fullname'];
            $dte = date("Y-m-d");
			$sql = "INSERT INTO `customer`(`Name`, `Address`, `PhoneNo`, `DateRegistered`, `Status`, `CreatedBy`, `CreatedOn`)
			         VALUES ('$name', '$address', '$phone', '$dte', '$status', '$user', '$dte')";

			if($conn->query($sql)){
				$_SESSION['success'] = 'Customer registered successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	} else if(isset($_POST['update'])){
		 $name = $_POST['name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$status = $_POST['status'];
		$id = $_POST['id'];
          //  $dte = date("Y-m-d");
			$sql = "UPDATE `customer` SET `Name`='$name',`Address`='$address',`PhoneNo`='$phone',`Status`='$status' WHERE `CustomerID`='$id'";

			if($conn->query($sql)){
				$_SESSION['success'] = 'Customer updated successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	}	else if(isset($_POST['delete'])){
            $dte = date("Y-m-d");
			$id = $_POST['id'];
			$sql = "DELETE FROM `customer` WHERE `CustomerID`='$id'";

			if($conn->query($sql)){
				$_SESSION['success'] = 'Customer deleted successfully';
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