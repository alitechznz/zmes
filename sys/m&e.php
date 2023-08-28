<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	
<script type="text/javascript">
function ShowmeIndicator(str) {
       
       if(str == "") {
           document.getElementById("kpi_indicator_detail").innerHTML = "";
           return;
       } else {
           if (window.XMLHttpRequest) {
               // code for IE7+, Firefox, Chrome, Opera, Safari
               xmlhttp = new XMLHttpRequest();
           } else {
               // code for IE6, IE5
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
           }
           xmlhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("kpi_indicator_detail").innerHTML = this.responseText;
               }
           };
           xmlhttp.open("GET","getplanindicator.php?q="+str,true);
           xmlhttp.send();
       }
   }
</script>

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
                                  $user_id = $_SESSION['user'];
                                  $user_org = $_SESSION['user_org'];

                                  include 'includes/conn.php';
                              //submission
                              $submit_by =0;
                              $submit_on ='';
                              $submit_status = 2;
                              $submit_comment ='';
                              $user = '';

                              $approve_by =0;
                              $approve_on ='';
                              $approve_comment ='';
                              $approve_status = 2;

                              $confirm_by =0;
                              $confirm_on ='';
                              $confirm_comment ='';
                              $confirm_status = 2;

                              $accept_by =0;
                              $accept_on ='';
                              $accept_comment ='';
                              $accept_status = 2;
                              $monitoring_id = 0;

                              $queryk = "SELECT * FROM `mon_form_approval` WHERE `project_id`='$get_id' AND `report_type`='MEPlan' AND `repeat_status`='1'";
                              $resultk = mysqli_query($conn, $queryk) or die("Error : ".mysqli_error($conn));
                              if($rowk = mysqli_fetch_array($resultk)) {
                                $monitoring_id = $rowk['approval_id'];
                                $submit_by = $rowk['submit_by'];
                                $submit_on = $rowk['submit_date'];
                                $submit_status = $rowk['submit_status'];
                                $submit_comment = $rowk['submit_comment'];
  
                                $approve_by = $rowk['approve_by'];
                                $approve_on = $rowk['approve_date'];
                                $approve_comment = $rowk['approve_comment'];
                                $approve_status = $rowk['approve_status'];
  
                                $confirm_by = $rowk['confirm_by'];
                                $confirm_on = $rowk['confirm_date'];
                                $confirm_comment = $rowk['confirm_comment'];
                                $confirm_status = $rowk['confirm_status'];
  
                                $accept_by = $rowk['accept_by'];
                                $accept_on = $rowk['accept_date'];
                                $accept_comment = $rowk['accept_comment'];
                                $accept_status = $rowk['accept_status']; 
                              }

                              if($submit_by==0){$submit_by = $user_id; }
                              if($approve_by==0){$approve_by = $user_id; }
                              if($confirm_by==0){$confirm_by = $user_id; }
                              if($accept_by==0){$accept_by = $user_id; }

                              
                              $queryko = "SELECT * FROM `userinfo`";
                              $resultko = mysqli_query($conn, $queryko) or die("Error : ".mysqli_error($conn));
                              while($rowko = mysqli_fetch_array($resultko)) {
                                  if($rowko['id']==$submit_by){
                                    $submit_by = $rowko['Fullname'];
                                  } 
                                  if($rowko['id']==$approve_by){
                                    $approve_by = $rowko['Fullname'];
                                  } 
                                  if($rowko['id']==$confirm_by){
                                    $confirm_by = $rowko['Fullname'];
                                  } 
                                  if($rowko['id']==$accept_by){
                                    $accept_by = $rowko['Fullname'];
                                  } 
                                  
                                  if($rowko['id']==$user_id){
                                    $user = $rowko['Fullname'];
                                  } 
                              }

                              ?>
                              <input type="hidden" class="form-control" name="project" value="<?php echo $get_id; ?>" required/>
                              <input type="hidden" class="form-control"  value="<?php echo $get_id; ?>"  id="project_idp"/>
                              <input type="hidden" class="form-control" name="user" value="<?php echo $user_id; ?>" required/>
                              <input type="hidden" class="form-control" name="organization" value="<?php echo $user_org; ?>" required/>

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
                                          <div id="kpi_indicator_detail">

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
                                                  echo '<option value="Other">Other</option>';
                                                  ?>  
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                         
                                      </div>
                                      <div class="col-md-12">
                                          <div class="col-md-4">
                                                <div class="form-group" id="kpi_indicator_plan">
                                                  <label>Indicator (KPI):</label>
                                                  <input type="text" class="form-control" name="indicator" placeholder=" Enter indicator ..." required/>
                                                </div>
                                          </div>
                                          <div id="kpi_indicator_detail">
                                               
                                          </div>
                                         
                                      </div>
                                     
                                <?php } ?>
                                <div class="col-md-12">
                                <?php 
                                  if(strpos($user_role['Permission'], 'mon_submit') !== false){
                                    if(isset($_GET['type']) OR $submit_status == 1){
                                      // if($_GET['type'] == 'submit') {
                                        echo '&nbsp;<a href="assign_kra?id='.$get_id.'" class="btn bg-navy btn-flat pull-left"><i class="fa fa-arrow-left"></i> Back</a>';
                                         if($submit_status == 2 || $submit_status == 0){
                                          echo '&nbsp;<button type="submit" class="btn btn-primary btn-flat pull-left" name="submitprojectkra"><i class="fa fa-save"></i> Submit</button>';
                                         } else {
                                          echo '&nbsp;<button type="submit" class="btn btn-primary btn-flat pull-left" name="submitprojectkra" disabled><i class="fa fa-save"></i> Submit</button>';
                                         }
                                      // }
                                    } else {
                                      echo '&nbsp;<button type="submit" class="btn btn-primary btn-flat pull-left" name="addprojectkra"><i class="fa fa-save"></i> Save</button>';
                                    }
                                    
                                  }
                                  if(strpos($user_role['Permission'], 'mon_submit') !== false){
                                    if($submit_status == 0 || $submit_status == 2){
                                      echo '&nbsp;<a href="assign_kra?id='.$get_id.'&type=submit" class="btn btn-success btn-flat pull-left" data-dismiss="modal"><i class="fa fa-edit"></i> Submit KPI</a>';
                                    } else {
                                      echo '&nbsp;<a href="assign_kra?id='.$get_id.'&type=submit" class="btn btn-success btn-flat pull-left" data-dismiss="modal" disabled><i class="fa fa-edit"></i> Submit KPI</a>';
                                    }
                                  }

                                  if(strpos($user_role['Permission'], 'mon_verify') !== false){
                                    if($approve_status == 0 || $approve_status == 2){
                                        echo '&nbsp;<button type="submit" name="kpimonapprove" class="btn btn-success btn-flat pull-left" data-dismiss="modal"><i class="fa fa-edit"></i> Approve KPI</button>';
                                    } else {
                                        echo '&nbsp;<a href="assign_kra?id='.$get_id.'&type=approve" class="btn btn-success btn-flat pull-left" data-dismiss="modal" disabled><i class="fa fa-edit"></i> Approve KPI</a>';
                                    }
                                  }

                                  if(strpos($user_role['Permission'], 'mon_confirm') !== false){
                                    if($confirm_status == 0 || $confirm_status == 2){
                                      echo '&nbsp;<button type="submit" name="kpimonconfirm" class="btn btn-success btn-flat pull-left" data-dismiss="modal"><i class="fa fa-edit"></i>Confirm KPI</button>';
                                    } else {
                                      echo '&nbsp;<button type="submit" name="kpimonconfirm" class="btn btn-success btn-flat pull-left" data-dismiss="modal" disabled><i class="fa fa-edit"></i>Confirm KPI</button>';
                                    }
                                  }

                                  if(strpos($user_role['Permission'], 'mon_accept') !== false){
                                    if($accept_status == 0 || $accept_status == 2){
                                          echo '&nbsp;<button type="submit" name="kpimonaccept" class="btn btn-success btn-flat pull-left" data-dismiss="modal"><i class="fa fa-edit"></i>ZPC Accept KPI</button>';
                                    } else {
                                      echo '&nbsp;<a href="assign_kra?id='.$get_id.'&type=accept" class="btn btn-success btn-flat pull-left" data-dismiss="modal" disabled><i class="fa fa-edit"></i> ZPC Accept KPI</a>';
                                    }
                                  }
                                
                                ?>
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
