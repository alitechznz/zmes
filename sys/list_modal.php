<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>New Agenda</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php" enctype="multipart/form-data">
				        <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Agenda Name</label>
                  	<div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Agenda name" id="agendaname" name="agendaname" required>
                  	</div>
                </div>
			        	<div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Abbreviation Name|Code ID:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Agenda code" id="code" name="code" required>
                    </div>
                </div>
          		  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Start Date</label>
                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="startdate" name="startdate" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">End Date</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="enddate" name="enddate" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">About Agenda</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <textarea type="text" rows="5" class="form-control" placeholder="About agenda" name="about" id="about"></textarea>
                    </div>
                    </div>
                </div>
				        <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Status</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Finished">Finished</option>                    
                      </select>
					          </div>
                </div>
				
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="addagenda"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<!-- Edit -->
<div class="modal fade" id="editagenda">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="agenda_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="agendaid" name="id">
                <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Agenda Name</label>
                  	<div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Agenda name" id="edit_agendaname" name="edit_agendaname" required>
                  	</div>
                </div>
			        	<div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Abbreviation Name|Code ID:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Agenda code" id="edit_code" name="edit_code" required>
                    </div>
                </div>
          		  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Start Date</label>
                  	<div class="col-sm-9">
                    	<input type="date" class="form-control" id="edit_startdate" name="edit_startdate" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">End Date</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="edit_enddate" name="edit_enddate" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">About Agenda</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <textarea type="text" rows="5" class="form-control" placeholder="About agenda" name="edit_about" id="edit_about"></textarea>
                    </div>
                    </div>
                </div>
				        <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Status</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="edit_status" id="edit_status" required>
                            <option value="Active">Active</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Finished">Finished</option>                    
                      </select>
					          </div>
                </div>
             
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editagenda"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="reports">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="agenda_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="agendaid" name="id">
            		<div class="text-center">
	                	<p>Are </p>
	                	<h2 class="bold del_agenda_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteagenda"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- ----------------------- END OF AGENDA PAGE --------------------------------->

<div class="modal fade" id="addkra">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>New KRA</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php" enctype="multipart/form-data">
				        <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Agenda Name</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="agenda" required>
                            <?php 
                                include 'php/conn.php'; 
                                     $query = "SELECT * FROM `agendatb`"; 
                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                    while($row = mysqli_fetch_array($result)) {	
                                        echo '<option value="'.$row['ID'].'">'.$row['Code'].'</option>';
                                     }         
                            ?>  
                            </select>
            
                  	</div>
                </div>
			        	<div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">KRA Name:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="KRA Name" name="indicatorname" required>
                    </div>
                </div>
          		  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">About KRA</label>
                  	<div class="col-sm-9">
                        <textarea rows="5" class="form-control" placeholder="About KRA" name="aboutIndicator"></textarea>
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Status</label>
                  	<div class="col-sm-9">
					 
					  
					</div>
                </div>
				
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="addkra"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="editkra">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="kra_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="kraid" name="id">
                <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Agenda Name</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="edit_kraagenda" id="edit_kraagenda" required>
                            <?php 
                                include 'php/conn.php'; 
                                     $query = "SELECT * FROM `agendatb`"; 
                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                    while($row = mysqli_fetch_array($result)) {	
                                        echo '<option value="'.$row['ID'].'">'.$row['Code'].'</option>';
                                     }         
                            ?>  
                            </select>
                  	</div>
                </div>
			    <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">KRA Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="KRA Name" name="edit_kraname"  id="edit_kraname" required>
                    </div>
                </div>
          		  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">About KRA</label>
                  	<div class="col-sm-9">
                    	<textarea type="text" row="5" class="form-control" id="edit_kraabout" name="edit_kraabout" required></textarea>
                  	</div>
                </div>
                
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Status</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="edit_krastatus" id="edit_krastatus" required>
                            <option value="Active">Active</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Finished">Finished</option>                    
                      </select>
					</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editkra"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deletekra">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="kra_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="kraid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete KRA?</p>
	                	<h2 class="bold del_agenda_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletekra"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!---------------------------- END OF KRA PAGE --------------------------------->


<div class="modal fade" id="addoutcome">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>New Outcome</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php" enctype="multipart/form-data">
				        <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">KRA Name</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="agenda" required>
                            <?php 
                                include 'php/conn.php'; 
                                     $query = "SELECT * FROM `agendatb`"; 
                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                    while($row = mysqli_fetch_array($result)) {	
                                        echo '<option value="'.$row['ID'].'">'.$row['Code'].'</option>';
                                     }         
                            ?>  
                            </select>
            
                  	</div>
                </div>
          		  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Outcome Statement</label>
                  	<div class="col-sm-9">
                        <textarea rows="5" class="form-control" placeholder="About KRA" name="aboutIndicator"></textarea>
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Status</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Finished">Finished</option>                    
                      </select>
					</div>
                </div>
				
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="addoutcome"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="editoutcome">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="outcome_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="outcomeid" name="id">
                <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Agenda Name</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="edit_kraoutcome" id="edit_kraoutcome" required>
                            <?php 
                                include 'php/conn.php'; 
                                     $query = "SELECT * FROM `agendatb`"; 
                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                    while($row = mysqli_fetch_array($result)) {	
                                        echo '<option value="'.$row['ID'].'">'.$row['Code'].'</option>';
                                     }         
                            ?>  
                            </select>
                  	</div>
                </div>
			   
          		  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Outcome Statement</label>
                  	<div class="col-sm-9">
                    	<textarea type="text" row="5" class="form-control" id="edit_outstatement" name="edit_outstatement" required></textarea>
                  	</div>
                </div>
                
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Status</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="edit_outstatus" id="edit_outstatus" required>
                            <option value="Active">Active</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Finished">Finished</option>                    
                      </select>
					</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editoutcome"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteoutcome">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="outcome_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="outcomeid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete Outcome?</p>
	                	<h2 class="bold del_outcome_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteoutcome"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!--- ---------------------- END OF outcome ---------------------------------- >