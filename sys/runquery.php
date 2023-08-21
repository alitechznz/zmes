<?php 
 //$query = "SELECT * FROM `projecttb` WHERE `pType` ='Project'"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        $duration = $row['Duration'].$row['Duration Unit'].' ('.$row['StartDate'].' - '.$row['EndDate'].')';
                        $status = $row['Status'];
                        $num +=1;
                        $getid = $row['ID'];
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['pTitle']. " (".$row['Short title'].")</td>";
                            
                            //calculate the sponser
                            $donor_name="";
                            $iter = 0;
                            $queryd = "SELECT * FROM `project_financing` WHERE `Project`='$getid'"; 
                            $resultd = mysqli_query($conn, $queryd) or die("Error : ".mysqli_error($conn));
                            while($rowd = mysqli_fetch_array($resultd)) {
                                $donor = $rowd['SponsorID'];
                                 $querydd = "SELECT * FROM `organizationtb` WHERE `ID`='$donor'"; 
                                 $resultdd = mysqli_query($conn, $querydd) or die("Error : ".mysqli_error($conn));
                                if($rowdd = mysqli_fetch_array($resultdd)) {
                                    if($iter == 0) {
                                         $donor_name = $rowdd['Name'];
                                    } else {
                                         $donor_name = $donor_name.', '.$rowdd['Name'];
                                    }
                                   $iter +=1;
                                }
                            }
                            
                            //calculate the implementors
                             $queryi = "SELECT *
                                       FROM project_targetgroup
                                       INNER JOIN projecttb ON project_targetgroup.Project=projecttb.ID 
                                       INNER JOIN organizationtb ON project_targetgroup.Institution = organizationtb.ID
                                       WHERE project_targetgroup.Project ='$getid'";
                                        $Institution ="";
                                        $iter = 0;
                                        $resulti = mysqli_query($conn, $queryi) or die("Error : ".mysqli_error($conn));
                                        $num = 0;
                                          while($rowi = mysqli_fetch_array($resulti)) {	
                                              if($iter == 0){
                                                   $Institution = $rowi['Name'];
                                              } else {
                                                  $Institution = $Institution .', '.$rowi['Name'];
                                              }
                                             $iter +=1;
                                          }
                            echo 
                            "<td>".$Institution."</td>
                            <td>".$donor_name."</td>
                            <td>".$duration."</td>
                              <td>";
                                 if($row['Status'] == "IDENTIFICATION"){
                                           echo  "<span class='label label-primary'>".$row['Status']."</span>";
                                        } elseif($row['Status'] == "IMPLEMENTATION"){
                                          echo  "<span class='label label-info'>".$row['Status']."</span>";
                                        } elseif($row['Status'] == "COMPLETION"){
                                          echo  "<span class='label label-success'>".$row['Status']."</span>";
                                        }  elseif($row['Status'] == "CANCELLED"){
                                            echo  "<span class='label label-danger'>".$row['Status']."</span>";
                                        }
                                            elseif($row['Status'] == "SUSPENDED"){
                                            echo  "<span class='label label-warning'>".$row['Status']."</span>";
                                        }
                 
                            echo "<td>
                                        <a href='report_project.php?id=".$row['ID']."'><button class='btn btn-info btn-sm'><i class='fa fa-print'></i></button></a>
                                         <a href='viewprojectreport.php?id=".$row['ID']."'><button class='btn btn-warning btn-sm'><i class='fa fa-eye'></i></button></a>
                                       
                                    </td>
                        </tr>";
                    }
            ?>