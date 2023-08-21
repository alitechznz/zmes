    <?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/head_menu.php'; ?>

 <script language="JavaScript">
 
    function sample2(num) {
  	    // alert(num);
         var rep_num = num.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     }
     $(document).ready(function() {
        $("#ProjectBlock").css("display","none");
        
        
        var ptotal = parseFloat(document.getElementById("proj_gttotalamount").value);
        if(ptotal <= 0){
            const myButton = document.getElementById('projectactivity');
            myButton.disabled = true;

        } else {
             const myButton = document.getElementById('projectactivity');
            myButton.disabled = false;
        }
      });
      
      function validateDateRange() {
          var startDate =document.getElementsByClassName("start-date").value;
          var endDate = document.getElementsByClassName("end-date").value;
          var err_msg = "Input date is outside the range";
        
          if(startDate <= endDate) {
            // alert("Input date is within the range.");
          } else {
            alert(err_msg);
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
                    <li><a href="#tab_3" data-toggle="tab"><b>FINANCING</b></a></li>
                    <li><a href="#tab_5" data-toggle="tab"><b>ACTIVITIES</b></a></li>
                    <li><a href="#tab_2" data-toggle="tab"><b>IMPLEMENTORS</b></a></li>
                    <li><a href="#tab_4" data-toggle="tab"><b>ATTACHMENTS</b></a></li>
                    <li><a href="#tab_6" data-toggle="tab"><b>LOCATION</b></a></li>
            </ul>
			<div class="tab-content">
                <div class="tab-pane active" id="tab_1" id="description_tab">
                    <div class="row">
                      <form action="includes/controller.php" method="post" id="addproject_form">
                          
                          <input name="userID" value="<?php  echo $user['id']; ?>" type="hidden" />
                          <input name="orgID" value="<?php  echo $user['Organization']; ?>" type="hidden" />
                          
                          <?php 
                            if(!isset($user_id['groupID'])){
                                $user_id['groupID'] = 0;
                            }
                           ?>
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
                                        <label>Type <span style="color:red;">*</span></label>
                                  </div>
                              </div>
                              <div class="col-md-8">
                                    <div class="form-group">
                                        <select class="form-control select2" name="type" id="project_type" onchange="showProjectProgram(this.value);" style="width: 100%;" required>
                                              <?php 
                                                  if($type =='Project'){
                                                      
                                                      echo '  <option value="Select">Select</option>
                                                            <option value="Project" selected>Project</option>
                                                            <option value="Program">Program</option>
                                                          
                                                      ';
                                                  } else if($type =='Program') {
                                                       echo '
                                                             <option value="Select">Select</option>
                                                            <option value="Project">Project</option>
                                                            <option value="Program" selected>Program</option>
                                                           
                                                       ';
                                                  } else {
                                                      echo '
                                                       <option value="Select" selected>Select</option>
                                                       <option value="Project">Project</option>
                                                            <option value="Program">Program</option>';
                                                  }
                                                ?>
                                            
                                            
                                            
                                        </select>
                                  </div>
                              </div>
                          </div>
                         
                          <div class="col-md-12">
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Under Program:</label>
                                    </div>
                              </div>
                              <div class="col-md-8"  id="ProjectBlock">
                                    <div class="form-group">
                                     <select class="form-control select2" name="program_id" id="program_id" style="width: 100%;">
                                         <option value="0">Select</option>
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
                                        <label>Project Status<span style="color:red;">*</span></label>
                                  </div>
                              </div>
                              <div class="col-md-8">
                                    <div class="form-group">
                                        <select class="form-control select2" name="pstatus" id="project_condition" style="width: 100%;" required>
                                            <option value="Select" selected>Select...</option>
                                            <option value="IDENTIFICATION">IDENTIFICATION (The project is being scoped or planned)</option>
                                            <option value="IMPLEMENTATION">IMPLEMENTATION (The project is currently being implemented)</option>
                                            <option value="COMPLETION">COMPLETION (Physical activity is complete or the final disbursement has been made)</option>
                                            <option value="CANCELLED"> CANCELLED (The project has been cancelled)</option>
                                            <option value="SUSPENDED">SUSPENDED (The project has been temporarily suspended)</option>
                                        </select>
                                  </div>
                              </div>
                          </div>
                         
                          <div class="col-md-12">
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Assign to the Project Plans <span style="color:red;">*</span></label>
                                    </div>
                              </div>
                              <div class="col-md-8">
                                    <div class="form-group">
                                     <!--select class="form-control select2"  name ="agenda" style="width: 100%;" required-->
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
                                        <label>Description <span style="color:red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group">
                                               <textarea class="form-control" name="description"  value="<?php echo $description; ?>" rows="6" cols="150" placeholder="Enter project description..."  required><?php echo $description; ?></textarea>   
                                        </div>
                                        <!-- <div class="invalid-feedback">
                                          andika mtaa unayoishi
                                        </div> -->
                                    </div>
                                </div>
                          </div>
                          
                          <div class="col-md-12">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Tittle|Name <span style="color:red;">*</span></label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="projectname" value="<?php echo $ptitle; ?>" class="form-control pull-right" placeholder="Enter name..."  required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Short Tittle </label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <input type="text" class="form-control" value="<?php echo $short; ?>" placeholder="Enter short tittle..." name="shorttitle" >
                                    </div>
                                  </div>
                                 
                                  <div class="form-group">
                                    <label>Sector <span style="color:red;">*</span></label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <select class="form-control select2" name="sector" onchange="ShowInternalCode(this.value)">
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
                                   <div class="form-group">
                                    <label>Internal Code </label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Enter internal code..." value="<?php echo $code; ?>" name="code" id="internalcode">
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <label>External Code </label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Enter external code..." name="externalcode">
                                    </div>
                                  </div>
                                 
                              </div>
                              <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Duration <span style="color:red;">*</span></label>
                                            <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group row">
                                                                <input type="number" name="duration" id="duration" onkeyup="getenddate(this.value)" class="form-control pull-right col-md-6" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group row">
                                                                <select class="form-control select2 col-md-6" name="duration_period" id="duration_period" onchange="getenddate(this.value)" style="width: 100%;"  required>
                                                                    <option selected="selected" value="Year"><strong>Duration Unit</strong></option>
                                                                    <option value="day">Day(s)</option>
                                                                    <option value="Months">Months</option>
                                                                    <option value="Year">Year</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                  <div class="form-group">
                                        <label>Start Date <span style="color:red;">*</span></label>
                                        <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" name="startdate" id="startdate" class="form-control pull-right" id="datepicker" onchange="getenddate(this.value)" required>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                 
                                  <div class="form-group">
                                    <label>Expected End Date </label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                      </div>
                                      <span id="getenddate">
                                           <!-- <input type="date"  name="enddate" class="form-control pull-right" id="datepicker1" > -->
                                      </span>
                                     
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <label>Phase </label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <select class="form-control select2" name="phase" >
                                           <option value="">Select.....</option>
                                            <option value="Phase1">Phase 1</option>
                                            <option value="Phase2">Phase 2</option>
                                            <option value="Phase3">Phase 3</option>
                                            <option value="Phase4">Phase 4</option>
                                            <option value="Phase5">Phase 5</option>
                                            <option value="Phase6">Phase 6</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Sponsor Type <span style="color:red;">*</span></label>
                                  
                                       <div class="input-group">
                                            <label>
                                                <input type="radio" name="pstatus_s" value="Government" class="flat-red" checked>
                                                    Government
                                            </label>&nbsp;	&nbsp;
                                            <label>
                                                <input type="radio" name="pstatus_s" value="Private" class="flat-red">
                                                   Private 
                                            </label>&nbsp;	&nbsp;
                                            <label>
                                                <input type="radio" name="pstatus_s" value="PPP" class="flat-red">
                                                    PPP
                                            </label>&nbsp;	&nbsp;
                                           <label>
                                                <input type="radio" name="pstatus_s" value="Development Partners" class="flat-red">
                                                    Development Partners
                                            </label>&nbsp;	&nbsp;
                                            <label>
                                                <input type="radio" name="pstatus_s" value="SMZ & Donor" class="flat-red">
                                                    SMZ & Donor(s)
                                            </label>&nbsp;	&nbsp;
                                        </div>
                                   
                                  </div>
                                  

                              </div>
                          </div>
                          <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Needs (Utility) <span style="color:red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group">
                                               <textarea class="form-control" name="need"  value="<?php echo $description; ?>" rows="6" cols="150" placeholder="Enter project Needs (Utility)..."  required><?php echo $description; ?></textarea>   
                                        </div>
                                        <!-- <div class="invalid-feedback">
                                          andika mtaa unayoishi
                                        </div> -->
                                    </div>
                                </div>
                          </div>
                           <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Risk Factors <span style="color:red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group">
                                               <textarea class="form-control" name="risk"  value="<?php echo $description; ?>" rows="6" cols="150" placeholder="Enter project Risk Factors..."  required><?php echo $description; ?></textarea>   
                                        </div>
                                        <!-- <div class="invalid-feedback">
                                          andika mtaa unayoishi
                                        </div> -->
                                    </div>
                                </div>
                          </div>
                      
                          <div class="col-md-12">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default btn-flat pull-left" onclick="clearForm_project()" ><i class="fa fa-eraser"></i> <strong>Clear</strong></button>
                              <button type="submit" class="btn btn-primary btn-flat" name="addproject"><i class="fa fa-save"></i> <strong>Save</strong></button>
                            </div>
                          </div>
                          
                       </form>
                    </div><!-- /.row -->	
                </div> <!-- /.tab-pane -->
                
                <div class="tab-pane" id="tab_2" id="implementation_tab">
					          <div class="row">
                      <div class="col-md-12">
                              <form action="includes/controller.php" method="post">
                              <div class="col-md-4">
                                      <?php 
                                        if(isset($_GET['xyz'])){
                                            $get_xyz = $_GET['xyz'];
                                        } else {
                                          $get_xyz = 0;
                                        }
                                      
                                      ?>
                                  <input name="pid" value="<?php  echo $get_xyz; ?>" type="hidden" />
                                  
                                  <div class="form-group">
                                      <label>Program|Project Title </label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                          <input name="program" class="form-control" value="<?php echo $ptitle; ?>" readonly />
                                      </div>
                                     
                                  </div>
                                
                                    <div class="form-group">
                                        <label>Responsible Ministry <span style="color:red;">*</span></label>
                                        <div class="input-group date">
                                          <div class="input-group-addon">
                                          <i class="fa fa-building"></i>
                                          </div>
                                          <select class="form-control select2" name="institution"  onchange="showFP(this.value)" style="width: 100%;" required>
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
                                    <label>Responsible Officer <span style="color:red;">*</span></label>
                                      <div class="input-group" id="responsibleOfficer">
                                      </div>
                                  </div>
                                  <!--div class="form-group">
                                    <label>Period of Reporting :</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>From :</label>
                                             <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-building"></i>
                                                </div>
                                                <input type="date" class="form-control" name="reporting_from"  required>
                                             </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                         <div class="col-md-12">
                                              <label>To :</label>
                                             <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-building"></i>
                                                </div>
                                                <input type="date" class="form-control"  name="reporting_to"  required>
                                             </div>
                                        </div>
                                    </div>
                                   
                                  </div-->
                                  <!--div class="form-group">
                                    <label>Date of Submission of the Form :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                       <input type="date" class="form-control pull-right" name="date_submitted"  required>
                                   
                                    </div>
                                  </div-->
                                  <div class="form-group">
                                      <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-eraser"></i> <strong>Clear</strong></button>
                                            <button type="submit" class="btn btn-primary btn-flat" name="addtarget"><i class="fa fa-save"></i> <strong>Save</strong></button>
                                      </div>
                                  </div>
                              </div>
                             </form>
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
                                            INNER JOIN projecttb ON project_targetgroup.Project=projecttb.ID 
                                            INNER JOIN organizationtb ON project_targetgroup.Institution = organizationtb.ID
                                            WHERE project_targetgroup.Project ='$getid'";
                                                                                    
                                                                                 
                                                                                    
                                        //$query = "SELECT * FROM `project_targetgroup` WHERE `Project`='$getid'"; 
                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                        $num = 0;
                                          while($row = mysqli_fetch_array($result)) {	
                                              $num +=1;
                                              $id_get = $row['targetID'];
                                              $Institution = $row['Name'];
                                              $fp_name ="";
                                              //get implementors
                                              //if(strpos($user_role['Permission'], 'da_det') !== false){}
                                              $FocalPerson = $row['FocalPerson'];
                                              $my_fp_arr = preg_split ("/,/", $FocalPerson);
                                              $num =0;
                                              foreach ($my_fp_arr as $key => $value) {
                                                    $queryu = "SELECT * FROM `userinfo` WHERE `id`='$value'"; 
                                                    $resultu = mysqli_query($conn, $queryu) or die("Error : ".mysqli_error($conn));
                                                    $count = mysqli_num_rows($resultu);
                                                
                                                        if($rowu = mysqli_fetch_array($resultu)) {
                                                            if($num == 0) {
                                                                $fp_name = $rowu['Fullname'];
                                                            } else {
                                                                $fp_name = $fp_name.', '.$rowu['Fullname'];
                                                            }
                                                            
                                                        }
                                                   
                                                    $num +=1;
                                              }
                                              
                                                echo "<tr>
                                                <td>".$num."</td>
                                                <td>".$Institution."</td>
                                                 <td>".$fp_name."</td>
                                                <td>
                                                    <button class='btn btn-danger btn-sm deletetarget btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
                                                    <button class='btn btn-warning btn-sm edittarget btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Submission</button>
                                                    <button class='btn btn-info btn-sm targetactivity btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Activity</button>
                                                </td>
                                            </tr>";
                                        }
                                      
                                    ?>
                                                                
                                    
                                    </tbody>
                                  </table>
                              </div>
                          </div>
                    
                      
                    </div><!-- /.row -->	
                </div> <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3" id="financing_tab">
					          <div class="row">
                      <script type="">
                          function proj_costfnct(num) {
                              var rep_num = num.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                              document.getElementById("proj_cost").value = rep_num;
                          }
                          
                          function proj_disbursedfnct(num) {
                              var rep_num = num.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                              document.getElementById("proj_disbursed").value = rep_num;
                          }
                      </script>
                      <form action="includes/controller.php" method="post" id="addproject_financial">
                          <?php 
                            if(isset($_GET['xyz'])){
                                $get_xyz = $_GET['xyz'];
                            } else {
                              $get_xyz = 0;
                            }
                          
                          ?>
                          <input name="pid" value="<?php  echo $get_xyz; ?>" type="hidden" />
                            <div class="col-md-12">
                                <div class="col-md-3">
                                  <div class="form-group">
                                      <label>Type of Financing <span style="color:red;">*</span></label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                          <select class="form-control select2" name="typef" style="width: 100%;" required>
                                                <option value="Grant">Grant</option>
                                                <option value="Loan">Loan</option>
                                                <option value="SMZ Contribution">SMZ Contribution</option>
                                                <option value="SMZ Commitment">SMZ Commitment</option>
                                                <option value="Other">Other</option>
                                        </select>
                                      </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Sponsor Name <span style="color:red;">*</span></label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                          <select class="form-control select2" name="donor" style="width:100%;" required>
                                                  <?php 
                                                include 'includes/conn.php'; 
                                                    $query = "SELECT * FROM `organizationtb` WHERE `Type` ='Donor'"; 
                                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                    $num = 0;
                                                    echo '<option value="SMZ">Government (SMZ)</option>';
                                                    while($row = mysqli_fetch_array($result)) {	
                                                        echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                                    }  
                                                    
                                            ?>  
                                        </select>
                                      </div>
                                  </div>
                                </div>     
                                <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Period Time From <span style="color:red;">*</span></label><br />
                                      <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="date" class="form-control pull-right" name="r_from">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                         <label>To <span style="color:red;">*</span></label>
                                          <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="date" class="form-control pull-right" name="r_to">
                                            </div>
                                    </div>
                                  
                                </div>
                            </div><!-- /.row -->	
                            <div class="col-md-12">
                                 <div class="col-md-4">
                                       <div class="form-group">
                                            <label>Currency <span style="color:red;">*</span></label>
                                           <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <select class="form-control select2" style="width:100%;" name="currency" onchange="ShowUnit(this.value)" required>
                                                                    <?php
                                                                       include 'currency.php';
                                                                       foreach ($currency_symbols as $key => $value) {
                                                                           if($key =='TZS'){
                                                                                echo '<option selected="selected" value="'.$value.'('.$key.')'.'">'.$value.'('.$key.')'.'</option>';
                                                                           } else {
                                                                                echo '<option value="'.$value.'('.$key.')'.'">'.$value.'('.$key.')'.'</option>';
                                                                           }
                                                                        }
                                                                    ?>
                                                                   
                                                                   
                                                                </select>
                                            </div>           
                                        </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Total Amount <span style="color:red;">*</span></label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="projectcost" id="proj_cost" onkeyup="proj_costfnct(this.value)" class="form-control pull-right" placeholder="Enter total cost..."  required>
                                      </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Compensation cost </label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="disbursed" id="proj_disbursed" onkeyup="proj_disbursedfnct(this.value)" class="form-control pull-right" placeholder="Enter total Compensation cost...">
                                      </div>
                                  </div>
                                </div>
                            </div><!-- /.row -->
                    
                            <div class="col-md-12">
                                 <div class="modal-footer">
                                      <button type="button" class="btn btn-default btn-flat pull-left" onclick="clearForm_financial()"><i class="fa fa-eraser"></i> <strong>Clear</strong></button>
                                      <button type="submit" class="btn btn-primary btn-flat" name="addfinancing"><i class="fa fa-save"></i> <strong>Save</strong></button>
                                 </div>
                                
                            </div>
                     </form>
                    
                     
                        <hr />
                        <div class="col-md-12" style="margin-top: 70px;">
                             <div class="col-md-12">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>S.N</th>
                                        <th>Financing Type</th>
                                        <th>Sponsor</th>
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
                                              $donor = $row['SponsorID'];
                                              $unit = $row['Currency'].' '.$row['Unittype'];
                                              
                                              if($row['Currency'] =='Tshs'){
                                                  $_SESSION['total_tshs'] += $row['TotalAmount'];
                                                  $_SESSION['disbursed_tshs'] += $row['Disbursed'];
                                              } else {
                                                  $_SESSION['total_f'] += $row['TotalAmount'];
                                                  $_SESSION['disbursed_f'] += $row['Disbursed'];
                                              }
                                              
                                              $TotalAmount = number_format($row['TotalAmount'],2, '.', ',').'/'.$unit;
                                              $disbursed = number_format($row['Disbursed'],2, '.', ',').'/'.$unit;
                                                
                                                $donor_name="";
                                                if($donor ==0){
                                                    $donor_name ='Government SMZ';
                                                } else {
                                                     $queryd = "SELECT * FROM `organizationtb` WHERE `ID`='$donor'"; 
                                                     $resultd = mysqli_query($conn, $queryd) or die("Error : ".mysqli_error($conn));
                                                     if($rowd = mysqli_fetch_array($resultd)) {	
                                                         $donor_name = $rowd['Name'];
                                                     }
                                                }
                                             
                                                echo "<tr>
                                                <td>".$num."</td>
                                                <td>".$Financing."</td>
                                                <td>".$donor_name."</td>
                                                <td>".$TotalAmount."</td>
                                                 <td>".$disbursed."</td>
                                                <td>
                                                   
                                                    <button class='btn btn-danger btn-sm deletefinance btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
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
                <div class="tab-pane" id="tab_4" id="attachment_tab">
                    <div class="row">
                        
                            <div class="col-md-12">
                                 <div class="col-md-4">
                                     <form action="includes/controller.php" method="post" enctype="multipart/form-data">
                                     <?php 
                                      if(isset($_GET['xyz'])){
                                          $get_xyz = $_GET['xyz'];
                                      } else {
                                        $get_xyz = 0;
                                      }
                                    
                                    ?>
                                      <input name="pid" value="<?php  echo $get_xyz; ?>" type="hidden" />
                                      <div class="form-group">
                                        <label>Project </label>
                                         <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                              <input name="program_id" class="form-control" value="<?php echo $ptitle; ?>" readonly />
                                          </div>
                                    </div>
                                    <div class="form-group">
                                              <label>File Name <span style="color:red;">*</span></label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <input type="text" name="reportname" class="form-control pull-right" placeholder="Enter file name..."  required/>
                                              </div>
                                    </div>
                                    <div class="form-group">
                                            <label>File|Document <span style="color:red;">*</span> </label>
                                             <input type="file" name="file_rep" class="form-control pull-right" placeholder="Enter report name..."  required/>
                                    </div><br />
                                    <div class="form-group">
                                          <div class="modal-footer">
                                                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-eraser"></i><strong>Clear</strong> </button>
                                                <button type="submit" class="btn btn-primary btn-flat" name="addattachment"><i class="fa fa-save"></i> <strong>Save</strong></button>
                                          </div>
                                    </div>
                                 </form>
                                </div>
                                <div class="col-md-8">
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
                                                        <button class='btn btn-danger btn-sm deleteattachment btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
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
                
                <div class="tab-pane" id="tab_5" id="activities_tab">
                    <div class="row">
                       <script type="text/javascript">
                      
                          function proj_actamount2(num) {
                            //   var rep_num1 = num.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            //   document.getElementById("proj_actamount").value = rep_num1;
                         
                        		var ptotal = parseFloat(document.getElementById("proj_gttotalamount").value);
                        		var psmz = num;
                        		var ptotal_remain = ptotal - psmz;
                        		document.getElementById("currenttotalamount").value = ptotal_remain;
                        	}
                        	
                        	function proj_actamountwm(num) {
                        		var ptotal = parseFloat(document.getElementById("proj_gttotalamount").value);
                        		var ctotal = parseFloat(document.getElementById("proj_actamount").value);
                        	
                        		var psmz = parseFloat(document.getElementById("projactamount").value);
                        		var ptotal_remain = parseFloat(ptotal - psmz - ctotal);
                        		document.getElementById("currenttotalamount").value = ptotal_remain;
                        	}
                        </script>
                            <div class="col-md-12">
                                 <div class="col-md-4">
                                      <form action="includes/controller.php" method="post" id="addproject_activity">
                                      <?php 
                                        if(isset($_GET['xyz'])){
                                            $get_xyz = $_GET['xyz'];
                                        } else {
                                          $get_xyz = 0;
                                        }
                                      
                                      ?>
                                      <input name="pid" value="<?php  echo $get_xyz; ?>" type="hidden" />
                                       <div class="form-group">
                                          <label>Program|Project Title </label>
                                          <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                              <input name="program_id" class="form-control" value="<?php echo $ptitle; ?>" readonly />
                                          </div>
                                      </div>
                                    
                                    <div class="form-group">
                                              <label>Activity Name <span style="color:red;">*</span></label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <input type="text" name="activityname" class="form-control pull-right" placeholder="Enter activity name..."  required/>
                                              </div>
                                    </div>
                                    <div class="form-group">
                                              <label>Activity Resources <span style="color:red;">*</span></label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <textarea type="text" rows="5" name="proj_resource" class="form-control pull-right" placeholder="Enter activity resource..."  required/></textarea>
                                              </div>
                                    </div>
                                     <div class="form-group">
                                              <label>Activity Start Date <span style="color:red;">*</span></label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <input type="date" name="startdate" class="form-control pull-right start-date" placeholder="Enter activity startdate..."  required/>
                                              </div>
                                    </div>
                                    <div class="form-group">
                                        <label>End Date <span style="color:red;">*</span></label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                            </div>
                                            <input type="date" name="enddate" onchange="validateDateRange()" class="form-control pull-right end-date" placeholder="Enter activity enddate..."  required/>
                                        </div>
                                    </div>
                                    <div class="form-group date_range_message"></div>
                                    <div class="form-group">
                                              <label>Currency <span style="color:red;">*</span></label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <select class="form-control select2" style="width:100%;" name="currency" onchange="ShowUnit(this.value)" required>
                                                                    <?php
                                                                       include 'currency.php';
                                                                       foreach ($currency_symbols as $key => $value) {
                                                                           if($key =='TZS'){
                                                                                echo '<option selected="selected" value="'.$value.'('.$key.')'.'">'.$value.'('.$key.')'.'</option>';
                                                                           } else {
                                                                                echo '<option value="'.$value.'('.$key.')'.'">'.$value.'('.$key.')'.'</option>';
                                                                           }
                                                                        }
                                                                    ?>
                                                                   
                                                                   
                                                                </select>
                                              </div>
                                    </div>
                                    
                                    <div class="form-group">
                                            <label>Previous Project Balance</label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                 <?php 
                                                    if(isset($_GET['xyz'])){
                                                          $getid = $_GET['xyz'];
                                                          $queryy ="SELECT * FROM project_financing WHERE Project='$getid'";
                                                          $resulty = mysqli_query($conn, $queryy) or die("Error : ".mysqli_error($conn));
                                                          $num_pesa = 0;
                                                          while($rowy = mysqli_fetch_array($resulty)) {	
                                                               $num_pesa = $num_pesa + $rowy['TotalAmount'] + $rowy['Compensation'];
                                                          }   
                                                          
                                                          $queryys ="SELECT * FROM project_activity WHERE Project='$getid'";
                                                          $resultys = mysqli_query($conn, $queryys) or die("Error : ".mysqli_error($conn));
                                                          while($rowys = mysqli_fetch_array($resultys)) {	
                                                               $num_pesa = $num_pesa - $rowys['Amount'];
                                                               $num_pesa = $num_pesa - $rowys['amountWM'];
                                                          }   
                                                          
                                                          
                                                    }
                                                 ?>
                                                <input type="text" name="totalamount" id="proj_gttotalamount" class="form-control pull-right" value="<?php echo $num_pesa; ?>" readonly/>
                                               </div>
                                     </div>
                                     <div class="form-group">
                                              <label>Activity Amount (Government, SMZ) <span style="color:red;">*</span></label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <input type="text" name="amount" id="proj_actamount"  onkeyup="proj_actamount2(this.value)" class="form-control pull-right" placeholder="Enter activity amount..."  required/>
                                              </div>
                                    </div>
                                     <div class="form-group">
                                              <label>Activity Amount (Development Partner, WM) <span style="color:red;">*</span></label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <input type="text" name="amount_wm" id="projactamount" onkeyup="proj_actamountwm(this.value)" class="form-control pull-right" placeholder="Enter activity amount..." required/>
                                              </div>
                                    </div>
                                    <div class="form-group">
                                            <label>Current Project Balance</label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <input type="text" name="currenttotalamount" id="currenttotalamount" class="form-control pull-right" readonly/>
                                               </div>
                                     </div>
                                     
                                    
                                    
                                    
                                    <div class="form-group">
                                      <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-flat pull-left" onlick="clearForm_activity()"><i class="fa fa-eraser"></i> <strong>Clear</strong></button>
                                            <button type="submit" class="btn btn-primary btn-flat" name="projectactivity" id="projectactivity"><i class="fa fa-save"></i> <strong>Save</strong></button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="col-md-8">
                                     <table id="example5" class="table table-bordered">
                                        <thead>
                                            <th>S.N</th>
                                            <th>Name</th>
                                            <th>Resource</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Amount</th>
                                            <th>Action</th>
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
                                                  $Resource = $row['Resource'];
                                                  $StartDate = $row['StartDate'];
                                                  $EndDate = $row['EndDate'];
                                                  
                                                  $Amount = $row['Amount'];
                                                  $amount_wm = $row['amountWM'];
                                                  $totalamount = $Amount + $amount_wm;
                                                  
                                                    echo "<tr>
                                                            <td>".$num."</td>
                                                            <td>".$Name."</td>
                                                            <td>".$Resource."</td>
                                                            <td>".$StartDate."</td>
                                                            <td>".$EndDate."</td>
                                                            <td>".number_format($totalamount, 2)."</td>
                                                            <td>
                                                                <button class='btn btn-danger btn-sm deleteactivity btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
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
                <div class="tab-pane" id="tab_6">
					  <div class="row">
                     
                        
                          <div class="col-md-12">
                              <form action="includes/controller.php" method="post">
                              <div class="col-md-4">
                                  <input name="pid" value="<?php  echo $_GET['xyz']; ?>" type="hidden" />
                                  
                                  <div class="form-group">
                                      <label>Region <span style="color:red;">*</span></label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                         <select class="form-control select2" name="region" style="width: 100%;" onchange="showLGAsRegion(this.value)" required>
                                           <?php 
                                                include 'includes/conn.php'; 
                                                    $query = "SELECT * FROM `regiontb`"; 
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
                                       <label>District <span style="color:red;">*</span></label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <select class="form-control select2" name="districtLGAs" id="districtLGAs" style="width: 100%;" onchange="showLGAsDistrict(this.value)" required></select>
                                        </div>
                                   </div>
                                  
                                  <div class="form-group">
                                      <label><a href="https://geojson.io/">Get GPS Coordinate:</a></label>
                                      <div class="input-group">
                                          <textarea class="form-control" name="coordinate" rows="6" cols="150" placeholder="Enter location latitude and longitude..." ></textarea>
                                      </div>
                                  </div>
                                
                                  <div class="form-group">
                                      <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                            <button type="submit" class="btn btn-primary btn-flat" name="addtargetlocation"><i class="fa fa-save"></i> Save</button>
                                      </div>
                                  </div>
                              </div>
                             </form>
                              <div class="col-md-8">
                               <!-- create table -->
                                 <table id="example7" class="table table-bordered">
                                    <thead>
                                        <th>S.N</th>
                                        <th>Region</th>
                                        <th>District</th>
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
        		                	       
                                        $query = "SELECT * FROM project_location, wilayatb, regiontb WHERE project_location.Project='$getid' AND project_location.Wilaya = wilayatb.WilayaID AND wilayatb.MkoaID = regiontb.ID"; 
                                        $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                        $num = 1;
                                          while($row = mysqli_fetch_array($result)) {	
                                                echo "<tr>
                                                <td>".$num."</td>
                                                <td>".$row['Name']."</td>
                                                 <td>".$row['JinaLaWilaya']."</td>
                                                <td>
                                                    <button class='btn btn-danger btn-sm deletetarget btn-flat' data-id=".$row['LocationID']."><i class='fa fa-trash'></i> Delete</button>
                                                </td>
                                            </tr>";
                                            
                                            $num +=1;
                                        }
                                      
                                    ?>
                                                                
                                    
                                    </tbody>
                                  </table>
                              </div>
                          </div>
                    </div><!-- /.row -->	
                </div> <!-- /.tab-pane -->
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

<script>
function clearForm_project(){
    document.getElementById("addproject_form").reset();
}

function clearForm_financial(){
    document.getElementById("addproject_financial").reset();
}

function clearForm_activity(){
    document.getElementById("addproject_activity").reset();
}


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
    e.preventDefault();
    $('#deletetarget').modal('show');
    var id = $(this).data('id');
    getRow_target(id);
  });
  
  $("body").on("click", ".edittarget", function(e){
    e.preventDefault();
    $('#edittarget').modal('show');
    var id = $(this).data('id');
    getRow_target(id);
  });
  
  
   $("body").on("click", ".targetactivity", function(e){
    e.preventDefault();
    $('#targetactivity').modal('show');
    var id = $(this).data('id');
    //getRow_target(id);
    ShowProjectActivity(id);
  });
  
  
   $("body").on("click", ".targetstatus", function(e){
    e.preventDefault();
    $('#targetstatus').modal('show');
    var id = $(this).data('id');
    getRow_target(id);
  });
  
  $("body").on("click", ".deletefinance", function(e){
    e.preventDefault();
    $('#deletefinance').modal('show');
    var id = $(this).data('id');
    getRow_finance(id);
  });
  
  	

   $("body").on("click", ".deleteactivity", function(e){
    e.preventDefault();
    $('#deleteactivity').modal('show');
    var id = $(this).data('id');
    getRow_activity(id);
  });
  
  $("body").on("click", ".deleteattachment", function(e){
    e.preventDefault();
    $('#deleteattachment').modal('show');
    var id = $(this).data('id');
    getRow_attachment(id);
  });
  
}); 

  $("body").on("click", ".deletelocation", function(e){
    e.preventDefault();
    $('#deletelocation').modal('show');
    var id = $(this).data('id');
    getRow_location(id);
  });
  

function getRow_target(id){
  $.ajax({
    type: 'POST',
    url: 'target_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.tarid').val(response.targetID);
      $('.projid').val(response.Project);
      $('.tar_name').html(response.Name)
      
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

function getRow_location(id){
   
  $.ajax({
    type: 'POST',
    url: 'location_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.tarid').val(response.LocationID);
      $('.projid').val(response.Project);
      $('.tar_name').html(response.Name)
      
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

function ShowProjectActivity(str) {
        // alert(str);
        if (str == "") {
            document.getElementById("activitytarget").innerHTML = "";
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
                    document.getElementById("activitytarget").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getactivitytarget.php?q="+str,true);
            xmlhttp.send();
        }
}

function getRow_finance(id){

  $.ajax({
    type: 'POST',
    url: 'finance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.financeid').val(response.financing_ID);
      $('.projid').val(response.Project);
      $('.finance_name').html(response.Financing)
      
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

function getRow_activity(id){
  $.ajax({
    type: 'POST',
    url: 'activity_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.activityid').val(response.activityID);
      $('.projid').val(response.Project);
      $('.activity_name').html(response.Activity)
      
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

function getRow_attachment(id){
  $.ajax({
    type: 'POST',
    url: 'attachment_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.attachmentid').val(response.fileID);
      $('.projid').val(response.Project);
      $('.attachment_name').html(response.Filename)
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
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>




<script src="form/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="form/form-validation.js"></script>
</body>
</html>
