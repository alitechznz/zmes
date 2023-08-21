<?php include 'includes/session.php'; ?>
<?php include 'head.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
   <?php include 'header.php'; ?>
  
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
   <?php include 'includes/head_menu.php'; ?>

  <!-- /.content-wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
        
      <h1>
      SAMPLE LIST REPORT
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">sample list report</li>
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
              <li class="active"><a href="#tab_1" data-toggle="tab"><b>Sample List</b></a></li>
              <li><a href="#tab_2" data-toggle="tab"><b>Accepted</b></a></li>
              <li><a href="#tab_3" data-toggle="tab"><b>Rejected</b></a></li>
			  <li><a href="#tab_4" data-toggle="tab"><b>Failed</b></a></li>
			   <li><a href="#tab_5" data-toggle="tab"><b>Pass</b></a></li>
              <li><a href="#tab_6" data-toggle="tab"><b>Completed</b></a></li>
                <li><a href="#tab_7" data-toggle="tab"><b>On Progress</b></a></li>
                <li><a href="#tab_8" data-toggle="tab"><b>Waiting</b></a></li>
            </ul>
	<div class="tab-content">
              <div class="tab-pane active" id="tab_1">
    
			    <div class="row">
					     <div class="box">
           
             <div class="box-body">
			     <div class="input-group" style="margin-left: 30%;">
				 
                   <div class="input-group">
				  <a  class="btn btn-danger btn-sm btn-flat" onclick="printall()"><i class="fa fa-print"></i> Print All</a>&nbsp;
                  <input type="button" class="btn btn-default pull-right" id="daterange-btn" onchange="DateSearch(this.value)">
                    <span>
                      <i class="fa fa-calendar"></i> Search by Date Range &nbsp;
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </input>
                </div>
                </div>
             
			  <table id="example1" class="table table-bordered">
                <thead>
				  <tr>
				  <th>S/N</th>
                  <th>SampleCode</th>
                  <th>Sample Name</th>
                  <th>Date Received</th>
                  <th>Due Date</th>
				  <th>Type</th>
				  <th>Status</th>

				  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM `sample_submit`";
                    $query = $conn->query($sql);
					$num =1;
                    while($row = $query->fetch_assoc()){
                       
                      ?>
                        <tr>
						  <td><?php echo $num; ?></td>
						  <td><?php echo $row['SampleCode']; ?></td>
						  <td><?php echo $row['CommonName']; ?></td>
						  <td><?php echo $row['Submissiondate']; ?></td>
						  <td><?php echo $row['Submissiondate']; ?></td>
						  <td><?php echo $row['type']; ?></td>
						  
				  <?php 
				  $num +=1;
					  $status = $row['Head_Status'];
					  if($status == 0) {
						  echo '<td><span class="label label-primary">New</span></td>';
				
					  } else {
					      $scode = $row['SampleCode'];
					      
					      $sql="SELECT * FROM lab_remark WHERE SampleCode ='$scode'";
					      $result1 = mysqli_query($conn, $sql);
					      if($row1=mysqli_fetch_array($result1)){
					          $sttus = $row1['ConditionStatus'];
					          if($sttus=="Accept") {
					               $status = "Accepted";
					          } else {
					               $status = "Rejected";
					          }
					           echo '<td><span class="label label-success">'.$status.'</span></td>';
					      }  else {
					          echo '<td><span class="label label-success">Unassigned</span></td>';
					      }
					      
					      
						 
					  }
					?>
                          
                         
                        </tr>
                      <?php
                    
					
					}
                  ?>
                </tbody>
              </table>
			
            </div>
          
		  </div>
		  
                 </div><!-- /.row -->	
               </div> <!-- /.tab-pane -->
	  
                <div class="tab-pane" id="tab_2">
                  <div class="row">
							
						
                 </div><!-- /.row -->	
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="row">
							
					
                 </div><!-- /.row -->	
              </div>
			  
              <!-- /.tab-pane -->
			     <div class="tab-pane" id="tab_4">
                   <div class="row">
			
					</div>
			   
              </div>
			  
               <div class="tab-pane" id="tab_5">
                     <div class="row">
					
                 </div><!-- /.row -->	
              </div>
			  
              <!-- /.tab-pane -->
			     <div class="tab-pane" id="tab_6">
				
              </div>
			  
			  
              <!-- /.tab-pane -->
			     <div class="tab-pane" id="tab_7">
                   <!-- prepare the summary of the lab test -->
                   <div class="box-body">
                        <div class="row">
                          
                        </div>
                    </div>
              </div>
              <!-- /.tab-pane -->
              
                <!-- /.tab-pane -->
			      <div class="tab-pane" id="tab_8">
          
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
	 <?php include 'includes/footer.php'; ?>
  </div>
  <!-- /.content-wrapper -->
 
 
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
