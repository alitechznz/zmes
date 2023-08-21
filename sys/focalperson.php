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
        Project/Programme Monitoring 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Focal Person Page</li>
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
      <?php include 'progress.php'; ?>
      
        <?php 
            include 'includes/conn.php'; 
                $ptitle ="";
                $status ="";
                $query = "SELECT * FROM `projecttb` WHERE `ID`='$getid'"; 
                $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                $num = 0;
                if($row = mysqli_fetch_array($result)) {	
                   $ptitle =$row['pTitle'];
                   $status = $row['Status'];
                }  
                                                    
        ?>  
      <!-- ------->
    <div class="row">
        <div class="col-xs-12">
         
		    	<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab"><b>DESCRIPTION</b></a></li>
                    <li><a href="#tab_2" data-toggle="tab"><b>TARGET</b></a></li>
                    <li><a href="#tab_3" data-toggle="tab"><b>FINANCING</b></a></li>
            </ul>
			<div class="tab-content">
                <div class="tab-pane active" id="tab_1">
					<div class="row">
                      <form action="includes/controller.php" method="post">
                          <div class="col-md-12">
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Type :</label>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label>
                                                <input type="radio" name="type" value="Program" class="flat-red" checked>
                                                Program
                                            </label>&nbsp;	&nbsp;
                                        </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                     <div class="form-group">
                                        <div class="input-group">
                                            <label>
                                                <input type="radio" name="type" value="Project" class="flat-red">
                                                Project
                                            </label>&nbsp;	&nbsp;
                                        </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Under Program:</label>
                                    </div>
                              </div>
                              <div class="col-md-8">
                                    <div class="form-group">
                                     <select class="form-control select2" name="program_id" style="width: 100%;">
                                          <?php 
                                                include 'includes/conn.php'; 
                                                
                                                     $query = "SELECT * FROM `projecttb` WHERE `pType`='Program'"; 
                                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        echo '<option value="'.$row['ID'].'">'.$row['pTitle'].'</option>';
                                                    }  
                                                    
                                            ?>  
                                    </select>
                                    </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Assign to the Project Agenda :</label>
                                    </div>
                              </div>
                              <div class="col-md-8">
                                    <div class="form-group">
                                     <select class="form-control select2"  name ="agenda" style="width: 100%;" required>
                                       <?php 
                                                include 'includes/conn.php'; 
                                                     $query = "SELECT * FROM `agendatb`"; 
                                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        echo '<option value="'.$row['ID'].'">'.$row['Code'].'</option>';
                                                     }         
                                            ?>  
                                        </select>
                                    </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Project Status:</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label>
                                                <input type="radio" name="pstatus" value="IDENTIFICATION" class="flat-red" checked>
                                                    IDENTIFICATION (The project is being scoped or planned)
                                            </label>&nbsp;	&nbsp;
                                            <label>
                                                <input type="radio" name="pstatus" value="IMPLEMENTATION" class="flat-red">
                                                    IMPLEMENTATION (The project is currently being implemented)
                                            </label>&nbsp;	&nbsp;
                                            <label>
                                                <input type="radio" name="pstatus" value="COMPLETION" class="flat-red">
                                                    COMPLETION (Physical activity is complete or the final disbursement has been made)
                                            </label>&nbsp;	&nbsp;
                                            <label>
                                                <input type="radio" name="pstatus" value="CANCELLED" class="flat-red">
                                                    CANCELLED (The project has been cancelled)
                                            </label>&nbsp;	&nbsp;
                                            <label>
                                                <input type="radio" name="pstatus" value="SUSPENDED" class="flat-red">
                                                    SUSPENDED (The project has been temporarily suspended)
                                            </label>&nbsp;	&nbsp;
                                        </div>
                                    </div>
                                </div>
                          </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Description :</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group">
                                               <textarea class="form-control" name="description" rows="6" cols="150" placeholder="Enter project description..."  required></textarea>
                                               
                                        </div>
                                    </div>
                                </div>
                          </div>
                          
                          <div class="col-md-12">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Tittle|Name:</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="projectname" class="form-control pull-right" placeholder="Enter name..."  required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Short Tittle :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Enter short tittle..." name="shorttitle"  required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Code :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Enter Code..." name="code"  required>
                                    </div>
                                  </div>
                                  

                              </div>
                              <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Duration :</label>
                                            <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group row">
                                                                <input type="number" name="duration" class="form-control pull-right col-md-6" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group row">
                                                                <select class="form-control select2 col-md-6" name="duration_period" style="width: 100%;">
                                                                    <option selected="selected" value="Year">Year</option>
                                                                    <option Value="Months">Months</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                  <div class="form-group">
                                        <label>Start Date :</label>
                                        <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" name="startdate" class="form-control pull-right" id="datepicker" required>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                 
                                  <div class="form-group">
                                    <label>Expected End Date :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="date"  name="enddate" class="form-control pull-right" id="datepicker1" required>
                                    </div>
                                  </div>
                              </div>
                          </div>
                          
                      
                          <div class="col-md-12">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                              <button type="submit" class="btn btn-primary btn-flat" name="addproject"><i class="fa fa-save"></i> Save</button>
                            </div>
                          </div>
                          
                       </form>
                    </div><!-- /.row -->	
                </div> <!-- /.tab-pane -->
                
                <div class="tab-pane" id="tab_2">
					  <div class="row">
                      <form action="includes/controller.php" method="post">
                        
                          <div class="col-md-12">
                              <div class="col-md-4">
                                  <input name="pid" value="<?php  echo $_GET['xyz']; ?>" type="hidden" />
                                  
                                  <div class="form-group">
                                      <label>Program|Project Title :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                          <input name="program" class="form-control" value="<?php echo $ptitle; ?>" readonly />
                                      </div>
                                  </div>
                                   <div class="form-group">
                                      <label>Responsible Ministry :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <select class="form-control select2" name="institution" style="width: 100%;" onchange="showFP(this.value)" required>
                                           <?php 
                                                include 'includes/conn.php'; 
                                                    $query = "SELECT * FROM `organizationtb`"; 
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
                                  <div class="form-group">
                                    <label>Responsible Officer :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      
                                      <select class="form-control select2" name="person" style="width: 100%;" id="responsibleOfficer" required>
                                         
                                        </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Period of Reporting :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                       <input type="text" class="form-control pull-right" id="reservation" name="reporting"  required>
                                   
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Date of Submission of the Form :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                       <input type="date" class="form-control pull-right" name="date_submitted"  required>
                                   
                                    </div>
                                  </div>
                    
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                    <button type="submit" class="btn btn-primary btn-flat" name="addtarget"><i class="fa fa-save"></i> Save</button>
                                  </div>
                              </div>
                              <div class="col-md-8">
                               <!-- create table -->
                               <table id="example3" class="table table-bordered">
                                    <thead>
                                        <th>S.N</th>
                                        <th>Institution</th>
                                        <th>Responsible Officer</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        include 'includes/conn.php';
                                         if(isset($_GET['xyz'])){
        		                	           $getid =$_GET['xyz'];
        		                	       } else {
        		                	            $getid =0;
        		                	       }
        		                	       
        		                	       $query = "SELECT *
                                            FROM project_targetgroup
                                            INNER JOIN projecttb ON project_targetgroup.Project=projecttb.ID WHERE project_targetgroup.Project='$getid'";
                                                                                    
                                                                                 
                                                                                    
                                        //$query = "SELECT * FROM `project_targetgroup` WHERE `Project`='$getid'"; 
                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                        $num = 0;
                                          while($row = mysqli_fetch_array($result)) {	
                                              $num +=1;
                                              $id_get = $row['ID'];
                                              $Institution = $row['Institution'];
                                              $FocalPerson = $row['FocalPerson'];
                                            
                                              $num +=1;
                                                echo "<tr>
                                                <td>".$num."</td>
                                                <td>".$Institution."</td>
                                                 <td>".$FocalPerson."</td>
                                                <td>
                                                    <button class='btn btn-success btn-sm editoutcome btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Edit</button>
                                                    <button class='btn btn-danger btn-sm deleteoutcome btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
                                                </td>
                                            </tr>";
                                        }
                                      
                                    ?>
                                                                
                                    
                                    </tbody>
                                  </table>
                              </div>
                          </div>
                    
                       </form>
                    </div><!-- /.row -->	
                </div> <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
					<div class="row">
                      <form action="includes/controller.php" method="post">
                         
                            <div class="col-md-12">
                        
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Type of Financing :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                          <select class="form-control select2" name="type" style="width: 100%;" required>
                                                <option value="Grant">Grant</option>
                                                <option value="Loan">Loan</option>
                                                <option value="SMZ Contribution">SMZ Contribution</option>
                                                <option value="SMZ Commitment">SMZ Commitment</option>
                                                <option value="Other">Other</option>
                                        </select>
                                      </div>
                                  </div>
                              </div>
                                    
                              <div class="col-md-6">
                                       <div class="form-group">
                                            <label>Currency :</label>
                                            <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group row">
                                                                <select class="form-control select2 col-md-6" style="width: 100%;" name="currency" required>
                                                                    <option selected="selected" value="Tshs">Tshs</option>
                                                                    <option value="$(USD)">$(USD)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                             
                                            </div>
                                        </div>
                                  
                                </div>
                          
                       </form>
                    </div><!-- /.row -->	
                            <div class="col-md-12">
                              
                                <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Period Time :</label>
                                      <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" class="form-control pull-right" id="reservation">
                                        </div>
                                  </div>
                                  
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Total Amount :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="number" name="projectcost" class="form-control pull-right" placeholder="Enter total cost..."  required>
                                      </div>
                                  </div>
                              </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Amount Disbursed  :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="number" name="projectcost" class="form-control pull-right" placeholder="Enter total cost..."  required>
                                      </div>
                                  </div>
                              </div>
                       
                            </div><!-- /.row -->	
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-flat" name="addfinancing"><i class="fa fa-save"></i> Save</button>
                            </div>
                     </form>
                    
                     
                        <hr />
                        <div class="col-md-12" style="margin-top: 70px;">
                            <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Project financing (Total Project Cost) :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="number" name="projectcost" class="form-control pull-right" placeholder=" Total cost..."  readonly>
                                      </div>
                                  </div>
                             </div>
                             <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Project Amount Disbursed  :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="number" name="projectcost" class="form-control pull-right" placeholder=" Total cost..."  readonly>
                                      </div>
                                  </div>
                             </div>
                        </div>
                        <div class="col-md-12">
                             <!-- create table -->
                               <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>S.N</th>
                                        <th>Financing Type</th>
                                        <th>Total Amount</th>
                                        <th>Amount Disbursed</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        include 'includes/conn.php';
                                         if(isset($_GET['xyz'])){
        		                	           $getid =$_GET['xyz'];
        		                	       } else {
        		                	            $getid =0;
        		                	       }
        		                	      
        		                	       
        		                	       $query = "SELECT *
                                            FROM project_targetgroup
                                            INNER JOIN projecttb ON project_targetgroup.Project=projecttb.ID WHERE project_targetgroup.Project='$getid'";
                                                                                    
                                                                                 
                                                                                    
                                        //$query = "SELECT * FROM `project_targetgroup` WHERE `Project`='$getid'"; 
                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                        $num = 0;
                                          while($row = mysqli_fetch_array($result)) {	
                                              $num +=1;
                                              $id_get = $row['ID'];
                                              $Institution = $row['Institution'];
                                              $FocalPerson = $row['FocalPerson'];
                                            
                                              $num +=1;
                                                echo "<tr>
                                                <td>".$num."</td>
                                                <td>".$Institution."</td>
                                                <td>".$Institution."</td>
                                                 <td>".$FocalPerson."</td>
                                                <td>
                                                    <button class='btn btn-success btn-sm editoutcome btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Edit</button>
                                                    <button class='btn btn-danger btn-sm deleteoutcome btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
                                                </td>
                                            </tr>";
                                        }
                                      
                                    ?>
                                                                
                                    
                                    </tbody>
                                  </table>
                        </div>
                    </div>
                </div> <!-- /.tab-pane -->
                
              <!-- /.tab-pane -->
              <hr />
                       
            </div>
            </div>
		</div>
	</div>	
	
      <!-- /.row -->
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/agenda_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script>
$(function(){
    //Initialize Select2 Elements
    $('.select2').select2()
    //Date range picker
    $('#reservation').daterangepicker()

     //iCheck for checkbox and radio inputs
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

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
      $('#edit_kraoutcome').val(response.KeyArea_ID);
      $('#edit_outname').val(response.AgendaID);
      $('#edit_outstatus').val(response.Status)
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
