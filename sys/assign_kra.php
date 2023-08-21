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
          KEY PERFORMANCE INDICATOR (KPI): 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">KPI</li>
      </ol>
      <p>(<?php echo $project_name; ?>)</p>
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
                   <div class="box-header">
                     
                   </div>
                       <form action="includes/controller.php" method="post">
                            <?php 
                               if(isset($_GET['id'])){
                                  $get_id = $_GET['id'];
                              } else {
                                  $get_id = 0;
                              }

                              $user_id = $_SESSION['user'];
                              $user_org = $_SESSION['user_org'];

                            ?>
                              <input type="hidden" class="form-control" name="project" value="<?php echo $get_id; ?>" required/>
                              <input type="hidden" class="form-control" name="user" value="<?php echo $user_id; ?>" required/>
                              <input type="hidden" class="form-control" name="organization" value="<?php echo $user_org; ?>" required/>
                            <div class="col-md-12">
                               <input name="projid" value="<?php  echo $get_id; ?>" type="hidden" />
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Project Tittle :</label>
                                        <input type="text" class="form-control" name="project" value ="<?php echo $project_name; ?>" style="width: 100%;"  readonly/>
                                        </select>
                                    </div>
                              </div>
                              <div class="col-md-4">
                                    
                                  <div class="form-group">
                                    <label>Activity :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <select class="form-control select2" style="width: 100%;" name="activity">
                                          <?php 
                                              include 'includes/conn.php'; 
                                              $query = "SELECT * FROM `project_activity` WHERE `Project`='$get_id'"; 
                                              $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                              $num = 0;
                                              echo '<option value="0">Select...</option>';
                                              while($row = mysqli_fetch_array($result)) {	
                                                  echo '<option value="'.$row['activityID'].'">'.$row['Activity'].'</option>';
                                              }  
                                                    
                                          ?>  
                                      </select>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                    
                                  <div class="form-group">
                                    <label>Plan :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <select class="form-control select2" style="width: 100%;" name="plan" onchange="ShowKPIvalue(this.value)" required>
                                       <?php 
                                                include 'includes/conn.php'; 
                                                    $query = "SELECT * FROM `agendatb`"; 
                                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    echo '<option value="0">Select...</option>';
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                                    }  
                                                    
                                            ?>  
                                        </select>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Key Performance Indicator (KPI) :</label>
                                        <select class="form-control select2" style="width: 100%;" name="kpi" id="getkpivalue">
                                         
                                         </select>
                                    </div>
                              </div>
                                
                              
                          </div>
            
                          <div class="col-md-12">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                              <button type="submit" class="btn btn-primary btn-flat" name="addprojectkra"><i class="fa fa-save"></i> Save</button>
                            </div>
                          </div>
                       </form>
                       
                    </div><!-- /.row -->	
                </div> <!-- /.tab-pane -->
               
                                  
            </div>
        <div class="col-md-12">
             <div class="box">
               <div class="box-body">
                  <table id="example1" class="table table-bordered">
                <thead>
                  <th>S.N</th>
                  <th>Project</th>
                  <th>Activity</th>
                  <th>Plan</th>
                  <th>KPI</th>
                  <th>Action</th>
                </thead>
                <tbody>
               
                <?php 
                    include 'includes/conn.php';
                    if(isset($_GET['id'])){
                        $get_id = $_GET['id'];
                    } else {
                        $get_id = 0;
                    }
                    $query = "SELECT * FROM project_kra
                                INNER JOIN keyarea ON project_kra.KPI = keyarea.IDNo
                                INNER JOIN projecttb ON project_kra.Project = projecttb.ID
                                INNER JOIN agendatb ON project_kra.plan_id = agendatb.ID
                                INNER JOIN project_activity ON project_kra.activity_id = project_activity.activityID
                                WHERE project_kra.Project='$get_id'"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        $num +=1;
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['pTitle']."</td>
                            <td>".$row['Activity']."</td>
                            <td>".$row['Name']."</td>
                            <td>".$row['KeyArea']."</td>";
                            echo "<td>
                                       
                                       
                                         <button class='btn btn-danger btn-sm deleteprojkra btn-flat' data-id=".$row['projkraID']."><i class='fa fa-trash'></i> Delete</button>
                                    
                                    </td>
                        </tr>";
                    }
                    // <button class='btn btn-success btn-sm editprojkra btn-flat' data-id=".$row['projkraID']."><i class='fa fa-edit'></i> Edit</button>
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
  <?php include 'includes/agenda_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$("body").on("click", ".editprojkra", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editprojkra').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".deleteprojkra", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deleteprojkra').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


});

function getRow(id){
	//alert('Hi ali');
	//alert(id);
  $.ajax({
    type: 'POST',
    url: 'projkra_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.projkraid').val(response.projkraID);
      $('.projkra_name').html(response.pTitle);
      $('.projkra_name_kpi').html(response.KeyArea);
      $('#edit_projid').val(response.pTitle);
      $('#edit_kra').val(response.KRA);
      $('.proj_kra_id').val(response.Project);
     
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
