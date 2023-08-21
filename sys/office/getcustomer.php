<?php
$ID = $_GET['q'];
						    require('includes/conn.php');
							$rowcount =0;
							$year = date('Y');
							   $query="SELECT * FROM customer WHERE CustomerID='$ID'";
											if($result=mysqli_query($conn, $query)) {
												 $row=mysqli_fetch_array($result);
			echo '
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Address</label>

                  	<div class="col-sm-9">
                    	<textarea type="text" class="form-control" id="quantity" value="'.$row['Address'].'" readonly>'.$row['Address'].'</textarea>
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Phone Number</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="batch" value="'.$row['PhoneNo'].'" readonly />
                  	</div>
                </div>';
												
												// Free result set
												mysqli_free_result($result);
												
											}
											mysqli_close($conn);
?>
