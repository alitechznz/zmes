<?php
	$conn = new mysqli('localhost', 'root', 'zfdaserver_19', 'alitechc_zfda');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>