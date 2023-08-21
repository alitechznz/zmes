<?php

include 'includes/conn.php';

$str_year = $_GET['str_year'];
$str_type = $_GET['str_type'];
$str_org = $_GET['str_org'];

// $sql ="";
//    if($get_type =='kra'){
//         if(!empty($get_program) && !empty($get_from) && !empty($get_to) && !empty($get_budget)){
//             $sql ="SELECT * FROM project_kra
//                     INNER JOIN keyarea ON project_kra.KRA = keyarea.IDNo
//                     INNER JOIN projecttb ON project_kra.Project = projecttb.ID
//                     WHERE projecttb.ID='$get_program' AND projecttb.BudgetTerm='$get_budget' AND project_kra.submited BETWEEN '$get_from' AND '$get_to'";
        
//         } elseif(!empty($program) && !empty($datesearch) && empty($budgeterm)){

//         } elseif(!empty($program) && empty($datesearch) && !empty($budgeterm)){

//         } elseif(empty($program) && !empty($datesearch) && !empty($budgeterm)){

//         } elseif(!empty($program) && empty($datesearch) && empty($budgeterm)){

//         } elseif(empty($program) && !empty($datesearch) && empty($budgeterm)){

//         } elseif(empty($program) && empty($datesearch) && !empty($budgeterm)){
            
//         }
//    } elseif($get_type =='plan'){

//    } elseif($get_type =='resource'){

//    } elseif($get_type =='quarter'){
    
//    } elseif($get_type =='annual'){
    
//    } elseif($get_type =='monitor'){
    
//    }
$query = "SELECT *
            FROM projecttb
            INNER JOIN project_targetgroup ON project_targetgroup.Project=projecttb.ID 
            INNER JOIN organizationtb ON project_targetgroup.Institution = organizationtb.ID
            INNER JOIN userinfo ON project_targetgroup.FocalPerson = userinfo.id
            WHERE projecttb.BudgetTerm ='$str_year' AND project_targetgroup.Institution='$str_org'"; 
               $get_date = NULL;
               $get_status =NULL;
               
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        $get_id = $row['ID'];
                        if($str_type=='Annual'){ 
                            $sql = "SELECT * FROM project_quarter WHERE Project ='$get_id' AND q_budget_year='$str_year' AND quarter_type='$str_type'";
                            $resultr = mysqli_query($conn, $sql) or die("Error : ".mysqli_error($conn));
                            if($rowr = mysqli_fetch_array($resultr)){
                                $get_date = $rowr['q_Submitted_date'];
                                $get_status ="Submitted";
                            } else {
                                $get_date = "NULL";
                                $get_status ="NULL";
                            }
                        } else {
                            $sql = "SELECT * FROM project_annual WHERE Project ='$get_id' AND annual_budget_year ='$str_year'";
                            $resultr = mysqli_query($conn, $sql) or die("Error : ".mysqli_error($conn));
                            if($rowr = mysqli_fetch_array($resultr)){
                                $get_date = $rowr['annual_registered_date'];
                                $get_status ="Submitted";
                            } else {
                                $get_date = "NULL";
                                $get_status ="NULL";
                            }
                        }
        
                        $num +=1;
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['pTitle']. " (".$row['Short title'].")</td>
                            <td>".$get_date."</td>
                            <td>".$get_status."</td>
                        </tr>";
                    }
                    if($num ==0){
                    echo "<tr>
                            <td>NULL</td>
                            <td>NULL</td>
                            <td>NULL</td>
                            <td>
                                NULL
                            </td>
                    </tr>";
                    }



?>