<?php

include 'includes/conn.php';
$ID_get = $_GET['q'];
            $sqls="SELECT * FROM priorityarea_goal WHERE strategy_area_id='$ID_get'"; 
            $results = mysqli_query($conn, $sqls);
            echo '<option value=" ">-- Select --</option>';
            while($row = mysqli_fetch_array($results)) {	
                        echo '<option value="'.$row['priorityarea_goal_id'].'">'.$row['priorityarea_goal_name'].'</option>';
            }
      
?>