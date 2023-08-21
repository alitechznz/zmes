<?php 
	include 'includes/session.php';
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM themetb WHERE theme_id = '$id'";
		$query = $conn->query($sql);
        $row = $query->fetch_assoc();
       
		echo json_encode($row, true);
	}
?>