<?php 
$name= $_POST['name'];
 $mdate= $_POST['mdate'];
// $mdate = date_format($mdate, "Y-m-d");
  $status= $_POST['status'];
  
 // username, database, password, service
$conn = mysqli_connect('localhost', 'root', '', 'tools');
   if($conn) {
	   //echo "connection successfully";
   } else {
	   echo "Failured to connect".mysqli_error($conn);
   }
  $query ="INSERT INTO `infor`(`Name`, `Manfucture`, `Status`) VALUES('$name', '$mdate', '$status')";
  $result = mysqli_query($conn, $query);
  if($result) {
	  echo 'Data has been added';
  } else {
	  echo mysqli_error($result);
  }
  
  //query
  
?>