<?php
include 'connection.php';

if (!isset($_FILES['image']['tmp_name'])) {
							echo "";
							}else{
							$file=$_FILES['image']['tmp_name'];
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];

							if ($error > 0){
										die("Error uploading file! Code $error.");
									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										
									else
										{

									move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/" . $_FILES["image"]["name"]);			
									$location=$_FILES["image"]["name"];
									
									



 $id =$_POST['id'];
 $name =$_POST['name'];
 $dob =$_POST['dob'];
 $gender =$_POST['gender'];
 $rel =$_POST['rel'];
 $dor =$_POST['dor'];
 $pob =$_POST['pob'];
 $nt =$_POST['ntlty'];
 $wk =$_POST['work'];
 $mbn =$_POST['mbn'];
 $emn =$_POST['emn'];
 $email =$_POST['email'];
 $pl =$_POST['pl'];
 $ol =$_POST['ol'];
 $pd =$_POST['pd'];
 $state =$_POST['state'];
 $address =$_POST['address'];
 //$image =$_POST['image'];
 $status = $_POST['status'];
 $sql ="INSERT INTO `stafftable`(`staffid`, `name`, `dateofbirth`, `gender`, `religion`, `dateofregistration`, `placeofbirth`, `nationality`,`workarea`, `mobilenumber`, `emergancenumber`, `email`,
		`primarylanguage`, `otherlanguage`, `physicaldisability`, `state`, `address`, `image`, `status`)
 VALUES ('$id','$name','$dob','$gender','$rel','$dor','$pob','$nt','$workarea','$mbn','$emn','email','$pl','$ol',
		'$pd','$state','$address','$location','$status')";
  
  	$result=mysqli_query($conn,$sql);
									}
										header('location:AddStaff.php');
									}
							}
							mysqli_close($conn);	
?>			