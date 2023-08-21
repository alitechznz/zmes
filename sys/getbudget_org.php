<?php

include 'includes/conn.php';
$ID_get = $_GET['q'];
            $sqls="SELECT organizationtb.ID, organizationtb.Name FROM projecttb, organizationtb, project_targetgroup WHERE projecttb.BudgetTerm='$ID_get' AND projecttb.ID=project_targetgroup.Project AND project_targetgroup.Institution=organizationtb.ID"; 
            $results = mysqli_query($conn, $sqls);
            echo '<option value=" ">-- Select --</option>';
            while($row = mysqli_fetch_array($results)) {	
                        echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
            }
      
?>