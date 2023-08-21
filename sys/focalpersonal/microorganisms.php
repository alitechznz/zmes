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
        Sample List
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Lab Sheet</a></li>
        <li class="active">Sample Info</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li ><a href="index.php">Sample List</a></li>
              <li class="active"><a href="index.php"></a></li>
              <li><a href="#" data-toggle="tab"></a></li>
              
              
            </ul>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sample List</h3>
            </div>
            <!-- /.box-header -->
			 <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sample Code</th>
                  <th>Lab Code</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Date Assigned</th>
				  <th>Due Date</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Sample Code</th>
                  <th>Lab Code</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Date Assigned</th>
				  <th>Due Date</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
			
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
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
