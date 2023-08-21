<?php 
	include 'includes/session.php';
    $ciphering = "AES-128-CTR"; 
    $options = 0; 
    $decryption_iv = '1234567891011121'; 
    $decryption_key = "ZPCME@ali@2020"; 
   
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM priorityarea_goal WHERE priorityarea_goal_id = '$id'";
		$query = $conn->query($sql);
        $row = $query->fetch_assoc();
		echo json_encode($row, true);
	}
?>