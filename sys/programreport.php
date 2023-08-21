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
      Project/Program List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Project List</li>
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
                 <div class="col-md-12" style="background-color:lightgray;">
                     <div class="col-md-4">
                         <div class="form-group">
                              <label>Search By KPI :</label>
                              <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <select class="form-control select2" name="kra_search" id="kra_search" onchange="ProgramReport(this.value)">
                                                  <?php 
                                                include 'includes/conn.php'; 
                                                    $query = "SELECT * FROM `keyarea`"; 
                                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    echo '<option value="0">Select...</option>';
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        echo '<option value="'.$row['IDNo'].'">'.$row['KeyArea'].'</option>';
                                                    }  
                                                    
                                            ?>  
                                        </select>
                                    </div>
                         </div>
                     </div>
                     <div class="col-md-4">
                          <div class="form-group">
                                    <label>Search by Sector :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <select class="form-control select2" name="sector_search" id="sector_search" onchange="ProgramReport(this.value)">
                                                  <?php 
                                                include 'includes/conn.php'; 
                                                    $query = "SELECT * FROM `sector`"; 
                                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    echo '<option value="0">Select...</option>';
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        echo '<option value="'.$row['SectorID'].'">'.$row['SectorName'].'</option>';
                                                    }  
                                                    
                                            ?>  
                                        </select>
                                    </div>
                                  </div>
                     </div>
                     <div class="col-md-4">
                          <div class="form-group">
                                    <label> Search by Program :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <select class="form-control select2" name="program_search" id="program_search" onchange="ProgramReport(this.value)">
                                               <option value="0">Select</option>
                                          <?php 
                                                include 'includes/conn.php'; 
                                                
                                                     $query = "SELECT * FROM `projecttb` WHERE `pType`='Program'"; 
                                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    echo '<option value="0">Select...</option>';
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        echo '<option value="'.$row['ID'].'">'.$row['pTitle'].'  ('.$row['BudgetTerm'].')</option>';
                                                    }  
                                                    
                                            ?>  
                                         
                                        </select>
                                    </div>
                                  </div>
                     </div>
                     
                 </div>
                 <div class="col-md-12" style="background-color:lightgray;">
                     <div class="col-md-4">
                         <div class="form-group">
                            <label>Search by Sponser Type :</label>
                              <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-building"></i>
                              </div>
                              <select class="form-control select2" name="sponser_search" id="sponser_search" onchange="ProgramReport(this.value)">
                                        <option value="0">Search</option> 
                                        <option value="1">Government</option>
                                        <option value="2">Private</option>
                                        <option value="3">PPP</option>
                                        <option value="4">Development Partners</option>
                                        <option value="5">Government & Development Partners</option>
                                </select>
                            </div>
                            <!-- /.input group -->       
                        </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-group">
                            <label>Search by Start and End Date :</label>
                              <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="reservation" onchange="ProgramReport(this.value)">
                            </div>
                            <!-- /.input group -->       
                        </div>
                     </div>
                      <div class="col-md-4">
                         <div class="form-group">
                            <label>Search by Budget term :</label>
                              <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-building"></i>
                              </div>
                             <select class="form-control select2" name="budgeterm_search" id="budgeterm_search" onchange="ProgramReport(this.value)">
                                                     <option value="0">Select</option>
                                          <?php 
                                                include 'includes/conn.php'; 
                                                
                                                     $query = "SELECT * FROM `budgetterm`"; 
                                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                     echo '<option value="0">Select...</option>';
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        echo '<option value="'.$row['ID'].'">'.$row['Item'].'</option>';
                                                    }  
                                                    
                                            ?>  
                                        </select>
                            </div>
                            <!-- /.input group -->       
                        </div>
                     </div>
                      
                 </div>
                 <div class="col-md-12" >
                    
                     <div class="col-md-10">
                        
                     </div>
                     <div class="col-md-2">
                         <div class="form-group">
                             <label>Result :</label>
                              <div class="input-group">
                                 
                              </div>
                        </div>
                     </div>
                 </div>
            <br />
            <div class="col-md-12">
            <table id="example2s" class="table table-bordered table-hover">
                <thead>
                  <th>S.N</th>
                  <th>Title</th>
                  <th>Implementor(s)</th>
                  <th>Sponser(s)</th>
                  <th>Duration</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody id="searchResult">
                 <?php 
                    include "includes/conn.php";
                    $query = "SELECT * FROM `projecttb` WHERE `pType` ='Project'"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    
                    while($row = mysqli_fetch_array($result)) {	
                        $duration = $row['Duration'].$row['Duration Unit'].' ('.$row['StartDate'].' - '.$row['EndDate'].')';
                        $status = $row['Status'];
                        $num +=1;
                        $getid = $row['ID'];
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['pTitle']. " (".$row['Short title'].")</td>";
                            
                            //calculate the sponser
                            $donor_name="";
                            $iter = 0;
                            $queryd = "SELECT * FROM `project_financing` WHERE `Project`='$getid'"; 
                            $resultd = mysqli_query($conn, $queryd) or die("Error : ".mysqli_error($conn));
                            while($rowd = mysqli_fetch_array($resultd)) {
                                $donor = $rowd['SponsorID'];
                                 $querydd = "SELECT * FROM `organizationtb` WHERE `ID`='$donor'"; 
                                 $resultdd = mysqli_query($conn, $querydd) or die("Error : ".mysqli_error($conn));
                                if($rowdd = mysqli_fetch_array($resultdd)) {
                                    if($iter == 0) {
                                         $donor_name = $rowdd['Name'];
                                    } else {
                                         $donor_name = $donor_name.', '.$rowdd['Name'];
                                    }
                                   $iter +=1;
                                }
                            }
                            
                            //calculate the implementors
                             $queryi = "SELECT *
                                       FROM project_targetgroup
                                       INNER JOIN projecttb ON project_targetgroup.Project=projecttb.ID 
                                       INNER JOIN organizationtb ON project_targetgroup.Institution = organizationtb.ID
                                       WHERE project_targetgroup.Project ='$getid'";
                                        $Institution ="";
                                        $iter = 0;
                                        $resulti = mysqli_query($conn, $queryi) or die("Error : ".mysqli_error($conn));
                                          while($rowi = mysqli_fetch_array($resulti)) {	
                                              if($iter == 0){
                                                   $Institution = $rowi['Name'];
                                              } else {
                                                  $Institution = $Institution .', '.$rowi['Name'];
                                              }
                                             $iter +=1;
                                          }
                            echo 
                            "<td>".$Institution."</td>
                            <td>".$donor_name."</td>
                            <td>".$duration."</td>
                              <td>";
                                 if($row['Status'] == "IDENTIFICATION"){
                                           echo  "<span class='label label-primary'>".$row['Status']."</span>";
                                        } elseif($row['Status'] == "IMPLEMENTATION"){
                                          echo  "<span class='label label-info'>".$row['Status']."</span>";
                                        } elseif($row['Status'] == "COMPLETION"){
                                          echo  "<span class='label label-success'>".$row['Status']."</span>";
                                        }  elseif($row['Status'] == "CANCELLED"){
                                            echo  "<span class='label label-danger'>".$row['Status']."</span>";
                                        }
                                            elseif($row['Status'] == "SUSPENDED"){
                                            echo  "<span class='label label-warning'>".$row['Status']."</span>";
                                        }
                 
                            echo "<td>
                                      <a href='report_project.php?id=".$row['ID']."'><button class='btn btn-info btn-sm'><i class='fa fa-print'></i></button></a>
                                      <a href='viewprojectreport.php?id=".$row['ID']."'><button class='btn btn-warning btn-sm'><i class='fa fa-eye'></i></button></a>
                                    
                                    </td>
                        </tr>";
                    }
                   
                    ?>
                                            
                                            
                 
                </tbody>
              </table>"
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
 <?php include 'includes/list_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
  $(document).ready(function() {
    $('#example2s').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );

    // $('#exampless').DataTable( {
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copyHtml5',
    //         'excelHtml5',
    //         'csvHtml5',
    //         'pdfHtml5'
    //     ]
    // } );
} );
</script>
<script>
$(function(){
	$("body").on("click", ".editagenda", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editagenda').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".reports", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#reports').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".photo", function(e){
 // $('.photo').click(function(e){
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
    url: '',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.agendaid').val(response.ID);
      $('.agenda_name').html(response.Name);
      $('#edit_code').val(response.Code);
      $('#edit_agendaname').val(response.Name);
      $('#edit_startdate').val(response.StartDate);
      $('#edit_enddate').val(response.EndDate);
      $('#edit_about').val(response.Explaination);
      $('#edit_status').val(response.Status)
      //$('#position_val').val(response.position_id).html(response.Status);
    //  $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    }, 
    error:function(x,e) {
        if (x.status==0) {
            alert('You are offline!!\n Please Check Your Network.');
        } else if(x.status==404) {
            alert('Requested URL not found.');
        } else if(x.status==500) {
            alert('Internel Server Error.');
        } else if(e=='parsererror') {
            alert('Error.\nParsing JSON Request failed.');
        } else if(e=='timeout'){
            alert('Request Time out.');
        } else {
            alert('Unknow Error.\n'+x.responseText);
        }
    }
  });
}
</script>
</body>
</html>
