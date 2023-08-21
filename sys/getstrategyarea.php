<?php

include 'includes/conn.php';
$ID_get = $_GET['q'];
            $sqls="SELECT * FROM strategy_area WHERE plan_id='$ID_get'"; 
            $results = mysqli_query($conn, $sqls);
            $row = mysqli_fetch_array($results);
            $get_goal_type = $row['goal_type'];
            echo '<label for="employee" class="col-sm-3 control-label">'.ucfirst($get_goal_type).'</label>
                  <input type="hidden" name="goal_type" value="'.$get_goal_type.'" />
				  <div class="col-sm-9">
					 <select class="form-control select2" name="strategy" onchange="ShowPriorityArea(this.value)">
                        <option value=" ">-- Select --</option>
                        <option value="'.$row['strategy_area_id'].'">'.$row['strategy_area_name'].'</option>';
                        while($row = mysqli_fetch_array($results)) {	
                            echo '<option value="'.$row['strategy_area_id'].'">'.$row['strategy_area_name'].'</option>';
                        }
            echo    '</select>
                  </div>';
      
?>