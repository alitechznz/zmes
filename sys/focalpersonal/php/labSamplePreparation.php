<?php
include '../includes/session.php';
include '../includes/conn.php';

        $description = $_POST['editor1'];
	    $type=$_POST['type'];
		$name=$_POST['name'];
		$SampleId=$_POST['sampleID'];
		$code=$_POST['code'];
		$filename ='';
if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = '../food.php?type='.$type.'&samplename='.$name.'&code='.$code.'&role=""&id='.$SampleId.'';
	}

			$photo = $_FILES['photop']['name'];
			if(!empty($photo)){
				move_uploaded_file($_FILES['photop']['tmp_name'], 'ImageSave/'.$photo);
				$filename = $photo;	
			}
		
	
	if(isset($_POST['save'])){
		$dte = date("Y-m-d");
		$user =$user['Fullname'];
		$sql = "INSERT INTO `LabSamplePrepparation` (`LabPreparationId`,`LabPrepSubmitId`,`Description`,`Type`,`SampleID`, `Attachment`, `CreatedBy`, `CreatedOn`) 
			         VALUES ('','$SampleId','$description','$type', '$code', '$filename', '$user', '$dte')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Add sample successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
	} else if(isset($_POST['update'])) {
		$dte = date("Y-m-d");
		$user =$user['Fullname'];
		$sql = "UPDATE `LabSamplePrepparation` SET `Description`='$description', `Attachment`='$filename', `UpdatedBy`='$user', `UpdatedOn`='$dte' WHERE `SampleID`='$code'"; 
			        
			if($conn->query($sql)){
				$_SESSION['success'] = 'Updated sample successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	}else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);


?>