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
        Annual Monitoring Form: 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Annual</li>
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
                   <div class="container">
                      <div class="row">
                          <form action="includes/controller.php" method="post">
                               <?php 
                               if(isset($_GET['id'])){
                                        $get_id = $_GET['id'];
                                    } else {
                                        $get_id = 0;
                                    }
                              ?>
                            <?php if(isset($_GET['update'])){  
                              $idp = $_GET['annual'];
                              $query = "SELECT * FROM project_annual WHERE IDa='$idp'"; 
                              $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                              $num = 0;
                               $Project = "";
                               $Kra  = "";
                               $Statement = "";
                               $Indicator = "";
                               $Definition = "";
                               $Baseline = "";
                               $Source = "";
                               $Target = "";
                               $Status = "";
                               $Remarks = "";

                              if($row = mysqli_fetch_array($result)) {	
                                   $Project = $row['Project'];
                                   $Kra = $row['Kra'];
                                   $Statement = $row['Statement'];
                                   $baseline = $row['Baseline'];
                                   $Indicator = $row['Indicator'];
                                   $Definition = $row['Definition'];
                                   $Baseline = $row['Baseline'];
                                   $Source = $row['Source'];
                                   $Target = $row['Target'];
                                   $Status = $row['Status_an'];
                                   $Remarks = $row['Remarks'];
                              }
                            ?>

                                <input type="hidden" class="form-control" name="project" value="<?php echo $get_id; ?>"/>
                                <input type="hidden" class="form-control" name="statements" value="<?php echo $Statement; ?>"/>
                                <input type="hidden" class="form-control" name="annual_id" value="<?php echo $_GET['annual']; ?>"/>

                                <div class="col-md-12">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                      <label>Key Performance Indicator (KPI) :</label>
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <select class="form-control select2" style="width: 100%;" onchange="showOutcome(this.value)" name="keyarea" required> 
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
                                                          
                                                      }  
                                                      
                                              ?>  
                                          </select>
                                      </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                      <label>Outcome Statement:</label>
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <select class="form-control select2" style="width: 100%;" name="Outcome" id="OutcomeStatement">
                                          
                                          </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Outcome Indicator :</label>
                                          <input type="text" class="form-control" name="outcomeIndicator" value="<?php echo $Indicator; ?>" placeholder="Enter outcome indicator...." required/>
                                      </div>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Definition :</label>
                                          <textarea type="text" class="form-control" cols="8" name="definition" value="<?php echo $Definition; ?>" placeholder="Enter definition...." ><?php echo $Definition; ?></textarea>
                                      </div>
                                  </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Baseline (Year) :</label>
                                          <input type="text" class="form-control" name="baseline" value="<?php echo $Baseline; ?>" placeholder="Enter baseline...." required/>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                        <div class="form-group">
                                          <label>Data Source :</label>
                                          <input type="text" class="form-control" name="datasource" value="<?php echo $Source; ?>" placeholder="Enter data source...." required/>
                                      </div>
                                  </div>
                                  
                                </div>
                                <div class="col-md-12">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Target :</label>
                                              <input type="text" class="form-control" name="target" value="<?php echo $Target; ?>" placeholder="Enter target...." required/>
                                          </div>
                                      </div>
                                  
                                  <div class="col-md-4">
                                        <div class="form-group">
                                      <label>Status :</label>
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                          <input type="text" class="form-control" name="status" value="<?php echo $Status; ?>" placeholder="Enter status...." required/>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                        <div class="form-group">
                                          <label>Remarks  :</label>
                                          <input type="text" class="form-control" name="remarks" value="<?php echo $Remarks; ?>" placeholder="Enter remarks...." required/>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-11">
                                   <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Clear</button>
                                    <button type="submit" class="btn btn-primary btn-flat" name="updateannualreport"><i class="fa fa-save"></i> Update</button>
                                  </div>
                               </div>
                            <?php } else {   ?> 
                              <input type="hidden" class="form-control" name="project" value="<?php echo $get_id; ?>" required/>
                                <div class="col-md-12">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                      <label>Key Performance Indicator (KPI) :</label>
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <select class="form-control select2" style="width: 100%;" onchange="showOutcome(this.value)" name="keyarea" required> 
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
                                      <label>Outcome Statement:</label>
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <select class="form-control select2" style="width: 100%;" name="Outcome" id="OutcomeStatement" required>
                                          
                                          </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Outcome Indicator :</label>
                                          <input type="text" class="form-control" name="outcomeIndicator" placeholder="Enter outcome indicator...." required/>
                                      </div>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Definition :</label>
                                          <textarea type="text" class="form-control" cols="8" name="definition" placeholder="Enter definition...." ></textarea>
                                      </div>
                                  </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Baseline (Year) :</label>
                                          <input type="text" class="form-control" name="baseline" placeholder="Enter baseline...." required/>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                        <div class="form-group">
                                          <label>Data Source :</label>
                                          <input type="text" class="form-control" name="datasource" placeholder="Enter data source...." required/>
                                      </div>
                                  </div>
                                  
                                </div>
                                <div class="col-md-12">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Target :</label>
                                              <input type="text" class="form-control" name="target" placeholder="Enter target...." required/>
                                          </div>
                                      </div>
                                  
                                  <div class="col-md-4">
                                        <div class="form-group">
                                      <label>Status :</label>
                                      <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                          <input type="text" class="form-control" name="status" placeholder="Enter status...." required/>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                        <div class="form-group">
                                          <label>Remarks  :</label>
                                          <input type="text" class="form-control" name="remarks" placeholder="Enter remarks...." required/>
                                        </div>
                                  </div>
                                </div>
                                <div class="col-md-11">
                                   <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Clear</button>
                                    <button type="submit" class="btn btn-primary btn-flat" name="addannualreport"><i class="fa fa-save"></i> Save</button>
                                  </div>
                               </div>
                              
                            <?php }  ?>   
                          </form>
                     
                      
                        </div> 
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
                    <th>Outcome Statement</th>
                    <th>Outcome Indicator</th>
                    <th>Status</th>
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
                    $query = "SELECT * FROM project_annual
                              INNER JOIN keyarea ON project_annual.Kra = keyarea.IDNo
                              INNER JOIN outcometype ON project_annual.Statement = outcometype.ID
                              WHERE Project='$get_id'"; 

                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row = mysqli_fetch_array($result)) {	
                        $num +=1;
                            echo "<tr>
                            <td>".$num."</td>
                            <td>".$row['KeyArea']."</td>
                            <td>".$row['Outcome']."</td>
                            <td>".$row['Indicator']."</td>
                            <td>".$row['Status_an']."</td>
                            
                            <td>
                     
                                <a href='annual.php?id=".$get_id."&annual=".$row['IDa']."&update' class='btn btn-success btn-sm reports btn-flat'><i class='fa fa-edit'></i> Edit</a>
                                <button class='btn btn-danger btn-sm deleteannualp btn-flat' data-id=".$row['IDa']."><i class='fa fa-trash'></i> Delete</button>
                               
                            </td>
                        </tr>";
                    }
                    ?>
               
                                            
                 
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
  $("body").on("click", ".deleteannualp", function(e){
    // $('.delete').click(function(e){
    e.preventDefault();
    $('#deleteannualrep').modal('show');
    var id = $(this).data('id');
    //alert(id);
    getRow(id);
  });
});

function getRow(id){
  // alert(id);
  $.ajax({
    type: 'POST',
    url: 'annual_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.annualid').val(response.IDa);
      $('.annual_id').val(response.Project);
      $('.annual_name').html(response.pTitle);
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

