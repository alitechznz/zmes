<?php
//.... replace <api_key> and <secrete_key> with the valid keys obtained from the platform, under profile>authentication information
$api_key='e332ac7f-b9e7-11ea-bfe8-06cba1bf0ce7';
$secret_key = 'smszfda';
// The data to send to the API
$postData = array(
    'source_addr' => 'ZFDA',
    'encoding'=>0,
    'schedule_time' => '',
    'message' => 'Hello World',
    'recipients' => [array('recipient_id' => '1','dest_addr'=>'255776291900'),array('recipient_id' => '2','dest_addr'=>'255778376700')]
);
//.... Api url
$Url ='https://apisms.bongolive.africa/v1/send';

// Setup cURL
$ch = curl_init($Url);
error_reporting(E_ALL);
ini_set('display_errors', 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData)
));

// Send the request
$response = curl_exec($ch);

// Check for errors
if($response === FALSE){
        echo $response;

    die(curl_error($ch));
}
var_dump($response);
 ?>