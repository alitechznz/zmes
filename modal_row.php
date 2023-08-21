<?php 
	include 'php/session.php';
    include 'php/conn.php';
    
    if(isset($_POST['id'])) {
      // if(isset($_POST['agenda'])){
            $id = $_POST['id'];
            $sql = "SELECT * FROM agendatb WHERE ID = '$id'";
            $query = $conn->query($sql);
            $row = $query->fetch_assoc();
            echo json_encode($row);
       /* }
        elseif(isset($_POST['editindicator']) || isset($_POST['deleteindicator'])){

        } */
    }
?>