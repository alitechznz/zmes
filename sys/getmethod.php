<?php
$from1 = $_GET['from'];
$to = $_GET['to'];

//include ('includes/conn.php');
//echo $from1;
//echo $to;
$conn=mysqli_connect('localhost', 'root', '', 'zfda_lims');
	//$from1 = date("m-d-Y", strtotime(str_replace("/", "-", $from1)));     //func_date_conversion("d/m/Y","Y-m-d",$pre_dateofbirth);
	$datefrom1 = date_create($from1);
    $df = date_format($datefrom1,"Y-m-d");
	
	//$to = date("Y-m-d", strtotime(str_replace("/", "-", $to)));//func_date_conversion("d/m/Y","Y-m-d",$pre_dateofbirth);
	$dateto=date_create($to);
	$dt1 = date_format($dateto,"Y-m-d");
   
/*
$df = str_replace('/', '-', $from);
$dt1 = str_replace('/', '-', $to);
//echo '<br />'.$df;
//echo $dt1;
$from1 = date("Y-d-m", strtotime($df));

$to1 = date("Y-d-m", strtotime($dt1));

//echo '<br />'.$from1;
//echo $to1;
*/
$type ="Food";
$sql="SELECT * FROM sample_submit WHERE type='$type' AND DateSubmission BETWEEN '$df' AND '$dt1'";
echo '<input type="hidden" value="'.$sql.'"/>';
//var_dump($sql);
$result = mysqli_query($conn, $sql);
if (!$result) {
        echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
        exit;
    } else {
		echo " 
          <thead>
                <tr>
				  <th>Sample Code</th>
                  <th>Sample Name</th>
				  <th>Submitted By</th>
				  <th>Date Submitted</th>
                  <th>Assigned To</th>
                  <th>Date Remarked</th>
                  <th>Status</th>
				  <th>Print</th>
                </tr>
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
				"<tr>
					<td>".$row['SampleCode']."</td>
                          <td>".$row['CommonName']."</td>
                          <td>".$row['Officer']."</td>
                          <td>".$row['Submissiondate']."</td>
                          <td>".$row['HeadofLab']."</td>
						  <td>".$rdate."</td>";
    
					    if($Lstatus =="Accept") {
								  echo '<td><span class="label label-success">Accepted</span></td>';
								  echo  '<td>
								            <a href="submission_report.php?sample='.$row['SampleCode'].'" class="btn btn-primary btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Print</a></span>
							             </td>';
							 } else if($Lstatus =="Reject") {
								  echo '<td><span class="label label-danger">Rejected</span></td>';
								  '<td>
								            <a href="submission_report.php?sample='.$row['SampleCode'].'" class="btn btn-primary btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Print</a></span>
							             </td>';
							 } else {
						          echo '<td><span class="label label-primary">Processing</span></td>';
						          '<td>
								            <a href="submission_report.php" class="btn btn-primary btn-sm btn-flat" disabled><span class="glyphicon glyphicon-print"></span> Print</a></span>
							             </td>';
							 }
				
							 
			echo	"</tr>";
			
			 }
													
		echo	"</tbody>";
	}
//mysqli_close($conn);
?>
