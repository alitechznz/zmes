<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<style>
    tr:nth-child(even) {
            background-color: Lightgreen;
        }
</style>
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/head_menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Resources of Status of Institution Intervention: 
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Resource Tracking</li>
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
                     <h4><strong>Actual Expendicture</strong></h4>
                   </div>
                       <form action="includes/controller.php" method="post">
                            <?php 
                               if(isset($_GET['id'])){
                                        $get_id = $_GET['id'];
                                    } else {
                                        $get_id = 0;
                                    }
                              ?>
                              <input type="hidden" class="form-control" name="project" value="<?php echo $get_id; ?>" required/>
                              <div class="col-md-12">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Particular :</label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                          <i class="fa fa-building"></i>
                                          </div>
                                          <select class="form-control select2" style="width: 100%;" name="particular">
                                            <option value="Actual Expendicture">Actual Expendicture</option>
                                           <?php 
                                                    //include 'includes/conn.php'; 
                                                       // $query = "SELECT * FROM `particular`"; 
                                                       // $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                       // $num = 0;
                                                        //echo '<option value="0">Select...</option>';
                                                        //while($row = mysqli_fetch_array($result)) {	
                                                           // echo '<option value="'.$row['Item'].'">'.$row['Item'].'</option>';
                                                       // }  
                                                        
                                                ?>  
                                            </select>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label>Activity :</label>
                                            <select class="form-control select2" style="width: 100%;" name="activity">
                                             <?php 
                                                    include 'includes/conn.php'; 
                                                    $g_id = 0;
                                                       if(isset($_GET['id'])){
                                                           $g_id = $_GET['id'];
                                                       } 
                                                        $query = "SELECT * FROM `project_activity` WHERE `Project`='$g_id'"; 
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
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label>Source of Fund :</label>
                                            <select class="form-control select2" style="width: 100%;" name="source">
                                             <?php 
                                                    include 'includes/conn.php'; 
                                                        $query = "SELECT * FROM `source`"; 
                                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                        $num = 0;
                                                        echo '<option value="0">Select...</option>';
                                                        while($row = mysqli_fetch_array($result)) {	
                                                            echo '<option value="'.$row['Item'].'">'.$row['Item'].'</option>';
                                                        }  
                                                        
                                                ?> 
                                             </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label> Explaination :</label>
                                            <textarea col="15" row="5" class="form-control" name="explaination" style="width: 100%;"></textarea>
                                            
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label> Total Amount :</label>
                                            <input type="text" class="form-control" name="amount" style="width: 100%;"  required/>
                                            
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                            <label> Attachment :</label>
                                            <input type="file" class="form-control" name="attachment" style="width: 100%;"/>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Start Date :</label>
                                        <input type="date" class="form-control" name="startdate" style="width: 100%;"/>
                                    </div>
                                  </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label> End Date :</label>
                                        <input type="date" class="form-control" name="enddate" style="width: 100%;"/>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="modal-footer">
                                      <!--<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>-->
                                      <button type="submit" class="btn btn-primary btn-flat" name="resource"><i class="fa fa-save"></i> Save</button>
                                    </div><br />
                                  </div>
                                  <br />
                                  <div class="col-md-12">
                                       <table id="example1" class="table table-bordered">
                                            <thead>
                                              <th>S.N</th>
                                              <th>Activity</th>
                                              <th>Source of Fund</th>
                                              <th>Date Range</th>
                                              <th>Amount</th>
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
                                                    $query = "SELECT project_activity.Activity,project_expendicture.wizara_approve, project_expendicture.wizara_submitted, project_expendicture.Source, project_expendicture.startdate,project_expendicture.enddate, project_expendicture.Amount, project_expendicture.Currency,project_expendicture.IDf, project_activity.activityID,project_expendicture.exp_activity, project_expendicture.Project  FROM `project_expendicture`, `project_activity`  WHERE project_expendicture.Project='$get_id' AND project_activity.activityID = project_expendicture.exp_activity"; 
                                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        $num +=1;
                                                            echo "<tr>
                                                            <td>".$num."</td>
                                                            <td>".$row['Activity']."</td>
                                                            <td>".$row['Source']."</td>
                                                            <td>".$row['startdate']." - ".$row['enddate']."</td>
                                                            <td>".$row['Amount']."(".$row['Currency'].")</td>";
                                                            echo "<td>";
                                                                       if($row['wizara_approve']==0 && $row['wizara_submitted']==0){
                                                                        echo "<button class='btn btn-danger btn-sm deleteproj_res btn-flat' data-id=".$row['IDf']."><i class='fa fa-trash'></i> Delete</button>";
                                                                       } else {
                                                                            echo "<button class='btn btn-danger btn-sm deleteproj_res btn-flat' data-id=".$row['IDf']." disabled><i class='fa fa-trash'></i> Delete</button>";
                                                                       }
                                                                echo "</td>
                                                        </tr>";
                                                    }
                                                   
                                                    ?>
                                                            
                                 
                                            </tbody>
                                        </table>
                                  </div>
                              </div>
                          <div class="col-md-12">
                            
                          </div>
                       </form>
                       <br />
                           
                    </div><!-- /.row -->	
                </div> <!-- /.tab-pane -->
               
                                  
            </div>
        <div class="col-md-12">
             <div class="box">
               <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Planned Expendicture</h4>
                            <?php 
                                //get the plan budget
                                include 'includes/conn.php';
                                if(isset($_GET['id'])){
                                    $get_id = $_GET['id'];
                                } else {
                                    $get_id = 0;
                                }
                                $pesa_SMZ_plan_source ='';
                                $pesa_WM_plan_source ='';
                                $pesa_total_plans = 0;
                                $num_ite1 = 0;
                                $num_ite = 0;
                                $plan_budget = "SELECT * FROM project_financing WHERE Project='$get_id'";
                                $res_plan = mysqli_query($conn, $plan_budget) or die("Error : ".mysqli_error($conn));
                                while($row_plan = mysqli_fetch_array($res_plan))
                                {   
                                    if($row_plan['SponsorID'] ==0){
                                        $pesa_SMZ_plan = $pesa_SMZ_plan + $row_plan['TotalAmount'];
                                        if($num_ite == 0){
                                            $pesa_SMZ_plan_source = $row_plan['Financing'];
                                        } else {
                                            $pesa_SMZ_plan_source = $pesa_SMZ_plan_source.', '.$row_plan['Financing'];
                                        }
                                        
                                    } else {
                                        $pesa_WM_plan = $pesa_WM_plan + $row_plan['TotalAmount'];
                                        if($num_ite1 == 0){
                                            $pesa_WM_plan_source = $row_plan['Financing'];
                                        } else {
                                            $pesa_WM_plan_source = $pesa_WM_plan_source.', '.$row_plan['Financing'];
                                        }
                                        $num_ite1 +=1;
                                    }
                                    $num_ite +=1;
                                }
                                $pesa_total_plan = $pesa_SMZ_plan + $pesa_WM_plan;
                                $pesa_total_plans = $pesa_total_plan;
                            ?>
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Total Planned Expendicture</h3>
                                                </div>
                                                <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Govenment, TZS</th>
                                                            <th>Development Partner, TZS</th>
                                                            <th>Total Amount, TZS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><b>Amount</b></td>
                                                            <td><?php echo number_format($pesa_SMZ_plan); ?></td>
                                                            <td>
                                                                <?php echo number_format($pesa_WM_plan); ?>
                                                            </td>
                                                            <td><b><?php echo number_format($pesa_total_plan); ?></b></td>
                                                        </tr>
                                                        <tr><td colspan="4"></td></tr>
                                                        <tr>
                                                            <td><b>Percentage %</b></td>
                                                            <td><span class="badge bg-red"><?php echo round(((($pesa_SMZ_plan) / $pesa_total_plan) * 100),2); ?>%</span></td>
                                                            <td>
                                                                <span class="badge bg-red"><?php echo round(((($pesa_WM_plan) / $pesa_total_plan) * 100),2); ?>%</span>
                                                            </td>
                                                            <td><span class="badge bg-red"><?php echo round(((($pesa_total_plan) / $pesa_total_plan) * 100),2); ?>%</span></td>
                                                        </tr>
                                                         <tr><td colspan="4"></td></tr>
                                                        <tr>
                                                            <td><b>Source</b></td>
                                                            <td><?php echo $pesa_SMZ_plan_source; ?></td>
                                                            <td>
                                                                <?php echo $pesa_WM_plan_source; ?>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Activity Planned Expendicture</h3>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Activity</th>
                                                            <th>Govenment, TZS</th>
                                                            <th>Development Partner, TZS</th>
                                                            <th>Total Amount, TZS</th>
                                                             <th>%</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                             //get the plan budget
                                                             include 'includes/conn.php';
                                                                if(isset($_GET['id'])){
                                                                    $get_id = $_GET['id'];
                                                                } else {
                                                                    $get_id = 0;
                                                                }
                                                            $total = 0;
                                                            $act_budget = "SELECT * FROM project_activity WHERE Project='$get_id'";
                                                            $act_result = mysqli_query($conn, $act_budget) or die("Error : ".mysqli_error($conn));
                                                            while($row_act = mysqli_fetch_array($act_result))
                                                            {   
                                                                $pesa_SMZ_plan = $row_act['Amount'];
                                                                $pesa_WM_plan = $row_act['amountWM'];
                                                                $pesa_total_plan = $pesa_SMZ_plan + $pesa_WM_plan;
                                                                $total  = $total  + $pesa_total_plan;
                                                                echo '
                                                                    <tr>
                                                                        <td>'.$row_act['Activity'].'</td>
                                                                        <td>'.number_format($row_act['Amount']).'</td>
                                                                        <td>'.number_format($row_act['amountWM']).'</td>
                                                                        <td>'.number_format($pesa_total_plan).'</td>
                                                                        <td>'.round(((($pesa_total_plan) / $pesa_total_plans) * 100),2).'</td>
                                                                    </tr>';
                                                            }
                                                           echo '<tr>
                                                            <th colspan="3"><b>Total</b></th>
                                                            <th>
                                                                '.number_format($total).'
                                                            </th>
                                                           
                                                        </tr>';
                                                        
                                                        ?>
                                                       
                                                        
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        
                        <div class="col-md-12">
                            <h4>Disbursed Expendicture</h4>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Activity Disbursed Expendicture</h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Activity</th>
                                                        <th>Govenment, TZS</th>
                                                        <th>Development Partner, TZS</th>
                                                        <th>Total Amount, TZS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    //get the plan budget
                                                    include 'includes/conn.php';
                                                    if(isset($_GET['id'])){
                                                        $get_id = $_GET['id'];
                                                    } else {
                                                        $get_id = 0;
                                                    }
                                                    $total = 0;
                                                            $dis_budget = "SELECT project_annualbudget.DA_Government,project_annualbudget.DA_Donor,project_annualbudget.Month,project_annualbudget.activity,project_annualbudget.Project, project_activity.Project, project_activity.Activity as proj_act FROM project_annualbudget,project_activity WHERE project_activity.Project=project_annualbudget.activity AND project_annualbudget.Project='$get_id'";
                                                            $dis_result = mysqli_query($conn, $dis_budget) or die("Error : ".mysqli_error($conn));
                                                            while($row_dis = mysqli_fetch_array($dis_result))
                                                            {   
                                                                
                                                                $pesa_SMZ_plan = $row_dis['DA_Government'];
                                                                $pesa_WM_plan = $row_dis['DA_Donor'];
                                                                $pesa_total_plan = $row_dis['DA_Donor']+$row_dis['DA_Government'];
                                                                $month = $row_dis['Month'];
                                                                $total = $total + $pesa_total_plan;
                                                                
                                                                echo '
                                                                    <tr>
                                                                        <th colspan="4">'.$month.'</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>'.$row_dis['proj_act'].'</td>
                                                                        <td>'.number_format($pesa_SMZ_plan).'</td>
                                                                        <td>'.number_format($pesa_WM_plan).'</td>
                                                                        <td>'.number_format($pesa_total_plan).'</td>
                                                                    </tr>';
                                                            }
                                                            echo '<tr>
                                                                    <th colspan="3"><b>Total</b></td>
                                                                    <th>
                                                                        '.number_format($total).'
                                                                    </td>
                                                                </tr>';
                                                        
                                                        ?>
                                                       
                                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4>Percentage of actual against disbursed expenditure</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Total Planned Budget, TZS</th>
                                    <th>Total Disbursed Expendicture, TZS</th>
                                    <th>Total Actual Expendicture, TZS</th>
                                    <th>Percentage of actual against disbursed, %</th>
                                    <!--<th>%</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <tr></tr>
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
	$("body").on("click", ".editproj_res", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editproj_res').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".deleteproj_res", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deleteproj_res').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'projres_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.proj_res_id').val(response.IDf);
      $('.projresid').val(response.Project);
      $('.edit_amount').html(response.Amount);
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
