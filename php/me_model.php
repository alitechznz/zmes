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
  
<!-- WORKPLAN MODEL -->
<div class="modal annual fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="agendaedit">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myLargeModalLabel">Project's Workplan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>  
                <form class="form" method="POST" action="php/model.php" id="editagendaform">
				    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" value="" id="edit_agendaID" name="agendaID">
                            </div>
                            <div class="form-group">
                                <label>Project Name:</label>
                                <input type="text" class="form-control" placeholder="Project Name" name="projectname" id="wp_projectname"  readonly>
                            </div>
                            
                            <div class="form-group">
                                 <label>Description Type:</label>
                                 <div class="radio">
                                        <input name="group1" type="radio" id="Option_1" checked>
                                        <label for="Option_1"><b>GOAL/IMPACT</label>                    
                                       
                                        <input name="group1" type="radio" id="Option_2">
                                        <label for="Option_2"><b>OUTCOME</label>  
                                        
                                         <input name="group1" type="radio" id="Option_3">
                                        <label for="Option_3"><b>ACTIVITY</label>   
                                        
                                 </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Indicator:</label>
                                        <input type="text" class="form-control"  name="wp_indicator" id="wp_indicator" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Definition of Indicator:</label>
                                        <textarea col="5" class="form-control" name="wp_indicatordef" id="wp_indicatordef" required></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Baseline</label>
                                        <input type="text" class="form-control" placeholder="baseline" name="wp_baseline" id="wp_basewline" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label>Target</label>
                                        <input type="text" class="form-control" placeholder="Target" name="wp_target" id="wp_target" required/>
                                     </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Source of Data</label>
                                        <input type="text" class="form-control" placeholder="source of data" name="wp_datasource" id="wp_datasource" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Frequency</label>
                                        <input type="text" class="form-control" placeholder="frequency" name="wp_frequency" id="wp_frequency" required/>
                                    </div>
                                 </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Responsible</label>
                                <input type="text" class="form-control" placeholder="responsible" name="wp_responsible" id="wp_responsible" required/>
                            </div>
                               
                            <div class="form-group">
                                 <button type="submit" class="btn btn-primary float-right" name="editagenda">Save</button>
                            </div>
                            
                        </div>
                        <p></p><br /><br />
                        <!-- /.box-body -->   
                        	 <div class="row">
                                 <div class="col-xl-12 col-12">
                                 <div class="table-responsive">
                                            <table id="example6" class="table table-bordered table-striped" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Indicator</th>
                                                        <th>Baseline</th>
                                                        <th>Target</th>
                                                        <th>Data Source</th>
                                                        <th>Frequency</th>
                                                        <th>Responsible</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php 
                                                        /*
                                                        include 'php/conn.php';
        
                                                        $query = "SELECT * FROM `projecttb`"; 
                                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                        $num = 0;
                                                          while($row = mysqli_fetch_array($result)) {	
                                                              $num +=1;
                                                            echo "<tr>
                                                                    <td>".me_decrypt_data($row['Short title'])."</td>
                                                                    <td>".me_decrypt_data($row['Code'])."</td>
                                                                    <td><span class='badge badge-primary-light'>".me_decrypt_data($row['Code'])."</span></td>
                                                                    <td>
                                                                        <button class='btn btn-success btn-sm fl_proj_details' data-id=".$row['ID']." data-toggle='modal' data-target='.agendaedit'><span class='icon-Write'><span class='path1'></span><span class='path2'></span>Details</span></button>
                                                                        <button class='btn btn-success btn-sm fl_proj_annual' data-id=".$row['ID']." data-toggle='modal' data-target='.agendaedit'><span class='icon-Write'><span class='path1'></span><span class='path2'></span></span>Annual</button>
                                                                        <button class='btn btn-success btn-sm fl_proj_quarter' data-id=".$row['ID']." data-toggle='modal' data-target='.agendaedit'><span class='icon-Write'><span class='path1'></span><span class='path2'></span>Quarter</span></button>
                                                                        <button class='btn btn-danger btn-sm fl_proj_track' data-id=".$row['ID']." data-toggle='modal' data-target='.agendadelete'><span class='icon-Trash1'><span class='path1'></span><span class='path2'></span>Resource</span></button>
                                                                    </td>
                                                                  </tr>
                                                                ";
                                                          }
        
        
                                                        function me_decrypt_data($data_x){
                                                            $ciphering = "AES-128-CTR"; 
                                                            $options = 0; 
                                                            $decryption_iv = '1234567891011121'; 
                                                            $decryption_key = "ZPCME@ali@2020"; 
                                                            $decryption=openssl_decrypt ($data_x, $ciphering, 
                                                                    $decryption_key, $options, $decryption_iv); 
                                                            
                                                            return $decryption;
                                                         }
                                                        */
                                                         
                                                     ?>
                                                     <tr>
                                                         <td>Programu ya Ujenzi wa Afisi za Serikali  Zanzibar</td>
                                                         <td>ZPC-2019/20/04</td>
                                                         <td><span class='badge badge-primary-light'>Ongoing</span></td>
                                                         <td></td>
                                                         <td></td>
                                                         <td></td>
                                                         <td></td>
                                                         <td>
                                                            <button class='btn btn-warning btn-sm fl_proj_annual' data-id="1" data-toggle='modal' data-target='.annual'><span class='icon-Write'><span class='path1'></span><span class='path2'></span></span>Edit</button>
                                                            <button class='btn btn-danger btn-sm fl_proj_track' data-id="1" data-toggle='modal' data-target='.track'><span class='icon-Trash1'><span class='path1'></span><span class='path2'></span>Delete</span></button>
                                                         </td>
                                                     </tr>
                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Indicator</th>
                                                        <th>Baseline</th>
                                                        <th>Target</th>
                                                        <th>Data Source</th>
                                                        <th>Frequency</th>
                                                        <th>Responsible</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                 </div>
                             </div>
                                         
                    </div>
                    <div class="modal-footer">
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
