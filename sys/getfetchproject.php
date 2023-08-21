<?php

include 'includes/conn.php';
$ID_get = $_GET['q'];

                    $query = "SELECT *
                                    FROM projecttb
                                    
                                    INNER JOIN project_targetgroup ON project_targetgroup.Project=projecttb.ID 
                                    INNER JOIN organizationtb ON project_targetgroup.Institution = organizationtb.ID
                                    INNER JOIN userinfo ON project_targetgroup.FocalPerson = userinfo.id
                                    
                                    WHERE projecttb.ID ='$ID_get'"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        
                        $num +=1;
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['Name']."</td>
                            <td>".$row['Fullname']."</td>
                            <td></td>
                            <td></td>
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
                                        <a href='anualsreport.php?id=".$row['ID']."'><button class='btn btn-info ><i class='fa fa-print'></i> Print</button></a>
                                       
                                    </td>
                        </tr>";
                    }



?>