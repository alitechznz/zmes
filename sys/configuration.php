<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/head_menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        BASIC CONFIGURATIONS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Configuration</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
         
			    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><b>BUDGET TERM</b></a></li>
			        <li><a href="#tab_2" data-toggle="tab"><b>SOURCE OF FINANCE</b></a></li>
              <li><a href="#tab_3" data-toggle="tab"><b>FINANCE PARTICULAR</b></a></li>
              <li><a href="#tab_4" data-toggle="tab"><b>SUBMISSION DATE</b></a></li>
              <li><a href="#tab_5" data-toggle="tab"><b>SECTORS</b></a></li>
            </ul>
			      <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
					          <div class="row">
                      <form action="includes/controller.php" method="post">
                          <div class="col-md-12">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Budget Term:</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="term" class="form-control pull-right" placeholder="Enter budget term..."  required/>
                                      </div>
                                  </div>
                                 
                                  <div class="form-group">
                                    <label>Duration </label>
                                    <div class="col-md-12 input-group">
                                        <div class="col-md-6">
                                            <label>From :</label>
                                             <input type="date" class="form-control pull-right" name="from"/>
                                        </div>
                                        <div class="col-md-6">
                                             <label>To :</label>
                                             <input  type="date" class="form-control pull-right" name="to"/>
                                        </div>
                                    </div>
                                    
                                  </div>
                                  <div class="form-group">
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                      <button type="submit" class="btn btn-primary btn-flat" name="addbudgetterm"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                  </div>

                              </div>
                              <div class="col-md-8">
                                <table id="example1" class="table table-bordered">
                                <thead>
                                    <th>S.N</th>
                                    <th>Budget Term</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php 
                                    include 'includes/conn.php';
                                    $kra_details =" ";
                                    $query = "SELECT * FROM `budgetterm`"; 
                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                      while($row = mysqli_fetch_array($result)) {	
                                          $num +=1;
                                          $id_get = $row['ID'];
                                          $Name = $row['Item'];
                                          $Type = $row['Duration'].' - '. $row['DurationTo'];
                                         
                                            echo "<tr>
                                            <td>".$num."</td>
                                            <td>".$Name."</td>
                                            <td>".$Type."</td>
                                            
                                            <td>
                                                <button class='btn btn-success btn-sm editbudgetterm btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Edit</button>
                                                <button class='btn btn-danger btn-sm deletebudgetterm btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
                                            </td>
                                        </tr>";
                                    }
                                   
                                ?>
                                                            
                                
                                </tbody>
                              </table>
                              </div>
                          </div>
                          
                       </form>
                    </div><!-- /.row -->	
                </div> <!-- /.tab-pane -->
			
			          <div class="tab-pane" id="tab_2">
                  <div class="row">
                      <form action="includes/controller.php" method="post">
                          <div class="col-md-12">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Source:</label>
                                      <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                          </div>
                                          <input type="text" name="source" class="form-control pull-right" placeholder="Enter source..."  required/>
                                      </div>
                                  </div>
                                 
                                  <div class="form-group">
                                    <label>Status </label>
                                    <select class="form-control" name="status" >
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    
                                  </div>
                                  <div class="form-group">
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                      <button type="submit" class="btn btn-primary btn-flat" name="addsource"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                  </div>

                              </div>
                              <div class="col-md-8">
                                <table id="example4" class="table table-bordered">
                                  <thead>
                                      <th>S.N</th>
                                      <th>Source</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        include 'includes/conn.php';
                                        $kra_details =" ";
                                        $query = "SELECT * FROM `source`"; 
                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                        $num = 0;
                                          while($row = mysqli_fetch_array($result)) {	
                                              $num +=1;
                                              $id_get = $row['ID'];
                                              $Name = $row['Item'];
                                              $Type = $row['Status'];
                                            
                                                echo "<tr>
                                                <td>".$num."</td>
                                                <td>".$Name."</td>
                                                <td>".$Type."</td>
                                                
                                                <td>
                                                    <button class='btn btn-success btn-sm editsource btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Edit</button>
                                                    <button class='btn btn-danger btn-sm deletesource btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
                                                </td>
                                            </tr>";
                                        }
                                      
                                    ?>
                                                            
                                
                                  </tbody>
                                </table>
                              </div>
                          </div>
                          
                      </form>
                  </div><!-- /.row -->	
                </div>
	  
                <div class="tab-pane" id="tab_3">
                    <div class="row">
                      <form action="includes/controller.php" method="post">
                          <div class="col-md-12">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Particular:</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="particular" class="form-control pull-right" placeholder="Enter particular..."  required/>
                                      </div>
                                  </div>
                                 
                                  <div class="form-group">
                                    <label>Status </label>
                                    <select class="form-control" name="status">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                    
                                  </div>
                                  <div class="form-group">
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                      <button type="submit" class="btn btn-primary btn-flat" name="addparticular"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-8">
                                <table id="example5" class="table table-bordered">
                                <thead>
                                    <th>S.N</th>
                                    <th>Particular</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php 
                                    include 'includes/conn.php';
                                    $kra_details =" ";
                                    $query = "SELECT * FROM `particular`"; 
                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                      while($row = mysqli_fetch_array($result)) {	
                                          $num +=1;
                                          $id_get = $row['ID'];
                                          $Name = $row['Item'];
                                          $Type = $row['Status'];
                                         
                                            echo "<tr>
                                            <td>".$num."</td>
                                            <td>".$Name."</td>
                                            <td>".$Type."</td>
                                            
                                            <td>
                                                <button class='btn btn-success btn-sm editfinancep btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Edit</button>
                                                <button class='btn btn-danger btn-sm deletefinancep btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
                                            </td>
                                        </tr>";
                                    }
                                   
                                ?>
                                                            
                                
                                </tbody>
                              </table>
                              </div>
                          </div>
                          
                       </form>
                    </div><!-- /.row -->	
                </div>

              <!-- /.tab-pane -->
			          <div class="tab-pane" id="tab_4">
                  <div class="row">
                      <form action="includes/controller.php" method="post">
                          <div class="col-md-12">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Budget Term:</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                               <select class="form-control select2" name="term" style="width:100%;" required>
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
                                    <label>Report Type </label>
                                    <select class="form-control" name="reporttype">
                                        <option value="Annual Form">Annual Form</option>
                                        <option value="KPI">KPI</option>
                                        <option value="M&E Plan">M&E Plan</option>
                                        <option value="Quarterly Form">Quarterly Form</option>
                                        <option value="Resource Tracking Form">Resource Tracking Form</option>
                                        <option value="Monitoring Form">Monitoring Form</option>
                                    </select>
                                    
                                  </div>
                                   <div class="form-group">
                                      <label>Deadline:</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="date" name="dateline" class="form-control pull-right"  required/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                      <button type="submit" class="btn btn-primary btn-flat" name="duedate"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                  </div>

                              </div>
                              <div class="col-md-8">
                                <table id="example3" class="table table-bordered">
                                <thead>
                                    <th>S.N</th>
                                    <th>Budget Term</th>
                                    <th>Report Type</th>
                                    <th>Deadline</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php 
                                    include 'includes/conn.php';
                                    $kra_details =" ";
                                    $query = "SELECT * FROM `duedate`"; 
                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                      while($row = mysqli_fetch_array($result)) {	
                                          $num +=1;
                                          $id_get = $row['ID'];
                                          $Name = $row['budgetterm'];
                                          $report = $row['reporttype'];
                                          $Type = $row['dateline'];
                                         
                                            echo "<tr>
                                            <td>".$num."</td>
                                            <td>".$Name."</td>
                                            <td>".$report."</td>
                                            <td>".$Type."</td>
                                            <td>
                                                <button class='btn btn-success btn-sm editduedate btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Edit</button>
                                                <button class='btn btn-danger btn-sm deleteduedate btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
                                                <a href='time_extend.php?xyz=".$id_get."&type=".$report."' class='btn btn-primary btn-sm  btn-flat'><i class='fa fa-edit'></i> Extend</button>
                                            </td>
                                        </tr>";
                                    }
                                   
                                ?>
                                                            
                                
                                </tbody>
                              </table>
                              </div>
                          </div>
                          
                       </form>
                    </div><!-- /.row -->	
                </div>
        
                <div class="tab-pane" id="tab_5">
                  <div class="row">
                      <form action="includes/controller.php" method="post">
                          <div class="col-md-12">
                              <div class="col-md-4">
                                 <div class="form-group">
                                      <label>Sector Name:</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="sector" class="form-control pull-right"  required/>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                          <label>Responsible Ministry <span style="color:red;">*</span></label>
                                          <div class="input-group date">
                                            <div class="input-group-addon">
                                              <i class="fa fa-building"></i>
                                            </div>
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
                                    <label>Status </label>
                                    <select class="form-control" name="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    
                                  </div>
                                   
                                  <div class="form-group">
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                      <button type="submit" class="btn btn-primary btn-flat" name="addsector"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                  </div>

                              </div>
                              <div class="col-md-8">
                                <table id="example6" class="table table-bordered">
                                <thead>
                                    <th>S.N</th>
                                    <th>Sector Name</th>
                                    <th>Responsible Institution</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php 
                                    include 'includes/conn.php';
                                    $kra_details =" ";
                                    $query = "SELECT * FROM `sector`"; 
                                    // $query = "SELECT * FROM `sector`, `organizationtb` WHERE sector.org_id = organizationtb.ID"; 
                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                      while($row = mysqli_fetch_array($result)) {	
                                          $num +=1;
                                          $org_id = $row['org_id'];
                                          $query2 = "SELECT * FROM `organizationtb` WHERE ID ='$org_id'"; 
                                          $result2 = mysqli_query($conn, $query2) or die("Error : ".mysqli_error($conn));
                                          if($row2 = mysqli_fetch_array($result2)) {	
                                              $org_id = $row2['Name'];
                                          }

                                          $id_get = $row['SectorID'];
                                          $Name = $row['SectorName'];
                                          $Status = $row['Status'];
                                        
                                            echo "<tr>
                                            <td>".$num."</td>
                                            <td>".$Name."</td>
                                            <td>".$org_id."</td>
                                            <td>".$Status."</td>
                                            <td>
                                                <button class='btn btn-success btn-sm editsector btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Edit</button>
                                                <button class='btn btn-danger btn-sm deletesector btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
                                            </td>
                                        </tr>";
                                    }
                                   
                                ?>
                                                            
                                
                                </tbody>
                              </table>
                              </div>
                          </div>
                          
                       </form>
                    </div><!-- /.row -->	
                </div>
              <!-- /.tab-pane -->
            </div>
          </div>
		    </div>
	    </div>	
      <!-- /.row -->
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/agenda_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  //Date range picker
    $('#reservation').daterangepicker()
});

$(function(){
	$("body").on("click", ".editbudgetterm", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editbudgetterm').modal('show');
    var id = $(this).data('id');
    getRow_budget(id);
});

$("body").on("click", ".deletebudgetterm", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deletebudgetterm').modal('show');
    var id = $(this).data('id');
    getRow_budget(id);
  });

});

$(function(){
	$("body").on("click", ".editsource", function(e){
    e.preventDefault();
    $('#editsource').modal('show');
    var id = $(this).data('id');
    getRow_source(id);
  });

$("body").on("click", ".deletesource", function(e){
    e.preventDefault();
    $('#deletesource').modal('show');
    var id = $(this).data('id');
    getRow_source(id);
  });

});

$(function(){
	$("body").on("click", ".editfinancep", function(e){
    e.preventDefault();
    $('#editfinancep').modal('show');
    var id = $(this).data('id');
    getRow_particular(id);
  });

$("body").on("click", ".deletefinancep", function(e){
    e.preventDefault();
    $('#deletefinancep').modal('show');
    var id = $(this).data('id');
    getRow_particular(id);
  });

});

$(function(){
	$("body").on("click", ".editduedate", function(e){
    e.preventDefault();
    $('#editduedate').modal('show');
    var id = $(this).data('id');
    getRow_duedate(id);
  });

$("body").on("click", ".deleteduedate", function(e){
    e.preventDefault();
    $('#deleteduedate').modal('show');
    var id = $(this).data('id');
    getRow_duedate(id);
  });

});

$(function(){
	$("body").on("click", ".editsector", function(e){
    e.preventDefault();
    $('#editsector').modal('show');
    var id = $(this).data('id');
    getRow_sector(id);
  });

$("body").on("click", ".deletesector", function(e){
    e.preventDefault();
    $('#deletesector').modal('show');
    var id = $(this).data('id');
    getRow_sector(id);
  });

});

function getRow_budget(id){
  $.ajax({
    type: 'POST',
    url: 'budgetterm_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.termid').val(response.ID);
      $('.term_name').html(response.Item);
      $('#edit_from').val(response.Duration);
      $('#edit_to').val(response.DurationTo);
      $('#edit_term').val(response.Item)
    }, 
    error:function(x,e) {
        if (x.status==0) {
            alert('You are offline!!\n Please Check Your Network.');
        } else if(x.status==404) {
            alert('Requested URL not found.');
        } else if(x.status==500) {
            alert('Internel Server Error.');
        } else if(e=='parsererror') {
            alert('Error.\nParsing JSON Request failed.');
        } else if(e=='timeout'){
            alert('Request Time out.');
        } else {
            alert('Unknow Error.\n'+x.responseText);
        }
    }
  });
}

function getRow_source(id){
  $.ajax({
    type: 'POST',
    url: 'source_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.sourceid').val(response.ID);
      $('.source_name').html(response.Item);
      $('#edit_source').val(response.Item);
      $('#edit_sstatus').val(response.Status);
    }, 
    error:function(x,e) {
        if (x.status==0) {
            alert('You are offline!!\n Please Check Your Network.');
        } else if(x.status==404) {
            alert('Requested URL not found.');
        } else if(x.status==500) {
            alert('Internel Server Error.');
        } else if(e=='parsererror') {
            alert('Error.\nParsing JSON Request failed.');
        } else if(e=='timeout'){
            alert('Request Time out.');
        } else {
            alert('Unknow Error.\n'+x.responseText);
        }
    }
  });
}

function getRow_particular(id){
  $.ajax({
    type: 'POST',
    url: 'particular_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.financepid').val(response.ID);
      $('.financep_name').html(response.Item);
      $('#edit_financep').val(response.Item);
      $('#edit_pstatus').val(response.Status);
    }, 
    error:function(x,e) {
        if (x.status==0) {
            alert('You are offline!!\n Please Check Your Network.');
        } else if(x.status==404) {
            alert('Requested URL not found.');
        } else if(x.status==500) {
            alert('Internel Server Error.');
        } else if(e=='parsererror') {
            alert('Error.\nParsing JSON Request failed.');
        } else if(e=='timeout'){
            alert('Request Time out.');
        } else {
            alert('Unknow Error.\n'+x.responseText);
        }
    }
  });
}

function getRow_duedate(id){
  $.ajax({
    type: 'POST',
    url: 'duedate_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.duedateid').val(response.ID);
      $('.duedate_name').html(response.reporttype);
      $('#edit_budgetterm').val(response.budgetterm);
      $('#edit_reporttype').val(response.reporttype);
      $('#edit_dateline').val(response.dateline)
    }, 
    error:function(x,e) {
        if (x.status==0) {
            alert('You are offline!!\n Please Check Your Network.');
        } else if(x.status==404) {
            alert('Requested URL not found.');
        } else if(x.status==500) {
            alert('Internel Server Error.');
        } else if(e=='parsererror') {
            alert('Error.\nParsing JSON Request failed.');
        } else if(e=='timeout'){
            alert('Request Time out.');
        } else {
            alert('Unknow Error.\n'+x.responseText);
        }
    }
  });
}

function getRow_sector(id){
  $.ajax({
    type: 'POST',
    url: 'sector_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.sectorid').val(response.SectorID);
      $('.sector_name').html(response.SectorName);
      $('#edit_sector').val(response.SectorName);
      $('#edit_statuss').val(response.Status);
    }, 
    error:function(x,e) {
        if (x.status==0) {
            alert('You are offline!!\n Please Check Your Network.');
        } else if(x.status==404) {
            alert('Requested URL not found.');
        } else if(x.status==500) {
            alert('Internel Server Error.');
        } else if(e=='parsererror') {
            alert('Error.\nParsing JSON Request failed.');
        } else if(e=='timeout'){
            alert('Request Time out.');
        } else {
            alert('Unknow Error.\n'+x.responseText);
        }
    }
  });
}
</script>
</body>
</html>
