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
          <h3 class="box-title">Assign Container</h3>

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
                  <label for="exampleInputEmail1">Owner </label>
                 <select class="form-control select2" name="status">
                  <option selected="selected"></option>
                  <option>Expenditure</option>
                 
                  <option>Supplier</option>
                  
                </select>
                </div>
				
				
				 <div class="form-group">
                  <label for="exampleInputEmail1">Name </label>
                  <input type="text" class="form-control"  placeholder="Enter email" name="name">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Type </label>
                 <select class="form-control select2" name="status">
                  <option selected="selected"></option>
                  <option>Expenditure</option>
                 
                  <option>Supplier</option>
                  
                </select>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Fridge/Cabinet </label>
                 <select class="form-control select2" name="status">
                  <option selected="selected"></option>
                  <option>Expenditure</option>
                 
                  <option>Supplier</option>
                  
                </select>
                </div>
				
				
                     
			  
                    <div class="form-group">
                      <label>Comments</label>
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
                  <th>School Name</th>
                  <th>Phone No</th>
                  <th>Address</th>
                  <th>P.O.Box</th>
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
                  echo '<td>'.$row['POBox'].'</td>';
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
 
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/user_modal.php'; ?>
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
    url: 'user_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.id);
      $('.employee_id').html(response.Fullname);
      //$('.del_employee_name').html(response.Fullname);
      $('#employee_name').html(response.Fullname);
      $('#edit_name').val(response.Fullname);
      $('#edit_address').val(response.Address);
      $('#edit_contact').val(response.PhoneNumber);
     // $('#gender_val').val(response.gender).html(response.gender);
      //$('#position_val').val(response.position_id).html(response.Status);
    //  $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    }
  });
}
</script>
</body>
</html>
