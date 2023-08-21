<?php 
	include 'includes/session.php';
   
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM project_targetgroup 
		        INNER JOIN organizationtb ON project_targetgroup.Institution = organizationtb.ID
		        WHERE targetID ='$id'";
		$query = $conn->query($sql);
        $row = $query->fetch_assoc();
       
		echo json_encode($row, true);
	}
?>