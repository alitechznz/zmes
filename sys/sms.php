<?php 

			//send sms 
				define ("API", "http://www.bongolive.co.tz/api/broadcastSMS.php");
				$sendername = "ZFDA";
				 $username = "ZFDA";
				 $password = "sms@zfda";
				$apikey = "e332ac7f-b9e7-11ea-bfe8-06cba1bf0ce7";
				$messageXML = "<Broadcast>
					<Authentication>
						<Sendername>".$sendername."</Sendername>
						<Username>".$username."</Username>
						<Password>".$password."</Password>
						<Apikey>".$apikey."</Apikey>
					</Authentication>
						<Message>
							<Content>FROM ZFDA, The result is ready for Sample.Thank you.</Content>
							<Receivers>
								<Receiver>255776291900</Receiver>
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
 ?>