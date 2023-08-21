

<!-- Add -->
<div class="modal fade" id="view">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>LABORATORY REMARK</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="analysis_add.php">
	
          		 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">TO (Head Of Lab) </label>

                  	<div class="col-sm-9">
					 	<input type="text" class="form-control" id="ass_head" name="ass_head" readonly />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Sample ID</label>

                  	<div class="col-sm-9">
					   <input type='text' class='form-control' id='ass_code' name='ass_code' readonly />
                  	</div>
                </div>
             
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Common Name</label>
                 
                 
                  	<div class="col-sm-9">
                  	    
                  	    	<input type="text" class="form-control" id="ass_samplename" name="ass_samplename"  readonly>
                    
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Quantity / Number</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="ass_quantity" name="ass_quantity" readonly />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Batch / Lot Number</label>

                  	<div class="col-sm-9">
                    	<input type="number" class="form-control" id="ass_batch" name="ass_batch" readonly />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Manufactured Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="ass_manu_date" name="ass_manudate" readonly />
                  	</div>
                </div>
				 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Expiry Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="ass_expirydate" name="ass_expirydate" readonly />
                  	</div>
                </div>
				 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Submission Date & Time</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="ass_subdate" name="ass_subdate" value="<?php echo date('Y-m-d'); ?>" readonly />
                  	</div>
                </div>
                 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Due Date</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="ass_duedate" name="ass_duedate" value="<?php echo date('Y-m-d'); ?>" readonly />
                  	</div>
                </div>
                 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label"> Date & Time</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" name="dateassigned" value="<?php echo date("Y-m-d"); ?>" readonly />
                  	</div>
                  	
                </div>
				  <!--div class="form-group">
                                <div class="box-body">
                             <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>S/No</th>
                                  <th style="width: 65% !important;">Parameter</th>
                                
                                  
                                </tr>
                                </thead>
                                <tbody>
				<?php 
				  include 'conn.php';
                                        // $getcode =$_GET['sample'];
                                         $nm =1;
        							      $sql = "SELECT * FROM `lab_testsrequested`";
        							      $result = mysqli_query($conn, $sql);
        							      while($row=mysqli_fetch_array($result)) {
						
                            				
                                           echo '<tr>';
                                              echo '<td>'.$nm.'</td>';
                                              echo '<td>'.$row['Tests'].'</td>';
                            				
                                            echo '</tr>';
			                  	$nm = $nm + 1;
               		}								
				?>
                </tbody>
               
              </table>
                        </div>
                  	
                </div-->
				
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Condition</label>

                  	<div class="col-sm-9">
                    	    <div class="radio">
                                <label>
                                  <input type="radio" name="ass_condition" id="ass_accept" value="Accept" checked>
                                  Accept
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="ass_condition" id="ass_reject" value="Reject">
                                  Reject
                                </label>
                              </div>
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Reason(s)(In case of rejection)</label>

                  	<div class="col-sm-9">
                    	<textarea type="text" class="form-control" id="reasons" name="reasons" ></textarea>
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


<!-- assigned -->
<div class="modal fade" id="assign">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>SAMPLE ASSIGNING</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="analysis_add.php">
	            <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Sample Code</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="as_code" name="as_code" readonly />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Sample Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="as_name" name="as_name" readonly />
                  	</div>
                </div>
          		 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Sample Issued By </label>

                  	<div class="col-sm-9">
					 	<input type="text" class="form-control" id="ass_head" name="as_issued" readonly />
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Sample Assigned By</label>

                  	<div class="col-sm-9">
					   <input type='text' class='form-control' id='ass_code' name='as_assignedby' readonly />
                  	</div>
                </div>
             
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Sample Assigned To (Analyst)</label>
                  	<div class="col-sm-9">
                  	    	<input type="text" class="form-control" id="as_analyst" name="as_analyst"  required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Sample Assigned To (Checker)</label>
                  	<div class="col-sm-9">
                  	    	<input type="text" class="form-control" id="as_checker" name="as_checker"  required>
                  	</div>
                </div>
                 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label"> Date & Time Assigned</label>

                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" name="dateassigned" value="<?php echo date("Y-m-d"); ?>" readonly />
                  	</div>
                </div>
			
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Tests Requested</label>

                  	<div class="col-sm-9">
                    <div class="panel panel-default">

  <div class="panel-body">
  
  <div id="education_fields">
          
        </div>
       <div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Schoolname" name="Schoolname[]" value="" placeholder="School name">
  </div>
</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Major" name="Major[]" value="" placeholder="Major">
  </div>
</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Degree" name="Degree[]" value="" placeholder="Degree">
  </div>
</div>

<div class="col-sm-3 nopadding">
  <div class="form-group">
    <div class="input-group">
      <select class="form-control" id="educationDate" name="educationDate[]">
      
        <option value="">Date</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
      </select>
      <div class="input-group-btn">
        <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      </div>
    </div>
  </div>
</div>
<div class="clear"></div>
  
  </div>
  
</div>
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
            	<form class="form-horizontal" method="POST" action="updatesample.php">
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">I (Staff Name)</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit_name" name="name"  readonly>
                  	</div>
                </div>
				
          		 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">TO (Head Of Lab) </label>

                  	<div class="col-sm-9">
					   	<input type="text" class="form-control" id="head" name="head" value="<?php echo $user['Fullname']; ?>" readonly>
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Sample code number</label>

                  	<div class="col-sm-9">
                  	    <input type='text' class='form-control' id='edit_code' name='code'  readonly >
					   
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Common Name</label>
                 
                 
                  	<div class="col-sm-9">
                  	    
                  	    	<input type="text" class="form-control" id="edit_samplename" name="samplename"  required>
                    
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
                    	<input type="number" class="form-control" id="edit_batch" name="batch" required />
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
	                	<p>DELETE SAMPLE?</p>
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

    