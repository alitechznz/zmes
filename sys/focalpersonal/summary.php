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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Summary Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Summary Report</li>
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
          <div class="box">
           
             <div class="box-body">
			     <div class="input-group" style="margin-left: 30%;">
				 
                   <div class="input-group">
				  <a  class="btn btn-danger btn-sm btn-flat" onclick="printsummary()"><i class="fa fa-print"></i> Print</a>&nbsp;
                  <input type="button" class="btn btn-default pull-right" id="daterange-btn" onchange="DateSearch(this.value)">
                    <span>
                      <i class="fa fa-calendar"></i> Search by Date Range &nbsp;
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </input>
                </div>
                </div>
				
				<div class="row" id="example11" style="text-align: center;">
				
				</div>
				
				
			
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'footer.php'; ?>
  <?php include 'includes/headsample_modal.php'; ?>
</div>


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

function printsummary() {
 // alert("hiii");
   var x = document.getElementById("daterange-btn").value; 
   ///alert(x);
  
     var dateRange = x.split('-');
     var FromDate = dateRange[0];
     var ToDate = dateRange[1];
	 
	 window.open("../printsummary.php?from=" + FromDate +"&to="+ ToDate);
}

function DateSearch(str) {
     var dateRange = str.split('-');
     var FromDate = dateRange[0];
     var ToDate = dateRange[1];

   if (str.length > 0) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("example11").innerHTML = this.responseText;
            }
        };
       
        xmlhttp.open("GET", "sgetsearch.php?from=" + FromDate +"&to="+ ToDate, true);
        xmlhttp.send();
    }
    
}


$(function(){
  //$('.assign').click(function(e){
  $("body").on("click", ".ssign", function(e){
    e.preventDefault();
    $('#assign').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  
   $("body").on("click", ".edit", function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  //$('.delete').click(function(e){
	$("body").on("click", ".delete", function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".view", function(e){
//$('.view').click(function(e){
    e.preventDefault();
    $('#view').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
	//alert('Hi ali');
	//alert(id);
  $.ajax({
    type: 'POST',
    url: 'headsample_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
    $('.empid').val(response.Submit_ID);
    //$('#submit_id').val(response.Submit_ID);
      //$('.del_employee_name').html(response.Fullname);
      
       $('#ass_head').val(response.Officer);
      $('#ass_code').val(response.SampleCode);
      $('#ass_samplename').val(response.CommonName);
      $('#ass_quantity').val(response.Quantity);
      $('#ass_batch').val(response.Batch);
       $('#ass_manu_date').val(response.Mandate);
         $('#ass_expirydate').val(response.Expirydate);
         $('#ass_duedate').val(response.DueDate);
         
      $('#edit_head').val(response.Officer);
      $('#edit_code').val(response.SampleCode);
      $('#edit_samplename').val(response.CommonName);
      $('#edit_quantity').val(response.Quantity);
      $('#edit_batch').val(response.Batch);
       $('#edit_manu_date').val(response.Mandate);
         $('#edit_expirydate').val(response.Expirydate);
         $('#edit_duedate').val(response.DueDate);
         
   
     
    }
  });
}
</script>
</body>
</html>
