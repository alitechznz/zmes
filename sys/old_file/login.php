<?php
	   session_start();
	   include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
						 echo '<script> alert("show 1"); </script>';
		$password = md5($password);
						//	 echo '<script> alert("show2"); </script>';
		$sql = "SELECT * FROM userinfo WHERE Email = '$username' and Password ='$password'";
							// echo '<script> alert("'.$sql.'"); </script>';
		$query = $conn->query($sql);
					 echo '<script> alert("sho4"); </script>';
					 echo '<script> alert("'.$username.'"); </script>';
					echo '<script> alert("'.$password.'"); </script>';
		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the username';
		}
		else {
			$row = $query->fetch_assoc();
			echo '<script> alert("'.$username.'"); </script>';
			echo '<script> alert("'.$password.'"); </script>';
			//if(password_verify($password, $row['password'])){
				$status = $row['Role'];
				echo '<script> alert("'.$status.'"); </script>';
				//var_dump($status);
				 if($status='Head') {
					 
					$_SESSION['admin'] = $row['ID'];
					echo '<script> alert("show"); </script>';
					  header('location:home.php');
					
				 } elseif($status='Reservation') {
					 $_SESSION['Reservation'] = $row['ID'];
					  //header('location:reservation/index.php');
				 } elseif($status='Coordinator') {
					 $_SESSION['Coordinator'] = $row['ID'];
					// header('location:coordinator/index.php');
				 } elseif($status='Management') {
					 $_SESSION['Management'] = $row['ID'];
					// header('location:management/index.php');
				 } elseif($status='Driver') {
					 $_SESSION['Driver'] = $row['ID'];
					//header('location:driver/index.php');
				 } 
				
			//}
			//else{
				//$_SESSION['error'] = 'Incorrect password';
			//}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	//header('location: index.php');

?>