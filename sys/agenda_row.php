<?php 
	include 'includes/session.php';
    $ciphering = "AES-128-CTR"; 
    $options = 0; 
    $decryption_iv = '1234567891011121'; 
    $decryption_key = "ZPCME@ali@2020"; 
   
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM agendatb WHERE ID = '$id'";
		$query = $conn->query($sql);
        $row = $query->fetch_assoc();
        /* 
        $name = $decryption=openssl_decrypt($row['Name'], $ciphering, $decryption_key, $options, $decryption_iv);
        $code = $decryption=openssl_decrypt($row['Code'], $ciphering, $decryption_key, $options, $decryption_iv);
        $status = $decryption=openssl_decrypt($row['Status'], $ciphering, $decryption_key, $options, $decryption_iv);
        $explain = $decryption=openssl_decrypt($row['Explaination'], $ciphering, $decryption_key, $options, $decryption_iv);
        $obj ='{
                    "Name": "'.$name.'",
                    "Code": "'.$Code.'",
                    "Status": "'.$status.'",
                    "Explaination": "'.$explain.'",
                    "StartDate":  '.$row['StartDate'].',
                     "EndDate": '.$row['EndDate'].',
                     ID: '.$row['ID'].'
                }';
                */
		echo json_encode($row, true);
	}
?>