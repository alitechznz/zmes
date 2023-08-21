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
    FINANCE REPORT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Finance Report</li>
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
                <div class="col-md-12" style="background-color: #DCDCDC; padding-top: 20px;">
                     <div class="col-md-3">
                         <div class="form-group">
                              <label>Finance Type :</label>
                               <div class="input-group">
                                            <label>
                                                <input type="radio" name="type" value="Project" id="chk_project" onclick="checkFluency()" class="flat-red">
                                                MAKISIO
                                            </label>&nbsp;	&nbsp;
                                             <label>
                                                <input type="radio" name="type" value="Project" id="chk_project" onclick="checkFluency()" class="flat-red">
                                                MGAO
                                            </label>&nbsp;	&nbsp;
                                </div>
                         </div>
                     </div>
                     <div class="col-md-3">
                         <div class="form-group">
                            <a href='viewprojectreport.php?id=".$row['ID']."'><button class='btn btn-sm'><i class='fa fa-search'></i>&nbsp; <b> SEARCH BY WIZARA</b></button></a>
                              <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <select class="form-control select2" name="sector" onchange="ShowInternalCode(this.value)">
                                                     <option value="0">Chagua Wizara Moja</option>
                                          <?php 
                                                include 'includes/conn.php'; 
                                                
                                                     $query = "SELECT * FROM `organizationtb` WHERE `Type`='Government'"; 
                                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                                    }  
                                                    
                                            ?>  
                                        </select>
                            </div>
                            <!-- /.input group -->       
                        </div>
                     </div>
                     <div class="col-md-3">
                         <div class="form-group">
                            <a href='viewprojectreport.php?id=".$row['ID']."'><button class='btn btn-sm'><i class='fa fa-search'></i>&nbsp; <b> SEARCH BY KRA</b></button></a>
                              <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <select class="form-control select2" name="sector" onchange="ShowInternalCode(this.value)">
                                                     <option value="0">Chagua KRA Moja</option>
                                          <?php 
                                                include 'includes/conn.php'; 
                                                
                                                     $query = "SELECT * FROM `organizationtb` WHERE `Type`='Government'"; 
                                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                                    }  
                                                    
                                            ?>  
                                        </select>
                            </div>
                            <!-- /.input group -->       
                        </div>
                     </div>
                      <div class="col-md-3">
                         <div class="form-group">
                            <a href='viewprojectreport.php?id=".$row['ID']."'><button class='btn btn-sm'><i class='fa fa-search'></i>&nbsp; <b>SEARCH BY MIUNDOMBINU</b></button></a>
                              <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <select class="form-control select2" name="sector" onchange="ShowInternalCode(this.value)">
                                                     <option value="0">Chagua Miundombinu Moja</option>
                                          <?php 
                                                include 'includes/conn.php'; 
                                                
                                                     $query = "SELECT * FROM `organizationtb` WHERE `Type`='Government'"; 
                                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                                    }  
                                                    
                                            ?>  
                                        </select>
                            </div>
                            <!-- /.input group -->       
                        </div>
                     </div>
                    
                 </div>
                 
                 <div class="col-md-12">
                     <div class="col-md-4">
                          <div class="form-group">
                            <label>Number of Result(s) :</label>
                              <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-building"></i>
                              </div>
                              <input type="text" class="form-control pull-right" readonly>
                            </div>
                            <!-- /.input group -->       
                        </div>
                     </div>
                     <div class="col-md-6">
                        
                     </div>
                     <div class="col-md-2">
                         <div class="form-group">
                             <label>Action :</label>
                              <div class="input-group">
                                  <a href='viewprojectreport.php?id=".$row['ID']."'><button class='btn btn-info btn-sm'><i class='fa fa-print'></i> Print</button></a>
                                  <a href='viewprojectreport.php?id=".$row['ID']."'><button class='btn btn-primary btn-sm'><i class='fa fa-edit'></i> Export</button></a>
                              </div>
                        </div>
                     </div>
                 </div>
                 <div class="col-md-12"><table id="example2" class="table table-bordered table-hover">
                <thead>
                  <th>S.N</th>
                  <th>Title</th>
                  <th>Implementor(s)</th>
                  <th>Sponser(s)</th>
                  <th>Duration</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>
               
                <?php 
                    include 'includes/conn.php';
                    $query = "SELECT * FROM `projecttb`"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        $num +=1;
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['pTitle']. " (".$row['Short title'].")</td>
                            <td>".$row['pType']."</td>
                            <td>".$row['StartDate']."</td>
                            <td>".$row['EndDate']."</td>
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
                                        <a href='viewprojectreport.php?id=".$row['ID']."'><button class='btn btn-info btn-sm'><i class='fa fa-print'></i></button></a>
                                         <a href='viewprojectreport.php?id=".$row['ID']."'><button class='btn btn-warning btn-sm'><i class='fa fa-eye'></i></button></a>
                                       
                                    </td>
                        </tr>";
                    }
                   
                    ?>
                                            
                 
                </tbody>
              </table></div>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/agenda_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$("body").on("click", ".editoutcome", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editoutcome').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".deleteoutcome", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deleteoutcome').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'outcome_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.outcomeid').val(response.ID);
      $('.outcome_name').html(response.Outcome);
      $('#edit_kraoutcome').val(response.IDNo);
      $('#edit_outstatement').val(response.Outcome);
      $('#edit_outstatus').val(response.OutStatus)
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
