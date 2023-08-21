<!-- Add -->
<div class="modal fade" id="signin">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Sample Received</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="department_add.php">
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">I (Staff Name)</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="employee" name="name" value="<?php echo $user['Fullname']; ?>" readonly>
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Sample code number</label>

                  	<div class="col-sm-9">
					    <input type="text" class="form-control" id="employee" name="address" readonly />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Common Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="employee" name="address" readonly />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Quantity / Number</label>

                  	<div class="col-sm-9">
                    	<input type="number" class="form-control" id="employee" name="address" readonly />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Batch / Lot Number</label>
                  	<div class="col-sm-9">
                    	<input type="number" class="form-control" id="employee" name="address" readonly />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Manufactured Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="employee" name="address" readonly />
                  	</div>
                </div>
				 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Expiry Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="employee" name="address" readonly />
                  	</div>
                </div>
				 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Received Date & Time</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="employee" name="address" required />
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="save"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<!-- Edit -->
<div class="modal fade" id="signout">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="department_edit.php">
            		<input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Receiver Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_name" name="edit_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_address" class="col-sm-3 control-label">Date & Time </label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="edit_leader" id="edit_leader"></textarea>
                    </div>
                </div>
               <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Description</label>

                  	<div class="col-sm-9">
                    	<textarea col="6" type="text" class="form-control" id="edit_description" name="edit_description" required></textarea>
                  	</div>
                </div>
             
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
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

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="user_edit_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>    