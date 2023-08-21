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
        Quarterly Monitoring Form: 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">quartely</li>
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
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                   <div class="box-header">
                     
                   </div>
                    <div class="container">
                        <form action="includes/controller.php" method="post">
                               <?php 
                               if(isset($_GET['id'])){
                                        $get_id = $_GET['id'];
                                    } else {
                                        $get_id = 0;
                                    }
                              ?>
                            <?php if(isset($_GET['update'])){  
                              $idp = $_GET['quarter'];
                              $query = "SELECT * FROM project_quarter WHERE IDq='$idp'"; 
                              $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                              $num = 0;
                               $Project = "";
                               $Kra  = "";
                               $StrategicAction = "";
                               $Activity = "";
                               $ExpQuarter = "";
                               $Disbursement = "";
                               $PerDisburse = "";
                               $Output = "";
                               $QTarget = "";
                               $ATarget = "";

                               $QImplementation = "";
                               $PerIQmplementation = "";
                               $AImplementation = "";
                               $Remarks = "";
                              


                              if($row = mysqli_fetch_array($result)) {	
                                   $Project = $row['Project'];
                                   $Kra = $row['Kra'];
                                   $StrategicAction = $row['StrategicAction'];
                                   $Activity = $row['Activity'];
                                   $ExpQuarter = $row['ExpQuarter'];
                                   $Disbursement = $row['Disbursement'];
                                   $PerDisburse = $row['PerDisburse'];
                                   $Output = $row['Output'];
                                   $QTarget = $row['QTarget'];
                                   $ATarget = $row['ATarget'];
                                   $QImplementation = $row['QImplementation'];
                                   $PerIQmplementation = $row['PerIQmplementation'];
                                   $AImplementation = $row['AImplementation'];
                                   $Remarks = $row['Remarks'];
                              }
                            ?>
                              <input type="hidden" class="form-control" name="project" value="<?php echo $get_id; ?>"/>
                              <input type="hidden" class="form-control" name="project_quarter" value="<?php echo $_GET['quarter']; ?>"/>
                            
                            <div class="col-md-12">
                                <div class="col-md-4">
                                     <div class="form-group">
                                    <label>Key Performance Indicator (KPI):</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <select class="form-control select2" style="width: 100%;" name="keyarea" onchange="showOutcome(this.value)" required> >
                                      <?php 
                                                include 'includes/conn.php'; 
                                                    $query = "SELECT * FROM `keyarea`"; 
                                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    echo '<option value="0">Select...</option>';
                                                    while($row = mysqli_fetch_array($result)) {	
                                                      if($row['IDNo'] == $Kra) {
                                                        echo '<option value="'.$row['IDNo'].'" selected>'.$row['KeyArea'].'</option>';
                                                      } else {
                                                        echo '<option value="'.$row['IDNo'].'">'.$row['KeyArea'].'</option>';
                                                      }
                                                        // echo '<option value="'.$row['IDNo'].'">'.$row['KeyArea'].'</option>';
                                                    }  
                                                    
                                            ?>  
                                        </select>
                                    </div>
                                    </div>
                                 </div>
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Key Strategic Action :</label>
                                        <input type="text" class="form-control" name="keystrategic" value="<?php echo $StrategicAction; ?>" placeholder="Enter Key Strategic Action... " required/>
                                    </div>
                              </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Planned Activity :</label>
                                    <input type="text" class="form-control" name="plannedactivity" value="<?php echo $Activity; ?>" placeholder="Enter Planned Activity... " required>
                                    </div>
                              </div>
                              
                          </div>
                           
                            <div class="col-md-12">
                              <div class="col-md-4">
                                     <div class="form-group">
                                    <label>Outcome Statement:</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <select class="form-control select2" style="width: 100%;" name="Outcome" value="<?php echo $Output; ?>" id="OutcomeStatement" required/>
                                         
                                        </select>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Planned Expendicture Quarter :</label>
                                        <input type="text" class="form-control" name="expquarter" value="<?php echo $ExpQuarter; ?>" placeholder="Enter Planned Expendicture Quarter... " required/>
                              </div>
                              </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Actual Disbursement :</label>
                                        <input type="text" class="form-control" name="disbursement"  value="<?php echo $Disbursement; ?>" placeholder="Enter Actual Disbursement... " required/>
                                    </div>
                              </div>
                              
                          </div>
                          
                            <div class="col-md-12">
                                  <div class="col-md-4">
                                     
                                  </div>
                                  <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Percentage of Disbursement :</label>
                                        <input type="text" class="form-control" name="perdisbursement"  value="<?php echo $PerDisburse; ?>" placeholder="Enter Percentage of Disbursement... " required/>
                                        </div>
                                  </div>
                                  <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Output Indicator :</label>
                                        <input type="text" class="form-control" name="output"  value="<?php echo $Output; ?>" placeholder="Enter Output Indicator... " required/>
                                        </div>
                                  </div>
                            </div>
                          
                            <div class="col-md-12">
                              <div class="col-md-4">
                                 
                              </div>
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Quarter Target  :</label>
                                       <input type="text" class="form-control" name="quartertarget"  value="<?php echo $QTarget; ?>" placeholder="Enter quarter target... " required/>
                                    </div>
                              </div>
                              <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Annual Target :</label>
                                        <input type="text" class="form-control" name="annualtarget"  value="<?php echo $ATarget; ?>" placeholder="Enter annual target... " required/>
                                    </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4">
                                 
                              </div>
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Actual Implementation Quarter :</label>
                                        <input type="text" class="form-control" name="implementation"  value="<?php echo $QImplementation; ?>" placeholder="Enter implementation quarter... " required/>
                                    </div>
                              </div>
                              <div class="col-md-3">
                                    <div class="form-group">
                                        <label>% of Implementation Quarter :</label>
                                        <input type="text" class="form-control" name="perimplementation"  value="<?php echo $PerIQmplementation; ?>" placeholder="Enter % of Implementation Quarter... " required/>
                                    </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4">
                              </div>
                              <div class="col-md-4">
                                    <div class="form-group">
                                         <label>% of Implementation on Annual :</label>
                                        <input type="text" class="form-control" name="annual_perimplementation"  value="<?php echo $AImplementation; ?>" placeholder="Enter % of Implementation on Annual... " required/>
                                    </div>
                              </div>
                              <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Remarks :</label>
                                        <input type="text" class="form-control" name="remarks"  value="<?php echo $Remarks; ?>" placeholder="Enter remarks... " required/>
                                    </div>
                              </div>
                            </div>
                      
                          <div class="col-md-11">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                              <button type="submit" class="btn btn-primary btn-flat" name="updatequartely"><i class="fa fa-save"></i> Update</button>
                            </div>
                          </div>
                        <?php } else { ?>
                            <input type="hidden" class="form-control" name="project" value="<?php echo $get_id; ?>" required/>
                            <div class="col-md-11">
                              <div class="col-md-4">
                                   <div class="form-group">
                                  <label>Key Performance Indicator (KPI):</label>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </div>
                                    <select class="form-control select2" style="width: 100%;" name="keyarea" onchange="showOutcome(this.value)" required> >
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
                                      <label>Key Strategic Action :</label>
                                      <input type="text" class="form-control" name="keystrategic" placeholder="Enter Key Strategic Action... " required/>
                                  </div>
                            </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label>Planned Activity :</label>
                                  <input type="text" class="form-control" name="plannedactivity" placeholder="Enter Planned Activity... " required>
                                  </div>
                            </div>
                            
                        </div>
                            <div class="col-md-11">
                            <div class="col-md-4">
                                   <div class="form-group">
                                  <label>Outcome Statement:</label>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </div>
                                    <select class="form-control select2" style="width: 100%;" name="Outcome" id="OutcomeStatement" required/>
                                       
                                      </select>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Planned Expendicture Quarter :</label>
                                      <input type="text" class="form-control" name="expquarter" placeholder="Enter Planned Expendicture Quarter... " required/>
                            </div>
                            </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label>Actual Disbursement :</label>
                                      <input type="text" class="form-control" name="disbursement" placeholder="Enter Actual Disbursement... " required/>
                                  </div>
                            </div>
                            
                        </div>
                        
                            <div class="col-md-11">
                                <div class="col-md-4">
                                   
                                </div>
                                <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Percentage of Disbursement :</label>
                                      <input type="text" class="form-control" name="perdisbursement" placeholder="Enter Percentage of Disbursement... " required/>
                                      </div>
                                </div>
                                <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Output Indicator :</label>
                                      <input type="text" class="form-control" name="output" placeholder="Enter Output Indicator... " required/>
                                      </div>
                                </div>
                            </div>
                        
                            <div class="col-md-11">
                                <div class="col-md-4">
                                   
                                </div>
                                <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Quarter Target  :</label>
                                         <input type="text" class="form-control" name="quartertarget" placeholder="Enter quarter target... " required/>
                                      </div>
                                </div>
                                <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Annual Target :</label>
                                          <input type="text" class="form-control" name="annualtarget" placeholder="Enter annual target... " required/>
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="col-md-4">
                                   
                                </div>
                                <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Actual Implementation Quarter :</label>
                                          <input type="text" class="form-control" name="implementation" placeholder="Enter implementation quarter... " required/>
                                      </div>
                                </div>
                                <div class="col-md-3">
                                      <div class="form-group">
                                          <label>% of Implementation Quarter :</label>
                                          <input type="text" class="form-control" name="perimplementation" placeholder="Enter % of Implementation Quarter... " required/>
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="col-md-4">
                                   
                                </div>
                                <div class="col-md-4">
                                      <div class="form-group">
                                           <label>% of Implementation on Annual :</label>
                                          <input type="text" class="form-control" name="annual_perimplementation" placeholder="Enter % of Implementation on Annual... " required/>
                                      </div>
                                </div>
                                <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Remarks :</label>
                                          <input type="text" class="form-control" name="remarks" placeholder="Enter remarks... " required/>
                                      </div>
                                </div>
                            </div>
                    
                            <div class="col-md-10">
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                <button type="submit" class="btn btn-primary btn-flat" name="quartely"><i class="fa fa-save"></i> Save</button>
                              </div>
                        </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->	
      
        <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>S.N</th>
                                <th>KPI</th>
                                <th>Planned Activity</th>
                                <th>Key Strategic Action</th>
                                <th>Remarks</th>
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
                    
                    $query ="SELECT * FROM project_quarter
                    INNER JOIN keyarea ON project_quarter.Kra = keyarea.IDNo
                    WHERE project_quarter.Project='$get_id'"; 
                    
                   
                    //$query = "SELECT * FROM `project_quarter` WHERE Project='$get_id'"; 
                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        $num +=1;
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['KeyArea']."</td>
                            <td>".$row['Activity']."</td>
                            <td>".$row['StrategicAction']."</td>
                            <td>".$row['Remarks']."</td>
                            
                            <td>
                              <a href='quartely.php?id=".$get_id."&quarter=".$row['IDq']."&update' class='btn btn-success btn-sm reports btn-flat'><i class='fa fa-edit'></i> Edit</a>
                              <button class='btn btn-danger btn-sm deletequarterp btn-flat' data-id=".$row['IDq']."><i class='fa fa-trash'></i> Delete</button>
                            </td>
                        </tr>";
                    }
                    ?>
               
               <!-- <button class='btn btn-primary btn-sm anual btn-flat' data-id=".$row['ID']."><i class='check-circle'></i> Comfirm</button>
                                <button class='btn btn-success btn-sm  btn-flat' data-id=".$row['ID']."><i class='check-circle'></i> View</button>                -->
                 
                </tbody>
              </table>
            </div>
          </div>
                              </div>
        
       </div> <!-- /.tab-pane -->
               
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/agenda_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

$("body").on("click", ".deletequarterp", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deletequarterrep').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'quarter_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.quarterid').val(response.IDq);
      $('.quarter_id').val(response.Project);
      $('.quarter_name').html(response.pTitle);
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
