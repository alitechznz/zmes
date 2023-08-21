<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
   <?php include 'header.php'; ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
   <?php include 'menu.php';   ?>   <!-- /.search form -->

  <!-- /.content-wrapper -->
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laboratory Information Management System (LIMS)
       
      </h1>
      
    </section>

     <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Reagents Type</h3>

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
                <div class="col-md-4 box-body">
                 <form role="form" action="php/schoolInfo.php" method="post" enctype="multipart/form-data">
                     <!-- text input -->
                    <div class="form-group">
                  <label for="exampleInputEmail1">Reagent Name </label>
                  <input type="text" class="form-control" id="" placeholder="Enter email" name="name">
                </div>
				
				 
			  
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" placeholder="Enter Slogan ..." name="slogan" required></textarea>
                    </div>
                   
                    <div class="form-group">
                         <label>
								<input type="checkbox" class="flat-red" value="" checked name="status"> Active
                         </label>
                    </div>
					
          
                    <div class="box-footer">
                         <button type="submit" class="btn btn-success">Save</button>
						  <button type="button" class="btn btn-primary">Clear</button>
                    </div>
                  </form>
                </div>
                 <div class="col-md-8">
                      <div class="box">
                           <br />
                        <!-- /.box-header -->
                        <div class="box-body">
                             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Reagent Name</th>
                  <th>Comments</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
				<?php 
				  include 'php/connection.php';
				   $query = "SELECT * FROM `schoolinfo`"; 
					$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					$num = 1;
						while($row = mysqli_fetch_array($result)) {	
						
				
               echo '<tr>';
                  echo '<td>'.$num.'</td>';
                  echo '<td>'.$row['SchoolName'].'</td>';
                  echo '<td>'.$row['PhoneNo'].'</td>';
                  echo '<td>'.$row['Address'].'</td>';
                  
                echo '</tr>';
				$num = $num + 1;
               		}								
				?>
                </tbody>
               
              </table>
                        </div>
                      </div>
               </div>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<!-- jQuery 3 -->
 

  <?php include 'footer.php'; ?>

  </div>
<!-- ./wrapper -->

 <!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
     <!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
         $(function () {
             $('#example1').DataTable();

             //iCheck for checkbox and radio inputs
             $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                 checkboxClass: 'icheckbox_minimal-blue',
                 radioClass: 'iradio_minimal-blue'
             })
             //Red color scheme for iCheck
             $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                 checkboxClass: 'icheckbox_minimal-red',
                 radioClass: 'iradio_minimal-red'
             })
             //Flat red color scheme for iCheck
             $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                 checkboxClass: 'icheckbox_flat-green',
                 radioClass: 'iradio_flat-green'
             })
         });
</script>
</body>
</html>
