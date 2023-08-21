<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'user.php';
	}

	if(isset($_POST['save'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$position = $_POST['position'];
		$address = $_POST['address'];
		$employee = $_POST['employee'];
		$date = $_POST['date'];
		$phone = $_POST['phone'];
		$photo = $_FILES['photo']['name'];
		
		//if(password_verify($curr_password, $user['password'])){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $user['photo'];
			}
			
			if($position=='Food' or $position =='Drug' or $position =='Cosmetic') {
				$head ='Office';
			} else {
				$head =$position;
			}

			    $psd = $password;
				$password = md5($password);
			
            $dte = date("Y-m-d");
			$sql = "INSERT INTO `userinfo`(`employeeID`, `Fullname`, `Email`, `Address`, `PhoneNumber`, `Role`, `Password`, `ConfirmPassword`, `CreatedBy`, `CreatedOn`, `IsActive`, `ProfileImage`, `Type`) 
						VALUES('$employee', '$name', '$username', '$address', '$phone', '$head', '$password', '$password', '', '$dte', '1', '$filename', '$position')";
			if($conn->query($sql)){
			    $usnm = $username;
			   
			    
define ("API", "http://www.bongolive.co.tz/api/broadcastSMS.php");
$sendername = "TechnoSoln";
 $username = "technoS";
 $password = "zc1d3o";
 $apikey = "1b6808e5-415c-11e8-a08f-06cba1bf0ce7";

 $messageXML = "<Broadcast>
					<Authentication>
						<Sendername>".$sendername."</Sendername>
						<Username>".$username."</Username>
						<Password>".$password."</Password>
						<Apikey>".$apikey."</Apikey>
					</Authentication>
						<Message>
							<Content>Hi ".$name.", Congratulation! You have been registered to use ZFDA (LIMS) System. Your username: ".$usnm." and temp password:".$psd.".</Content>
							<Receivers>
							    <Receiver>".$phone."</Receiver>
							</Receivers>
								<Callbackurl> </Callbackurl>
						</Message>
				</Broadcast>";

$data = array('messageXML' => $messageXML);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, API);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 4);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 $response = curl_exec($ch);
 
 /*sending the email for notification after registered
 *****************************###############################
 ################*/
 
                                             require 'email/class.phpmailer.php';
                                            
                                            $mail = new PHPMailer;
                                            
                                            $mail->IsSMTP();                                      // Set mailer to use SMTP
                                            $mail->Host = "chui.tanzaniawebhosting.com";                 // Specify main and backup server
                                            $mail->Port = 465;                                    // Set the SMTP port
                                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                            $mail->Username = "zfdalims@alitech.co.tz";  // SMTP username
                                            $mail->Password = "ZFDA123456@"; // SMTP password
                                            $mail->SMTPSecure = "ssl";                            // Enable encryption, 'ssl' also accepted
                                            
                                            $mail->From = "zfdalims@alitech.co.tz";
                                            $mail->FromName = "ZFDA -LIMS";
                                            $mail->AddAddress($usnm, $name);
                                            
                                            $mail->WordWrap = 50;                                 // set word wrap to 50 characters
                                            //$mail->AddAttachment("../email/contract.pdf");         // add attachments
                                            //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
                                            $mail->IsHTML(true);                                  // Set email format to HTML
                                            
                                            $mail->Subject = "Registration Information";
                                            $mail->Body    =" Congratulation! you have been registered with us, You have reserved with the following info:
                                            						------------------------------------------------------
                                            						Name:  '. $name .'
                                            						Registered Date:  '.$dte.'
                                            						Email: '.$usnm.';
                                            						Temp Password: '.$psd.';
                                            						Position: '.$position.';
                                            						------------------------------------------------------
                                            				        Click link http://www.alitech.co.tz/new_zfda/ to change password. 
                                            				        
                                            				 		Please don't cease to contact us if you have any query at
                                            				 		email: zfdalims@alitech.co.tz or direct through the link http://www.zfda.go.tz/LIMS/
                                            				 		"; // our message above including the link
                                                                        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                                                $mail->Send();
 
                                                    //ending of sending email
 	    
				$_SESSION['success'] = 'Add User successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		//}
		//else{
		////	$_SESSION['error'] = 'Incorrect password';
		//}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);

?>