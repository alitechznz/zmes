<?php
	//session_start();
	 if(!isset($_SESSION)) { 
        session_start(); 
    } 
	include 'conn.php';
		 
       if(isset($_SESSION['admin'])){
			  $idget = $_SESSION['admin'];
		} else if(isset($_SESSION['office'])){
			   $idget = $_SESSION['office'];
		} else {
			   header('location: index.php');
		}

	
	$sql = "SELECT * FROM userinfo WHERE ID = '".$idget."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>