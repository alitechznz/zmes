<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>New User</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="adduser.php">
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Employee ID</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="employee" name="employee" required>
                  	</div>
                </div>
				<div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo:</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
          		 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="employee" name="name" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Date Of Birth</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_add" name="date" required>
                      </div>
                    </div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Position</label>

                  	<div class="col-sm-9">
                    	<select class="form-control select2" style="width: 100%;" name="position">
						  <option selected="selected" value="Admin">Head</option>
						  <option value="Reservation">laboratory</option>
						  <option value="Coordinator">Custodian</option>
						  <option value="Management">Office</option>
						</select>
					</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Mobile No</label>

                  	<div class="col-sm-9">
                    	 <div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-phone"></i>
						  </div>
						  <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="phone">
						</div>
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Addresss</label>

                  	<div class="col-sm-9">
                    	<textarea col="6" type="text" class="form-control" id="employee" name="address" required></textarea>
                  	</div>
                </div>
				 <div class="form-group">
                  	<label for="username" class="col-sm-3 control-label">Email (Username)</label>

                  	<div class="col-sm-9">
                    	<input type="email" class="form-control" id="username" name="username">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Temp Password</label>

                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password">
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
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="user_edit.php">
            		<input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Fullname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_name" name="fullname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" name="address" id="edit_address"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_contact" class="col-sm-3 control-label">Contact Info</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_contact" name="contact">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_position" class="col-sm-3 control-label">Position</label>

                   	<div class="col-sm-9">
                    	<select class="form-control select2" style="width: 100%;" name="position">
						  <option selected="selected" value="Admin">Head</option>
						  <option value="Reservation">laboratory</option>
						  <option value="Coordinator">Custodian</option>
						  <option value="Management">Office</option>
						</select>
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
            	<form class="form-horizontal" method="POST" action="user_delete.php">
            		<input type="hidden" class="empid" name="id">
            		<div class="text-center">
	                	<p>DELETE USER?</p>
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