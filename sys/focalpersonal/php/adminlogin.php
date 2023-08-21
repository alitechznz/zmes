<?php
include('connection.php');
if ($_SERVER['REQUEST_METHOD'] ='POST') {   
   
		//php variable name to hold the html input data inorder to process further.
		$Usrname =mysqli_real_escape_string($conn, $_POST['username1']);
		$passwd1 =mysqli_real_escape_string($conn, $_POST['password']);

             					
   		$sql = "SELECT * FROM `ocgs_admin` WHERE `Username`='$Usrname' or 1=1 AND `Password`='$passwd1'";
		$result = mysqli_query($conn, $sql);
		
			if (mysqli_num_rows($result) > 0) {
			 // correctly username and  password is here
			 
			        header("refresh:1; url=../adminpanel.php");
					$message ='Login is successfully';
   					echo "<SCRIPT type='text/javascript'> //not showing me this
       						alert('$message'); 
   						</SCRIPT>";
   						
			         // end of check if the email is activated
			           		
   			 } else {
   			    header("refresh:1; url=../admin.php");
         			$message ='Error! username or password is not correct';
         				echo "<SCRIPT type='text/javascript'> //not showing me this
       						alert('$message'); 
   						</SCRIPT>";	
   						
   						mysqli_close($conn);
			} // end of login user info
	} // end of post method

?> 