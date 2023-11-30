<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'profile.php';
	}

	if(isset($_POST['image'])){
		$photo = $_FILES['photo']['name'];
		$userid = $_POST['userid'];
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $user['ProfileImage'];
			}

			$sql = "UPDATE userinfo SET ProfileImage = '$filename' WHERE id = '$userid'";
			
			if($conn->query($sql)){
				$_SESSION['success'] = 'Admin profile updated successfully';
				$return = 'logout.php';
			} else {
			 	echo   $_SESSION['error'] = $conn->error;
				 $return = 'logout.php';
			}	

			header('location:'.$return);
	} else if(isset($_POST['setting'])) {
		$curr_password = $_POST['curr_password'];
		$username = $_POST['email'];
		$password = $_POST['password'];
	    $userid = $_POST['userid'];
		
		// Generate a unique verification code (you can use a library to generate secure tokens)
		$verificationCode = bin2hex(random_bytes(16));

		// Store the verification code in your database along with user details
		// Send a verification email to the user
		$subject = 'Verify Your Email';
		$message = "Click the following link to verify your email: http://zmes.planningznz.go.tz/sys/verify.php?code=$verificationCode";
		$headers = 'From: engineerbably@gmail.com';
		$email = $username;
		
		mail($email, $subject, $message, $headers);
		//if(password_verify($password, $user['password'])){

            $password = md5($curr_password);
			$sql = "UPDATE userinfo SET Email = '$username', Password = '$password' WHERE id ='$userid'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Admin profile updated successfully';
				$return = 'logout.php';
			}
			else{
			 echo   $_SESSION['error'] = $conn->error;
			}
			
		//}
		//else{
			//$_SESSION['error'] = 'Incorrect password';
		//}
	} else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);

?>