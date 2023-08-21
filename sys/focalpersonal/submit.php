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
        SAMPLE SUBMISSION
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
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
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
					    if($row['Status'] =='1') {
								  echo '<td><span class="label label-success">Active</span></td>';
							 } else {
								 echo '<td><span class="label label-danger">InActive</span></td>';
							 }	
					?>
							  <td>
								<button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['Dep_ID']; ?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['Dep_ID']; ?>"><i class="fa fa-print"></i> Print</button>
							   
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
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
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
	//alert('Hi ali');
	//alert(id);
  $.ajax({
    type: 'POST',
    url: 'department_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.Dep_ID);
      $('.employee_id').html(response.Name);
      //$('.del_employee_name').html(response.Fullname);
      $('#employee_name').html(response.Name);
      $('#edit_name').val(response.Name);
      $('#edit_description').val(response.Description);
      $('#edit_leader').val(response.Leader);
     // $('#gender_val').val(response.gender).html(response.gender);
      //$('#position_val').val(response.position_id).html(response.Status);
    //  $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    }
  });
}
</script>
</body>
</html>
