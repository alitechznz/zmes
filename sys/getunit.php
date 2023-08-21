<?php 
include 'includes/conn.php';
$ID_get = $_GET['q'];

if($ID_get == 'Foreign'){
    echo ' <div class="form-group">
                <label>Unit :</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-building"></i>
                        </div>
                        <input type="text" name="unit" class="form-control pull-right" placeholder="Enter unit..."  required>
                    </div>
            </div>';
} else {
    echo '<input type="hidden" name="unit" class="form-control pull-right" placeholder="Enter unit..."  required>';
}

?>  
    
    
   