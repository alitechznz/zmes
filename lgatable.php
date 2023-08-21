<?php 
                    include 'php/conn.php';
                    $query = "SELECT * FROM `projecttb` WHERE `pType` ='Project' and  `pTypeGroup` ='LGA' ORDER BY ID DESC"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        $num +=1;
                        
                        //calculate sponser
                            $getID = $row['ID'];
                             $sponser = "";
                             $querypsp = "SELECT * FROM `project_financing` WHERE `Project` ='$getID'"; 
                             $resultpsp = mysqli_query($conn, $querypsp) or die("Error : ".mysqli_error($conn));
                             $iter = 0;
                             while($rowpsp = mysqli_fetch_array($resultpsp)) {	
                                 
                                $sponserID = $rowpsp['SponsorID'];
                                $sponser_amount = number_format($rowpsp['TotalAmount'],2);
                                $currency = $rowpsp['Unittype'];

                                $sponsorID_array = explode(", ",$sponserID);
                                $arrlength = count($sponsorID_array);
                                $temp_name = '';
                                    for($x = 0; $x < $arrlength; $x++) {
                                        $name = '';
                                        $getID = $sponsorID_array[$x]; // piece1
                                        $querypspo = "SELECT * FROM `organizationtb` WHERE `ID` ='$getID'"; 
                                        $resultpspo = mysqli_query($conn, $querypspo) or die("Error : ".mysqli_error($conn));
                                        if($rowpspo = mysqli_fetch_array($resultpspo)) {	
                                            $name = $rowpspo['Name'];
                                        }

                                        if($x == 0){
                                            $temp_name = $name;
                                        } else {
                                            $temp_name = $temp_name .', '.$name;
                                        }
                                    }
                               
                                    $sponser = $temp_name.'('.$sponser_amount.'/'.$currency.')';
                                   // echo $sponser.'<br />';
                                 
                             }
                             
                             
                        //calculate sector
                         $getID_sector = $row['SectorID'];
                             $sector = "";
                             $queryp = "SELECT * FROM `sector` WHERE `SectorID` =' $getID_sector'"; 
                             $resultp = mysqli_query($conn, $queryp) or die("Error : ".mysqli_error($conn));
                             if($rowp = mysqli_fetch_array($resultp)) {	
                                 $sector = $rowp['SectorName'];
                             }
                        
                        //calculate implementors
                         $getid = $row['ID'];
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
                        
                            echo "<tr>
                           
                            <td>".$row['pTitle']."</td>
                             <td>".$sector."</td>
                             <td>".$sponser."</td>
                             <td>".$Institution."</td>
                             <td>".$row['StartDate'].' - '.$row['EndDate']."</td>
                             <td>";
                             
                             
                             //calculate progress
                             $getID = $row['ID'];
                             $progress = 0;
                             $queryp = "SELECT * FROM `project_progress` WHERE `Project` =' $getID'"; 
                             $resultp = mysqli_query($conn, $queryp) or die("Error : ".mysqli_error($conn));
                             if($rowp = mysqli_fetch_array($resultp)) {	
                                 $progress = $rowp['Progress'];
                             }
                             
                             echo "<div class='progress progress-xs'>
                                        <div class='progress-bar progress-bar-danger' style='width: ".$progress."%'></div>
                                    </div>
                                    <span class='badge bg-red'>".$progress."%</span>";
                                     //calculate number of days remains
                                        date_default_timezone_set('Africa/Nairobi'); // Then call the date functions
                                        $startdate = $row['StartDate'];
                                        $enddate = $row['EndDate'];
                                        $currentday = date("Y-m-d");
                                        $remaindays = 0;
                                        $percentageday = 0;
                                          $range = date("d-m-Y", strtotime($row['StartDate']))." - ".date("d-m-Y", strtotime($row['EndDate']));
                                          
                                        if(strtotime($enddate) <= strtotime($currentday)) {
                                            $remaindays = 0;
                                            $percentageday = 100;
                                        } else {
                                            // Calculating the difference in timestamps 
                                            $diff = strtotime($enddate) - strtotime($currentday); 
                                            // 1 day = 24 hours 
                                            // 24 * 60 * 60 = 86400 seconds 
                                            $remaindays = abs(round($diff / 86400)); 
                                            
                                            $diff = strtotime($enddate) - strtotime($startdate); 
                                            $totaldays = abs(round($diff / 86400)); 
                                            
                                            $zilizokwisha = ($totaldays - $remaindays);
                                            
                                            $percentageday = abs(round(($zilizokwisha/$totaldays) *100));
                                          
                                        }
                                        echo "<span class='badge bg-red'>".$remaindays." /days remained</span>";
                                      
                            echo "</td>
                                    <td>";
                                       
                                         if($row['Status'] == "IDENTIFICATION"){
                                           echo  "<span class='label label-primary'>".$row['Status']."</span>";
                                        } elseif($row['Status'] == "IMPLEMENTATION"){
                                          echo  "<span class='label label-info'>".$row['Status']."</span>";
                                        } elseif($row['Status'] == "COMPLETION"){
                                          echo  "<span class='label label-success'>COMPLETED</span>";
                                        }  elseif($row['Status'] == "CANCELLED"){
                                            echo  "<span class='label label-danger'>".$row['Status']."</span>";
                                        }
                                            elseif($row['Status'] == "SUSPENDED"){
                                            echo  "<span class='label label-warning'>".$row['Status']."</span> ";
                                        }
                                         /* echo "<span>".$range."</span>
                                                <div class='progress progress-xs'>
                                                  <div class='progress-bar progress-bar-danger' style='width: ".$percentageday."%'></div>
                                                </div>
                                                <span class='badge bg-red'>".$remaindays." /days remained</span>";
                                        */
                                        
                                    echo "</td>
                             
                        </tr>";
                    }
                   
                    ?>