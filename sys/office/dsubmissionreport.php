<?php include 'includes/session.php'; ?>
<?php include 'includes/header2.php'; ?>
<body class="hold-transition skin-blue sidebar-mini animsition site-navbar-small">
<div class="wrapper">

  <?php include 'includes/navbarhome.php'; ?>
  <?php include 'includes/office_menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SAMPLE SUBMISSION REPORT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sample</li>
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
		      <div class="box-header with-border">
            
            <form action="ali.php" method="get">
               <div class="col-md-12">
                 
                <div class="input-group" style="margin-left: 30%;">
				 
                   <div class="input-group">
				   <a  class="btn btn-danger btn-sm delete btn-flat" onclick="printall()"><i class="fa fa-print"></i> Print All</a>&nbsp;
                  <input type="button" class="btn btn-default pull-right" id="daterange-btn" onchange="DateSearch(this.value)">
                    <span>
                      <i class="fa fa-calendar"></i> Search by Date Range &nbsp;
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </input>
                </div>
                </div>
              </div>
              <!-- /.form group -->
                 <!-- Date range --> 
            
	
              <!-- /.form group -->
              
           </form>   
             
            </div>
               <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Sample Code</th>
                  <th>Sample Name</th>
				  <th>Submitted By</th>
				  <th>Date Submitted</th>
                  <th>Assigned To</th>
                  <th>Date Remarked</th>
                  <th>Status</th>
				  <th>Print</th>
                </tr>
                </thead>
               <tbody>
				 <?php
					require('includes/conn.php');
					$sql = "SELECT * FROM `sample_submit` ORDER BY Submit_ID DESC";
                    $query = $conn->query($sql);
					$Lstatus ="";
					$rdate ="";
                    while($row = $query->fetch_assoc()) {
                            $SID = $row['SampleCode'];
					    	$sql1 = "SELECT * FROM `lab_remark` WHERE `SampleCode` ='$SID'";
                            $query1 = $conn->query($sql1);
                            if($row1 = $query1->fetch_assoc()) {
                                $rdate = $row1['ReceivingDate'];
                                $Lstatus = $row1['ConditionStatus'];
                            }
					  ?>
				<tr>
					<td><?php echo $row['SampleCode']; ?></td>
                          <td><?php echo $row['CommonName']; ?></td>
                          <td><?php echo $row['Officer']; ?></td>
                          <td><?php echo $row['Submissiondate']; ?></td>
                          <td><?php echo $row['HeadofLab']; ?></td>
						  <td><?php echo $rdate; ?></td>
					<?php     
					    if($Lstatus =="Accept") {
								  echo '<td><span class="label label-success">Accepted</span></td>';
								  echo  '<td>
								            <a href="submission_report.php?sample='.$row['SampleCode'].'" class="btn btn-primary btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Print</a></span>
							             </td>';
							 } else if($Lstatus =="Reject") {
								  echo '<td><span class="label label-danger">Rejected</span></td>';
								  '<td>
								            <a href="submission_report.php?sample='.$row['SampleCode'].'" class="btn btn-primary btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Print</a></span>
							             </td>';
							 } else {
						          echo '<td><span class="label label-primary">Processing</span></td>';
						          '<td>
								            <a href="submission_report.php" class="btn btn-primary btn-sm btn-flat" disabled><span class="glyphicon glyphicon-print"></span> Print</a></span>
							             </td>';
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
        
		
		</div>
      </div>
	  

    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/submit_modal.php'; ?>
</div>
<?php include 'includes/script2.php'; ?>
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
    
    

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

$(function(){
	$("body").on("click", ".edit", function(e){
  //$('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".assign", function(e){
  //$('.assign').click(function(e){
    e.preventDefault();
    $('#assign').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".photo", function(e){
  //$('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
   alert(id);
  $.ajax({
    type: 'POST',
    url: 'sample_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //$('.empid').val(response.Submit_ID);
    $('#submit_id').val(response.Submit_ID);
      //$('.del_employee_name').html(response.Fullname);
      $('#edit_code').val(response.SampleCode);
      $('#edit_samplename').val(response.CommonName);
      $('#edit_quantity').val(response.Quantity);
      $('#edit_batch').val(response.Batch);
       $('#edit_manu_date').val(response.Mandate);
         $('#edit_expirydate').val(response.Expirydate);
         $('#edit_duedate').val(response.DueDate);
     // $('#gender_val').val(response.gender).html(response.gender);
      //$('#position_val').val(response.position_id).html(response.Status);
    //  $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    }
  });
}
</script>
</body>
</html>
