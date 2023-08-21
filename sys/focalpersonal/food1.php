<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<head>
    
</head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
   <?php include 'header.php'; ?>
   <?php ?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
   <?php include 'menu.php';   ?>   <!-- /.search form -->

  <!-- /.content-wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
        
      <h1>
        Food Lab Worksheet
        <small>F03/LSD/SOP/004 Rev. #:01</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Lab Sheet</a></li>
        <li class="active">Lab code #: 001</li>
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
							<!------ Include the above in your HEAD tag ---------->
            <div class="row bs-wizard">
				<div class="col-md-3"></div>
			
			     <div class="col-xs-1 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1<span style="background-color: red; color: white;border-radius: 10px;">
								 </span></div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"></div>
                </div>
                <div class="col-xs-1 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 2<span style="background-color: red; color: white;border-radius: 10px;">
								
							  </span></div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"></div>
                </div>
                
                <div class="col-xs-1 bs-wizard-step active">
                  <div class="text-center bs-wizard-stepnum">Step 3<span style="background-color: red; color: white;border-radius: 10px;">
								
							  </span></div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"></div>
                </div>
                
                <div class="col-xs-1 bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"> </div>
                </div>
               <div class="col-xs-1 bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum">Step 5</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"> </div>
                </div>
               
			   <div class="col-xs-1 bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum">Step 6</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"> </div>
                </div>
				
				
            </div>
             <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
		
	</div>
    <div class="row">
        <div class="col-xs-12">
         
			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><b>Sample Info</b></a></li>
              <li><a href="#tab_2" data-toggle="tab"><b>Test Method</b></a></li>
              <li><a href="#tab_3" data-toggle="tab"><b>Equipment & Glassware</b></a></li>
                <li><a href="#tab_5" data-toggle="tab"><b>Reagents & Chemicals</b></a></li>
			  <li><a href="#tab_4" data-toggle="tab"><b>Sample Preparation</b></a></li>
              <li><a href="#tab_6" data-toggle="tab"><b>Test Performed</b></a></li>
                <li><a href="#tab_7" data-toggle="tab"><b>Summary Review</b></a></li>
            </ul>
	<div class="tab-content">
              <div class="tab-pane active" id="tab_1">
    
					<div class="row">
							<div class="col-md-4 box-body">
							   <form role="form" method="POST" action="php/labSampleInfo.php">
							   <!-- text input -->
							   <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							      $getname =$_GET['samplename'];
							   ?>
							   <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />

								  <!-- Date -->
								  <div class="form-group">
									<label>Date Sample Received by Analyst:</label>
									<div class="input-group date">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									  <input type="date" name="date" class="form-control pull-right " id="datepicker" required>
									</div>

									<!-- /.input group -->
								  </div>
								  <!-- /.form group -->
								 
								<div class="form-group">
								  <label>Name of the Product :</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-building"></i>
									  </div>
									   <input type="text" class="form-control" placeholder="Enter Name..." name="product" value="<?php echo $getname; ?>" readonly>
									</div>
								</div>
								<div class="form-group">
								  <label>Application No /Customer Code No :</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-building"></i>
									  </div>
									   <input type="text" class="form-control" placeholder="Enter Name..." name="custCode" required>
									</div>
								</div>
								<div class="form-group">
								   <div class="checkbox">
									 <label>
										 <input type="checkbox" name="status" class="flat-red "  required> Accept
									</label>
								   </div>
								</div>

								<div class="box-footer">
									  <button type="submit" name="save" class="btn btn-success">Save</button>
									 <button type="button" class="btn btn-primary">Clear</button>
								</div>
							  </form>
							</div>
						<div class="col-md-8">
						
						</div>
					<!-- /.col-8 -->
                 </div><!-- /.row -->	
            </div> <!-- /.tab-pane -->
	  
                        <div class="tab-pane" id="tab_2">
                  		<div class="row">
							<div class="col-md-4 box-body">
							   <form role="form" method="POST" action="php/labTestMethod.php">
							   <!-- text input -->
							     <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />

								<div class="form-group">
								  <label>Test Method:</label>
								 <select class="form-control select2" name="testMethod">
                                         <option selected="selected"></option>
                                        <?php 
										 require('includes/conn.php');
											$query="SELECT Method FROM lab_method";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value='.$row['Method'].'>'.$row['Method'].'</option>';
											}
											mysqli_close($conn);
									    ?>
									</select>
								</div>
								  <!-- Date -->
								 
								<div class="form-group">
								  <label>Product Specification:</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-building"></i>
									  </div>
									   <input type="text" class="form-control" placeholder="Enter Name..." name="description" required>
									</div>
								</div>
								
								<div class="box-footer">
									  <button type="submit"name="save" class="btn btn-success">Save</button>
									 <button type="button" class="btn btn-primary">Clear</button>
								</div>
							  </form>
							</div>
						<div class="col-md-8">
								 
						</div>
					<!-- /.col-8 -->
                 </div><!-- /.row -->	
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="row">
							<div class="col-md-4 box-body">
							   <form role="form" method="POST" action="php/Addclass.php">
							   <!-- text input -->
								<div class="form-group">
								  <label>Name:</label>
										 <select class="form-control select2" name="equipment" onchange="showUser(this.value)  required>
                                         <option selected="selected"></option>
                                        <?php 
										 require('includes/conn.php');
											$query="SELECT Name FROM Equipment";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value='.$row['Name'].'>'.$row['Name'].'</option>';
											}
											mysqli_close($conn);
									    ?>
									</select>
								</div>
								 
								 
								<div id="hapa">
								  
								</div>

								<div class="box-footer">
									  <button type="submit" class="btn btn-success">Add</button>
									 <button type="button" class="btn btn-primary">Clear</button>
								</div>
							  </form>
							</div>
						<div class="col-md-8">
								  <div class="box">
									<!-- /.box-header -->
									<div class="box-body">
										 <table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th>S/N</th>
							  <th>Name</th>
							  <th>Code Number</th>
							  <th>Calibration Status</th>
							  <th>Action</th>
							</tr>
							</thead>
							 <tbody>
							
							
							 <?php 
							 // include 'php/connection.php';
							  // $query = "SELECT * FROM `classtable`"; 
								//$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
							//	$num = 1;
								//	while($row = mysqli_fetch_array($result)) {	
								//	
							
								//echo '<tr>';
								//echo '<td>'.$num.'</td>';
								//echo '<td>'.$row['levelname'].'</td>';
								//echo '<td>'.$row['classrep'].'</td>';
				//				echo '<td>'.$row['Status'].'</td>';
								 
							 
							  
							//  echo "<td><a href=''><i class='fa fa-fw fa-pencil' alt='Edit' tittle='Edit'></i></a>
							//  <a href='phpcode/deletelevel.php?id=".$row['classID']."' style='color: red;' alt='Delete' tittle='Delete'><i class='fa fa-fw fa-trash-o'></i></a></td>";
							//echo '</tr>';
							//$num = $num + 1;
							//	}								
							?>
							</tbody>
						  </table>
						</div>
					  </div>
					</div>
					<!-- /.col-8 -->
                 </div><!-- /.row -->	
              </div>
              <!-- /.tab-pane -->
			     <div class="tab-pane" id="tab_4">
                   <div class="row">
						<div class="col-md-12">
						  <div class="box box-info">
							<div class="box-header">
							  <h3 class="box-title">Sample Preparation (if applicable)
								<small>(Describe sample preparation steps actually performed)</small>
							  </h3>
							  <!-- tools box -->
							  <div class="pull-right box-tools">
								<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
										title="Collapse">
								  <i class="fa fa-minus"></i></button>
								<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
										title="Remove">
								  <i class="fa fa-times"></i></button>
							  </div>
							  <!-- /. tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body pad">
							  <form  method="post"  action="php/labSamplePreparation.php">
							   <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
									<textarea id="editor1" name="editor1" rows="10" cols="80">
																
											</textarea>
									<input type="submit" value="Save" name="save">
							  </form>
							  
							</div>
						  </div>
						  <!-- /.box -->
						</div>
					</div>
			   
              </div>
              <!-- /.tab-pane -->
			     <div class="tab-pane" id="tab_5">
                     <div class="row">
							<div class="col-md-4 box-body">
							   <form role="form" method="POST" action="php/Addclass.php">
							   <!-- text input -->
								<div class="form-group">
								  <label>Name:</label>
									 <select class="form-control select2" name="level" >
											
									</select>
								</div>
								 
								 
								<div class="form-group">
								  <label>Batch No :</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-building"></i>
									  </div>
									   <input type="text" class="form-control" placeholder="Enter Name..." name="class" readonly>
									</div>
								</div>
								<div class="form-group">
								  <label>Grade (if applicable):</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-building"></i>
									  </div>
									   <input type="text" class="form-control" placeholder="Enter Name..." name="abbr" readonly>
									</div>
								</div>
								 <!-- Date -->
								  <div class="form-group">
									<label>Expiry Date :</label>
									<div class="input-group date">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									  <input type="date" class="form-control pull-right" id="datepicker">
									</div>
								  </div>

								<div class="box-footer">
									  <button type="submit" class="btn btn-success">Add</button>
									 <button type="button" class="btn btn-primary">Clear</button>
								</div>
							  </form>
							</div>
						<div class="col-md-8">
								  <div class="box">
									<!-- /.box-header -->
									<div class="box-body">
										 <table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th>S/N</th>
							  <th>Name</th>
							  <th>Code Number</th>
							  <th>Calibration Status</th>
							  <th>Action</th>
							</tr>
							</thead>
							 <tbody>
							
							
							 <?php 
							 // include 'php/connection.php';
							 //  $query = "SELECT * FROM `classtable`"; 
								//$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
								//$num = 1;
								//	while($row = mysqli_fetch_array($result)) {	
									
							
						   //echo '<tr>';
// echo '<td>'.$num.'</td>';
							 // echo '<td>'.$row['levelname'].'</td>';
							 //  echo '<td>'.$row['classrep'].'</td>';
								//echo '<td>'.$row['Status'].'</td>';
								 
							 
							  
							  //echo "<td><a href=''><i class='fa fa-fw fa-pencil' alt='Edit' tittle='Edit'></i></a>
							 // <a href='phpcode/deletelevel.php?id=".$row['classID']."' style='color: red;' alt='Delete' tittle='Delete'><i class='fa fa-fw fa-trash-o'></i></a></td>";
							//echo '</tr>';
							//$num = $num + 1;
							//	}								
							?>
							</tbody>
						  </table>
						</div>
					  </div>
					</div>
					<!-- /.col-8 -->
                 </div><!-- /.row -->	
              </div>
              <!-- /.tab-pane -->
			     <div class="tab-pane" id="tab_6">
						<div class="row">
								<div class="col-md-12">
								  <div class="box box-info">
									<div class="box-header">
									  <h3 class="box-title">Sample Preparation (if applicable)
										<small>(Describe sample preparation steps actually performed)</small>
									  </h3>
									  <!-- tools box -->
									  <div class="pull-right box-tools">
										<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
												title="Collapse">
										  <i class="fa fa-minus"></i></button>
										<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
												title="Remove">
										  <i class="fa fa-times"></i></button>
									  </div>
									  <!-- /. tools -->
									</div>
									<!-- /.box-header -->
									<div class="box-body pad">
									  <form  method="post"  action="php/labSamplePreparation.php">
							   <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
									<textarea id="editor1" name="editor1" rows="10" cols="80">
																
											</textarea>
									<input type="submit" value="Save" name="save">
							  </form>
									</div>
								  </div>
								  <!-- /.box -->
								</div>
							</div>
              </div>
              <!-- /.tab-pane -->
			     <div class="tab-pane" id="tab_7">
                   <!-- prepare the summary of the lab test -->
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
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
     <!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- CK Editor -->
<script src="../bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
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
