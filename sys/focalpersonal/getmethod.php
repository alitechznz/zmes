<?php 
$q = $_GET['q'];

include ('includes/conn.php');

$sql="SELECT * FROM lab_method WHERE Method='$q'";
$sresult = mysqli_query($conn,$sql);

  while($srow = mysqli_fetch_array($sresult)) { 
      
     echo '
                        <div class="form-group">
								  <label>Product Specification :</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-building"></i>
									  </div>
									   <input type="text" class="form-control" placeholder="Enter product specification..." value="'.$srow['Specification'].'" name="description" required>
									</div>
								</div>';

	 } 
mysqli_close($conn);
?>