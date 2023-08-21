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

    function sample2(num) {
  	    // alert(num);
         var rep_num = num.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     }
     

</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        LGAs PROGRAMM | PROJECT
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
                    <li><a href="#tab_6" data-toggle="tab"><b>LOCATION</b></a></li>
                    <li><a href="#tab_4" data-toggle="tab"><b>ATTACHMENTS</b></a></li>
            </ul>
			<div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    
                   
                    <div class="row">
                      <form action="includes/controller.php" method="post">
                          <input name="userID" value="<?php  echo $user['id']; ?>" type="hidden" />
                          <input name="groupID" value="<?php  echo $user['groupID']; ?>" type="hidden" />
                            
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
                                                <input type="radio" name="type" value="Program" id="chk_program" class="flat-red" checked>
                                                Program
                                            </label>&nbsp;	&nbsp;
                                        </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                     <div class="form-group">
                                        <div class="input-group">
                                            <label>
                                                <input type="radio" name="type" value="Project" id="chk_project" onclick="checkFluency()" class="flat-red">
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
                                     <select class="form-control select2" name="program_id" id="program_id" style="width: 100%;">
                                         <option value="0"></option>
                                          <?php 
                                                include 'includes/conn.php'; 
                                                
                                                     $query = "SELECT * FROM `projecttb` WHERE `pType`='Program' AND `pTypeGroup`='LGAs'"; 
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
                                        <label>Assign to the Project Type :</label>
                                    </div>
                              </div>
                              <div class="col-md-8">
                                    <div class="form-group">
                                     <!--select class="form-control select2"  name ="agenda" style="width: 100%;" required-->
                                                        <label>
                                                            <input type="radio" name="ProjectType" value="Development" id="chk_program1" class="flat-red" checked> 	&nbsp;Development
                                                        </label>&nbsp;	&nbsp;
                                                         <label>
                                                            <input type="radio" name="ProjectType" value="Production" id="chk_program11" class="flat-red"> 	&nbsp;Production
                                                        </label>&nbsp;	&nbsp;
                                                        
                                                 
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
                                    <label>Sector :</label>
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
                                    <label>Internal Code :</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                      <i class="fa fa-building"></i>
                                      </div>
                                      <input type="text" class="form-control" placeholder="Enter internal code..." name="code" id="internalcode">
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <label>External Code :</label>
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
                                            <label>Duration :</label>
                                            <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group row">
                                                                <input type="number" name="duration" id="duration" class="form-control pull-right col-md-6" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group row">
                                                                <select class="form-control select2 col-md-6" name="duration_period" id="duration_period" style="width: 100%;">
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
                                        <input type="date" name="startdate" class="form-control pull-right" id="datepicker" onchange="getenddate(this.value)" required>
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
                                      <span id="getenddate">
                                           <input type="date"  name="enddate" class="form-control pull-right" id="datepicker1" >
                                      </span>
                                     
                                    </div>
                                  </div>
                                   <div class="form-group">
                                    <label>Phase :</label>
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
                                    <label>Sponsor Type :</label>
                                  
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
                                                <input type="radio" name="pstatus_s" value="SMZ & Donor" class="flat-red">
                                                    SMZ & Donor(s)
                                            </label>&nbsp;	&nbsp;
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
                     
                        
                          <div class="col-md-12">
                              <form action="includes/controller.php" method="post">
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
                                            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                            <button type="submit" class="btn btn-primary btn-flat" name="addtarget"><i class="fa fa-save"></i> Save</button>
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
                <div class="tab-pane" id="tab_3">
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
                      <form action="includes/controller.php" method="post">
                          
                          <input name="pid" value="<?php  echo $_GET['xyz']; ?>" type="hidden" />
                            <div class="col-md-12">
                        
                                <div class="col-md-3">
                                  <div class="form-group">
                                      <label>Type of Financing :</label>
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
                                <div class="col-md-5">
                                  <div class="form-group">
                                      <label>Sponsor Name :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                          <select class="form-control select2" name="donor" style="width: 100%;" required>
                                                  <?php 
                                                include 'includes/conn.php'; 
                                                    $query = "SELECT * FROM `organizationtb` WHERE `Type` ='Donor'"; 
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
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Period Time From :</label><br />
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
                                         <label>To :</label>
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
                                 <div class="col-md-3">
                                       <div class="form-group">
                                            <label>Currency :</label>
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
                                <div class="col-md-3">
                                  <div class="form-group">
                                      <label>Total Amount :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="projectcost" id="proj_cost" onkeyup="proj_costfnct(this.value)" class="form-control pull-right" placeholder="Enter total cost..."  required>
                                      </div>
                                  </div>
                              </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                      <label>Amount Disbursed  :</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                        </div>
                                        <input type="text" name="disbursed" id="proj_disbursed" onkeyup="proj_disbursedfnct(this.value)" class="form-control pull-right" placeholder="Enter total disbursed..."  required>
                                      </div>
                                  </div>
                              </div>
                       
                            </div><!-- /.row -->
                    
                            <div class="col-md-12">
                                 <div class="modal-footer">
                                      <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                      <button type="submit" class="btn btn-primary btn-flat" name="addfinancing"><i class="fa fa-save"></i> Save</button>
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
                                              
                                              $TotalAmount = number_format($row['TotalAmount'],2).'/'.$unit;
                                              $disbursed = number_format($row['Disbursed'],2).'/'.$unit;
                                                
                                                $donor_name="";
                                                 $queryd = "SELECT * FROM `organizationtb` WHERE `ID`='$donor'"; 
                                                 $resultd = mysqli_query($conn, $queryd) or die("Error : ".mysqli_error($conn));
                                                 if($rowd = mysqli_fetch_array($resultd)) {	
                                                     $donor_name = $rowd['Name'];
                                                 }
                                              $num +=1;
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
                <div class="tab-pane" id="tab_4">
                    <div class="row">
                        
                            <div class="col-md-12">
                                 <div class="col-md-4">
                                     <form action="includes/controller.php" method="post" enctype="multipart/form-data">
                                       <input name="pid" value="<?php  echo $_GET['xyz']; ?>" type="hidden" />
                                      <div class="form-group">
                                        <label>Project:</label>
                                         <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                              <input name="program_id" class="form-control" value="<?php echo $ptitle; ?>" readonly />
                                          </div>
                                    </div>
                                    <div class="form-group">
                                              <label>File Name:</label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <input type="text" name="reportname" class="form-control pull-right" placeholder="Enter file name..."  required/>
                                              </div>
                                    </div>
                                    <div class="form-group">
                                            <label>File|Document </label>
                                             <input type="file" name="file_rep" class="form-control pull-right" placeholder="Enter report name..."  required/>
                                    </div><br />
                                    <div class="form-group">
                                          <div class="modal-footer">
                                                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                <button type="submit" class="btn btn-primary btn-flat" name="addattachment"><i class="fa fa-save"></i> Save</button>
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
                <div class="tab-pane" id="tab_6">
					  <div class="row">
                     
                        
                          <div class="col-md-12">
                              <form action="includes/controller.php" method="post">
                              <div class="col-md-4">
                                  <input name="pid" value="<?php  echo $_GET['xyz']; ?>" type="hidden" />
                                  
                                  <div class="form-group">
                                      <label>Region :</label>
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
                                       <label>District :</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <select class="form-control select2" name="districtLGAs" id="districtLGAs" style="width: 100%;" onchange="showLGAsDistrict(this.value)" required></select>
                                        </div>
                                   </div>
                                  
                                  <div class="form-group">
                                    <label>Shehia:</label>
                                      <div class="input-group" id="responsibleShehia">
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
                                        <th>Shehia</th>
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
                <div class="tab-pane" id="tab_5">
                    <div class="row">
                       <script type="text/javascript">
                      
					        function proj_actamount2(num) {
					             var rep_num1 = num.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					             document.getElementById("proj_actamount").value = rep_num1;
					        }
					       
					    </script>
                            <div class="col-md-12">
                                 <div class="col-md-4">
                                      <form action="includes/controller.php" method="post">
                                      <input name="pid" value="<?php  echo $_GET['xyz']; ?>" type="hidden" />
                                       <div class="form-group">
                                          <label>Program|Project Title :</label>
                                          <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                              <input name="program_id" class="form-control" value="<?php echo $ptitle; ?>" readonly />
                                          </div>
                                      </div>
                                    
                                    <div class="form-group">
                                              <label>Activity Name:</label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <input type="text" name="activityname" class="form-control pull-right" placeholder="Enter activity name..."  required/>
                                              </div>
                                    </div>
                                    <div class="form-group">
                                              <label>Activity Resources:</label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <textarea type="text" rows="5" name="proj_resource" class="form-control pull-right" placeholder="Enter activity resource..."  required/></textarea>
                                              </div>
                                    </div>
                                     <div class="form-group">
                                              <label>Activity Start Date:</label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <input type="date" name="startdate" class="form-control pull-right" placeholder="Enter activity startdate..."  required/>
                                              </div>
                                    </div>
                                    <div class="form-group">
                                              <label>End Date:</label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <input type="date" name="enddate" class="form-control pull-right" placeholder="Enter activity enddate..."  required/>
                                              </div>
                                    </div>
                                     <div class="form-group">
                                              <label>Activity Amount:</label>
                                              <div class="input-group date">
                                                <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                                </div>
                                                <input type="text" name="amount" id="proj_actamount" onkeyup="proj_actamount2(this.value)" class="form-control pull-right" placeholder="Enter activity amount..."  required/>
                                              </div>
                                    </div>
                                     <div class="form-group">
                                              <label>Currency:</label>
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
                                      <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                            <button type="submit" class="btn btn-primary btn-flat" name="projectactivity"><i class="fa fa-save"></i> Save</button>
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
                                                 
                                                  
                                                    echo "<tr>
                                                    <td>".$num."</td>
                                                    <td>".$Name."</td>
                                                    <td>".$Resource."</td>
                                                    <td>".$StartDate."</td>
                                                    <td>".$EndDate."</td>
                                                    <td>".number_format($Amount, 2)."</td>
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
</body>
</html>
