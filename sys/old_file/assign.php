<?php
include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else {
        $analyst = $_POST['analyst'];
		$idsample = $_POST['code'];
		$return = "sample_analysis.php?sample=".$idsample;
	}

	if(isset($_POST['save'])){
		$code = $_POST['code'];
		$analyst = $_POST['analyst'];
		$checker = $_POST['checker'];
		
		 date_default_timezone_set('Africa/Nairobi'); // Then call the date functions
		 $date = date('Y-m-d H:i:s');
		 
		//GET THEIR phone numbers
		   $sqlnum = "SELECT * FROM userinfo WHERE Fullname='$analyst'";
		   $result1 = mysqli_query($conn, $sqlnum);
			if($row1= mysqli_fetch_assoc($result1)){
				$analystPN = $row1['PhoneNumber'];
			} 
			
		   $sqlnum2 = "SELECT * FROM userinfo WHERE Fullname='$checker'";
		   $result2 = mysqli_query($conn, $sqlnum2);
			if($row2= mysqli_fetch_assoc($result2)){
				$checkerPN = $row2['PhoneNumber'];
			} 
		    
			//var_dump($checkerPN);
			//var_dump($analystPN);
			
			$sql = "UPDATE sample_submit SET Analyst='$analyst', Checker='$checker', DateAssigned='$date' WHERE SampleCode='$code'";
			if($conn->query($sql)){
				//send sms 
				define ("API", "http://www.bongolive.co.tz/api/broadcastSMS.php");
				$sendername = "ZFDA";
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
							<Content>FROM ZFDA-LIMS, You have been assigned the sample code number:".$code." on ".$date."as Analyst</Content>
							<Receivers>
							   
								<Receiver>".$analystPN."</Receiver>
							</Receivers>
								<Callbackurl> </Callbackurl>
						</Message>
						<Message>
							<Content>FROM ZFDA-LIMS, You have been assigned the sample code number:".$code." on ".$date."as Checker</Content>
							<Receivers>
							    <Receiver>".$checkerPN."</Receiver>
								
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
				
				$_SESSION['success'] = 'Sample assigned successfully';
				
				
				
			
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);


?>