<?php
$from1 = $_GET['from'];
$to = $_GET['to'];

include ('includes/conn.php');

	$datefrom1 = date_create($from1);
    $df = date_format($datefrom1,"Y-m-d");
	
	$dateto=date_create($to);
	$dt1 = date_format($dateto,"Y-m-d");
   
$sql="SELECT * FROM sample_submit WHERE DateSubmission BETWEEN '$df' AND '$dt1'";
echo '<input type="hidden" value="'.$sql.'"/>';
//var_dump($sql);
$result = mysqli_query($conn, $sql);
if (!$result) {
        echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
        exit;
    } else {
		echo " 
             <thead>
                  <th>SampleCode</th>
                  <th>Sample Name</th>
				  <th>Type</th>
				  <th>Action</th>
                </thead>
               <tbody>";
                  while($row = mysqli_fetch_assoc($result)) {
                     // echo "tsssssssssssssssss";
                            $SID = $row['SampleCode'];
					    	$sql1 = "SELECT * FROM `lab_remark` WHERE `SampleCode` ='$SID'";
                            $query1 = $conn->query($sql1);
                            if($row1 = $query1->fetch_assoc()) {
                                $rdate = $row1['ReceivingDate'];
                                $Lstatus = $row1['ConditionStatus'];
                            }
			echo 
				'<tr>
					<td>'.$row['SampleCode'].'</td>
                          <td>'.$row['CommonName'].'</td>
                           <td>'.$row['type'].'</td>
                           <td>
                            <a href="submitform.php?code='.$row['SampleCode'].'" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i> Submission</a>&emsp;';
						    if($row['type'] =='Food'){
								echo '<a href="foodlabsheet.php?code='.$row['SampleCode'].'" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i> Lab Sheet</a>&emsp;';
							} else {
								echo '<a href="druglabsheet.php?code='. $row['SampleCode'].'" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i> Lab Sheet</a>&emsp;';
							}
							
                           echo '<a href="certificate.php?code='.$row['SampleCode'].'" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i> Certificate</a>&emsp;
							<a href="requestform.php?code='.$row['SampleCode'].'" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i> Request Form</a>
							
                          </td>';
							 
			echo	"</tr>";
			
			 }
													
		echo	"</tbody>";
	}
//mysqli_close($conn);
?>
