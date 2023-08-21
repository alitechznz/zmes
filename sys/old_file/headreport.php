<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/head_menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Report 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">General Report</li>
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
			   <!--div class="col-md-12">
                 
                <div class="input-group" style="margin-left: 30%;">
				 
                   <div class="input-group">
                  <input type="button" class="btn btn-default pull-right" id="daterange-btn" onchange="DateSearch(this.value)">
                    <span>
                      <i class="fa fa-calendar"></i> Search by Date Range &nbsp;
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </input>
                </div>
                </div>
              </div-->
			 
			 <table id="example1" class="table table-bordered">
                <thead>
                  <th>SampleCode</th>
                  <th>Sample Name</th>
				  <th>Type</th>
				  <th>Status</th>
				  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM `sample_submit`";
                    $query = $conn->query($sql);
					$num = 1;
                    while($row = $query->fetch_assoc()){
                        $_SESSION['idget'] = $row['id'];
                      ?>
                        <tr>
						  <td><?php echo $row['SampleCode']; ?></td>
						  <td><?php echo $row['CommonName']; ?></td>
						  <td><?php echo $row['type']; ?></td>
						
						  <?php 
						    if($row['FAnalyst_Status'] =='0') {
				                echo '<td><span class="label label-primary">Ongoing</span></td>';
				            } else {
					          if($row['FAnalyst_Status'] =='1' and $row['FChecker_Status'] =='0' and $row['FHead_Status'] =='0') {
				                  echo '<td><span class="label label-success">Analyst Finished</span></td>';
					           } else if($row['FChecker_Status'] =='1' and $row['FAnalyst_Status'] =='1' and $row['FHead_Status'] =='0') {
						         echo '<td><span class="label label-success">Checker Finished</span></td>';
					           } else if($row['FHead_Status'] =='1' and $row['FChecker_Status'] =='1' and $row['FAnalyst_Status'] =='1') {
						        echo '<td><span class="label label-success">Head Finished</span></td>';
					           } else {
								   echo '<td></td>';
							   }
				           }
						  ?>
						 
                          <td>
						  
                            <a href="submitform.php?code=<?php echo $row['SampleCode']; ?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i> Submission</a>
							<a href="requestform.php?code=<?php echo $row['SampleCode']; ?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i> Request Form</a>
							<?php if($row['type'] =='Food'){
								echo '<a href="foodlabsheet.php?code='.$row['SampleCode'].'" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i> Lab Sheet</a>';
							} else {
								echo '<a href="druglabsheet.php?code='. $row['SampleCode'].'" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i> Lab Sheet</a>';
							}
							?>
							<a href="remark.php?code=<?php echo $row['SampleCode']; ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-edit"></i> Head Remark</a>
							<?php 
							   if($row['FHead_Status'] =='1' and $row['FChecker_Status'] =='1' and $row['FAnalyst_Status'] =='1') {
								   echo  '<a href="certificate.php?code='.$row['SampleCode'].'" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i> Certificate</a>';
							   } else {
								    //echo  '<a href="certificate.php?code='.$row['SampleCode'].'" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i> Certificate</a>';
							   }
                           ?>
	
							
                          </td>
                        </tr>
                      <?php
                    
					$num = $num + 1;
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
  <?php include 'includes/headsample_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
function DateSearch(str) {
     var dateRange = str.split('-');
     var FromDate = dateRange[0];
     var ToDate = dateRange[1];

   if (str.length > 0) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("example1").innerHTML = this.responseText;
            }
        };
       
        xmlhttp.open("GET", "rgetsearch.php?from=" + FromDate +"&to="+ ToDate, true);
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
