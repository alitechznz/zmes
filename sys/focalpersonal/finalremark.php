<?php include 'includes/session.php'; ?>
<?php include 'head.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
   <?php include 'header.php'; ?>
  
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
   <?php include 'menu.php'; ?>

  <!-- /.content-wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
        
      <h1>
        Final Remarks For Lab Worksheet
        <small>Sample Code. <?php echo $_GET['code']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Lab Sheet</a></li>
        <li class="active">Final Remark#:</li>
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
              <li class="active"><a href="#tab_8" data-toggle="tab"><b>Final Remarks</b></a></li>
            </ul>
	<div class="tab-content">
        
                <!-- /.tab-pane -->
			   <div class="tab-pane active" id="tab_8">
                   <!-- prepare the summary of the lab test -->
                    <div class="box-body">
                        <div class="row">
                            
                            <div class="col-md-4">
							  <h5> ANALYST REMARK</h5>
							   <?php 
							     
							      $getcode =$_GET['code'];
								 //  $getrole =$_GET['role'];
							      $getdate ='';
							     $getremark ='';
								 $analysedBy ='';
							      include 'includes/conn.php';
							      $sql = "SELECT * FROM `labremark` WHERE SampleID='$getcode'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          $getdate = $row['date'];
									  $getremark = $row['remarks'];
									  $analysedBy = $row['analysedBy'];
							      }
							      
							   ?>
							    
							   <div class="form-group">
            					  <label for="exampleInputEmail1">Analysed by</label>
            					  <input type="text" class="form-control" id="" placeholder="Analysed by" name="analysedBy" value="<?php echo $analysedBy; ?>" readonly>
            					</div>
            					<div class="form-group">
                                  <label>Remarks</label>
                                  <textarea class="form-control" placeholder="Remarks ..." name="Remarks" readonly><?php echo $getremark; ?></textarea>
                                </div>
            					
            					<div class="form-group">
            					  <label for="exampleInputEmail1">Date Remarked</label>
            					  <input type="date" class="form-control" id="" placeholder="Date" name="Date" value="<?php echo $getdate; ?>" readonly>
            					</div>
                             
                            </div>
							<div class="col-md-4">
							   <h5> CHECKER REMARK</h5>
							    <?php 
							     
							      $getcode =$_GET['code'];
								 //  $getrole =$_GET['role'];
							      $getdate ='';
							     $getremark ='';
								 $analysedBy ='';
							      include 'includes/conn.php';
							      $sql = "SELECT * FROM `sample_submit` WHERE SampleCode='$getcode'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          $getdate = $row['FChecker_date'];
									  $getremark = $row['FChecker_Comment'];
									  $analysedBy = $row['Checker'];
							      }
							      
							   ?>
							   
							     
							   <div class="form-group">
            					  <label for="exampleInputEmail1">Checked by</label>
            					  <input type="text" class="form-control" id="" placeholder="Checked by" name="checkedby" value="<?php echo $analysedBy; ?>" readonly>
            					</div>
            					<div class="form-group">
                                  <label>Remarks</label>
                                  <textarea class="form-control" placeholder="Remarks ..." name="Remarks" readonly><?php echo $getremark; ?></textarea>
                                </div>
            					
            					<div class="form-group">
            					  <label for="exampleInputEmail1">Date Remarked</label>
            					  <input type="date" class="form-control" id="" placeholder="Date" name="Date" value="<?php echo $getdate; ?>" readonly>
            					</div>
							</div>
                            
							<div class="col-md-4">
                               <?php 
							    
							      $getcode =$_GET['code'];
								 //  $getrole =$_GET['role'];
							      $getdate ='';
							     $getremark ='';
								 $getcommand ='';
							      include 'includes/conn.php';
							      $sql = "SELECT * FROM `sample_submit` WHERE SampleCode='$getcode'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          $getdate = $row['FHead_date'];
									  $getremark = $row['FHead_Comment'];
									  $getcommand = $row['FHead_Command'];
							      }
							      
							   ?>
								  
							<form role="form" action="finished.php" method="post" enctype="multipart/form-data">
                                 <!-- text input -->
                                
							   
								<div class="form-group">
            					  <label for="exampleInputEmail1">Head</label>
            					  <input type="text" class="form-control" id="" placeholder="Analysed by" name="analysedBy" value="<?php echo $user['Fullname']; ?>" readonly>
            					</div>
								<div class="form-group">
								   <select class="form-control select2" name="command" readonly>
                                         <option selected="selected" value="<?php echo $getremark; ?>"><?php echo $getremark; ?></option>
                                         <option value="Fail">Fail</option>
										 <option value="Pass">Pass</option>
										 <option value="Redo">Do Again</option>
									</select>
								</div>
            					<div class="form-group">
                                  <label>Remarks</label>
                                  <textarea class="form-control" placeholder="Remarks ..." name="comment" readonly> <?php echo $getcommand; ?></textarea>
                                </div>
            					
            					<div class="form-group">
            					  <label for="exampleInputEmail1">Date Remarked</label>
            					  <input type="date" class="form-control" id="" placeholder="Date" name="Date" value="<?php echo $getdate; ?>" readonly>
            					</div>
								
                              
                                
                              </form>
                            </div>
                        </div>
                    </div>
              </div>
              <!-- /.tab-pane -->
            </div>
           </div>
		</div>
	</div>	
      <!-- /.row -->
</section>
	 <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include 'footer.php'; ?>
 
<!-- jQuery 3 -->
 <!-- jQuery 3 -->
 <!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
     <!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5();
  });
  
   $(function () {
    // Replace the <textarea id="editor2"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor');
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5();
  });
</script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>

$(function(){
   alert("hi");
  
   $("body").on("click", ".methoddelete", function(e){
	   alert("hi");
    e.preventDefault();
    $('#methoddelete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  
  //$('.assign').click(function(e){
  $("body").on("click", ".equipmentdelete", function(e){
    e.preventDefault();
    $('#equipmentdelete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

/*
 $("body").on("click", ".reagentdelete", function(e){
    e.preventDefault();
    $('#reagentdelete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


 $("body").on("click", ".remarkdelete", function(e){
    e.preventDefault();
    $('#remarkdelete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
*/
 $("body").on("click", ".resultdelete", function(e){
    e.preventDefault();
    $('#resultdelete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


  $(function () {
        $('#example1').DataTable();
        $('#example2').DataTable();
			 
			  //Initialize Select2 Elements
            
             //Flat red color scheme for iCheck
             $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                 checkboxClass: 'icheckbox_flat-green',
                 radioClass: 'iradio_flat-green'
             })
         });

  $(document).ready(function () {
    $('.sidebar-menu').tree();
	
	
  })
  

function getRow(id){
	//alert('Hi ali');
	alert(id);
  $.ajax({
    type: 'POST',
    url: 'headsample_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
    $('.empid').val(response.Submit_ID);
    //$('#submit_id').val(response.Submit_ID);
      //$('.del_employee_name').html(response.Fullname);
      
      
    }
  });
}



</script>



</body>
</html>
