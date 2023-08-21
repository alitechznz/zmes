<?php 
	include 'includes/session.php';
   
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM outcometype 
		        INNER JOIN keyarea ON keyarea.IDNo = outcometype.KeyArea_ID 
		        WHERE outcometype.ID = '$id'";
		$query = $conn->query($sql);
        $row = $query->fetch_assoc();
       
		echo json_encode($row, true);
	}
?>