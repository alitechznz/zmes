<?php 
	include 'includes/session.php';
   
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM kpi_baseline WHERE kpi_baseline_id ='$id'";
		$query = $conn->query($sql);
        $row = $query->fetch_assoc();
       
		echo json_encode($row, true);
	}
?>