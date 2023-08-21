<!DOCTYPE html>
<html>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header2.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include 'includes/navbarhome.php'; ?>
  <?php include 'includes/office_menu.php'; ?>

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
          <h3 class="box-title">TEST PARAMETER REQUEST FORM</h3>

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
                 <form role="form" action="addparameter.php" method="post" enctype="multipart/form-data">
                     <!-- text input -->
                   <?php
    					require('includes/conn.php');
    					if(isset($_GET['id'])){
    					    $getid =$_GET['id'];
    					}
    					$sql = "SELECT * FROM `sample_submit` WHERE md5(Submit_ID)='$getid'";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()) {
                            $scode=$row['SampleCode'];
                            $sname=$row['CommonName'];
                           
                            $soffice=$row['Officer'];
                            $sdt=$row['Submissiondate'];
                        }
                    ?>
                    
                     <input type="hidden" class="form-control" value="<?php echo $getid; ?>" name="sampleid" readonly>
                     <input type="hidden" class="form-control" value="<?php echo $_GET['code']; ?>" name="samplecode" readonly>
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
			   <div class="col-xs-12">
                   <label>Test Requested:</label>
                    <input type="text" class="form-control" id="sampleCode"  name="parameter" required>
                </div>
              </div></br>
                    <div class="box-footer">
                         <button type="submit" class="btn btn-success" name="save">Add</button>
						  <a href="submit.php" class="btn btn-primary">Back</a>
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
					<th>Sample Code</th>
					<th>Parameter</th>
				    <th>Action</th>
                </tr>
                </thead>
               <tbody>
                 <?php
                        require('includes/conn.php');
                        $sid = $_GET['code'];
                        $codeid = $_GET['id'];
                        $query="SELECT * FROM lab_testsrequested where md5(SampleID)='$sid'";
                        $nm =1;
                        $result=mysqli_query($conn, $query);
                        while ($row=mysqli_fetch_array($result)){?>
                	        <tr>
                	            <td><?php echo $nm;?></td>
                	            <td> <?php echo $row['SampleID']; ?> </td>
                		    	<td> <?php echo $row['Tests'];?></td>
                                <td>
                                    
                        			<a href="parameter_delete.php?sid=<?php echo $row['id']; ?>&code=<?php echo $sid; ?>&id=<?php echo $codeid; ?>" class="btn btn-danger btn-sm delete btn-flat"><i class="fa fa-trash"></i> Delete</a>
                        	   </td>
                            </tr>
                               <?php
                                  $nm +=1; }
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

        <!-- /.modal -->
<!-- jQuery 3 -->
 
       <!-- /.modal -->
<!-- jQuery 3 -->
   <?php include 'includes/footer.php'; ?>
  <?php include 'includes/parameter_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


});

function getRow(id){
    alert('hi');
  $.ajax({
    type: 'POST',
    url: 'parameter_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#del_posid').val(response.id);
      $('#del_position').val(response.Tests);
    }
  });
}
</script>
</body>
</html>
