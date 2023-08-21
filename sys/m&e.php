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
      M&E Planning Form: 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">M&E Planning Form</li>
      </ol>
      <p>(<?php echo $project_name; ?>)</p>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])) {
            echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])) {
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
                         if(isset($_GET['id'])) {
                             $get_id = $_GET['id'];
                         } else {
                             $get_id = 0;
                         }
?>
                              <input type="hidden" class="form-control" name="project" value="<?php echo $get_id; ?>" required/>
                                <input type="hidden" class="form-control"  value="<?php echo $get_id; ?>"  id="project_idp"/>
                                
                                <?php
     if(isset($_GET['plan'])) {
         $idp = $_GET['plan'];
         $query = "SELECT * FROM project_plan WHERE IDp='$idp'";
         $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
         $num = 0;
         $description = "";
         $indicator = "";
         $definition = "";
         $baseline = "";
         $target = "";
         $source = "";
         $frequency = "";
         $responsible = "";
         $descript_value = "";
         if($row = mysqli_fetch_array($result)) {
             $description = $row['Description'];
             $indicator = $row['Indicator'];
             $definition = $row['Definition'];
             $baseline = $row['Baseline'];
             $target = $row['Target'];
             $source = $row['Source'];
             $frequency = $row['Frequency'];
             $responsible = $row['Responsible'];
             $descript_value = $row['Value'];
         }
         ?>
                                   <input type="hidden" value="<?php echo $_GET['plan']; ?>" name="id">
                                      <div class="col-md-12">
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                <label>Project Description :</label>
                                                <div class="input-group">
                                                  <div class="input-group-addon">
                                                  <i class="fa fa-building"></i>
                                                  </div>
                                                  <select class="form-control select2" style="width: 100%;" name="description" onchange="ShowPlanValue(this.value)" required>
                                                      <option selected="selected" value=""> ... Select ...</option>
                                                      <option value="Goal"> Goal/Impact</option>
                                                      <option value ="Outcome">Outcome</option>
                                                      <option value="Output">Output</option>
                                                      <option value="Activity">Activity</option>
                                                    </select>
                                                </div>
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Indicator :</label>
                                                <input type="text" class="form-control" name="indicator" value="<?php echo $indicator; ?>" placeholder=" Enter indicator ..." required/>
                                                </div>
                                          </div>
                                          <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Definition of Indicator :</label>
                                                    <input type="text" class="form-control" name="definition" value="<?php echo $definition; ?>" placeholder=" Enter definition ..." required/>
                                                </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                <input type="text" class="form-control" name="planvalue" value="<?php echo $descript_value; ?>" placeholder=" Enter definition ..." required/>
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                <label>Baseline :</label>
                                                <input type="text" class="form-control" name="baseline" value="<?php echo $baseline; ?>" placeholder=" Enter baseline ..." required/>
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Target :</label>
                                                <input type="text" class="form-control" name="target" value="<?php echo $target; ?>" placeholder=" Enter target ..." required/>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="col-md-4">
                                            
                                          </div>
                                          <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Source Of Data :</label>
                                                <input type="text" class="form-control" name="source" value="<?php echo $source; ?>" placeholder=" Enter source ..." required/>
                                                </div>
                                          </div>
                                          <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Frequence :</label>
                                                <input type="text" class="form-control" name="frequency" value="<?php echo $frequency; ?>" placeholder=" Enter frequency ..." required/>
                                                </div>
                                          </div>
                                          
                                      </div>
                                      <div class="col-md-12">
                                          <div class="col-md-4">
                                          </div>
                                          <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Responsible :</label>
                                                <input type="text" class="form-control" name="responsible" value="<?php echo $responsible; ?>" placeholder=" Enter responsible ..." required/>
                                                </div>
                                          </div> 
                                      </div>
                                      <div class="col-md-12">
                                        <div class="modal-footer">
                                          <a href="m&e.php?id=<?php echo $get_id; ?>" class="btn btn-default btn-flat pull-left"><i class="fa fa-close"></i> Clean</a>
                                          <button type="submit" class="btn btn-primary btn-flat" name="editmeplan"><i class="fa fa-save"></i> Update</button>
                                        </div>
                                      </div>  
                                <?php
     } else {
         ?>
                                      <div class="col-md-12">
                                          <div class="col-md-4">
                                                
                                                <div class="form-group">
                                                <label>Project Description :</label>
                                                <div class="input-group">
                                                  <div class="input-group-addon">
                                                  <i class="fa fa-building"></i>
                                                  </div>
                                                  <select class="form-control select2" style="width: 100%;" name="description" onchange="ShowPlanValue(this.value)" required>
                                                      <option selected="selected" value=""> ... Select ...</option>
                                                      <option value="Goal"> Goal/Impact</option>
                                                      <option value ="Outcome">Outcome</option>
                                                      <option value="Output">Output</option>
                                                      <option value="Activity">Activity</option>
                                                    </select>
                                                </div>
                                              </div>
                                          </div>
                                          <div class="col-md-4" id="planidvalue">
                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                              <label>Plan :</label>
                                              <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-building"></i>
                                                </div>
                                                <select class="form-control select2" style="width: 100%;" name="plan_activity" onchange="ShowmeKPI(this.value)" required>
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
                                         
                                      </div>
                                      <div class="col-md-12">
                                          <div class="col-md-4">
                                                <div class="form-group" id="kpi_indicator_plan">
                                                  <label>Indicator :</label>
                                                  <input type="text" class="form-control" name="indicator" placeholder=" Enter indicator ..." required/>
                                                </div>
                                          </div>
                                          <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Definition of Indicator :</label>
                                                    <input type="text" class="form-control" name="definition" placeholder=" Enter definition ..." required/>
                                                </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                              <label>Baseline :</label>
                                              <input type="text" class="form-control" name="baseline" placeholder=" Enter baseline ..." required/>
                                            </div>
                                          </div>
                                         
                                      </div>
                                      <div class="col-md-12">
                                          <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Target :</label>
                                                <input type="text" class="form-control" name="target" placeholder=" Enter target ..." required/>
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Source Of Data :</label>
                                                <input type="text" class="form-control" name="source" placeholder=" Enter source ..." required/>
                                                </div>
                                          </div>
                                          <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Frequence :</label>
                                                    <select class="form-control select2" name="frequency" id="status" required>
                                                            <option value="">Select</option>
                                                            <option value="Annual">Annually</option>
                                                            <option value="Quartely">Quartely</option>                    
                                                    </select>
                                                    <!-- <input type="text" class="form-control"  placeholder=" Enter frequency ..." required/> -->
                                                </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="col-md-4">

                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                              <label>Responsible :</label>
                                              <input type="text" class="form-control" name="responsible" placeholder=" Enter responsible ..." required/>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                          <button type="submit" class="btn btn-primary btn-flat" name="addmeplan"><i class="fa fa-save"></i> Save</button>
                                        </div>
                                      </div>
                                <?php } ?>
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
                  <th>Description Type</th>
                  <th>Description</th>
                  <th>Indicator</th>
                  <th>Target</th>
                  <th>Baseline</th>
                  <th>Source Of Data</th>
                  <th>Action</th>
                </thead>
                <tbody>
               
                <?php
                    include 'includes/conn.php';
if(isset($_GET['id'])) {
    $get_id = $_GET['id'];
} else {
    $get_id = 0;
}
$query = "SELECT * FROM `project_plan` WHERE Project='$get_id'";
$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
$num = 0;
while($row = mysqli_fetch_array($result)) {
    $num +=1;
    echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['Description']."</td>
                            <td>".$row['Value']."</td>
                            <td>".$row['Indicator']."</td>
                            <td>".$row['Target']."</td>
                            <td>".$row['Baseline']."</td>
                            <td>".$row['Source']."</td>";
    echo "<td>
                                       
                                        <a href='m&e.php?id=".$get_id."&plan=".$row['IDp']."&update' class='btn btn-success btn-sm reports btn-flat'><i class='fa fa-edit'></i> Edit</a>
                                        <button class='btn btn-danger btn-sm deleteproj_plan btn-flat' data-id=".$row['IDp']."><i class='fa fa-trash'></i> Delete</button>
                                      
                                    </td>
                        </tr>";
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
  <?php include 'includes/agenda_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$("body").on("click", ".deleteproj_plan", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#deleteproj_plan').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });



});

function getRow(id){
	//alert('Hi ali');
	//alert(id);
  $.ajax({
    type: 'POST',
    url: 'projplan_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.projplanid').val(response.IDp);
      $('.proj_plan_id').val(response.Project);
      $('.projplan_name').html(response.pTitle);
      // $('#edit_code').val(response.Code);
     
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
