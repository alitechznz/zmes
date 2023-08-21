<?php
include 'connection.php';


 $name =$_POST['name'];
 $status = $_POST['status'];
 $sql ="INSERT INTO `leveltable`(`levelname`, `status`) VALUES ('$name','$status')";
  
  	if (mysqli_query($conn, $sql)) {
	               //header("refresh:0.5; url=http://www.zenjitech/ocgs/adminform2.php");
				   header("refresh:0.5; url=../AddLevel.php");
					
				} else {		
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}			

?>