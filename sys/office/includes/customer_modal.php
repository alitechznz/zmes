<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>CUSTOMER INFORMATION</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="addcustomer.php">
`			
               <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Customer/Institution Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="samplename" name="name"  placeholder="Enter name....." required />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Address</label>

                  	<div class="col-sm-9">
                    	<textarea type="text" class="form-control" id="quantity" name="address"  placeholder="Address" required ></textarea>
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Phone Number</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="batch" name="phone" placeholder="Example 255777000111" required />
                  	</div>
                </div>
				<div class="form-group">
				   <label for="employee" class="col-sm-3 control-label">Status</label>
					  <div class="col-sm-9 checkbox">
						 <input type="checkbox" name="status" class="flat-red " > Active
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
            	<h4 class="modal-title"><b>EDIT PAGE<span class="employee_id"></span></b></h4>
          	</div>
			
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="addcustomer.php">
				<input type="hidden" class="empid" name="id">
                	
               <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Customer/Institution Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_name" name="name"  placeholder="Enter name....." required />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Address</label>

                  	<div class="col-sm-9">
                    	<textarea type="text" class="form-control" id="edit_address" name="address"  placeholder="Address" required ></textarea>
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Phone Number</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_phone" name="phone" placeholder="Example 255777000111" required />
                  	</div>
                </div>
				<div class="form-group">
				   <label for="employee" class="col-sm-3 control-label">Status</label>
					  <div class="col-sm-9 checkbox">
						 <input type="checkbox" name="status" id="edit_status" class="flat-red "> Active
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
            	<form class="form-horizontal" method="POST" action="addcustomer.php">
            		<input type="hidden" class="empid" name="id">
            		<div class="text-center">
	                	<p>DELETE CUSTOMER?</p>
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

    