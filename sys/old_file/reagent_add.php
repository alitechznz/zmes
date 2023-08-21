<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'add_reagent.php';
	}

	if(isset($_POST['save'])){
		$reagenttype = $_POST['reagenttype'];
		$volume = $_POST['volume'];
		$Vunit = $_POST['Vunit'];
		$batch = $_POST['batch'];
		$createdby = $_POST['createdby'];
		$contamination = $_POST['contamination'];
		$concentration = $_POST['concentration'];
		$Cunit = $_POST['Cunit'];
		$createdon = $_POST['createdon'];
		$expirydate = $_POST['expirydate'];
		$comment = $_POST['comment'];
	
			
            $dte = date("Y-m-d");
			$sql = "INSERT INTO `reagent`(`Type`, `Volume_Qnt`, `Volume_Unit`, `NameBatch`, `Contamination`, `Concentration`, `Cont_Unit`, `ExpeiryDate`, `Comment`, `DateCreated`, `CreatedBy`) 
			        VALUES ('$reagenttype', '$volume', '$Vunit', '$batch', '$contamination', '$concentration', '$Cunit', '$expirydate', '$comment', '$dte', '$createdby')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Reagent added successfully';
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