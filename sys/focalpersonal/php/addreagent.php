<?php
include '../includes/session.php';
include '../includes/conn.php';

        $batch = $_POST['batch'];
		$grade = $_POST['grade'];
		$rname = $_POST['rname'];
		$expiry = $_POST['expiry'];
		
		$type=$_POST['type'];
		$SampleId=$_POST['sampleID'];
        //$NameOfProduct=$_POST['samplename'];
        $code=$_POST['code'];
        $name=$_POST['name'];
		
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = '../food.php?id='.$SampleId.'&type='.$type.'&samplename='.$name.'&code='.$code.'&role=""';
	}

	if(isset($_POST['save'])){
		
          	$sql = "INSERT INTO `labreagent`(`Name`, `BatchNo`, `Grade`, `ExpireDate`, `SampleID`) VALUES ('$rname','$batch', '$grade', '$expiry','$code')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Reagent selected successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
	} elseif(isset($_POST['Update'])){
	    
        
		$type=$_POST['type'];
		$SampleId=$_POST['sampleID'];
		
			$sql = "UPDATE `labreagent` SET `Name`='$rname', `BatchNo`='$batch', `Grade`='$grade',`ExpireDate`='$expiry' WHERE SampleID='$code'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'reagent updated successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	}else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);


?>