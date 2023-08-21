<?php 
	include 'includes/conn.php';
   
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sqlwm = "SELECT * FROM `project_financing` WHERE `financing_ID`='$id'";
		
		$querywm = $conn->query($sqlwm);
        $row = $querywm->fetch_assoc();
		echo json_encode($row, true);
	}
?>