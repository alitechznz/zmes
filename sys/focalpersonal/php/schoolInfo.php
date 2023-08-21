<?php
include 'connection.php';

//if(isset($_POST['add'])) {
// $dete = date("F j, Y, g:i a");	
 $fileExistsFlag = 0; 
 $fileName = $_FILES['logo']['name'];
 //$fileName = $dete."".$fileNm;
 $query = "SELECT * FROM `schoolinfo` WHERE Schoollogo='$fileName'"; 
 $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
 while($row = mysqli_fetch_array($result)) {
 if($row['Schoollogo'] == $fileName) {
 $fileExistsFlag = 1;
 } 
 }
 
 if($fileExistsFlag == 0) { 
 $target = "ImageSave/"; 
 $fileTarget = $target.$fileName; 
 $tempFileName = $_FILES["logo"]["tmp_name"];
 $result = move_uploaded_file($tempFileName,$fileTarget);
 //echo $fileTarget;
 }
 
 $name =$_POST['name'];
 $address = $_POST['address'];
 $phone = $_POST['phone'];
 $pobox = $_POST['pobox'];
 $slogan = $_POST['slogan'];
 $status = $_POST['status'];
// $status = $_POST['status'];
 //$comment = $_POST['comment'];
 
 ///$filecov = addslashes(file_get_contents($_FILES['logo']['tmp_name']));

 //if(move_uploaded_file($file_loc,$folder.$final_file)){
 $sql ="INSERT INTO `schoolinfo`(`SchoolName`, `Address`, `PhoneNo`, `Slogan`, `POBox`, `Schoollogo`) VALUES ('$name','$address','$phone','$slogan','$pobox','$fileName')";
  
  	if (mysqli_query($conn, $sql)) {
	               //header("refresh:0.5; url=http://www.zenjitech/ocgs/adminform2.php");
				   header("refresh:0.5; url=../SchoolInfo.php");
					
				} else {		
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}			

?>