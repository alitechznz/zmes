<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
   <?php include 'header.php'; ?>
   <?php include 'php/connection.php';?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
   <?php include 'menu.php';   ?>   <!-- /.search form -->

  <!-- /.content-wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        School
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> School</a></li>
        <li class="active">Class Info</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li ><a href="AddTeacher.php.php">Add Teacher Details</a></li>
              <li ><a href="Teachereducation.php.php">Add Education Background</a></li>
              <li ><a href="teacherlicence.php">Licence Information</a></li>
              <li class="active"><a href="AssignSubject.php">Assign Subject/Class</a></li>
              
              
            </ul>
          <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Teacher Details</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="row">
			<form method="POST" action="php/AddStaff.php">
                
				<div class="box-body">
              <div class="box-body">
              <div class="row">
                <div class="col-xs-3">
				<label>Teacher ID</label>
                  <input type="text" class="form-control" name="id">
                </div>
                <div class="col-xs-3">
				<label>Teacher Name</label>
                  <input type="text" class="form-control" name="name">
                </div>
				 <div class="col-xs-3">
				<label>Teacher License No</label>
                  <input type="text" class="form-control" name="name">
                </div>
				<div class="col-xs-3">
				<label>Registration No</label>
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
                
            
            
                   
              
                
            
        
		 <div class="box-body">
              <div class="row">
                
                <div class="col-xs-3">
				<label>  School</label>
                  <input type="text" class="form-control" name="name">
                </div>
				
				<div class="col-xs-3">
				<label>  Subject</label>
                  <input type="text" class="form-control" name="name">
                </div>
				
				<div class="col-xs-3">
				<label>  Class</label>
                  <input type="text" class="form-control" name="name">
                </div>
				
				<div class="col-xs-3">
				<label>  Issuing Authority</label>
                  <input type="text" class="form-control" name="name">
                </div>
				
				 <div class="col-xs-3">
				<label> Start Date  </label>
                  <input type="date" id="datepicker" class="form-control" name="dor">
                </div>
				 
				 <div class="col-xs-3">
				<label> End Date  </label>
                  <input type="date" id="datepicker" class="form-control" name="dor">
                </div>
                
        
			<div class="box-body">
              <div class="row">
                
                <div class="col-xs-3">
				<label> Licence Condition</label>
                  <textarea type="text" class="form-control" name="name"></textarea>
                </div>
				
				
              </div>
            </div>
			
        <!-- /.box-body -->
      </div>
	   <div class="form-group">
                         <label>
								<input type="checkbox" class="flat-red" name="status" checked> Active
                         </label>
                    </div>
					
          
                    <div class="box-footer" align="center">
                         <button type="submit" class="btn btn-success">Save</button>
						 <button type="button" class="btn btn-primary">Clear</button>
                    </div>
                  </form>
            </div>
            </div>
      <!-- /.box -->

          <!-- Default box -->
		  
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
	
  </div>
  <!-- /.content-wrapper -->
 <?php include 'footer.php'; ?>
<!-- jQuery 3 -->
 <!-- jQuery 3 -->
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
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
</script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
	
	
  })
</script>



</body>
</html>
