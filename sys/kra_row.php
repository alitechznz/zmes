<?php 
	include 'includes/session.php';
   
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM keyarea 
		         INNER JOIN agendatb ON keyarea.AgendaID=agendatb.ID
		         WHERE keyarea.IDNo = '$id'";
		$query = $conn->query($sql);
        $row = $query->fetch_assoc();
       
		echo json_encode($row, true);
	}
?>