<?php
 include 'includes/session.php';
$from1 = $_GET['from'];
$to = $_GET['to'];

include ('includes/conn.php');

	$datefrom1 = date_create($from1);
    $df = date_format($datefrom1,"Y-m-d");
	
	
	$dateto=date_create($to);
	$dt1 = date_format($dateto,"Y-m-d");
   
 $getname =$user['Fullname'];
				  $checker ="";
$sql="SELECT * FROM `sample_submit` WHERE Analyst='$getname' OR Checker='$getname' AND DateSubmission BETWEEN '$df' AND '$dt1'";
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
                  <th>Sample Name</th>
                  <th>Sample Code</th>
				   <th>Type</th>
				   <th>Role</th>
				  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>";
			  $num = 1;
						while($row = mysqli_fetch_array($result)) {	
						  $checkerst =$row['FAnalyst_Status'];
				
               echo '<tr>';
                  echo '<td>'.$num.'</td>';
                  echo '<td>'.$row['CommonName'].'</td>';
                  echo '<td>'.$row['SampleCode'].'</td>';
				  echo '<td>'.$row['type'].'</td>';
				  
				   $analyst =$row['Analyst'];
				   $checker =$row['Checker'];
				   
				   if($getname == $analyst) {
				       echo '<td>Analyst</td>';
				   } else {
				       echo '<td>Checker</td>';
				   }
				  
				  $fstatus =$row['FinishedStatus'];
				  if($fstatus =="0" or $row['FAnalyst_Status'] =="0") {
				       echo '<td><span class="label label-primary">Ongoing</span></td>';
				  } else {
					  if($row['FAnalyst_Status'] =='1' and $row['FChecker_Status'] =='0' and $row['FHead_Status'] =='0') {
				           echo '<td><span class="label label-success">Analyst Finished</span></td>';
					  } else if($row['FChecker_Status'] =='1' and $row['FAnalyst_Status'] =='1' and $row['FHead_Status'] =='0') {
						   echo '<td><span class="label label-success">Checker Finished</span></td>';
					  } else if($row['FHead_Status'] =='1' and $row['FChecker_Status'] =='1' and $row['FAnalyst_Status'] =='1') {
						   echo '<td><span class="label label-success">Head Finished</span></td>';
					  }
				  }
				 
				 if($getname == $analyst) {
				      
					       echo "<td>";
							if($row['type'] =='Food'){
								echo "<a href='../foodlabsheet.php?code=".$row['SampleCode']."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Lab Sheet</a>";
							} else {
								echo "<a href='../druglabsheet.php?code=". $row['SampleCode']."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Lab Sheet</a>";
							}
						echo "
                            <a href='../certificate.php?code=". $row['SampleCode']."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Certificate</a>
							<a href='../requestform.php?code=". $row['SampleCode']."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Request Form</a>
							
                          </td>";
				   } else {
				      
					   echo "<td>";
							if($row['type'] =='Food'){
								echo "<a href='../foodlabsheet.php?code=".$row['SampleCode']."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Lab Sheet</a>";
							} else {
								echo "<a href='../druglabsheet.php?code=". $row['SampleCode']."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Lab Sheet</a>";
							}
						echo "</td>";
				   }
                  
				 
                echo '</tr>';
				$num = $num + 1;
               		}								
													
		echo	"</tbody>";
	}
//mysqli_close($conn);
?>
