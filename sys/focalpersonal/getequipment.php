
<?php 
$q = intval($_GET['q']);

include ('includes/conn.php');

$sql="SELECT * FROM Equipment WHERE id='$q'";
$sresult = mysqli_query($conn,$sql);

  while($srow = mysqli_fetch_array($sresult)) { 
      
     echo '
                        <div class="form-group">
								  <label>Code Number :</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-building"></i>
									  </div>
									   <input type="text" class="form-control" placeholder="Enter Code Number..." value="'.$srow['CodeNumber'].'" name="codenumber" readonly>
									</div>
								</div>
								<div class="form-group">
								  <label>Calibration Status:</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-building"></i>
									  </div>
									   <input type="text" class="form-control" placeholder="Enter Calibration Status..." value="'.$srow['CalibrationStatus'].'" name="calibration" readonly>
									</div>
								</div>';

	 } 
mysqli_close($conn);
?>