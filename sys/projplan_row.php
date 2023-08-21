<?php 
	include 'includes/session.php';
   
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM project_plan 
                INNER JOIN projecttb ON project_plan.Project = projecttb.ID
                WHERE project_plan.IDp='$id'";
		// $sql ="SELECT * FROM project_kra
        //                         INNER JOIN keyarea ON project_kra.KRA = keyarea.IDNo
        //                         INNER JOIN projecttb ON project_kra.Project = projecttb.ID
        //                         WHERE project_kra.projkraID='$id'";
		$query = $conn->query($sql);
        $row = $query->fetch_assoc();
       
	   echo json_encode($row, true);
	}
?>