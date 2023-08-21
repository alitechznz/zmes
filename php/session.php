<?php
	if(!isset($_SESSION)) { 
        session_start(); 
   } 
	    include 'connection.php';
		$idget="";
		//$_SESSION['subject'] = 0;
       if(isset($_SESSION['login'])==1){
			  $idget = $_SESSION['admin'];
		} else {
			 header('location: index.php');
		}

		//determine time if reached 10 minutes then enable login option
		$ip = $_SERVER["REMOTE_ADDR"];
		$now = time();
		$ten_minutes = $now + (10 * 60);
		$startDate = date('m-d-Y H:i:s', $now);
		$endDate = date('Y-m-d H:i:s', $ten_minutes);
		$result = mysqli_query($conn, "SELECT * FROM `ip` WHERE `address` LIKE '$ip'");
		while($count = mysqli_fetch_array($result)) {
			 $last_login_time = $count['timestamp'];
			 if($last_login_time < $endDate){
				$_SESSION['block'] = 0;
			 } else {
				$_SESSION['block'] = 0;
			 }
		}
	
		//get user details to recoder user activities
	$sql = "SELECT * FROM userinfo WHERE StaffID = '".$idget."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>