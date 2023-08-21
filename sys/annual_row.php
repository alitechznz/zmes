<?php 
	include 'includes/session.php';
   
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM project_annual 
                INNER JOIN projecttb ON project_annual.Project = projecttb.ID
                WHERE project_annual.IDa='$id'";
		
		$query = $conn->query($sql);
        $row = $query->fetch_assoc();
       
	   echo json_encode($row, true);
	}
?>