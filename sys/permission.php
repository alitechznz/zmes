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
          USER ROLE AND PERMISSION
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Role & Permission</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])) {
            echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])) {
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
                    <li class="active"><a href="#tab_1" data-toggle="tab"><b>CREATE ROLE & PERMISSION</b></a></li>
			        <li><a href="#tab_2" data-toggle="tab"><b>VIEW ROLE & PERMISSION</b></a></li>
                </ul>
			    <div class="tab-content">
			        <div class="tab-pane active" id="tab_1">
			             <div class="row">
                            <div class="col-xs-12">
                              <div class="box">
                                
                                   <div class="box-body">
                                       <div class="box-header">
                                         
                                       </div>
                                           <form action="includes/controller.php" method="post">
                                                <?php
                                             if(isset($_GET['id'])) {
                                                 $get_id = $_GET['id'];
                                             } else {
                                                 $get_id = 0;
                                             }
?>
                                           
                                             <div class="col-md-12">
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Role Name :</label>
                                                         <div class="input-group">
                                                          <div class="input-group-addon">
                                                          <i class="fa fa-building"></i>
                                                          </div>
                                                          <input type="text" class="form-control" placeholder="Enter role name..." name="rolename"  required/>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </div>
                                               <?php include 'role.php'; ?>
                                
                                              <div class="col-md-12">
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                  <button type="submit" class="btn btn-primary btn-flat" name="saverole"><i class="fa fa-save"></i> Save</button>
                                                </div>
                                              </div>
                                           </form>
                                           
                                        </div><!-- /.row -->	
                                    </div> <!-- /.tab-pane -->
                                   
                                                      
                                </div>
                           
                           </div>
			        </div>
			        <div class="tab-pane" id="tab_2">
			             <div class="row">
                            <div class="col-xs-12">
                              <div class="box">
                                
                                   <div class="box-body">
                                       <div class="box-header">
                                         
                                       </div>
                                           <form action="includes/controller.php" method="post">
                                                <?php
 if(isset($_GET['id'])) {
     $get_id = $_GET['id'];
 } else {
     $get_id = 0;
 }
?>
                                                 
                                             <div class="col-md-12">
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Role Name :</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                            <i class="fa fa-building"></i>
                                                            </div>
                                                            <select class="form-control select2" name="role_name" onchange="showPermission(this.value)" style="width:100%;" required>
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
                                                  </div>
                                              </div>
                                               <div class="col-md-12" style="margin: 0px 0%; padding: 0px 3%;" id="UpdateRole">
                                                   <!-- here will be written permission -->
                                               </div>
                                              
                                
                                              <div class="col-md-12">
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                  <button type="submit" class="btn btn-primary btn-flat" name="updaterole"><i class="fa fa-save"></i> Update</button>
                                                </div>
                                              </div>
                                           </form>
                                           
                                        </div><!-- /.row -->	
                                    </div> <!-- /.tab-pane -->
                                   
                                                      
                                </div>
                           
                           </div>
			        </div>
			    </div>
			</div>
		</div>
	 </div>
    
       
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/agenda_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$("body").on("click", ".editagenda", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editagenda').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".deleteagenda", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deleteagenda').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".photo", function(e){
 // $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
	//alert('Hi ali');
	//alert(id);
  $.ajax({
    type: 'POST',
    url: '',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.agendaid').val(response.ID);
      $('.agenda_name').html(response.Name);
      $('#edit_code').val(response.Code);
      $('#edit_agendaname').val(response.Name);
      $('#edit_startdate').val(response.StartDate);
      $('#edit_enddate').val(response.EndDate);
      $('#edit_about').val(response.Explaination);
      $('#edit_status').val(response.Status)
      //$('#position_val').val(response.position_id).html(response.Status);
    //  $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
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
