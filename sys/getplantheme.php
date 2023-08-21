<?php

include 'includes/conn.php';
$ID_get = $_GET['q'];

            $sqls="SELECT * FROM themetb WHERE plan_id='$ID_get'"; 
            $results = mysqli_query($conn, $sqls);
            $row = mysqli_fetch_array($results);
            if($row['page_name']=='theme'){
               
                echo '<label for="photo" class="col-sm-3 control-label">Theme</label>
                    <div class="col-sm-9">
                       <select class="form-control" name="theme" id="plan_theme">';
                        echo '<option value=" ">-- Select --</option>
                        <option value="'.$row['theme_id'].'">'.$row['theme_name'].'</option>';
					   	while($row = mysqli_fetch_array($results)) {	
                            echo '<option value="'.$row['theme_id'].'">'.$row['theme_name'].'</option>';
                        }
                echo '</select>
                    </div>';
            } else {
                echo '<label for="photo" class="col-sm-3 control-label">Aspiration</label>
                    <div class="col-sm-9">
                       <select class="form-control" name="aspiration" id="plan_aspiration">';
                       echo '<option value=" ">-- Select --</option>
                            <option value="'.$row['theme_id'].'">'.$row['theme_name'].'</option>';
					   	while($row = mysqli_fetch_array($results)) {	
                            echo '<option value="'.$row['theme_id'].'">'.$row['theme_name'].'</option>';
                        }
                echo '</select>
                    </div>';
            }
            
            
      
?>