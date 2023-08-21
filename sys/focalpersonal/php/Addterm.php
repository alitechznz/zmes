<?php
include 'connection.php';

 $lvl =$_POST['level'];
 $name =$_POST['name'];
 $status = $_POST['status'];
 $sql ="INSERT INTO `termtb`(`termId`,`levelname`,`termname`, `Status`) VALUES ('','$lvl','$name','$status')";
  
  	if (mysqli_query($conn, $sql)) {
	               //header("refresh:0.5; url=http://www.zenjitech/ocgs/adminform2.php");
				   header("refresh:0.5; url=../AddLevel.php");
					
				} else {		
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}			

?>