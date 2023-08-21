<?php
session_start();
include 'conn.php';

if(isset($_POST['login'])){
$username =$_POST['username'];
 if (empty($_POST["username"])) {
    $_SESSION['error'] = "Email is required";
	header('location:../index.php');
  } else {
    $email = $_POST["username"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error'] = "Invalid email format";
	  header('location:../index.php');
    }
  }
  
$password=$_POST['password'];
$password = htmlspecialchars($password);
$password = md5($password);

$login="SELECT * FROM userinfo WHERE Email='$email' AND Password='$password'";
$result_login=mysqli_query($conn, $login); 
 
	//if (@mysqli_num_rows($result_login)==1){
		//$_SESSION=mysqli_fetch_array($result_login,MYSQLI_ASSOC);
		if($row = mysqli_fetch_array($result_login)) {
			$post = $row['Role'];
			$img = $row['ProfileImage'];
			
			if($post == 'Admin') {
				$_SESSION['user'] = $row['id'];
				$_SESSION['page'] ="login";
				$_SESSION['action'] = "login";
				AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
				header('location:../home.php');
			} else if($post == 'Focal Personal') {
				$_SESSION['user'] = $row['id'];
				$_SESSION['page'] ="login";
				$_SESSION['action'] = "login";
				AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
				header('location:../focalhome.php');
			} else if($post == 'Director') {
				$_SESSION['user'] = $row['id'];
				$_SESSION['page'] ="login";
				$_SESSION['action'] = "login";
				AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
				header('location:../approvalhome.php');
			}  else if($post == 'ME Officer') {
				$_SESSION['user'] = $row['id'];
				$_SESSION['page'] ="login";
				$_SESSION['action'] = "login";
				AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
				header('location:../mestaff.php');
			} 
			
		} else {
			$_SESSION['error'] = 'Cannot find account with the username';
			header('location:../login.php');
		}
		//
	}else{
		$_SESSION['error'] = 'Input admin credentials first';
		header('location:login.php');
	}
	mysqli_close($conn);

	//recorded the activity
	function AuditActivity($page, $activity, $user){
		
		include 'conn.php';
		$page =me_encrypt_data($page);
		$activity =me_encrypt_data($activity);
		$user = $user;
		$date = date("Y-m-d");
		$sql ="INSERT INTO `audittb`(`Page`, `Activity`, `CreatedBy`, `CreatedOn`)
				VALUES('$page', '$activity', '$user', '$date')";
				mysqli_query($conn, $sql);
		// $result = mysqli_query($conn, $sql);
		 /*
		if($result){
			//echo 'Data deleted successfully';
		} else {
			//echo 'Data is not deleted!'. mysqli_error($conn);
		}
		  //var_dump($sql);
		  exit;
		  */
	 }
		

	 function me_encrypt_data($data_x){
        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encryption_iv = '1234567891011121'; 
        $encryption_key = "ZPCME@ali@2020"; 
        $encryption = openssl_encrypt($data_x, $ciphering, 
                    $encryption_key, $options, $encryption_iv); 
        return $encryption;
 }

	 
?>

