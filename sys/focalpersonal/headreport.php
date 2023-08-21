<!DOCTYPE html>
<html>
<?php 
 include 'includes/session.php';
include 'head.php'; 
     
?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
   <?php 
   
      include 'header.php'; 
   ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
   <?php 
	    include 'menu.php';   
   
   ?>   <!-- /.search form -->

  <!-- /.content-wrapper -->
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        LIMS
        <small>Version 1.0</small>
      </h1>
      
    </section>

     <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Sample List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
		     <div class="col-md-12">
                 
                <div class="input-group" style="margin-left: 30%;">
				 
                   <div class="input-group">
				    <a  class="btn btn-danger btn-sm delete btn-flat" onclick="printall()"><i class="fa fa-print"></i> Print list</a>&nbsp;
                  <input type="button" class="btn btn-default pull-right" id="daterange-btn" onchange="DateSearch(this.value)">
                    <span>
                      <i class="fa fa-calendar"></i> Search by Date Range &nbsp;
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </input>
                </div>
                </div>
              </div>
            <div class="row col-md-12">
               <br />
                        <!-- /.box-header -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S/N</th>
                  <th>Sample Name</th>
                  <th>Sample Code</th>
				   <th>Type</th>
				   <th>Role</th>
				  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				  include 'includes/conn.php';
				  $getname =$user['Fullname'];
				  $checker ="";
				   $query = "SELECT * FROM `sample_submit` WHERE Analyst='$getname' OR Checker='$getname'"; 
					$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					$num = 1;
						while($row = mysqli_fetch_array($result)) {	
						  $checkerst =$row['FAnalyst_Status'];
				
               echo '<tr>';
                  echo '<td>'.$num.'</td>';
                  echo '<td>'.$row['CommonName'].'</td>';
                  echo '<td>'.$row['SampleCode'].'</td>';
				  echo '<td>'.$row['type'].'</td>';
				  
				   $analyst =$row['Analyst'];
				   $checker =$row['Checker'];
				   
				   if($getname == $analyst) {
				       echo '<td>Analyst</td>';
				   } else {
				       echo '<td>Checker</td>';
				   }
				  
				  $fstatus =$row['FinishedStatus'];
				  if($fstatus =="0" or $row['FAnalyst_Status'] =="0") {
				       echo '<td><span class="label label-primary">Ongoing</span></td>';
				  } else {
					  if($row['FAnalyst_Status'] =='1' and $row['FChecker_Status'] =='0' and $row['FHead_Status'] =='0') {
				           echo '<td><span class="label label-success">Analyst Finished</span></td>';
					  } else if($row['FChecker_Status'] =='1' and $row['FAnalyst_Status'] =='1' and $row['FHead_Status'] =='0') {
						   echo '<td><span class="label label-success">Checker Finished</span></td>';
					  } else if($row['FHead_Status'] =='1' and $row['FChecker_Status'] =='1' and $row['FAnalyst_Status'] =='1') {
						   echo '<td><span class="label label-success">Head Finished</span></td>';
					  }
				  }
				 
				 if($getname == $analyst) {
				      
					       echo "<td>";
							if($row['type'] =='Food'){
								echo "<a href='../foodlabsheet.php?code=".$row['SampleCode']."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Lab Sheet</a>";
							} else {
								echo "<a href='../druglabsheet.php?code=". $row['SampleCode']."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Lab Sheet</a>";
							}
						echo "
                            <a href='../certificate.php?code=". $row['SampleCode']."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Certificate</a>
							<a href='../requestform.php?code=". $row['SampleCode']."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Request Form</a>
							
                          </td>";
				   } else {
				      
					   echo "<td>";
							if($row['type'] =='Food'){
								echo "<a href='../foodlabsheet.php?code=".$row['SampleCode']."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Lab Sheet</a>";
							} else {
								echo "<a href='../druglabsheet.php?code=". $row['SampleCode']."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Lab Sheet</a>";
							}
						echo "</td>";
				   }
                  
				 
                echo '</tr>';
				$num = $num + 1;
               		}								
				?>
                </tbody>
               
              </table>
                        
                     
            
            
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
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- ChartJS -->
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
function printall() {
  // alert("hiii");
   var x = document.getElementById("daterange-btn").value; 
   //alert(x);
  
     var dateRange = x.split('-');
     var FromDate = dateRange[0];
     var ToDate = dateRange[1];
	 
	 window.open("../printsample.php?from=" + FromDate +"&to="+ ToDate);
	
}

   function DateSearch(str) {
   // var x = document.getElementById("reservation").value; 
  // alert(x);
 //alert(str);
     var dateRange = str.split('-');
     var FromDate = dateRange[0];
     var ToDate = dateRange[1];
// alert(FromDate);
 //alert(ToDate);
    
   
   if (str.length > 0) {
       //alert("step 1");
        //document.getElementById("example1").innerHTML = "";
        //return;
    //} else {
        //alert("step 2");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("example1").innerHTML = this.responseText;
            }
        };
        //alert("step 3");
        xmlhttp.open("GET", "dgetsearch.php?from=" + FromDate +"&to="+ ToDate, true);
        xmlhttp.send();
        //alert("step 4");
    }
    
}

  $(function () {
    $('#example1').DataTable({
      responsive: true
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
$(function(){
  /** add active class and stay opened when selected */
  var url = window.location;

  // for sidebar menu entirely but not cover treeview
  $('ul.sidebar-menu a').filter(function() {
     return this.href == url;
  }).parent().addClass('active');

  // for treeview
  $('ul.treeview-menu a').filter(function() {
     return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
  
});
</script>
<script>
$(function(){
	//Date picker
  $('#datepicker_add').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
   $('#datepicker_add1').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )
  
});
</script>
</body>
</html>
