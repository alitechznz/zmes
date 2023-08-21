<?php
include '../includes/session.php';
include '../includes/conn.php';

        $inhouse = $_POST['inhouse'];
		$manufacture = $_POST['manufacture'];
		
		
    	$positive=$_POST['positive'];
		$negative=$_POST['negative'];
		$blank=$_POST['blank'];
		$air =$_POST['air'];
		$sterility =$_POST['sterility'];
		
		$type=$_POST['type'];
		$name=$_POST['name'];
		$SampleId=$_POST['sampleID'];
		$code=$_POST['code'];
		$gradient = $_POST['gradient'];
		
		
		
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = '../drug.php?id='.$SampleId.'&type='.$type.'&samplename='.$name.'&code='.$code.'&gradient='.$gradient.'&role=""';
	}

	if(isset($_POST['save'])){
		
		
          	$sql = "INSERT INTO `labcontrol` (`SampleID`, `Positive`, `Negative`, `Blank`, `Air`, `Sterility`) 
			         VALUES ('$code', '$positive', '$negative', '$blank', '$air', '$sterility')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Control added successfully';
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