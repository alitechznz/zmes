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
        Sample List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sample List</li>
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
			     <!--div class="input-group" style="margin-left: 30%;">
				 
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
               <div class="row" id="hapa"></div-->
			  <table id="example1" class="table table-bordered">
                <thead>
				  <tr>
                  <th>SampleCode</th>
                  <th>Sample Name</th>
                  <th>Date Received</th>
                  <th>Due Date</th>
				  <th>Type</th>
				  <th>Status</th>
				  <th>Action</th>
				  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM `sample_submit`";
                    $query = $conn->query($sql);
					
                    while($row = $query->fetch_assoc()){
                       
                      ?>
                        <tr>
						  <td><?php echo $row['SampleCode']; ?></td>
						  <td><?php echo $row['CommonName']; ?></td>
						  <td><?php echo $row['Submissiondate']; ?></td>
						  <td><?php echo $row['Submissiondate']; ?></td>
						  <td><?php echo $row['type']; ?></td>
						  
				  <?php 
					  $status = $row['Head_Status'];
					  if($status == 0) {
						  echo '<td><span class="label label-primary">New</span></td>';
				
					  } else {
					      $scode = $row['SampleCode'];
					      
					      $sql="SELECT * FROM lab_remark WHERE SampleCode ='$scode'";
					      $result1 = mysqli_query($conn, $sql);
					      if($row1=mysqli_fetch_array($result1)){
					          $sttus = $row1['ConditionStatus'];
					          if($sttus=="Accept") {
					               $status = "Accepted";
					          } else {
					               $status = "Rejected";
					          }
					           echo '<td><span class="label label-success">'.$status.'</span></td>';
					      }  else {
					          echo '<td><span class="label label-success">Unassigned</span></td>';
					      }
					      
					      
						 
					  }
					?>
                     
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['Submit_ID']; ?>"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['Submit_ID']; ?>"><i class="fa fa-trash"></i> Delete</button>
                             <?php 
            					  $status = $row['Head_Status'];
            					  if($status == 0) {
            						  echo '<td></td>';
            					  } else {
            					      
            					         $scode = $row['SampleCode'];
                					      $sql1="SELECT * FROM lab_remark WHERE SampleCode ='$scode'";
                					      $result11= mysqli_query($conn, $sql1);
                					      if($row11=mysqli_fetch_array($result11)){
                					          $sttus1 = $row11['AssignStatus'];
                					          if($sttus1 == 0 and $row11['ConditionStatus']=="Accept") {
                					              
                					              //check the assigned submission from head to checker and analyst
                					              $empty_vr ="";
                					               $sqlsb="SELECT * FROM sample_submit WHERE SampleCode ='$scode'";
                            					      $resultsb= mysqli_query($conn, $sqlsb);
                            					      if($rowsb=mysqli_fetch_array($resultsb)){
                            					          $analyst =$rowsb['Analyst'];
                            					          $checker =$rowsb['Checker'];
                            					          if($analyst =="" AND  $checker =="") {
                            					              if($analyst =="" OR  $checker =="") {
                            					                   //hawaja assign bado
                            					                    echo '<a href="sample_analysis.php?sample='.$row11['SampleCode'].'" class="btn btn-success btn-sm btn-flat"><i class="fa fa-pencil"></i>Assign</a>';
                            					              }
                            					          } else {
                            					              //kisha assign tayari
                            					               echo '<span style="!pointer-events: none !important;"><a href="sample_analysis.php?asample='.$row11['SampleCode'].'" class="btn btn-success btn-sm btn-flat" disabled><i class="fa fa-pencil"></i>Assigned</a><a href="sample_analyst_detail.php?sample='.$row11['SampleCode'].'" class="pull-right photo">
							                                        <span class="fa fa-edit">View</span></a></span>';
                            					          }
                            					      }
                					              
                					               //echo '<a href="sample_analysis.php?sample='.$row11['SampleCode'].'" class="btn btn-success btn-sm btn-flat"><i class="fa fa-pencil"></i>Assign</a>';
                					          } else {
                					                echo '<button class="btn btn-primary btn-sm view btn-flat" data-id="'.$row['Submit_ID'].'"><i class="glyphicon glyphicon-zoom-in"></i>Check</button>';
                					          }
                					      }  else {
                					          echo '<button class="btn btn-primary btn-sm view btn-flat" data-id="'.$row['Submit_ID'].'"><i class="glyphicon glyphicon-zoom-in"></i>Check</button>';
                					      }
					      
        
            					  }
            					?>
							
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
                document.getElementById("hapa").innerHTML = this.responseText;
            }
        };
       
        xmlhttp.open("GET", "getsearch.php?from=" + FromDate +"&to="+ ToDate, true);
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
    $('.empid').val(response.SampleCode);
	 $('#empid').val(response.Submit_ID);
    
       $('#ass_head').val(response.HeadofLab);
      $('#ass_code').val(response.SampleCode);
      $('#ass_samplename').val(response.CommonName);
      $('#ass_quantity').val(response.Quantity);
      $('#ass_batch').val(response.Batch);
       $('#ass_manu_date').val(response.Mandate);
         $('#ass_expirydate').val(response.Expirydate);
         $('#ass_duedate').val(response.DueDate);
         
      $('#edit_name').val(response.Officer);
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
