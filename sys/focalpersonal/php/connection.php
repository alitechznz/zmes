<?php
	$conn = new mysqli('localhost', 'root', '', 'zfda_lims');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>