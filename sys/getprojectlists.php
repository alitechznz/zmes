<?php

include 'includes/conn.php';
$status = $_GET['status'];
$program = $_GET['program'];
$type = $_GET['type'];

            if($status !='IDENTIFICATION'){
                $sqls="SELECT * FROM  WHERE strategy_area_id='$ID_get'"; 
                $results = mysqli_query($conn, $sqls);
                echo '<option value=" ">-- Select --</option>';
                while($row = mysqli_fetch_array($results)) {	
                            echo '<option value="'.$row['priorityarea_goal_id'].'">'.$row['priorityarea_goal_name'].'</option>';
                }
                        echo '<div class="col-md-4">
                                <div class="form-group">
                                    <label>Select Project<span style="color:red;">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <select class="form-control select2" name="project_list" id="project_list" onchange="showProjectProgram(this.value);" style="width: 100%;" required>
                                        <option value="Select" selected>Select...</option>
                                    </select>
                                </div>
                            </div>';
            }
            
      
?>