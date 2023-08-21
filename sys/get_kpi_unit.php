<?php

include 'includes/conn.php';
$ID_get = $_GET['q'];
    if($ID_get != 'Quantity'){
      echo     
        '<div class="form-group">
		    <label for="employee" class="col-sm-3 control-label">Numerator</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" placeholder="Numerator" id="edit_numerator" name="numerator"/>
			</div>
		</div>
		<div class="form-group">
			<label for="employee" class="col-sm-3 control-label">Denominator</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" placeholder="Denominator" id="edit_denominator" name="denominator"/>
			</div>
		</div>';
    }	
?>