<!DOCTYPE html>
<html>

<?php
  require('includes/conn.php');
	if(isset($_POST['Update'])){
		$code = $_GET['sample'];
		$analyst = $_POST['analyst'];
		$checker = $_POST['checker'];
		    
			$sql = "UPDATE sample_submit SET Analyst='$analyst', Checker='$checker' WHERE SampleCode='$code'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Sample assigned successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

?>

<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/head_menu.php'; ?>

  <!-- /.content-wrapper -->
  
  

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
                <div class="col-md-4 box-body">
                
                     <!-- text input -->
                     <?php
    					require('includes/conn.php');
    					if(isset($_GET['sample'])){
    					    $getid =$_GET['sample'];
    					}
    					$sql = "SELECT * FROM `sample_submit` WHERE SampleCode='$getid'";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()) {
                            $scode=$row['SampleCode'];
                            $sname=$row['CommonName'];
                          
                            $soffice=$row['Officer'];
                            $sdt=$row['Submissiondate'];
							
							$analyst=$row['Analyst'];
                            $checker=$row['Checker'];
                        }
                    ?>
			    <input type="hidden" class="form-control" value="<?php echo $getid; ?>" name="sampleid" readonly>
                     
			 <div class="row">
			    <div class="col-xs-6">
                   <label>Product/Sample Name:</label>
                    <input type="text" class="form-control" id="sampleName" value="<?php echo $sname; ?>" name="name" readonly>
                </div>    
			   <div class="col-xs-6">
                   <label>Sample code:</label>
                  <input type="text" class="form-control" id="issignedBy" value="<?php echo $scode; ?>" name="code" readonly>
                </div>
              </div></br>
			  
			  <div class="row">
			   <div class="col-xs-6">
                   <label>Sample issued by:</label>
               <input type="text" class="form-control" id="issuedBy" value="<?php echo $user['Fullname']; ?>" name="pob" readonly>
                </div>
                
                <div class="col-xs-6">
                   <label>Date Submitted </label>
                <input type="datetime" class="form-control" id="date-timepicker1" value="<?php echo $sdt; ?>" name="dor" readonly>
                </div>
              </div></br>
			  
			   <div class="row">
			   <div class="col-xs-6">
                   <label>Sample assigned to (Analyst):</label>
                   <input type="text" class="form-control" id="analyst1" value="<?php echo $analyst; ?>" name="analyst1" readonly>
                </div>
                
                <div class="col-xs-6">
                    <label>Sample assigned to (Checker):</label>
                    <input type="text" class="form-control" id="checker1" value="<?php echo $checker; ?>" name="checker1" readonly>
                </div>
              </div></br>
            
             
		       <div class="row">
              </div>
			  </br>
                    <div class="box-footer">
                        <!--
                         <button type="submit" class="btn btn-success" name="save">Save</button>
						  <a href="submit.php" class="btn btn-primary">Back</a>
						  -->
                    </div>
					
				   <form role="form" action="sample_analyst_detail.php?sample=<?php echo $getid; ?>" method="post">
				      <div class="box-header with-border">
                         <h3 class="box-title"><b>UPDATE OFFICER</b></h3>
					  </div>
				      <div class="row">
						<div class="col-xs-6">
							<label>Sample assigned to (Analyst):</label>
							<select class="form-control select2" name="analyst">
								<?php 
										 require('includes/conn.php');
											$query="SELECT * FROM userinfo WHERE Role='laboratory' or Role='Head' or Role='Analyst' or Role='Checker'";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value="'.$row['Fullname'].'">'.$row['Fullname'].'</option>';
											}
											mysqli_close($conn);
									  ?>
							</select>
                   
						</div>
						<div class="col-xs-6">
							<label>Sample assigned to (Checker):</label>
							<select class="form-control select2" name="checker">
								<?php 
										 require('includes/conn.php');
											$query="SELECT * FROM userinfo WHERE Role='laboratory' or Role='Head' or Role='Analyst' or Role='Checker'";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value="'.$row['Fullname'].'">'.$row['Fullname'].'</option>';
											}
											mysqli_close($conn);
									  ?>
							</select>
						</div>
						
					</div>
					<div class="row">
					    <div class="box-footer" style="margin-left: 50px;">
                       
                         <button type="submit" class="btn btn-success" name="Update">Update</button>
						  <a href="Samplelist.php" class="btn btn-primary">Back</a>
						 
                         </div>
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
                                  <th>S/No</th>
                                  <th style="width: 65% !important;">Parameter</th>
                                  <th>Action</th>
                                  
                                </tr>
                                </thead>
                                <tbody>
				<?php 
				  include 'includes/conn.php';
                                         $getcode =$_GET['sample'];
                                         $nm =1;
        							      $sql = "SELECT * FROM `lab_testsrequested`WHERE SampleID = '$getcode'";
        							      $result = mysqli_query($conn, $sql);
        							      while($row=mysqli_fetch_array($result)) {
						
                            				
                                           echo '<tr>';
                                              echo '<td>'.$nm.'</td>';
                                              echo '<td>'.$row['Tests'].'</td>';
                            				
                                              echo "<td>
                                                        <a href='parameter_delete.php?id='".$row['SampleID']."' class='btn btn-danger btn-sm delete btn-flat'><i class='fa fa-trash'></i> Delete</a>
                            				        </td>";
                                              
                                            echo '</tr>';
			                  	$nm = $nm + 1;
               		}								
				?>
                </tbody>
               
              </table>
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
    url: 'sample_analysis_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.id);
      $('.employee_id').html(response.Fullname);
      //$('.del_employee_name').html(response.Fullname);
      $('#issuedBy).html(response.sample_issue);
      $('#date-timepicker1').val(response.date2);
      $('#sampleCode').val(response.sample_code);
      $('#labCode').val(response.lab_code);
      $('#sampleName').val(response.ps);
      //$('#position_val').val(response.position_id).html(response.Status);
    //  $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    }
  });
}
</script>
</body>
</html>
