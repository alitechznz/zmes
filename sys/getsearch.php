<?php
$from1 = $_GET['from'];
$to = $_GET['to'];

include ('includes/conn.php');

//$conn=mysqli_connect('localhost', 'root', '', 'zfda_lims');
	
	$datefrom1 = date_create($from1);
    $df = date_format($datefrom1,"Y-m-d");

	$dateto=date_create($to);
	$dt1 = date_format($dateto,"Y-m-d");
   $num =1;

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
				   <th>S/N</th>
				  <th>SampleCode</th>
                  <th>Sample Name</th>
                  <th>Date Received</th>
                  <th>Due Date</th>
				  <th>Type</th>
				  <th>Status</th>
                </tr>
                </thead>
               <tbody>";
			     
                  while($row = mysqli_fetch_assoc($result)) {
                    
                            $SID = $row['SampleCode'];
					    	$sql1 = "SELECT * FROM `lab_remark` WHERE `SampleCode` ='$SID'";
                            $query1 = $conn->query($sql1);
                            if($row1 = $query1->fetch_assoc()) {
                                $rdate = $row1['ReceivingDate'];
                                $Lstatus = $row1['ConditionStatus'];
                            }
			echo 
				"<tr> <td>".$num."</td>
				          <td>".$row['SampleCode']."</td>
						  <td>".$row['CommonName']."</td>
						  <td>".$row['Submissiondate']."</td>
						  <td>".$row['Submissiondate']."</td>
						  <td>".$row['type']."</td>";
						
					 $status = $row['Head_Status'];
					  if($status == 0) {
						  echo '<td><span class="label label-primary">New</span></td>';
				
					  } else {
					      $scode = $row['SampleCode'];
					      
					      $sql="SELECT * FROM lab_remark WHERE SampleCode ='$scode'";
					      $result1 = mysqli_query($conn, $sql);
					      if($row1=mysqli_fetch_array($result1)){
					          $sttus = $row1['ConditionStatus'];
					          if($sttus=="Accept") {
					               $status = "Accepted";
					          } else {
					               $status = "Rejected";
					          }
					           echo '<td><span class="label label-success">'.$status.'</span></td>';
					      }  else {
					          echo '<td><span class="label label-success">Unassigned</span></td>';
					      }
					  }
					$num +=1;	  
    
					      
			echo	"</tr>";
			
			 }
													
		echo	"</tbody>";
	}


?>
<script>
  $(function () {
  
	$('#example3').DataTable({
      responsive: true
    });
   
</script>