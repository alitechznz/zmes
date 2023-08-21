<?php
$from1 = $_GET['from'];
$to = $_GET['to'];

include ('includes/conn.php');


	
	$datefrom1 = date_create($from1);
    $df = date_format($datefrom1,"Y-m-d");

	$dateto=date_create($to);
	$dt1 = date_format($dateto,"Y-m-d");
   $num =1;
                      $ffn =0;
					  $ffnf =0;
					  $ffnd =0;
					  
					  $ppn =0;
					  $ppnf =0;
					  $ppnd =0;
					  
                     $tnum =0;
					 $tnumf =0;
					 $tnumd =0;
					 
					 $anum =0;
					 $anumf =0;
					 $anumd =0;
					 
					 $rnum =0;
					 $rnumf =0;
					 $rnumd =0;
					 
					 $pnum =0;
					 $pnumf =0;
					 $pnumd =0;
					 
					 $cnum =0;
					 $cnumf =0;
					 $cnumd =0;
					 
					 $onum =0;
					 $onumf =0;
					 $onumd =0;
					 
					 $type="";
					 $code ="";
					 $headremark ="";
                    $sql = "SELECT * FROM `sample_submit` WHERE DateSubmission BETWEEN '$df' AND '$dt1'";
                    $query = $conn->query($sql);
					$num =1;
                    while($row = $query->fetch_assoc()){
                       $tnum  +=1;  
					   
					   $type = $row['type'];
					   $headremark = $row['FHead_Comment'];
					   if($type =='Food'){
						   $tnumf +=1;
					   } else {
						    $tnumd +=1;
					   }
					   
					   //checking fail and passed sample
					   if($headremark=='Pass'){
						  $ppn +=1;
						    if($type =='Food'){
						     $ppnf +=1;
					       } else {
						     $ppnd +=1;
					        }
					   } else {
						     $ffn +=1;
						   if($type =='Food'){
						     $ffnf +=1;
					       } else {
						     $ffnd +=1;
					        }
						  
					   }
					   
					$code = $row['SampleCode'];
					$status ="";
					$sql1 = "SELECT * FROM `lab_remark` WHERE SampleCode='$code' AND ConditionStatus='' AND ReceivingDate BETWEEN '$df' AND '$dt1'";
                    $query1 = $conn->query($sql1);
					$anum =1;
                      if($row1 = $query1->fetch_assoc()){
						  $status = $row1['ConditionStatus'];
 					
					     if($status =='Accept'){
							  $anum  +=1; 
                              if($type =='Food'){
						         $anumf +=1;
					          } else {
						         $anumd +=1;
					          }		
						 } else if($status =='Reject') {
							 $rnum  +=1; 
                             if($type =='Food'){
						        $rnumf +=1;
					         } else {
						        $rnumd +=1;
					         }	 		
						 } else {
							 $pnum  +=1; 
                             if($type =='Food'){
						        $pnumf +=1;
					         } else {
						        $pnumd +=1;
					         }	 		
						 }
                      			   
					 }
					   
					}
					
					$sql = "SELECT * FROM `sample_submit` WHERE FHead_Status='1' AND DateSubmission BETWEEN '$df' AND '$dt1'";
                    $query = $conn->query($sql);
					$num =1;
                    while($row = $query->fetch_assoc()){
                       $cnum  +=1; 
					    $type = $row['type'];
					   if($type =='Food'){
						   $cnumf +=1;
					   } else {
						    $cnumd +=1;
					   }
					}
					
					$sql = "SELECT * FROM `sample_submit` WHERE FHead_Status='0' AND DateSubmission BETWEEN '$df' AND '$dt1'";
                    $query = $conn->query($sql);
					$num =1;
                    while($row = $query->fetch_assoc()){
                       $onum  +=1; 
                         $type = $row['type'];
					   if($type =='Food'){
						   $onumf +=1;
					   } else {
						    $onumd +=1;
					   }					   
					}
					
				
				    
					
		echo " <div class='col-md-12'><h5>TOTAL SUMMARY INFORMATION</h5><table  class='table table-bordered'> 
            <thead>
				  <tr>
				  <th>Total Sample</th>
                  <th># Accepted</th>
                  <th># Rejected </th>
				  <th># Pending </th>
                  <th># Completed</th>
                  <th># Ongoing</th>
				
				  </tr>
                </thead>
                <tbody>";
			echo 
				     "<tr> <td>".$tnum."</td>
				          <td>".$anum."</td>
						  <td>".$rnum."</td>
						  <td>".$pnum."</td>
						  <td>".$cnum."</td>
						  <td>".$onum."</td>
			          </tr>";
								
		echo	"</tbody></table></div>";
		       
        echo     '<div class="col-md-12">
				<h5>FOOD SAMPLE SUMMARY</h5>
				    <table id="example111" class="table table-bordered">
                <thead>
				  <tr>
				  <th>Total Sample</th>
                  <th># Accepted</th>
                  <th># Rejected </th>
				  <th># Pending </th>
                  <th># Completed</th>
                  <th># Ongoing</th>
				
				  </tr>
                </thead>
                <tbody>
                    <tr> <td>'.$tnumf.'</td>
				          <td>'.$anumf.'</td>
						  <td>'.$rnumf.'</td>
						  <td>'.$pnumf.'</td>
						  <td>'.$cnumf.'</td>
						  <td>'.$onumf.'</td>
			          </tr>
                </tbody>
              </table>
				
				</div>
             
			<div class="col-md-12">
				<h5>DRUGS & COSMETICS SAMPLE SUMMARY</h5>
				    <table id="example1111" class="table table-bordered">
                <thead>
				  <tr>
				  <th>Total Sample</th>
                  <th># Accepted</th>
                  <th># Rejected </th>
				  <th># Pending </th>
                  <th># Completed</th>
                  <th># Ongoing</th>
				
				  </tr>
                </thead>
                <tbody>
                  <tr> <td>'.$tnumd.'</td>
				          <td>'.$anumd.'</td>
						  <td>'.$rnumd.'</td>
						  <td>'.$pnumd.'</td>
						  <td>'.$cnumd.'</td>
						  <td>'.$onumd.'</td>
			          </tr>
                </tbody>
              </table>
				
				</div>
				
				<div class="col-md-12">
				<h5>SAMPLES FAILED </h5>
				    <table id="example1111" class="table table-bordered">
                <thead>
				  <tr>
				  <th>Total Sample</th>
                  <th># Food</th>
                  <th># Drugs  & Cosmetics </th>
				  </tr>
                </thead>
                <tbody>
                  <tr> <td>'.$ffn.'</td>
				          <td>'.$ffnf.'</td>
						  <td>'.$ffnd.'</td>
						  
			          </tr>
                </tbody>
              </table>
				
				</div>
				
				
				<div class="col-md-12">
				<h5>SAMPLES PASS</h5>
				    <table id="example1111" class="table table-bordered">
                <thead>
				  <tr>
				  <th>Total Sample</th>
                  <th># Food</th>
                  <th># Drugs  & Cosmetics </th>
				  </tr>
                </thead>
                <tbody>
                  <tr> <td>'.$ppn.'</td>
				          <td>'.$ppnf.'</td>
						  <td>'.$ppnd.'</td>
			          </tr>
                </tbody>
              </table>
				
				</div>
				';
?>
