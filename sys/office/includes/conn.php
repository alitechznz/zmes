<?php
	$conn = new mysqli('localhost', 'root', '', 'alitechc_zfda');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>