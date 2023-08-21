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
        SAMPLS RESULT REPORT
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
                       <!-- Date range -->
              <div class="form-group">
                <label>Search by Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
               <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Sample Code</th>
                  <th>Sample Name</th>
				  <th>Submitted By</th>
                  <th>Assigned To</th>
                  <th>Date Submitted</th>
                  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
               <tbody>
				 <?php
					require('includes/conn.php');
					$sql = "SELECT * FROM `sample_submit`";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()) {?>
					  
					  
				<tr>
					<td><?php echo $row['SampleCode']; ?></td>
                          <td><?php echo $row['CommonName']; ?></td>
                          <td><?php echo $row['Officer']; ?></td>
                          <td><?php echo $row['HeadofLab']; ?></td>
						  <td><?php echo $row['Submissiondate']; ?></td>
					<?php     
					    if($row['Office_Status'] =='1') {
								  echo '<td><span class="label label-danger">Reception</span></td>';
							 } else if ($row['Custodian_Status'] =='1'){
								 echo '<td><span class="label label-success">Custodian</span></td>';
							 }
							 else if ($row['Analyst_Status'] =='1'){
								 echo '<td><span class="label label-success">Laboratory</span></td>';
							 }
					?>
							  <td>
								<button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['Submit_ID']; ?>"><i class="fa fa-edit"></i> Edit</button>
							    <a href="add_parameter.php?code=<?php echo md5($row['SampleCode']); ?>&id=<?php echo md5($row['Submit_ID']); ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-pencil"></i> Parameter</a>
								 <a href="print.php" class="btn btn-primary btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Print</a>
							   
							  </td>
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
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.assign').click(function(e){
    e.preventDefault();
    $('#assign').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){

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
