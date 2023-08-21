<?php
include 'includes/session.php';
include 'includes/conn.php';
       
		$SampleId=$_POST['sampleID'];
		$name=$_POST['name'];
		$code=$_POST['code'];
		$customer=$_POST['customer'];
		
	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'home.php';
	}
	
        $date1 =$_POST['Date'];
        $command=$_POST['command'];
		$comment=$_POST['comment'];
		$sql = "UPDATE `sample_submit` SET `FHead_Status`='1',`FHead_Comment`='$command', `FHead_Command`='$comment', `FHead_date`='$date1' WHERE `SampleCode`='$code'";
			if($conn->query($sql)){
				
				if($command=="Fail" || $command=="Pass") {
					//read phone number of the user
					 $sql = "SELECT * FROM `customer` WHERE CustomerID ='$customer'";
					 $result = mysqli_query($conn, $sql);
					if($row=mysqli_fetch_array($result)) {
						$user = $row['PhoneNo'];
					}
					
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
							<Content>FROM ZFDA, The result is ready for Sample (".$name."-".$code.").Thank you.</Content>
							<Receivers>
								<Receiver>".$user."</Receiver>
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
				}
 
				$_SESSION['success'] = 'Submitted successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	   
	      header('location:'.$return);


?>