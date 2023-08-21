<!DOCTYPE html>
<html>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/head_menu.php'; ?>


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
          <h3 class="box-title">SAMPLE ANALYSIS REQUEST FORM</h3>

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
            
                 <div class="col-md-12">
                      <div class="box">
                           <br />
                        <!-- /.box-header -->
                        <div class="box-body">
                             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>Sample Code</th>
					<th>Sample Name</th>
                  <th>Sample assigned to</th>
                  <th>Sample assigned by</th>
                  <th>Sample issued by</th>
                  
                  <th>Lab Code</th>
				  <th>Action</th>
                </tr>
                </thead>
               <tbody>
 <?php
require('includes/conn.php');
$query="SELECT * FROM sample";
$result=mysqli_query($conn, $query);
while ($row=mysqli_fetch_array($result)){?>
      
	  
	        <tr>
			<td> <?php echo $row['s.code'];?></td>
		<td> <?php echo $row['ps']; ?> </td>
                <td> <?php echo $row['sample_to']; ?></td>
                <td> <?php echo $row['sample_by']; ?> </td>
		<td> <?php echo $row['sample_issue'];?></td>
		
                 <td> <?php echo $row['l.code']; ?> </td>
		
		  
        <td>
        
       
        
		 <a href="product_report.php?id=<?php echo md5($row['id']);?>&nm=<?php echo md5($row['id']); ?>">
		 <i class="ace-icon fa fa-print bigger-130" alt="Edit" title="Product Report"></i></a> 
	



			
       

	   
	  

	   </td>
      </tr>
   <?php
 }
?>						
													
</tr>

													</tr>
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
   <?php include 'includes/footer.php'; ?>
  <?php include 'includes/department_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
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
