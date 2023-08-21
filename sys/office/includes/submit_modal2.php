<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Sample Submission</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="addsample.php">
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">I (Staff Name)</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="name" name="name" value="<?php echo $user['Fullname']; ?>" readonly>
                  	</div>
                </div>
				
          		 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">TO (Head Of Lab) </label>

                  	<div class="col-sm-9">
					 <select class="form-control select2" id="head" name="head">
									  <option selected="selected">Select</option>
									  <?php 
										 require('includes/conn.php');
											$query="SELECT * FROM userinfo WHERE Role='Head'";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value="'.$row['Fullname'].'">'.$row['Fullname'].'</option>';
											}
											mysqli_close($conn);
									  ?>
									</select>
                    	
                  	</div>
                </div>
			   <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Type </label>

                  	<div class="col-sm-9">
					 <select class="form-control select2" id="aina" name="aina" onchange="getcode(this.value)">
									  <option value="">Select</option>
									   <option value="Food">Food</option>
									 <option value="Drug">Drug</option>
									<option value="Cosmetics">Cosmetics</option>
						</select>
					</div>
				</div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Sample code number</label>

                  	<div class="col-sm-9" id="hapcode">
					    
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Brand Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="brand" name="brand" required />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Common/Generic Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="samplename" name="samplename" required />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Quantity / Number</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="quantity" name="quantity" required />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Batch / Lot Number</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="batch" name="batch" required />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Active Ingredient/Excipients</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="gradient" name="gradient"  />
                  	</div>
                </div>
				
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Manufactured Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="manu_date" name="manudate" required />
                  	</div>
                </div>
				 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Expiry Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="expirydate" name="expirydate"  />
                  	</div>
                </div>
				 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Submission Date & Time</label>

                  	<div class="col-sm-9">
                    	<input type="datetime" class="form-control" id="subdate" name="subdate" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly />
                  	</div>
                  	
                </div>
				  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Due Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="edit_duedate" name="duedate" value="<?php echo date('Y-m-d'); ?>" required />
                  	</div>
                </div>
               
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="dsave"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="updatesample.php">
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">I (Staff Name)</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_name" name="name" value="<?php echo $user['Fullname']; ?>" readonly>
                  	</div>
                </div>
				
          		 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">TO (Head Of Lab) </label>

                  	<div class="col-sm-9">
					 <select class="form-control select2" id="edit_head" name="head">
									  <option selected="selected">Select</option>
									  <?php 
										 require('includes/conn.php');
											$query="SELECT * FROM userinfo WHERE Role='Head'";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option>'.$row['Fullname'].'</option>';
											}
											mysqli_close($conn);
									  ?>
									</select>
                    	
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Sample code number</label>

                  	<div class="col-sm-9">
                  	    <input type='text' class='form-control' id='edit_code' name='code'  readonly />
					   
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Common Name</label>
                 
                 
                  	<div class="col-sm-9">
                  	    
                  	    	<input type="text" class="form-control" id="edit_samplename" name="samplename"  readonly>
                    
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Quantity / Number</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_quantity" name="quantity" required />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Batch / Lot Number</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_batch" name="batch" required />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Manufactured Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="edit_manu_date" name="manudate" required />
                  	</div>
                </div>
				 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Expiry Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="edit_expirydate" name="expirydate" required />
                  	</div>
                </div>
				 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Submission Date & Time</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="edit_subdate" name="subdate" value="<?php echo date('Y-m-d'); ?>" readonly />
                  	</div>
                </div>
                 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Due Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="edit_duedate" name="duedate" value="<?php echo date('Y-m-d'); ?>" required />
                  	</div>
                </div>
                
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="update"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- parameter -->
<div class="modal fade" id="assign">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="updatesample.php">
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Parameter</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_name" name="name"  required>
                  	</div>
                </div>
				
                
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="update"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="department_delete.php">
            		<input type="hidden" class="empid" name="id">
            		<div class="text-center">
	                	<p>DELETE DEPARTMENT?</p>
	                	<h2 class="bold del_employee_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

    