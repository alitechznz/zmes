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
        DASHBOARD MANAGEMENT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
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
                    <li class="active"><a href="#tab_1" data-toggle="tab"><b>AGENDA DETAILS</b></a></li>
			        <li><a href="#tab_2" data-toggle="tab"><b>PUBLICATIONS</b></a></li>
                    <li><a href="#tab_3" data-toggle="tab"><b>LOCAL GOVERNMENT</b></a></li>
                   
            </ul>
			<div class="tab-content">
                <div class="tab-pane active" id="tab_1">
					          <div class="row">
                      <form action="includes/controller.php" method="post">
                          <div class="col-md-12">
                              <div class="col-md-4">
                               <div class="form-group">
                                      <label>Part:</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="title" class="form-control pull-right" placeholder="Enter tittle..."  required/>
                                      </div>
                                  </div>
                                 
                                  <div class="form-group">
                                      <label>Tittle:</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="title" class="form-control pull-right" placeholder="Enter tittle..."  required/>
                                      </div>
                                  </div>
                                 
                                  <div class="form-group">
                                    <label>Explaination </label>
                                     <textarea class="form-control" name="description" rows="6" cols="150" placeholder="Enter project description..."  required></textarea>
                                  </div>
                                  <div class="form-group">
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                      <button type="submit" class="btn btn-primary btn-flat" name="addagendadetails"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                  </div>

                              </div>
                              <div class="col-md-8">
                                <table id="example1" class="table table-bordered">
                                <thead>
                                    <th>S.N</th>
                                    <th>Tittle</th>
                                    <th>Explaination</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php 
                                    include 'includes/conn.php';
                                    $query = "SELECT * FROM `agendadetail`"; 
                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                      while($row = mysqli_fetch_array($result)) {	
                                          $num +=1;
                                          $id_get = $row['detail_ID'];
                                          $Name = $row['Title'];
                                          $Type = $row['Explaination'];
                                         
                                            echo "<tr>
                                            <td>".$num."</td>
                                            <td>".$Name."</td>
                                            <td>".$Type."</td>
                                            
                                            <td>
                                                <button class='btn btn-success btn-sm editdetail btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Edit</button>
                                                <button class='btn btn-danger btn-sm deletedetail btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
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
                                      <label>Project:</label>
                                     <select class="form-control select2" name="program_id" style="width: 100%;">
                                          <?php 
                                                include 'includes/conn.php'; 
                                                
                                                     $query = "SELECT * FROM `projecttb`"; 
                                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        echo '<option value="'.$row['ID'].'">'.$row['pTitle'].'</option>';
                                                    }  
                                                    
                                            ?>  
                                    </select>
                                  </div>
                             
                                  <div class="form-group">
                                      <label>Report Name:</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="reportname" class="form-control pull-right" placeholder="Enter report name..."  required/>
                                      </div>
                                  </div>
                                 <div class="form-group">
                                    <label>File|Document </label>
                                     <input type="file" name="file_rep" class="form-control pull-right" placeholder="Enter report name..."  required/>
                                  </div>
                                  <div class="form-group">
                                    <label>Status </label>
                                    <select class="form-control" name="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="Public">Public</option>
                                        <option value="Private">Private</option>
                                    </select>
                                    
                                  </div>
                                  <div class="form-group">
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                      <button type="submit" class="btn btn-primary btn-flat" name="addpublication"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                  </div>

                              </div>
                              <div class="col-md-8">
                                <table id="example4" class="table table-bordered">
                                <thead>
                                    <th>S.N</th>
                                    <th>Report Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php 
                                    include 'includes/conn.php';
                                    $kra_details =" ";
                                    $query = "SELECT * FROM `publication`"; 
                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                      while($row = mysqli_fetch_array($result)) {	
                                          $num +=1;
                                          $id_get = $row['pub_ID'];
                                          $Name = $row['ReportName'];
                                          $fileName = $row['Status'];
    
                                         
                                            echo "<tr>
                                            <td>".$num."</td>
                                            <td>".$Name."</td>
                                            <td>".$fileName."</td>
                                            
                                            <td>
                                                <a href='Documents/".$row['FileName']."' class='btn btn-info btn-sm btn-flat download><i class='fa fa-download'></i>Download</a>
                                                <button class='btn btn-danger btn-sm deletepublication btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
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
                      
                    </div><!-- /.row -->	
                </div>

              <!-- /.tab-pane -->
			   <div class="tab-pane" id="tab_4">
                <div class="row">
                    
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
	$("body").on("click", ".editdetail", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editdetail').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".deletedetail", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deletedetail').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".deletepublication", function(e){
    e.preventDefault();
    $('#deletepublication').modal('show');
    var id = $(this).data('id');
    getRow_pub(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'details_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.detailid').val(response.detail_ID);
      $('.detail_name').html(response.Title);
      $('#detailid').val(response.KeyArea_ID);
      $('#edit_dettitle').val(response.Title);
      $('#edit_detstatement').val(response.Explaination)
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

function getRow_pub(id){
  $.ajax({
    type: 'POST',
    url: 'pub_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.pubid').val(response.pub_ID);
      $('.pub_name').html(response.ReportName);
      $('#pubid').val(response.pub_ID);
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
