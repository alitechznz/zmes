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
          <h3 class="box-title">Assign Reagents</h3>

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
                 <form role="form" action="reagent_add.php" method="post" enctype="multipart/form-data">
                     <!-- text input -->
                     <div class="form-group">
                  <label for="exampleInputEmail1">Reagents Type </label>
                 <select class="form-control select2" name="reagenttype">
                         <option selected="selected"></option>
                         <?php 
										 require('includes/conn.php');
											$query="SELECT * FROM reagentType";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value='.$row['reagentName'].'>'.$row['reagentName'].'</option>';
											}
											mysqli_close($conn);
									  ?>
									</select>
                </div>
				
				
                     <div class="row">
			  
			   <div class="col-xs-6">
                   <label>Volume/Weight</label>
                   <input type="text" class="form-control"  placeholder="Enter Volume/Weightl" name="volume">
                </div>
                
                <div class="col-xs-6">
                   <label>Unit</label>
                    <input type="text" class="form-control"  placeholder="Enter Unit" name="Vunit">
                </div>
              </div>
			  
			  <div class="form-group">
                  <label for="exampleInputEmail1">Name/Batch </label>
                  <input type="text" class="form-control" id="" placeholder="Name/Batch" name="batch">
                </div>
			  
			   <div class="form-group">
                  <label for="exampleInputEmail1">Created By </label>
                  <input type="text" class="form-control"  placeholder="Created By" name="createdby" value ='<?php echo $user['Fullname']; ?>' required>
                </div>
				
				 <div class="form-group">
                  <label for="exampleInputEmail1">Contamination </label>
                   <input type="text" class="form-control" id="" placeholder="Enter Contamination" name="contamination">
                </div>
				
				
            <div class="row">
			  
			   <div class="col-xs-6">
                   <label>Concentration</label>
                    <input type="text" class="form-control"  placeholder="Concentration" name="concentration">
                </div>
                
                <div class="col-xs-6">
                   <label>Units</label>
                    <input type="text" class="form-control"  placeholder="Enter Unit" name="Cunit">
                </div>
				
				</div>
				<div class="col-xs-6">
                 <label > Date Created </label>
                  <input type="date" class="form-control" id="date-timepicker1" placeholder="Enter Date Created" name="createdon">
                </div>
				
			   <div class="col-xs-6">
                   <label>Expeiry Date</label>
                <input type="date" class="form-control" id="date-timepicker1" placeholder="Enter Expeiry Date" name="expirydate">
                </div>

                <div class="form-group">
                      <label>Comments</label>
                      <textarea class="form-control" placeholder="Enter description ..." name="comment" required></textarea>
                    </div>
                   
                    
					
          
                    <div class="box-footer">
                         <button type="submit" class="btn btn-success" name="save">Save</button>
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
                  <th>Reagent</th>
                  <th>Date Created</th>
                  <th>Date Expired</th>
				   <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				  include 'includes/conn.php';
				   $query = "SELECT * FROM `reagent`"; 
					$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
					$num = 1;
						while($row = mysqli_fetch_array($result)) {	
						
				
               echo '<tr>';
                    
				echo '<td>'.$row['Type'].'</td>';
                  echo '<td>'.$row['DateCreated'].'</td>';
				  echo '<td>'.$row['ExpeiryDate'].'</td>';
                  echo '<td>
                           <button class="btn btn-primary btn-sm view btn-flat" data-id="'.$row['ReagentID'].'"><i class="fa fa-view"></i> View Info</button>
                           <button class="btn btn-success btn-sm edit btn-flat" data-id="'.$row['ReagentID'].'"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="'.$row['ReagentID'].'"><i class="fa fa-trash"></i> Delete</button>
                            
                            </td>';
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
  <?php include 'includes/reagent_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$("body").on("click", ".edit", function(e){
 // $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".delete", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".view", function(e){
   // $('.view').click(function(e){
    e.preventDefault();
    $('#view').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'reagent_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.ReagentID);
      $('.employee_id').html(response.Fullname);
      $('#employee_name').html(response.Fullname);
      $('#editType').val(response.Type);
      $('#editVolume').val(response.Volume_Qnt);
      $('#editUnit').val(response.Volume_unit);
      $('#editBatch').val(response.NameBatch);
      $('#editContamination').val(response.Contamination);
      $('#editConcentration').val(response.Concentration);
      $('#editUnitCon').val(response.Cont_Unit);
      $('#editExpiryDate').val(response.ExpiryDate);
      $('#editComment').val(response.Comment);
      $('#editManufacturedDate').val(response.DateCreated);
      
      $('#viewType').val(response.Type);
      $('#viewVolume').val(response.Volume_Qnt);
      $('#viewUnit').val(response.Volume_unit);
      $('#viewBatch').val(response.NameBatch);
      $('#viewContamination').val(response.Contamination);
      $('#viewConcentration').val(response.Concentration);
      $('#viewUnitCon').val(response.Cont_Unit);
      $('#viewExpiryDate').val(response.ExpiryDate);
      $('#viewComment').val(response.Comment);
      $('#viewManufacturedDate').val(response.DateCreated);
    }
  });
}
</script>
</body>
</html>
