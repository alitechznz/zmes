<?php
include 'connection.php';

 $lvl =$_POST['level'];
 $ltr =$_POST['ltr'];
  $point =$_POST['point'];
 $from =$_POST['from'];
  $to =$_POST['to'];
 $remark =$_POST['remark'];
 //$status = $_POST['status'];
 $sql ="INSERT INTO `gradetable`(`No`,`ClassLevel`,`Grade`,`FromMarks`,`ToMarks`,`Point`,`Remark`) 
		VALUES ('','$lvl','$ltr','$from','$to','$point','$remark')";
  
  	if (mysqli_query($conn, $sql)) {
	               //header("refresh:0.5; url=http://www.zenjitech/ocgs/adminform2.php");
				   header("refresh:1.5; url=../AddGrade.php");
					
				} else {		
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}			

?>