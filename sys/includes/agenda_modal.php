<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>New Plan</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php" enctype="multipart/form-data">
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Plan Name</label>
                  	<div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Plan name...." id="agendaname" name="agendaname" required>
                  	</div>
                </div>
			      <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Abbreviation Name|Code ID:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="plan short name eg MKUZA" id="code" name="code" required>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Category:</label>
                    <div class="col-sm-9">
                       <select class="form-control" name="category" id="category">
                           <option value="International">International</option>
                           <option value="National">National</option>
						   <option value="Regional">Regional</option>
                       </select>
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
                    <label for="datepicker_add" class="col-sm-3 control-label">Plan Explaination</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <textarea type="text" rows="5" class="form-control" placeholder="Plan explaination" name="about" id="about"></textarea>
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
                      	<label for="employee" class="col-sm-3 control-label">Plan Name</label>
                      	<div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Plan name" id="edit_agendaname" name="edit_agendaname" required>
                      	</div>
                    </div>
    			    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Abbreviation Name|Code ID:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Plan code" id="edit_code" name="edit_code" required>
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
                        <label for="datepicker_add" class="col-sm-3 control-label">Plan Explaination</label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <textarea type="text" rows="5" class="form-control" placeholder="Plan explaination" name="edit_about" id="edit_about"></textarea>
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
<!-- Edit -->

<!-- Delete -->
<div class="modal fade" id="deleteagenda">
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
	                	<p>Are you sure want to delete the plan?</p>
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
<!-- Delete -->
<div class="modal fade" id="deletetheme">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="theme_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="themeid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete the plan?</p>
	                	<h2 class="bold del_theme_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletetheme"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteaspiration">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="theme_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="themeid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete the plan?</p>
	                	<h2 class="bold del_theme_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteaspiration"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Add -->
<div class="modal fade" id="addsarea">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>New Strategy Area|Goal</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php" enctype="multipart/form-data">
			    <div class="form-group">
                    <label for="type" class="col-sm-3 control-label">Select Option</label>
                    <div class="col-sm-9">
                       <select class="form-control" name="goal_type" id="goal_type">
                           <option value="">Select ...</option>
                           <option value="goal">Goal</option>
                           <option value="strategic area">Strategic Area</option>
				       </select>
				    </div>
				</div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Name</label>
                  	<div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="strategy area name...." id="agendaname" name="agendaname" required>
                  	</div>
                </div>
				<div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Explaination</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <textarea type="text" rows="5" class="form-control" placeholder="Strategy Area explaination" name="about" id="about"></textarea>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Plan</label>
                    <div class="col-sm-9">
                       <select class="form-control" name="category" id="category" onchange="showplan_theme(this.value)">
					   		<?php
                                include 'php/conn.php';
					   		$query = "SELECT * FROM `agendatb` WHERE `Status`='Active'";
					   		$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		$num = 0;
					   		echo '<option value="">Select...</option>';
					   		while($row = mysqli_fetch_array($result)) {
					   		    echo '<option value="'.$row['ID'].'">'.$row['Code'].'</option>';
					   		}
					   		?>  
                       </select>
                    </div>
                </div>
                <div class="form-group"  id="plan_theme">
                  
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
            	<button type="submit" class="btn btn-primary btn-flat" name="addsarea"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="editsarea">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="sagenda_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="sagendaid" name="id">
                    <div class="form-group">
                      	<label for="employee" class="col-sm-3 control-label">Strategy Area Name</label>
                      	<div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="strategy name" id="sedit_agendaname" name="edit_agendaname" required>
                      	</div>
                    </div>
					<div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Strategy area explaination</label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <textarea type="text" rows="5" class="form-control" placeholder="strategy explaination" name="edit_about" id="sedit_about"></textarea>
                        </div>
                        </div>
                    </div>
					<div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Plan:</label>
                    <div class="col-sm-9">
                       <select class="form-control" name="category" id="scategory">
					   		<?php
					   		    include 'php/conn.php';
					   		$query = "SELECT * FROM `agendatb` WHERE `Status`='Active'";
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
                      	<label for="employee" class="col-sm-3 control-label">Status</label>
                      	<div class="col-sm-9">
                          <select class="form-control select2" name="edit_status" id="sedit_status" required>
                                <option value="Active">Active</option>
                                <option value="Suspended">Suspended</option>
                                <option value="Finished">Finished</option>                    
                          </select>
    					</div>
                    </div>
             
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editsarea"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deletesarea">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="sagenda_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="sagendaid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete?</p>
	                	<h2 class="bold del_agenda_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletesarea"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Add -->
<div class="modal fade" id="addparea">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>New Priority Area</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php" enctype="multipart/form-data">
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Priority Area Name</label>
                  	<div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="priority area name...." id="pagendaname" name="agendaname" required>
                  	</div>
                </div>
				<div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Priority Area Explaination</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <textarea type="text" rows="5" class="form-control" placeholder="Priority Area explaination" name="about" id="pabout"></textarea>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Strategy Area:</label>
                    <div class="col-sm-9">
                       <select class="form-control" name="strategy" id="strategy_area">
					   		<?php
					   		    include 'php/conn.php';
					   		$query = "SELECT * FROM `strategy_area` WHERE `strategy_status`='Active'";
					   		$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		$num = 0;
					   		while($row = mysqli_fetch_array($result)) {
					   		    echo '<option value="'.$row['strategy_area_id'].'">'.$row['strategy_area_name'].'</option>';
					   		}
					   		?>  
                       </select>
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
            	<button type="submit" class="btn btn-primary btn-flat" name="addparea"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="editparea">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="pagenda_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="pagendaid" name="id">
                    <div class="form-group">
                      	<label for="employee" class="col-sm-3 control-label">Priority Area Name</label>
                      	<div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="priority name" id="pedit_agendaname" name="edit_agendaname" required>
                      	</div>
                    </div>
					<div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Priority area explaination</label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <textarea type="text" rows="5" class="form-control" placeholder="priority explaination" name="edit_about" id="pedit_about"></textarea>
                        </div>
                        </div>
                    </div>
					<div class="form-group">
						<label for="photo" class="col-sm-3 control-label">Strategy Area:</label>
						<div class="col-sm-9">
							<select class="form-control" name="strategyarea" id="strategy_area">
								<?php
					   		        include 'php/conn.php';
					   		$query = "SELECT * FROM `strategy_area` WHERE `strategy_status`='Active'";
					   		$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		$num = 0;
					   		while($row = mysqli_fetch_array($result)) {
					   		    echo '<option value="'.$row['strategy_area_id'].'">'.$row['strategy_area_name'].'</option>';
					   		}
					   		?>  
							</select>
						</div>
                </div>
    			    
    				<div class="form-group">
                      	<label for="employee" class="col-sm-3 control-label">Status</label>
                      	<div class="col-sm-9">
                          <select class="form-control select2" name="edit_status" id="pedit_status" required>
                                <option value="Active">Active</option>
                                <option value="Suspended">Suspended</option>
                                <option value="Finished">Finished</option>                    
                          </select>
    					</div>
                    </div>
             
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editparea"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteparea">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="pagenda_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="pagendaid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete?</p>
	                	<h2 class="bold del_agenda_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteparea"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Add -->
<div class="modal fade" id="addgoal">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>New Goal</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php" enctype="multipart/form-data">
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Goal Name</label>
                  	<div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="goal name...." id="pagendaname" name="agendaname" required>
                  	</div>
                </div>
				<div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Goal Explaination</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <textarea type="text" rows="5" class="form-control" placeholder="Goal explaination" name="about" id="pabout"></textarea>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Plan:</label>
                    <div class="col-sm-9">
						<select class="form-control" name="category" id="category">
					   		<?php
					   		include 'php/conn.php';
					   		$query = "SELECT * FROM `agendatb` WHERE `Status`='Active'";
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
            	<button type="submit" class="btn btn-primary btn-flat" name="addgoal"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="editgoal">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="gagenda_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="gagendaid" name="id">
                    <div class="form-group">
                      	<label for="employee" class="col-sm-3 control-label">Goal Area Name</label>
                      	<div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="goal name" id="gedit_agendaname" name="edit_agendaname" required>
                      	</div>
                    </div>
					<div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Goal area explaination</label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <textarea type="text" rows="5" class="form-control" placeholder="goal explaination" name="edit_about" id="gedit_about"></textarea>
                        </div>
                        </div>
                    </div>
					<div class="form-group">
						<label for="photo" class="col-sm-3 control-label">Plan:</label>
						<div class="col-sm-9">
							<select class="form-control" name="strategyarea" id="goalid">
								<?php
					   		        include 'php/conn.php';
					   		$query = "SELECT * FROM `agendatb` WHERE `Status`='Active'";
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
                      	<label for="employee" class="col-sm-3 control-label">Status</label>
                      	<div class="col-sm-9">
                          <select class="form-control select2" name="edit_status" id="gedit_status" required>
                                <option value="Active">Active</option>
                                <option value="Suspended">Suspended</option>
                                <option value="Finished">Finished</option>                    
                          </select>
    					</div>
                    </div>
             
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editgoal"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deletegoal">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="pagenda_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="pagendaid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete?</p>
	                	<h2 class="bold del_agenda_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletegoal"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- ----------------------------------CONFIGURATION --------------------------->
<div class="modal fade" id="editbudgetterm">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            		<h4 class="modal-title"><b><span class="term_name">EDIT</span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="termid" name="id">
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Budget Term:</label>
						<div class="col-sm-9">
							<input type="text" id="edit_term" name="term" class="form-control pull-right" placeholder="Enter budget term..."  required />
						</div>
					</div>
			   
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Duration (From)</label>
						<div class="col-sm-9">
							<input type="date" class="form-control pull-right" name="from" id="edit_from"/>
						</div>
					</div>
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Duration (To)</label>
						<div class="col-sm-9">
							<input type="date" class="form-control pull-right" name="to" id="edit_to"/>
						</div>
					</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editbudgetterm"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deletebudgetterm">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="term_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="termid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete?</p>
	                	<h2 class="bold del_detail_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletebudgetterm"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<div class="modal fade" id="editsource">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            		<h4 class="modal-title"><b><span class="source_name">EDIT</span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="sourceid" name="id">
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Source:</label>
						<div class="col-sm-9">
							<input type="text" id="edit_source" name="edit_source" class="form-control pull-right" placeholder="Enter budget term..."  required />
						</div>
					</div>
			   
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Status:</label>
						<div class="col-sm-9">
						    <select class="form-control" name="edit_sstatus" id="edit_sstatus">
								<option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
						</div>
					</div>
					
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editsource"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deletesource">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="source_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="sourceid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete?</p>
	                	<h2 class="bold del_detail_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteparticular"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="editfinancep">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            		<h4 class="modal-title"><b><span class="financep_name">EDIT</span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="financepid" name="id">
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Particular:</label>
						<div class="col-sm-9">
							<input type="text" id="edit_financep" name="edit_financep" class="form-control pull-right" placeholder="Enter budget term..."  required />
						</div>
					</div>
			   
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Status:</label>
						<div class="col-sm-9">
						    <select class="form-control" name="edit_pstatus" id="edit_pstatus">
								<option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
						</div>
					</div>
					
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editparticular"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deletefinancep">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="financep_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="financepid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete?</p>
	                	<h2 class="bold del_detail_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteparticular"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="editduedate">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            		<h4 class="modal-title"><b><span class="duedate_name">EDIT</span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="duedateid" name="id">
					
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Budget Term:</label>
						<div class="col-sm-9">
							<select class="form-control select2" name="edit_budgetterm" id="edit_budgetterm" required>
                                <?php
					   		    include 'includes/conn.php';
					   		$query = "SELECT * FROM `budgetterm`";
					   		$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		$num = 0;
					   		echo '<option value="0">Select...</option>';
					   		while($row = mysqli_fetch_array($result)) {
					   		    echo '<option value="'.$row['Item'].'">'.$row['Item'].'</option>';
					   		}

					   		?>                
                            </select>
							
						</div>
					</div>
			   
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Status:</label>
						<div class="col-sm-9">
							<select class="form-control" name="edit_reporttype" id="edit_reporttype" required>
                                <option value="Annual Form">Annual Form</option>
                                <option value="KPI">KPI</option>
                                <option value="M&E Plan">M&E Plan</option>
                                <option value="Quarterly Form">Quarterly Form</option>
                                <option value="Resource Tracking Form">Resource Tracking Form</option>
                                <option value="Monitoring Form">Monitoring Form</option>
                            </select>
						   
						</div>
					</div>
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Deadline:</label>
						<div class="col-sm-9">
							<input type="date" name="edit_dateline" id="edit_dateline" class="form-control pull-right"  required/>
						</div>
					</div>
					
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editduedate"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteduedate">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="duedate_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="duedateid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete?</p>
	                	<h2 class="bold del_detail_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteduedate"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="editsector">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            		<h4 class="modal-title"><b><span class="sector_name">EDIT</span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="sectorid" name="id">
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Sector Name:</label>
						<div class="col-sm-9">
							<input type="text" name="edit_sector" id="edit_sector" class="form-control pull-right"  required/>
						</div>
					</div>
					<div class="form-group">
                        <label for="employee" class="col-sm-3 control-label">Ministry <span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control select2" name="organization" style="width: 100%;" required>
                                <?php 
                                    include 'includes/conn.php'; 
                                    $query = "SELECT * FROM organizationtb WHERE  org_group ='Ministry' ORDER BY Mwaka DESC"; 
                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                    echo '<option value="0">Select...</option>';
                                        while($row = mysqli_fetch_array($result)) {	
                                            if($row['Type']=='Government'){
                                                echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                            } else {
                                                echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                            }
                                                                      
                                        }  
                                                                    
                                ?>                   
                            </select>
                        </div>
                    </div>
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Status:</label>
						<div class="col-sm-9">
						    <select class="form-control" name="edit_statuss" id="edit_statuss">
								<option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
						</div>
					</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editsector"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deletesector">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="sector_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="sectorid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete?</p>
	                	<h2 class="bold del_detail_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletesector"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<!-- ----------------------- END OF AGENDA PAGE --------------------------------->

<!-- Edit -->
<div class="modal fade" id="editOrganization">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="org_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="orgid" name="id">
                    <div class="form-group">
                      	<label for="employee" class="col-sm-3 control-label">Organization:</label>
                      	<div class="col-sm-9">
                      	    <input type="text" class="form-control" placeholder="Enter telephone..." name="editss_organization" id="edits_organization"  required/>
                      	</div>
                    </div>
			    
                <div class="form-group">
                    <label for="editss_telephone" class="col-sm-3 control-label">Telephone: </label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" placeholder="Enter telephone..." name="editss_telephone" id="editss_telephone"  required/>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Email Address:</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" placeholder="About email" name="editss_email" id="editss_email" />
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="editss_location" class="col-sm-3 control-label">Address Location:</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" placeholder="About location" name="editss_location" id="editss_location"/>
                    </div>
                    </div>
                </div>
				<div class="form-group">
                    <label for="employee" class="col-sm-3 control-label">Responsible Sector</label>
                    <div class="col-sm-9">
                        <select class="form-control select2"  multiple="multiple" name="frequency_sector[]" data-placeholder="Select a Sector" style="width: 100%;" required>
                            <?php 
                                include 'php/conn.php'; 
                                $query = "SELECT * FROM `sector`"; 
                                $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                $num = 0;
                                echo '<option value=" ">-- Select --</option>';
                                while($row = mysqli_fetch_array($result)) {	
                                    echo '<option value="'.$row['SectorID'].'">'.$row['SectorName'].'</option>';
                                }         
                            ?>  
                        </select>
                    </div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Status</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="editss_status" id="edits_status" required>
                            <option value="Active">Active</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Inactive">Inactive</option>                    
                      </select>
					</div>
                </div>
             
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editorganization"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="editInstitution">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="org_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="orgid" name="id">
                <div class="form-group">
                  		<label for="employee" class="col-sm-3 control-label">Organization:</label>
                  		<div class="col-sm-9">
                         	<select class="form-control select2" name="edit_organization" onchange="showDepartment(this.value)" required>
                                             <?php
					   		                include 'includes/conn.php';
					   		$query = "SELECT * FROM `organizationtb` WHERE  `org_group` ='Ministry' AND `Type`='Government' ORDER BY Mwaka DESC";
					   		$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		$num = 0;
					   		echo '<option value="0">Select...</option>';
					   		while($row = mysqli_fetch_array($result)) {
					   		    echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
					   		}

					   		?>                
                        	</select>
                  		</div>
                </div>
				<div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Institution: </label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" placeholder="Enter Institution..." name="edit_Institution" id="edit_Institution"  required/>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Short Name: </label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" placeholder="Enter shortname..." name="edit_shortname" id="edit_shortname"  required/>
                      </div>
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Address Location:</label>
                    <div class="col-sm-9"> 
                      	<div class="date">
                        	<input type="text" class="form-control" placeholder="About location" name="edit_location" id="edit_location"/>
                    	</div>
                    </div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Status</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="edit_status" id="edit_status" required>
                            <option value="Active">Active</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Inactive">Inactive</option>                    
                      </select>
					</div>
                </div>
             
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editinstitution"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteOrganization">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="org_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="orgid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete Organization?</p>
	                	<h2 class="bold del_org_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteOrganization"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="editme">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="org_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="meid" name="id">
                    <div class="form-group">
                        <label for="employee" class="col-sm-3 control-label">Organization:</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" name="me_organization" id="me_organization" onchange="showDepartment(this.value)" required>
                                             <?php
					   		    include 'includes/conn.php';
					   		$query = "SELECT * FROM organizationtb ORDER BY Mwaka DESC";
					   		$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		$num = 0;
					   		echo '<option value="0">Select...</option>';
					   		while($row = mysqli_fetch_array($result)) {
					   		    if($row['Type']=='Government') {
					   		        echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
					   		    } else {
					   		        echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
					   		    }

					   		}

					   		?>                
                                </select>
                        </div>
                    </div>
			        <div class="form-group">
                                        <label for="employee" class="col-sm-3 control-label">Department :</label>
                                        <div class="col-sm-9">
											<input type="text" class="form-control" placeholder="Enter department name..." name="me_departments" id="me_department">
                                        </div>
                                    </div>
                    <div class="form-group">
                                    <label for="employee" class="col-sm-3 control-label">Name :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter Office name..." name="me_name" id="me_name"  required>
                                    </div>
                                  </div>
                    <div class="form-group">
                                    <label for="employee" class="col-sm-3 control-label">Telephone :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter telephone..." name="me_telephone"  id="me_telephone" required/>
                                    </div>
                                  </div>
                    <div class="form-group">
                                    <label for="employee" class="col-sm-3 control-label">Email Address|Username:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter Postal Address..." name="me_address" id="me_address"  required>
                                    </div>
                                  </div>
                  
                   
                    <div class="form-group">
                                        <label for="employee" class="col-sm-3 control-label">Role Name :</label>
                                        <div class="col-sm-9">
                                           
                                            <select class="form-control select2" name="me_role" id="me_role" required>
                                                <?php
					   		        include 'includes/conn.php';
					   		$query = "SELECT * FROM `roletb`";
					   		$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		$num = 0;
					   		echo '<option value="0">Select...</option>';
					   		while($row = mysqli_fetch_array($result)) {
					   		    echo '<option value="'.$row['role_ID'].'">'.$row['Name'].'</option>';
					   		}

					   		?>                
                                            </select>
                                        </div>
                                    </div>
                 <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Status</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="me_status" id="me_status" required>
                            <option value="Active">Active</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Inactive">Inactive</option>
							<option value="Reset">Reset Account</option>                    
                      </select>
					</div>
                </div>
             
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editme"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteme">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="me_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="meid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete User?</p>
	                	<h2 class="bold del_me_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteme"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- ----------------- END OF STAKEHOLDERS ------------------------------------>

<div class="modal fade" id="addkra">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>New Key Performance Indicators</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="employee" class="col-sm-3 control-label">Plan</label>
							<div class="col-sm-9">
								<select class="form-control select2" name="agenda" onchange="ShowStrategyArea(this.value)" style="width:100%;"  required>
									<?php
                                        include 'php/conn.php';
										$query = "SELECT * FROM `agendatb` WHERE `Status`='Active'";
										$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
										$num = 0;
										echo '<option value=" ">-- Select --</option>';
										while($row = mysqli_fetch_array($result)) {
											echo '<option value="'.$row['ID'].'">'.$row['Code'].'</option>';
										}
									?>  
								</select>
					
							</div>
						</div>
						<div class="form-group" id="strategyarea_id">
						
						</div>
					
						<div class="form-group">
							<label for="employee" class="col-sm-3 control-label">Priority Area</label>
							<div class="col-sm-9">
								<select class="form-control select2" name="priorityarea" id="priorityarea" style="width:100%;">
									<option value="">Select ....</option>
									<?php
					   		//	include 'php/conn.php'; 
					   		    //	$query = "SELECT * FROM `priorityarea_goal` WHERE `priorityarea_goal_status`='Active' AND `name_type`='priority name'";
					   		    //	$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		    //	$num = 0;
					   		    //	while($row = mysqli_fetch_array($result)) {
					   		        //	echo '<option value="'.$row['priorityarea_goal_id'].'">'.$row['priorityarea_goal_name'].'</option>';
					   		        //}
					   		?>  
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="photo" class="col-sm-3 control-label">KPI Name:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" placeholder="KPI Name" name="indicatorname" required>
							</div>
						</div>
						
						<div class="form-group">
							<label for="employee" class="col-sm-3 control-label">KPI Definition Unit</label>
							<div class="col-sm-9">
								<select class="form-control select2" name="kpi_unit" id="kpi_unit" onchange="ShowKPIUnit(this.value)" style="width:100%;">
									<option value="">Select ....</option>
									<option value="Quantity">Quantity</option>
									<option value="Ratio">Ratio</option>
									<option value="Percentage">Percentage</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="employee" class="col-sm-3 control-label">KPI Unit Name|Symbol</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" placeholder="KPI Unit Name" name="kpi_unit_name"/>
							</div>
						</div>
						<div id="get_kpi_unit">
						    
						</div>
						<div class="form-group">
							<label for="employee" class="col-sm-3 control-label">Status</label>
							<div class="col-sm-9">
								<select class="form-control select2" name="krastatus" id="krastatus" style="width:100%;" required>
									<option value="Active">Active</option>
									<option value="Suspended">Suspended</option>
									<option value="Finished">Finished</option>                    
							</select>     
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
						<label for="employee" class="col-sm-3 control-label">Plan</label>
						<div class="col-sm-9">
						<select class="form-control select2" name="edit_kraagenda" id="edit_kraagenda" onchange="ShowStrategyArea(this.value)" style="width:100%;" required>
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
					<div class="form-group" id="edit_strategyarea_id">
						
					</div>
					<div class="form-group">
							<label for="employee" class="col-sm-3 control-label">Priority Area</label>
							<div class="col-sm-9">
								<select class="form-control select2" name="priorityarea" id="edit_priorityarea" style="width:100%;">
									<option value="">Select ....</option>
								</select>
							</div>
					</div>
				
					<div class="form-group">
						<label for="photo" class="col-sm-3 control-label">KPI Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" placeholder="KPI Name" name="edit_kpi_name"  id="edit_kpi_name" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">KPI Definition Unit</label>
						<div class="col-sm-9">
							<select class="form-control select2" name="edit_kpi_unit" id="edit_kpi_unit" onchange="ShowKPIUnit_e(this.value)" style="width:100%;">
								<option value="">Select ....</option>
								<option value="Quantity">Quantity</option>
								<option value="Ratio">Ratio</option>
								<option value="Percentage">Percentage</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">KPI Unit Name|Symbol</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" placeholder="KPI Unit Name" id="edit_kpi_unit_name" name="edit_kpi_unit_name"/>
						</div>
					</div>
					<div id="get_kpi_unit_e">
						    
					</div>
                   
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Status</label>
						<div class="col-sm-9">
						<select class="form-control select2" name="edit_krastatus" id="edit_krastatus"  style="width:100%;" required>
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

<div class="modal fade" id="updatebaseline">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="del_baseline_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="baselineid" name="baselineid" id="base_id">
				    <input type="hidden" class="kpi_id" name="kpi_id"  id="kpi_id_base">
					<div class="form-group">
                      <label for="employee" class="col-sm-3 control-label">KPI Definition</label>
                      <div class="col-sm-9">
                        <textarea rows="5" class="form-control" placeholder="KPI definition" name="aboutIndicator" id="edit_kpi_definition" required></textarea>
                      </div>
                    </div>
					<div class="form-group">
							<label for="employee" class="col-sm-3 control-label">Baseline Name</label>
							<div class="col-sm-9">
						        <input type="text" class="form-control" placeholder="Enter Baseline name" name="baseline_name" id="baseline_name" />
							</div>
					</div>
					<div class="form-group">
							<label for="employee" class="col-sm-3 control-label">Baseline Value</label>
							<div class="col-sm-9">
							    <input type="text" class="form-control" placeholder="Enter Baseline valu" name="baseline_value" id="baseline_value"/>
							</div>
					</div>
					<div class="form-group">
							<label for="employee" class="col-sm-3 control-label">Baseline Unit</label>
							<div class="col-sm-9">
							    <input type="text" class="form-control" placeholder="Enter Baseline Unit" name="baseline_unit" id="baseline_unit"/>
							</div>
					</div>
					<div class="form-group">
							<label for="employee" class="col-sm-3 control-label">Baseline Year</label>
							<div class="col-sm-9">
						        <input type="text" class="form-control" placeholder="Enter Baseline year" name="baseline_year" id="baseline_year"/>
							</div>
					</div>
					
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Target Name</label>
						<div class="col-sm-9">
							 <input type="text" class="form-control" placeholder="Enter target name" name="target_name" id="target_name"/>
						</div>
					</div>
					<div class="form-group">
						<label for="photo" class="col-sm-3 control-label">Target Value</label>
						<div class="col-sm-9">
						<input type="text" class="form-control" placeholder="Enter target value" name="target_value" id="target_value"/>
						</div>
					</div>
                
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Target Unit</label>
						<div class="col-sm-9">
						    <input type="text" class="form-control" placeholder="Enter target unit" name="target_unit" id="target_unit"/>
						</div>
					</div>
					<div class="form-group">
						<label for="employee" class="col-sm-3 control-label">Target Year</label>
						<div class="col-sm-9">
						     <input type="text" class="form-control" placeholder="Enter Target Year" name="target_year" id="target_year"/>
						</div>
					</div>
					<div class="form-group">
                      <label for="employee" class="col-sm-3 control-label">Data source</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Data source" name="data_source" id="edit_data_source"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="employee" class="col-sm-3 control-label">Frequency</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Frequency" name="frequency" id="edit_frequency" required>
                      </div>
                    </div>
                    <div class="form-group">
                    
                      <label for="employee" class="col-sm-3 control-label">Responsible Sector</label>
                      <div class="col-sm-9">
                          <select class="form-control select2"  multiple="multiple" id="frequency_sector" name="frequency_sector[]" data-placeholder="Select a Sector" style="width: 100%;" required>
                          <?php 
                            include 'php/conn.php'; 
                              $query = "SELECT * FROM `sector`"; 
                              $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                              $num = 0;
                              echo '<option value=" ">-- Select --</option>';
                              while($row = mysqli_fetch_array($result)) {	
                                echo '<option value="'.$row['SectorID'].'">'.$row['SectorName'].'</option>';
                              }         
                          ?>  
                        </select>
                      </div>
                    </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editbaseline"><i class="fa fa-check-square-o"></i> Update</button>
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
	                	<p>Are you sure want to delete KPI?</p>
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

<div class="modal fade" id="deletebaseline">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="kra_name">KPI Baseline</span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="krabaselineid" name="baseline_id" id="baseline_id">
            		<input type="hidden" class="kpiid" name="kpi_id" id="base_kpi_id">
            		<div class="text-center">
	                	<p>Are you sure want to delete KPI baseline?</p>
	                	<h2 class="bold del_baseline_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletebaseline"><i class="fa fa-trash"></i> Delete</button>
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
            	<h4 class="modal-title"><b>New KPI Outcome</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="employee" class="col-sm-3 control-label">Strategy Name</label>
							<div class="col-sm-9">
							<select class="form-control select2" name="agenda" onchange="getOutcome(this.value)" required>
								<option value="">-- Select -- </option>
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
							<label for="employee" class="col-sm-3 control-label">KPI Name</label>
							<div class="col-sm-9">
							<select class="form-control select2" name="kra" id="outcome_statement" required>
									<option value="">-- Select -- </option>
									<!-- <?php
					   		    // include 'php/conn.php';
					   		    // 	$query = "SELECT * FROM `keyarea`";
					   		    // 	$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		    // 	$num = 0;
					   		    // 	while($row = mysqli_fetch_array($result)) {
					   		    // 		echo '<option value="'.$row['IDNo'].'">'.$row['KeyArea'].'</option>';
					   		    // 	}
					   		?>   -->
								</select>
					
							</div>
						</div>
          		  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Outcome Statement</label>
                  	<div class="col-sm-9">
                        <textarea rows="5" class="form-control" placeholder="About Outcome Statement" name="outcome"></textarea>
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Status</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Suspended">Suspended</option>
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
                  	<label for="employee" class="col-sm-3 control-label">KPI Name</label>
                  	<div class="col-sm-9">
                      <select class="form-control select2" name="edit_kraoutcome" id="edit_kraoutcome" required>
                            <?php
                                include 'php/conn.php';
					   		$query = "SELECT * FROM `keyarea`";
					   		$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		$num = 0;
					   		while($row = mysqli_fetch_array($result)) {
					   		    echo '<option value="'.$row['IDNo'].'">'.$row['KeyArea'].'</option>';
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
<!--- ---------------------- END OF outcome ---------------------------------->

<div class="modal fade" id="editdetail">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="detail_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="detailid" name="id">
                <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Title</label>
                  	<div class="col-sm-9">
                     	<input type="text" class="form-control" id="edit_dettitle" name="edit_dettitle" required />
                  	</div>
                </div>
			   
          		  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Explaination</label>
                  	<div class="col-sm-9">
                    	<textarea type="text" row="5" class="form-control" id="edit_detstatement" name="edit_detstatement" required></textarea>
                  	</div>
                </div>
                
			
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editdetails"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deletedetail">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="detail_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="detailid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete agenda details?</p>
	                	<h2 class="bold del_detail_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletedetails"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!--- ---------------------- END OF agenda detail ---------------------------------->


<!-- Delete -->
<div class="modal fade" id="deletepublication">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="pub_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="pubid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete publication?</p>
	                	<h2 class="bold del_pub_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletepublication"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!--- ---------------------- END OF publications ---------------------------------- >



<!-- Edit target -->
<div class="modal fade" id="edittarget">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="tar_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="tarid" name="id">
                  
			    <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Report Type:</label>
                    <div class="col-sm-9">
                        <select class="form-control select2" name="edit_institution" id="edit_institution" style="width: 100%;" onchange="showFP_U(this.value)" required>
                            <option>Annual Form</option>
                                        <option>Quarterly Form</option>
                                        <option>Quarterly Form</option>
                                        <option>Resource Tracking Form</option>
                                        <option>Monitoring Form</option>    
                        </select>
                      
                    </div>
                </div>
          	
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Starting date of Report: </label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" placeholder="Enter telephone..." name="proj_editstartdate"  id="proj_editstartdate" required/>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">End date of reporting:</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                         <input type="date" class="form-control" placeholder="Enter telephone..." name="proj_editenddate"  id="proj_editenddate" required/>
                    </div>
                    </div>
                </div>
			
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="addsubmissiontarget"><i class="fa fa-check-square-o"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit target -->
<div class="modal fade" id="targetactivity">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="tar_name">ASSIGN ACTIVITY</span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="tarid" name="id">
                  
			    <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Activity List(s):</label>
                    <div class="col-sm-9" id="activitytarget">
                       
                    </div>
                </div>
          	
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="addtargetactivity"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
          
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deletetarget">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="tar_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="tarid" name="id">
            		<input type="hidden" class="projid" name="projid">
            		<div class="text-center">
	                	<p>Are you sure want to delete implementors?</p>
	                	<h2 class="bold del_tar_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletetarget"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit target -->
<div class="modal fade" id="editprojkra">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="projkra_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="projkraid" name="id">
					<input type="hidden"  name="proj_id" class="proj_kra_id">
                  
			    <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Project Tittle:</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="projid" id="edit_projid" style="width: 100%;" readonly>
                    </div>
                </div>
				<div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Activity :</label>
                    <div class="col-sm-9">
                        <select class="form-control select2" style="width: 100%;" name="activity">
                            <?php 
                                include 'includes/conn.php'; 
                                $query = "SELECT * FROM `project_activity` WHERE `Project`='$get_id'"; 
                                $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                $num = 0;
                                echo '<option value="0">Select...</option>';
                                while($row = mysqli_fetch_array($result)) {	
                                    echo '<option value="'.$row['activityID'].'">'.$row['Activity'].'</option>';
                                }                  
                            ?>  
                        </select>
                    </div>
                </div>
				<div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Plan :</label>
                    <div class="col-sm-9">
                        <select class="form-control select2" style="width: 100%;" name="plan" onchange="ShowKPIvalue(this.value)" required>
                        	<?php 
                                include 'includes/conn.php'; 
                                $query = "SELECT * FROM `agendatb`"; 
                                $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                $num = 0;
                                echo '<option value="0">Select...</option>';
                                    while($row = mysqli_fetch_array($result)) {	
                                        echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                    }  
                                                    
                            ?>  
                        </select>
                    </div>
                </div>
          		<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Budget Term:</label>
                  	<div class="col-sm-9">
					    <select class="form-control select2" style="width: 100%;" name="budgetterm" id="edit_budgetterm">
                                       <?php
					   		                    include 'includes/conn.php';
					   		$query = "SELECT * FROM `budgetterm`";
					   		$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		$num = 0;
					   		echo '<option value="0">Select...</option>';
					   		while($row = mysqli_fetch_array($result)) {
					   		    echo '<option value="'.$row['ID'].'">'.$row['Item'].'</option>';
					   		}

					   		?>  
                        </select>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Key Performance Indicator (KPI): </label>
                    <div class="col-sm-9"> 
						<select class="form-control select2" style="width: 100%;" name="kra" id="edit_kra">
                                         <?php
					   		        include 'includes/conn.php';
					   		$query = "SELECT * FROM `keyarea`";
					   		$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		$num = 0;
					   		echo '<option value="0">Select...</option>';
					   		while($row = mysqli_fetch_array($result)) {
					   		    echo '<option value="'.$row['IDNo'].'">'.$row['KeyArea'].'</option>';
					   		}

					   		?> 
                        </select>
                    </div>
                </div>
               
			
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editprojectkra"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteprojkra">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="projkra_name"></span></b></h4>
          	</div>
			<?php 
			    $get_proj = '';
				if(isset($_GET['id'])){
					$get_proj = $_GET['id'];
				}
			?>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="projkraid" name="id">
            		<input type="hidden" class="proj_kra_id" name="proj_id" value="<?php echo $get_proj; ?>">
            		<div class="text-center">
	                	<p>Are you sure want to delete KPI? </p>
	                	<h5 class="bold projkraid"></h5>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteprojectkra"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<!-- Edit target -->
<div class="modal fade" id="editproj_res">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="projres_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="projresid" name="id">
					<input type="hidden"  name="proj_id" class="proj_res_id">
                  
			    <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Particular:</label>
                    <div class="col-sm-9">
						<select class="form-control select2" style="width: 100%;" name="particular" id="editrs_particular">
                                       <?php
					   		    include 'includes/conn.php';
					   		$query = "SELECT * FROM `particular`";
					   		$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		$num = 0;
					   		echo '<option value="0">Select...</option>';
					   		while($row = mysqli_fetch_array($result)) {
					   		    echo '<option value="'.$row['Item'].'">'.$row['Item'].'</option>';
					   		}

					   		?>  
                        </select>
                    </div>
                </div>
          		<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Source of Fund:</label>
                  	<div class="col-sm-9">
					  	<select class="form-control select2" style="width: 100%;" name="source" id="editrs_source">
                                         <?php
					   		        include 'includes/conn.php';
					   		$query = "SELECT * FROM `source`";
					   		$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		$num = 0;
					   		echo '<option value="0">Select...</option>';
					   		while($row = mysqli_fetch_array($result)) {
					   		    echo '<option value="'.$row['Item'].'">'.$row['Item'].'</option>';
					   		}

					   		?> 
                        </select>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Total Amount: </label>
                    <div class="col-sm-9"> 
						<input type="number" class="form-control" name="amount" id="editrs_amount" style="width: 100%;"  required/>
                    </div>
                </div>
				<div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Currency: </label>
                    <div class="col-sm-9"> 
						<select class="form-control select2 col-md-6" style="width: 100%;" name="currency" id="editrs_currency" required>
                            <option selected="selected" value="Tshs">Tshs</option>
                            <option value="$(USD)">$(USD)</option>
                        </select>
                    </div>
                </div>
               
			
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="editprojectrsa"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteproj_res">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="projres_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="projresid" name="id">
            		<input type="hidden" class="proj_res_id" name="proj_id">
            		<div class="text-center">
	                	<p>Are you sure want to delete resource?</p>
	                	<h5 class="bold edit_amount"></h5>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteprojectres"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteproj_plan">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="projplan_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="projplanid" name="id">
            		<input type="hidden" class="proj_plan_id" name="proj_id">
            		<div class="text-center">
	                	<p>Are you sure want to delete plan?</p>
	                	<!-- <h5 class="bold edit_proj_plan"></h5> -->
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletemeplan"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteannualrep">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="annual_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="annualid" name="id">
            		<input type="hidden" class="annual_id" name="annual_id">
            		<div class="text-center">
	                	<p>Are you sure want to delete annual report?</p>
	                	<!-- <h5 class="bold edit_proj_plan"></h5> -->
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteannual"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletequarterrep">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="quarter_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="quarterid" name="id">
            		<input type="hidden" class="quarter_id" name="quarter_id">
            		<div class="text-center">
	                	<p>Are you sure want to delete quarter report?</p>
	                	<!-- <h5 class="bold edit_proj_plan"></h5> -->
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletequarter"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="udeletetarget">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="tar_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="tarid" name="id">
            		<input type="hidden" class="projid" name="projid">
            		<div class="text-center">
	                	<p>Are you sure want to delete implementors?</p>
	                	<h2 class="bold del_tar_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="udeletetarget"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="udeletelocation">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="tar_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="tarid" name="id">
            		<input type="hidden" class="projid" name="projid">
            		<div class="text-center">
	                	<p>Are you sure want to delete project location?</p>
	                	<h2 class="bold del_tar_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="udeletelocation"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletelocation">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="tar_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="tarid" name="id">
            		<input type="hidden" class="projid" name="projid">
            		<div class="text-center">
	                	<p>Are you sure want to delete project location?</p>
	                	<h2 class="bold del_tar_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletelocation"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit target -->
<div class="modal fade" id="editfinance">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="fi_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="tarid" name="id">
                  
			    <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Responsible Ministry:</label>
                    <div class="col-sm-9">
                        <select class="form-control select2" name="edit_institution" id="edit_institution" style="width: 100%;" onchange="showFP_U(this.value)" required>
                                           <?php
					   		    include 'includes/conn.php';
					   		$query = "SELECT * FROM `organizationtb`";
					   		$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					   		$num = 0;
					   		echo '<option value="0">Select...</option>';
					   		while($row = mysqli_fetch_array($result)) {
					   		    echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
					   		}

					   		?>  
                        </select>
                      
                    </div>
                </div>
          		<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Responsible Officer:</label>
                  	<div class="col-sm-9">
                         <select class="form-control select2" name="edit_person" id="edit_person" style="width: 100%;" required>
                                         
                        </select>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Starting date of Report: </label>
                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" placeholder="Enter telephone..." name="proj_editstartdate"  id="proj_editstartdate" required/>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">End date of reporting:</label>
                    <div class="col-sm-9"> 
                      <div class="date">
                         <input type="date" class="form-control" placeholder="Enter telephone..." name="proj_editenddate"  id="proj_editenddate" required/>
                    </div>
                    </div>
                </div>
			
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edittarget"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deletefinance">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="finance_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="financeid" name="id">
            		<input type="hidden" class="projid" name="projid">
            		
            		<div class="text-center">
	                	<p>Are you sure want to delete financing?</p>
	                	<h2 class="bold del_finance_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deletefinance"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteactivity">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="activity_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="activityid" name="id">
            		<input type="hidden" class="projid" name="projid">
            		<div class="text-center">
	                	<p>Are you sure want to delete project activity?</p>
	                	<h2 class="bold del_activity_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteactivity"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteattachment">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="attachment_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="attachmentid" name="id">
            		<input type="hidden" class="projid" name="projid">
            		<div class="text-center">
	                	<p>Are you sure want to delete project attachment?</p>
	                	<h2 class="bold del_attachment_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteattachment"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="udeletefinance">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="finance_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="financeid" name="id">
            		<input type="hidden" class="projid" name="projid">
            		
            		<div class="text-center">
	                	<p>Are you sure want to delete financing?</p>
	                	<h2 class="bold del_finance_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="udeletefinance"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="udeleteactivity">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="activity_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="activityid" name="id">
            		<input type="hidden" class="projid" name="projid">
            		<div class="text-center">
	                	<p>Are you sure want to delete project activity?</p>
	                	<h2 class="bold del_activity_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="udeleteactivity"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="udeleteattachment">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="attachment_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="attachmentid" name="id">
            		<input type="hidden" class="projid" name="projid">
            		<div class="text-center">
	                	<p>Are you sure want to delete project attachment?</p>
	                	<h2 class="bold del_attachment_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="udeleteattachment"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_proj">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="proj_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="projid" name="id">
            		<div class="text-center">
	                	<p>Are you sure want to delete Project?</p>
	                	<h2 class="bold del_proj_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="deleteProject"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="submit_proj">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="conf_name">PROJECT SUBMISSION</span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="projid" name="projid" id="projid">
            		<input type="hidden" class="" name="user_id" value="<?php echo $user['id']; ?>">
            		<div class="text-center">
	                	<p><b>Are you sure want to submit Project?</b></p>
	                	<p class="bold del_proj_name"></p>
	            	</div>
	            	
	                <div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Comment: </label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <textarea type="text" rows="6" cols="30" class="form-control" placeholder="Enter comment..." name="submit_comment"  id="submit_comment"></textarea>
                          </div>
                        </div>
                    </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="submitproject"><i class="fa fa-trash"></i> Submit</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm_proj">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="conf_name">PROJECT CONFIRMATION</span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="projid" name="projid" id="projidc">
            		<input type="hidden" class="" name="user_id" value="<?php echo $user['id']; ?>">
            		<div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Project Tittle: </label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <input type="text" class="form-control" placeholder="Enter project..." name="edit_project"  id="edit_project" readonly/>
                          </div>
                        </div>
                    </div>
                    
            		<div class="form-group">
                      	<label for="employee" class="col-sm-3 control-label">Action:</label>
                      	<div class="col-sm-9">
                             <select class="form-control select2" name="edit_action" id="editc_action" style="width: 100%;" required>
                                    <option value="Pending">Pending</option>   
                                    <option value="Accepted">Accept</option>   
                                    <option value="Rejected">Reject</option>  
                            </select>
                      	</div>
                    </div>
                    <div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Reason: </label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <textarea type="text" rows="6" cols="30" class="form-control" placeholder="Enter reason..." name="confirm_reason"  id="editc_reason"></textarea>
                          </div>
                        </div>
                    </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-info btn-flat" name="confirmProject"><i class="fa fa-edit"></i> Confirm</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="accept_proj">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="conf_name">ZPC PROJECT ACCEPTANCE</span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="projid" name="projid" id="projida">
            		<input type="hidden" class="" name="user_id" value="<?php echo $user['id']; ?>">
            		<div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Project Tittle: </label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <input type="text" class="form-control" placeholder="Enter project..." name="edit_project"  id="edit_projecta" readonly/>
                          </div>
                        </div>
                    </div>
                    
            		<div class="form-group">
                      	<label for="employee" class="col-sm-3 control-label">Action:</label>
                      	<div class="col-sm-9">
                             <select class="form-control select2" name="edit_action" id="editc_action" style="width: 100%;" required>
                                    <option value="Pending">Pending</option>   
                                    <option value="Accepted">Accept</option>   
                                    <option value="Rejected">Reject</option>  
                            </select>
                      	</div>
                    </div>
                    <div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Reason: </label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <textarea type="text" rows="6" cols="30" class="form-control" placeholder="Enter reason..." name="confirm_reason"  id="editc_reason"></textarea>
                          </div>
                        </div>
                    </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-info btn-flat" name="acceptProject"><i class="fa fa-edit"></i> Confirm</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<div class="modal fade" id="verify_proj">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="conf_name">PROJECT VERIFICATION</span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            		<input type="hidden" class="projid" name="projid" id="projidv">
            		<input type="hidden" class="" name="user_id" value="<?php echo $user['id']; ?>">
            		<div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Project Tittle: </label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <input type="text" class="form-control" placeholder="Enter project..." name="edit_project"  id="editv_project" readonly/>
                          </div>
                        </div>
                    </div>
            		<div class="form-group">
                      	<label for="employee" class="col-sm-3 control-label">Action:</label>
                      	<div class="col-sm-9">
                             <select class="form-control select2" name="edit_action" id="edit_action" style="width: 100%;" required>
                                    <option value="Pending">Pending</option>   
                                    <option value="Accepted">Accept</option>   
                                    <option value="Rejected">Reject</option>  
                            </select>
                      	</div>
                    </div>
                    <div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Reason: </label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <textarea type="text" rows="6" cols="30" class="form-control" placeholder="Enter reason..." name="edit_reason"  id="edit_reason"></textarea>
                          </div>
                        </div>
                    </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-info btn-flat" name="verifyProject"><i class="fa fa-edit"></i>Verify</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="extension_proj">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	    <h4 class="modal-title"><b><span class="conf_name">PROJECT EXTENSION</span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="includes/controller.php">
            	    <input type="hidden" class="projid" name="projid" id="projidex">
            		<input type="hidden" class="" name="user_id" value="<?php echo $user['id']; ?>">
            		<div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Project Tittle: </label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <input type="text" class="form-control" placeholder="Enter project..." name="edit_project"  id="edit_projectex" readonly/>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      	<label for="employee" class="col-sm-3 control-label">Request Type:</label>
                      	<div class="col-sm-9">
                             <select class="form-control select2" name="edit_action" id="edit_actionex" style="width: 100%;" required>
                                    <option value="Budget">Budget</option>   
                                    <option value="Time">Time</option>   
                                    <option value="Both">Budget & Time</option>  
                            </select>
                      	</div>
                    </div>
                    <div class="form-group">
                        <label for="datepicker_add" class="col-sm-3 control-label">Request Details: </label>
                        <div class="col-sm-9"> 
                          <div class="date">
                            <textarea type="text" rows="6" cols="30" class="form-control" placeholder="Enter Request Details..." name="edit_reason"  id="edit_reasonex"></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      	<label for="employee" class="col-sm-3 control-label">Attachment:</label>
                      	<div class="col-sm-9">
                            <input type="file" class="form-control" name="req_file" />
                      	</div>
                    </div>
            		
                    
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-info btn-flat" name="sendrequest"><i class="fa fa-edit"></i> Request</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

