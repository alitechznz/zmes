<div class="modal fade details" id="modal-default">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">Project Details</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span></button>
          </div>
          <form class="form" method="POST" action="php/model.php" id="fl_detailsform">
		  <div class="modal-body">
                           
                                    <div class="box-body">
                                       
                                         <div class="form-group">
                                            <label>Agenda Name:</label>
                                            <input type="text" class="form-control" placeholder="Agenda name" name="agendaname" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Abbreviation Name|Code ID:</label>
                                            <input type="text" class="form-control" placeholder="Agenda code" name="code" required>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date:</label>
                                                <input type="date" class="form-control"  name="startdate" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Expected End Date:</label>
                                                <input type="date" class="form-control" name="enddate" required>
                                            </div>
                                        </div>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label>About Agenda</label>
                                            <textarea rows="5" class="form-control" placeholder="About agenda" name="about"></textarea>
                                        </div>
                                        <div class="form-group">
                                             <label>Status</label>
                                             <select class="form-control" name="status" required>
                                                <option value="Active">Active</option>
                                                <option value="Suspended">Suspended</option>
                                                <option value="Finished">Finished</option>
                                              
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                   
		  </div>
		  <div class="modal-footer">
            <button type="submit" class="btn btn-primary float-right" name="addagenda">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </form>
		</div>
		<!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->
<!-- Edit -->
<div class="modal annual fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="agendaedit">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Edit Agenda's Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>  
                <form class="form" method="POST" action="php/model.php" id="editagendaform">
				    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" value="" id="edit_agendaID" name="agendaID">
                            </div>
                            <div class="form-group">
                                <label>Agenda Name:</label>
                                <input type="text" class="form-control" placeholder="Agenda Name" name="edit_agendaname" id="edit_agendaname"  required>
                            </div>
                            <div class="form-group">
                                <label>Abbreviation Name|Code ID:</label>
                                <input type="text" class="form-control" placeholder="Agenda code" name="edit_code" id="edit_code" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Date:</label>
                                        <input type="date" class="form-control"  name="edit_startdate" id="edit_startdate" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expected End Date:</label>
                                        <input type="date" class="form-control" name="edit_enddate" id="edit_enddate" required>
                                    </div>
                                </div>
                            </div>
                                      
                            <div class="form-group">
                                <label>About Agenda</label>
                                <textarea rows="5" class="form-control" placeholder="About agenda" name="edit_about" id="edit_about"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="edit_status" id="edit_status" required>
                                    <option value="Active">Active</option>
                                    <option value="Suspended">Suspended</option>
                                    <option value="Finished">Finished</option>
                                              
                                </select>
                            </div>
                        </div>
                                    <!-- /.box-body -->        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-right" name="editagenda">Save changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
</div>
  <!-- /.modal -->

  <!-- Delete Agenda -->
<div class="modal quarter fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="agendadelete">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">Delete Agenda's Details</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>  
            <form class="form" method="POST" action="php/model.php" id="deleteagendaform">
				<div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="" id="delete_agendaID" name="agendaID">
                        </div>
                        <div class="text-center">
                            <p>DELETE Agenda?</p>
                            <h2 class="bold agenda_name"></h2>
                        </div>
                    </div>    
				</div>
				<div class="modal-footer">
			        <button type="submit" class="btn btn-primary float-right" name="delete_agenda">DELETE</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
		</div>
			<!-- /.modal-content -->
	</div>
		<!-- /.modal-dialog -->
</div>
  <!-- /.modal -->
  <!-- Agenda page------------------------------------------------------------------------->


  <!---------------- INDICATOR PAGE......................................................... ----->
 <div class="modal fade track" id="modal-track">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">Add New KRA</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span></button>
          </div>
            <form class="form" method="POST" action="php/model.php" id="indicatorform">
                <div class="modal-body">
                                
                    <div class="box-body">
                                            
                        <div class="form-group">
                            <label>Agenda Name:</label>
                            <select class="form-control" name="agenda">
                            <?php 
                                include 'php/conn.php'; 
                                     $query = "SELECT * FROM `agendatb`"; 
                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                    while($row = mysqli_fetch_array($result)) {	
                                        $num +=1;
                                        $ciphering = "AES-128-CTR"; 
                                        $options = 0; 
                                        $decryption_iv = '1234567891011121'; 
                                        $decryption_key = "ZPCME@ali@2020"; 
                                        $decryption=openssl_decrypt ($row['Code'], $ciphering, 
                                                    $decryption_key, $options, $decryption_iv); 
                                        echo '<option value="'.$row['ID'].'">'.$decryption.'</option>';
                                     }         
                            ?>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label>KRA Name:</label>
                            <input type="text" class="form-control" placeholder="KRA Name" name="indicatorname">
                        </div>
                        <div class="form-group">
                            <label>About KRA</label>
                            <textarea rows="5" class="form-control" placeholder="About KRA" name="aboutIndicator"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="Active">Active</option>
                                <option value="Suspended">Suspended</option>
                                <option value="Inactive">Inactive</option>
                                            
                            </select>
                        </div>
                                               
                    </div>
                                            <!-- /.box-body -->
                                        
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary float-right" name="addindicator">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
		</div>
		<!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->
