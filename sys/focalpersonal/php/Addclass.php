<?php
include 'connection.php';

 $level =$_POST['level'];
 $class =$_POST['class'];
 $cabr =$_POST['abbr'];
 $status = $_POST['status'];
 $sql ="INSERT INTO `classtable`(`classID`,`levelname`,`Classname`,`classrep`,`status`) VALUES ('','$level','$class','$cabr','$status')";
  
  	if (mysqli_query($conn, $sql)) {
	               //header("refresh:0.5; url=http://www.zenjitech/ocgs/adminform2.php");
				   header("refresh:0.5; url=../Addclass.php");
					
				} else {		
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}			

?>