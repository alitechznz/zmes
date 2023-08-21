<?php
session_start();
include 'includes/conn.php';

if(isset($_POST['login'])){
	$email =$_POST['email'];
	if (empty($_POST["email"])) {
		$_SESSION['error'] = "Email is required";
		header('location:index.php');
	} else {
		$email = $_POST["email"];
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['error'] = "Invalid email format";
		header('location:index.php');
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
			
				$_SESSION['user'] = $row['id'];
				$_SESSION['user_org'] = $row['Organization'];
				$_SESSION['user_role'] = $row['Role'];
			    $_SESSION['page_status'] = TRUE;
				$_SESSION['action'] = "login";
				
				$sql_role = "SELECT * FROM roletb WHERE role_ID = '".$_SESSION['user_role']."'";
                $query_role = mysqli_query($conn, $sql_role); 
                if($user_role = mysqli_fetch_array($query_role)){
                    $_SESSION['Permission'] = $user_role['Permission'];
                }

               
				AuditActivity($_SESSION['page'], $_SESSION['action'], $_SESSION['user']);
				//userActivity();
				if($password == 'e10adc3949ba59abbe56e057f20f883e'){
				    header('location:change_password.php');
				} else {
				    header('location:home.php');
				}
				

		
		} else {
			$_SESSION['error'] = 'Cannot find account with the username';
			header('location:index.php');
		}
		//
} elseif(isset($_POST['forgot'])){
	$_SESSION['error'] = 'Thank you! We have sent the recovery information regarding your account. Please check more details in your email.';
	header('location:forgot.php');
} else{
		$_SESSION['error'] = 'Input admin credentials first';
		header('location:index.php');
}
	mysqli_close($conn);

	//recorded the activity
	function AuditActivity($page, $activity, $user){
		
		include 'includes/conn.php';
		// Get current page URL 
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
		$user_ip_address = $_SERVER['REMOTE_ADDR']; 
		$referrer_url = !empty($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'/'; 
		$user_agent = $_SERVER['HTTP_USER_AGENT']; 

		$page =me_encrypt_data($page);
		$activity =me_encrypt_data($activity);
		$method = me_encrypt_data($protocol);
		$ip_address = $user_ip_address;
		$device = me_encrypt_data($user_agent);

		$user = $user;
		$date = date("Y-m-d");
		$sql ="INSERT INTO `audittb`(`Page`, `Activity`, `method`, `device`, `ip_address`, `CreatedBy`)
				VALUES('$page', '$activity', '$method', '$device', '$ip_address', '$user')";
				mysqli_query($conn, $sql);
		
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