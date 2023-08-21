<div class="modal fade addagenda" id="modal-default">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">Add New Agenda</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span></button>
          </div>
          <form class="form" method="POST" action="php/model.php" id="agendaform">
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
<div class="modal agendaedit fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="agendaedit">
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
                                <input type="hidden" class="form-control agendaID" value="" id="edit_agendaID" name="agendaID">
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
<div class="modal agendadelete fade" id="agendadelete">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">DELETE AGENDA</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span></button>
          </div>
          <form class="form" method="POST" action="php/model.php">
		        <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control agendaID" value="" id="delete_agendaID" name="agendaID">
                        </div>
                        <div class="text-center">
                            <p>Are you sure you want to delete your agenda?</p>
                            <h2 class="bold agenda_name"></h2>
                        </div>
        			  
                    </div>
		        </div>
		        <div class="modal-footer">
                    <button type="submit" name="deleteagenda" class="btn btn-primary">DELETE</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
          </form>
		</div>
		<!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
</div>
  <!-- Agenda page------------------------------------------------------------------------->


  <!---------------- INDICATOR PAGE......................................................... ----->
  <div class="modal fade addindicator" id="modal-indicator">
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
<!-- Edit -->
<div class="modal indicatoredit fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="indicatoredit">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Edit KRA's Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>  
                <form class="form" method="POST" action="php/model.php" id="editindicatorform">
				    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" value="" id="edit_indicatorID" name="agendaID">
                            </div>
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
                        <button type="submit" class="btn btn-primary float-right" name="editindicator">Save changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
</div>
  <!-- /.modal -->

  <!-- Delete indicator -->
<div class="modal indicatordelete fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="indicatordelete">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">Delete KRA's Details</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>  
            <form class="form" method="POST" action="php/model.php" id="deleteKraform">
				<div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="" id="delete_indicatorID" name="agendaID">
                        </div>
                        <div class="text-center">
                            <p>DELETE KRA?</p>
                            <h2 class="bold agenda_name"></h2>
                        </div>
                    </div>    
				</div>
				<div class="modal-footer">
			        <button type="submit" class="btn btn-primary float-right" name="deletekra">DELETE</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
		</div>
			<!-- /.modal-content -->
	</div>
		<!-- /.modal-dialog -->
</div>
  <!---------------------------- END INDICATOR PAGE ---------------------------------------------->

<!-- -------------    ADD OUTCOME STATEMENT        ------------------------------------->
<div class="modal fade addoutcome" id="modal-outcome">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		    <div class="modal-header">
			    <h4 class="modal-title">Add New Outcome</h4>
			   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			   <span aria-hidden="true">&times;</span></button>
            </div>
            <form class="form" method="POST" action="php/model.php" id="outcomeform">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>KRA</label>
                            <select class="form-control" name="kra_name">
                            <?php 
                                include 'php/conn.php'; 
                                     $query = "SELECT * FROM `keyarea`"; 
                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                    while($row = mysqli_fetch_array($result)) {	
                                        $num +=1;
                                        $ciphering = "AES-128-CTR"; 
                                        $options = 0; 
                                        $decryption_iv = '1234567891011121'; 
                                        $decryption_key = "ZPCME@ali@2020"; 
                                        $decryption=openssl_decrypt ($row['KeyArea'], $ciphering, 
                                                    $decryption_key, $options, $decryption_iv); 
                                        echo '<option value="'.$row['IDNo'].'">'.$decryption.'</option>';
                                     }         
                            ?>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Outcome Statement:</label>
                            <textarea rows="5" class="form-control" placeholder="About Outcome" name="aboutoutcome"></textarea>
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary float-right" name="addoutcome">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
		</div>
	</div>
</div>
  <!-- /.modal -->