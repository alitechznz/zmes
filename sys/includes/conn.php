<?php
	// $conn = new mysqli('localhost', 'planning_zmes', '', 'root');
	$conn = new mysqli('localhost', 'root', '', 'planning_zmes');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} else {
	    //echo "success";
	}
	
?>