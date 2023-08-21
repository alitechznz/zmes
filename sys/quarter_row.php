<?php 
	include 'includes/session.php';
   
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM project_quarter 
                INNER JOIN projecttb ON project_quarter.Project = projecttb.ID
                WHERE project_quarter.IDq='$id'";
		
		$query = $conn->query($sql);
        $row = $query->fetch_assoc();
       
	   echo json_encode($row, true);
	}
?>