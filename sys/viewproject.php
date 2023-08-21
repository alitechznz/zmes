<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/head_menu.php'; ?>

 <script language="JavaScript">
 function checkFluency()
{
  var checkbox = document.getElementById('chk_project');
  if (checkbox.checked != true)
  {
    alert("you need to be fluent in English to apply for the job");
  }
}

</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PROGRAMM | PROJECT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Programm|Project</li>
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
                    <li><a href="#tab_2" data-toggle="tab"><b>IMPLEMENTORS</b></a></li>
                    <li><a href="#tab_3" data-toggle="tab"><b>FINANCING</b></a></li>
                    <li><a href="#tab_5" data-toggle="tab"><b>ACTIVITIES</b></a></li>
                    <li><a href="#tab_4" data-toggle="tab"><b>ATTACHMENTS</b></a></li>
            </ul>
			      <div class="tab-content">
                 <div class="tab-pane active" id="tab_1">
                    
                   
                    <div class="row">
                      <form action="includes/controller.php" method="post">
                          <input name="userID" value="<?php  echo $user['id']; ?>" type="hidden" />
                          <input name="groupID" value="<?php  echo $user['groupID']; ?>" type="hidden" />
                             <?php 
                                include 'includes/conn.php'; 
                                    if(isset($_GET['xyz'])){
                            		   $getid =$_GET['xyz'];
                            		} else {
                            		  $getid =0;
                            		}
                            		
                                    $ptitle ="";
                                    $short = "";
                                    $status ="";
                                    $duration = "";
                                    $d_unit = "";
                                       $type = "";
                                       $description = "";
                                       $code = "";
                                       $StartDate = "";
                                       $EndDate = "";
                                       $agenda = "";
                                    $query = "SELECT * FROM `projecttb` WHERE `ID`='$getid'"; 
                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                    if($row = mysqli_fetch_array($result)) {	
                                       $ptitle =$row['pTitle'];
                                       $short = $row['Short title'];
                                       $status = $row['Status'];
                                       $duration = $row['Duration'];
                                       $d_unit = $row['Duration Unit'];
                                       $type = $row['pType'];
                                       $description = $row['Description'];
                                       $code = $row['Code'];
                                       $StartDate = $row['StartDate'];
                                       $EndDate = $row['EndDate'];
                                       $agenda = $row['AgendaID'];
                                    }
                            ?>  
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
                                                <?php 
                                                  if($type =='Project'){
                                                      echo ' <input type="radio" name="type" value="Program" id="chk_program" class="flat-red" checked>
                                                            Program';
                                                  } else {
                                                       echo ' <input type="radio" name="type" value="Program" id="chk_program" class="flat-red">
                                                            Program';
                                                  }
                                                ?>
                                               
                                            </label>&nbsp;	&nbsp;
                                        </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                     <div class="form-group">
                                        <div class="input-group">
                                            <label>
                                                <?php 
                                                  if($type =='Project'){
                                                      echo '<input type="radio" name="type" value="Project" id="chk_project" onclick="checkFluency()" class="flat-red" checked>
                                                        Project';
                                                  } else {
                                                      echo '<input type="radio" name="type" value="Project" id="chk_project" onclick="checkFluency()" class="flat-red">
                                                            Project';
                                                  }
                                                ?>
                                                
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
                                     <select class="form-control select2" name="program_id" id="program_id" style="width: 100%;">
                                         <option value="0"></option>
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
                                        
                                     <input class="form-control"  name ="agenda" style="width: 100%;"  value="<?php echo $agenda; ?>" readonly/>
                                       <?php 
                                                include 'includes/conn.php'; 
                                                     $query = "SELECT * FROM `agendatb`"; 
                                                     $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        
                                                      if(strpos($agenda, $row['Code']) !== false) {
                                                        echo '<label>
                                                            <input type="checkbox" name="agenda[]" value="'.$row['Code'].'" id="chk_program" class="flat-red" checked>'.$row['Code'].'
                                                        </label>&nbsp;	&nbsp;';
                                                      }  else {
                                                          echo '<label>
                                                              <input type="checkbox" name="agenda[]" value="'.$row['Code'].'" id="chk_program" class="flat-red">'.$row['Code'].'
                                                           </label>&nbsp;	&nbsp;';
                                                      }
                                                        //echo '<option value="'.$row['ID'].'">'.$row['Code'].'</option>';
                                                     }         
                                            ?>  
                                        <!--/select-->
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
                                           
                                                <?php 
                                                    if($status =='IDENTIFICATION'){
                                                        echo '<label><input type="radio" name="pstatus" value="IDENTIFICATION" class="flat-red" checked>
                                                                        IDENTIFICATION (The project is being scoped or planned)
                                                                </label>&nbsp;	&nbsp;';
                                                    } else {
                                                        echo '<label><input type="radio" name="pstatus" value="IDENTIFICATION" class="flat-red">
                                                                        IDENTIFICATION (The project is being scoped or planned)
                                                                </label>&nbsp;	&nbsp;';
                                                    }
                                                    
                                                    if($status =='IMPLEMENTATION'){
                                                        echo ' <label>
                                                                    <input type="radio" name="pstatus" value="IMPLEMENTATION" class="flat-red" checked>
                                                                        IMPLEMENTATION (The project is currently being implemented)
                                                                </label>&nbsp;	&nbsp;';
                                                    } else {
                                                        echo ' <label>
                                                                    <input type="radio" name="pstatus" value="IMPLEMENTATION" class="flat-red">
                                                                        IMPLEMENTATION (The project is currently being implemented)
                                                                </label>&nbsp;	&nbsp;';
                                                    }
                                                    
                                                    if($status =='COMPLETION'){
                                                        echo '  <label>
                                                                    <input type="radio" name="pstatus" value="COMPLETION" class="flat-red" checked>
                                                                        COMPLETION (Physical activity is complete or the final disbursement has been made)
                                                                </label>&nbsp;	&nbsp;';
                                                    } else {
                                                        echo '  <label>
                                                                    <input type="radio" name="pstatus" value="COMPLETION" class="flat-red">
                                                                        COMPLETION (Physical activity is complete or the final disbursement has been made)
                                                                </label>&nbsp;	&nbsp;';
                                                    }
                                                    
                                                    if($status =='CANCELLED'){
                                                        echo ' <label>
                                                                    <input type="radio" name="pstatus" value="CANCELLED" class="flat-red" checked>
                                                                        CANCELLED (The project has been cancelled)
                                                                </label>&nbsp;	&nbsp;';
                                                    } else {
                                                         echo ' <label>
                                                                    <input type="radio" name="pstatus" value="CANCELLED" class="flat-red">
                                                                        CANCELLED (The project has been cancelled)
                                                                </label>&nbsp;	&nbsp;';
                                                    }
                                                    
                                                    if($status =='SUSPENDED'){
                                                        echo ' <label>
                                                                    <input type="radio" name="pstatus" value="SUSPENDED" class="flat-red" checked>
                                                                        SUSPENDED (The project has been temporarily suspended)
                                                                </label>&nbsp;	&nbsp;';
                                                    } else {
                                                        echo ' <label>
                                                                    <input type="radio" name="pstatus" value="SUSPENDED" class="flat-red">
                                                                        SUSPENDED (The project has been temporarily suspended)
                                                                </label>&nbsp;	&nbsp;';
                                                    }
                                                ?>

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
                                               <textarea class="form-control" name="description" rows="6" cols="150" value="<?php echo $description; ?>" placeholder="Enter project description..."  required><?php echo $description; ?></textarea>
                                               
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
                                        <input type="text" name="projectname" class="form-control pull-right" value="<?php echo $ptitle; ?>" placeholder="Enter name..."  required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Short Tittle :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Enter short tittle..." value="<?php echo $short; ?>" name="shorttitle"  required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Code :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Enter Code..." value="<?php echo $code; ?>" name="code"  required>
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
                                                                <input type="number" name="duration" class="form-control pull-right col-md-6" value="<?php echo $duration; ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group row">
                                                                <select class="form-control select2 col-md-6" name="duration_period" style="width: 100%;">
                                                                    <option Value="<?php echo $code; ?>"><?php echo $d_unit; ?></option>
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
                                        <input type="date" name="startdate" value="<?php echo $StartDate; ?>" class="form-control pull-right" id="datepicker" required>
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
                                      <input type="date"  name="enddate" value="<?php echo $EndDate; ?>" class="form-control pull-right" id="datepicker1" required>
                                    </div>
                                  </div>
                              </div>
                          </div>
                          <!-- <div class="col-md-12">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                              <button type="submit" class="btn btn-primary btn-flat" name="updateproject"><i class="fa fa-save"></i> Update</button>
                            </div>
                          </div> -->
                      
                         
                       </form>
                    </div><!-- /.row -->	
                </div> <!-- /.tab-pane -->
                
                
                <div class="tab-pane" id="tab_2">
					         <div class="row">
                          <div class="col-md-12">
                              <div class="col-md-12">
                               <!-- create table -->
                                 <table id="example3" class="table table-bordered">
                                    <thead>
                                        <th>S.N</th>
                                        <th>Institution</th>
                                        <th>Responsible Officer</th>
                                        
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
                                            INNER JOIN projecttb ON project_targetgroup.Project=projecttb.ID 
                                            INNER JOIN organizationtb ON project_targetgroup.Institution = organizationtb.ID
                                            INNER JOIN userinfo ON project_targetgroup.FocalPerson = userinfo.id
                                            WHERE project_targetgroup.Project ='$getid'";
                                                                                    
                                                                                 
                                                                                    
                                        //$query = "SELECT * FROM `project_targetgroup` WHERE `Project`='$getid'"; 
                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                        $num = 0;
                                          while($row = mysqli_fetch_array($result)) {	
                                              $num +=1;
                                              $id_get = $row['targetID'];
                                              $Institution = $row['Name'];
                                              $FocalPerson = $row['Fullname'];
                                                echo "<tr>
                                                <td>".$num."</td>
                                                <td>".$Institution."</td>
                                                 <td>".$FocalPerson."</td>
                                                
                                            </tr>";
                                        }
                                      
                                    ?>
                                                                
                                    
                                    </tbody>
                                  </table>
                              </div>
                          </div>
                    
                      
                    </div><!-- /.row -->	
                </div> <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
					          <div class="row">
                       
                        <div class="col-md-12">
                             <div class="col-md-8">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>S.N</th>
                                        <th>Financing Type</th>
                                        <th>Total Amount</th>
                                        <th>Amount Disbursed</th>
                                        <!-- <th>Action</th> -->
                                    </thead>
                                    <tbody>
                                    <?php 
                                        include 'includes/conn.php';
                                         if(isset($_GET['xyz'])){
        		                	           $getid =$_GET['xyz'];
        		                	       } else {
        		                	            $getid =0;
        		                	       }
        		                	  
                                        $query = "SELECT * FROM `project_financing` WHERE `Project`='$getid'"; 
                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                        $num = 0;
                                        $_SESSION['total_tshs'] = 0;
                                        $_SESSION['total_f'] = 0;
                                        $_SESSION['disbursed_tshs'] = 0;
                                        $_SESSION['disbursed_f'] = 0;
                                        
                                          while($row = mysqli_fetch_array($result)) {	
                                              $num +=1;
                                              $id_get = $row['financing_ID'];
                                              $Financing = $row['Financing'];
                                              $unit = $row['Currency'].' '.$row['Unittype'];
                                              
                                              
                                                  $_SESSION['total_tshs'] += $row['TotalAmount'];
                                                  $_SESSION['disbursed_tshs'] += $row['Disbursed'];
                                              
                                              
                                              $TotalAmount = $row['TotalAmount'];
                                              $disbursed = $row['Disbursed'];
                                             
                                                echo "<tr>
                                                <td>".$num."</td>
                                                <td>".$Financing."</td>
                                                <td>".number_format($TotalAmount, 2, '.', ',').'/'.$unit."</td>
                                                 <td>".number_format($disbursed, 2, '.', ',').'/'.$unit."</td>
                                               
                                            </tr>";
                                        }
                                      
                                    ?>
                                                                
                                    
                                    </tbody>
                                  </table>
                             </div>
                             <div class="col-md-4" id="get_total_cost">
                                  <div class="form-group">
                                      <label>Project financing (Total Project Cost) :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="total_cost" class="form-control pull-right" value="<?php echo number_format($_SESSION['total_tshs'], 2, '.', ',').'/Tz'; ?>" placeholder=" Total cost..."  readonly>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label>Project Amount Disbursed  :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="disbursed_cost" class="form-control pull-right" value="<?php echo number_format($_SESSION['disbursed_tshs'], 2, '.', ',').'/Tz'; ?>" placeholder=" Total cost..."  readonly>
                                      </div>
                                  </div>
                             </div>
                        </div> 
                       
                    </div>
                </div> <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_4">
                    <div class="row">
                                <div class="col-md-12">
                                     <table id="example4" class="table table-bordered">
                                        <thead>
                                            <th>S.N</th>
                                            <th>Report Name</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include 'includes/conn.php';
                                            $kra_details =" ";
                                            $query = "SELECT * FROM `project_file` WHERE `Project`='$getid'"; 
                                            $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                            $num = 0;
                                              while($row = mysqli_fetch_array($result)) {	
                                                  $num +=1;
                                                  $id_get = $row['fileID'];
                                                  $Name = $row['Filename'];
                                                
                                                    echo "<tr>
                                                    <td>".$num."</td>
                                                    <td>".$Name."</td>
                                                    
                                                    <td>
                                                        <a href='includes/Documents/".$row['Filelocation']."' class='btn btn-info btn-sm btn-flat download><i class='fa fa-download'></i>Download</a>
                                                      
                                                    </td>
                                                </tr>";
                                            }
                                           
                                        ?>
                                                                    
                                        
                                        </tbody>
                                      </table>
                                </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="tab_5">
                    <div class="row">
                       
                            <div class="col-md-12">
                                
                                <div class="col-md-12">
                                     <table id="example5" class="table table-bordered">
                                        <thead>
                                            <th>S.N</th>
                                            <th>Activity</th>
                                            <th>Resource</th>
                                            <th>Duration</th>
                                            <th>Amount</th>
                                            
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include 'includes/conn.php';
                                            $kra_details =" ";
                                            $query = "SELECT * FROM `project_activity` WHERE `Project`='$getid'"; 
                                            $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                            $num = 0;
                                              while($row = mysqli_fetch_array($result)) {	
                                                  $num +=1;
                                                  $id_get = $row['activityID'];
                                                  $Name = $row['Activity'];
                                                
                                               
                                                    echo "<tr>
                                                    <td>".$num."</td>
                                                    <td>".$Name."</td>
                                                    <td>".$row['Resource']."</td>
                                                    <td>".$row['StartDate']." - ".$row['EndDate']."</td>
                                                    <td>".$row['Amount']." (".$row['ActCurrency'].")</td>
                                                    
                                                </tr>";
                                            }
                                           
                                        ?>
                                                                    
                                        
                                        </tbody>
                              </table>
                                </div>
                            </div>
                        
                    </div>
                </div>
              
              
                       
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

    $("body").on("click", ".deletetarget", function(e){
      alert('yes');
        e.preventDefault();
        $('#deletetarget').modal('show');
        var id = $(this).data('id');
        getRow_target(id);
    });
  
  

  function getRow_target(id){
    $.ajax({
      type: 'POST',
      url: 'target_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        $('.tarid').val(response.targetID);
        $('.tar_name').html(response.Name);
        $('#edit_institution').val(response.Name);
        $('#edit_person').val(response.Fullname);
        $('#proj_editstartdate').val(response.StartDate)
        $('#proj_editenddate').val(response.EndDate)
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
});
</script>
</body>
</html>