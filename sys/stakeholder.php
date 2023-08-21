<?php
  session_start();

  if(isset($_SESSION['page_status']) !=TRUE){ 
	  header('location:index.php');
  } 
  
?>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/head_menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <script>
         function radioCheck(radio){
           data = radio.getAttribute("data");
          // alert(data);
           var block1 ="showCountry";
           var block2 ="NotshowCountry";
           if(data=="Donor"){
              document.getElementById(block1).style.display = "block";
              document.getElementById(block2).style.display = "none";
           }else {
              document.getElementById(block2).style.display = "block";
              document.getElementById(block1).style.display = "none";
           }
         }
    </script>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       USER MANAGEMENT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Management</li>
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
         <div class="row">
        <div class="col-xs-12">
         
			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><b>REGISTER ORGANIZATION</b></a></li>
              <li><a href="#tab_5" data-toggle="tab"><b>INSTITUTION</b></a></li>
			   <li><a href="#tab_2" data-toggle="tab"><b>M&E USERS</b></a></li>
              <li><a href="#tab_6" data-toggle="tab"><b>ORGANIZATION LIST</b></a></li>
              <li><a href="#tab_3" data-toggle="tab"><b>INSTITUTION LIST</b></a></li>
              <li><a href="#tab_4" data-toggle="tab"><b>USERS LIST</b></a></li>
            </ul>
			      <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="row">
                          <form action="includes/controller.php" method="post" id="clear_organization">
                              <div class="col-md-12">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Organization Name <span style="color:red;">*</span></label>
                                          <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" name="name" class="form-control pull-right required-input" placeholder="Enter Institution name..."  required/>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label>Short Tittle:</label>
                                          <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" name="shortname" class="form-control pull-right" placeholder="Enter Institution short name..." />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        <label>Office Telephone <span style="color:red;">*</span></label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                          <i class="fa fa-building"></i>
                                          </div>
                                          <input type="text" class="form-control" placeholder="Enter Office Telephone..." name="telephone" pattern="[0-9]{10}" required/>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label>Postal Address <span style="color:red;">*</span></label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                          <i class="fa fa-building"></i>
                                          </div>
                                          <input type="text" class="form-control" placeholder="Enter Postal Address..." name="postaladdress"  required/>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label>Status <span style="color:red;">*</span></label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                          <i class="fa fa-building"></i>
                                          </div>
                                            <select class="form-control select2" name="status" id="status" required>
                                                    <option value="Active">Active</option>
                                                    <option value="Suspended">Suspended</option>
                                                    <option value="Inactive">Inactive</option>                    
                                            </select>
                                      
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Type of Organization <span style="color:red;">*</span></label>
                                        <div class="input-group">
                                            <label>
                                              <input type="radio" name="types" value="Government" class="flat-red"  checked>
                                              Government
                                            </label>&nbsp;	&nbsp;
                                            <label>
                                              <input type="radio" name="types"  value="CSOs" class="flat-red" >
                                              CSOs
                                            </label>	&nbsp;	&nbsp;
                                            <label>
                                              <input type="radio" name="types" value="Private Sector" class="flat-red">
                                              Private Sector
                                            </label>&nbsp;	&nbsp;
                                            <label>
                                              <input type="radio" name="types"  value="Donor" class="flat-red">
                                              Donor|Sponsor
                                            </label>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label>Office Email <span style="color:red;">*</span></label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                          <i class="fa fa-building"></i>
                                          </div>
                                          <input type="text" class="form-control" placeholder="Enter office email..." name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"  required/>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label>Location Address <span style="color:red;">*</span></label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                          <i class="fa fa-building"></i>
                                          </div>
                                          <textarea row="5" type="text" class="form-control" placeholder="Location Address" name="address" required></textarea>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label>Country <span style="color:red;">*</span></label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                          </div>
                                          <select class="form-control select2" name="country" required>
                                              <?php 
                                                include 'countries.php';
                                              ?>
                                          </select>
                                         
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="employee" class="control-label">Responsible Sector</label>
                                        <div class="input-group">
                                            <select class="form-control select2"  multiple="multiple" name="frequency_sector[]" data-placeholder="Select a Sector" style="width: 100%;" required>
                                            <?php 
                                              include 'php/conn.php'; 
                                                $query = "SELECT * FROM `sector`"; 
                                                $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                $num = 0;
                                                echo '<option value=" ">-- Select --</option>';
                                                while($row = mysqli_fetch_array($result)) {	
                                                  echo '<option value="'.$row['SectorID'].'">'.$row['SectorName'].'</option>';
                                                }         
                                            ?>  
                                          </select>
                                        </div>
                                      </div>
                                      
                                  </div>
                              </div>
                              <div class="col-md-12">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default btn-flat pull-left" onclick="clearForm_organization()"><i class="fa fa-eraser"></i> <strong>Clear</strong></button>
                                  <button type="submit" class="btn btn-primary btn-flat" name="addorganization"><i class="fa fa-save"></i><strong>Save</strong></button>
                                </div>
                              </div>
                          </form>
                        </div><!-- /.row -->	
                    </div> <!-- /.tab-pane -->
			
                    <div class="tab-pane" id="tab_5">
                        <div class="row">
                          <form action="includes/controller.php" method="post" id="clear_institution">
                              <div class="col-md-12">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Ministry <span style="color:red;">*</span></label>
                                          <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <select class="form-control select2" name="organization" style="width: 100%;" required>
                                                <?php 
                                                    include 'includes/conn.php'; 
                                                                    $query = "SELECT * FROM organizationtb WHERE  org_group ='Ministry' ORDER BY Mwaka DESC"; 
                                                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                                    $num = 0;
                                                                    echo '<option value="0">Select...</option>';
                                                                    while($row = mysqli_fetch_array($result)) {	
                                                                      if($row['Type']=='Government'){
                                                                        echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                                                      } else {
                                                                        echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                                                      }
                                                                      
                                                                    }  
                                                                    
                                                ?>                   
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label>Institution Name <span style="color:red;">*</span></label>
                                          <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" name="institution" class="form-control pull-right" placeholder="Enter Institution name..."  required/>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label>Short Name <span style="color:red;">*</span></label>
                                          <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" name="short_institute" class="form-control pull-right" placeholder="Enter Institution short name..." />
                                          </div>
                                      </div>
                                     
                                  </div>
                                  <div class="col-md-6">
                                    
                                      <div class="form-group">
                                        <label>Contact Details <span style="color:red;">*</span></label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                          <i class="fa fa-building"></i>
                                          </div>
                                          <textarea row="5" type="text" class="form-control" placeholder="Location Address" name="address" required></textarea>
                                        </div>
                                      </div>
                               
                                      <div class="form-group">
                                        <label>Status <span style="color:red;">*</span></label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                          <i class="fa fa-building"></i>
                                          </div>
                                            <select class="form-control select2" name="status" id="status" style="width: 100%;" required>
                                                    <option value="Active">Active</option>
                                                    <option value="Suspended">Suspended</option>
                                                    <option value="Inactive">Inactive</option>                    
                                            </select>
                                      
                                        </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default btn-flat pull-left" onclick="clearForm_institution()"><i class="fa fa-eraser"></i><strong>Clear</strong></button>
                                  <button type="submit" class="btn btn-primary btn-flat" name="addinstitution"><i class="fa fa-save"></i><strong>Save</strong></button>
                                </div>
                              </div>
                          </form>
                        </div><!-- /.row -->	
                    </div> <!-- /.tab-pane -->
			
                      <div class="tab-pane" id="tab_2">
                          <div class="row">
                            <form action="includes/controller.php" method="post" enctype="multipart/form-data" id="clear_meuser">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Organization <span style="color:red;">*</span></label>
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                              <i class="fa fa-building"></i>
                                              </div>
                                              <select class="form-control select2" name="organization" onchange="showDepartment(this.value)"  style="width: 100%;" required>
                                                            <?php 
                                                                include 'includes/conn.php'; 
                                                                    $query = "SELECT * FROM organizationtb ORDER BY Mwaka DESC"; 
                                                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                                    $num = 0;
                                                                    echo '<option value="0">Select...</option>';
                                                                    while($row = mysqli_fetch_array($result)) {	
                                                                      if($row['Type']=='Government'){
                                                                        echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                                                      } else {
                                                                        echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                                                      }
                                                                      
                                                                    }  
                                                                    
                                                            ?>                   
                                                          </select>
                                            </div>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--      <label>Department :</label>-->
                                        <!--      <div class="input-group date">-->
                                        <!--          <div class="input-group-addon">-->
                                        <!--              <i class="fa fa-building"></i>-->
                                        <!--          </div>-->
                                        <!--          <input type="text" class="form-control" placeholder="Enter department name..." name="department" >-->
                                        <!--           <select class="form-control select2" name="department" id="department" required>-->
                                                        
                                        <!--          </select> -->
                                        <!--      </div>-->
                                        <!--  </div>-->
                                        <div class="form-group">
                                          <label>Name <span style="color:red;">*</span></label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter Office name..." name="name"  required>
                                          </div>
                                        </div>
                                      
                                        <div class="form-group">
                                          <label>Telephone <span style="color:red;">*</span></label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter telephone..." name="telephone" pattern="[0-9]{10}" required/>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label>Email Address <span style="color:red;">*</span></label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter Postal Address..." name="address"  pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                                          </div>
                                        </div>
                                      

                                    </div>
                                    <div class="col-md-6">
                                      
                                      
                                        <div class="form-group" style="margin-top: 80px;">
                                          <?php include 'prof.php';  ?>
                                        </div>
                                        <!--div class="form-group">
                                          <label>Username :</label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter username..." name="username"  required/>
                                          </div>
                                        </div-->
                                        <!-- <div class="form-group">
                                          <label>Password :</label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Enter password..." name="password"  required/>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label>Repeat Password :</label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Enter repeat password..." name="reppassword"  required/>
                                          </div>
                                        </div> -->
                                          <div class="form-group">
                                              <label>Role Name <span style="color:red;">*</span></label>
                                              <div class="input-group date">
                                                  <div class="input-group-addon">
                                                      <i class="fa fa-building"></i>
                                                  </div>
                                                  <select class="form-control select2"  multiple="multiple" name="roles" style="width: 100%;" required>
                                                      <?php 
                                                          include 'includes/conn.php'; 
                                                          $query = "SELECT * FROM `roletb`"; 
                                                          $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                          $num = 0;
                                                          echo '<option value="0">Select...</option>';
                                                          while($row = mysqli_fetch_array($result)) {	
                                                                  echo '<option value="'.$row['role_ID'].'">'.$row['Name'].'</option>';
                                                          }  
                                                                              
                                                      ?>                
                                                  </select>
                                              </div>
                                          </div>
                                        
                                    </div>
                                </div>
                            <?php //include 'role.php'; ?>
                              
                                <div class="col-md-12">
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat pull-left" onclick="clearForm_meuser()"><i class="fa fa-eraser"></i><strong>Clear</strong></button>
                                    <button type="submit" class="btn btn-primary btn-flat" name="addfocalperson"><i class="fa fa-save"></i><strong>Save</strong></button>
                                  </div>
                                </div>
                            </form>
                          </div><!-- /.row -->	 
                      </div>
                      
                      <div class="tab-pane" id="tab_5">
                          <div class="row">
                            <form action="includes/controller.php" method="post" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Organization</label>
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                              <i class="fa fa-building"></i>
                                              </div>
                                              <select class="form-control select2" name="organization" onchange="showDepartment(this.value)" required>
                                              <?php 
                                                      include 'includes/conn.php'; 
                                                          $query = "SELECT * FROM organizationtb ORDER BY Mwaka DESC"; 
                                                          $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                          $num = 0;
                                                          echo '<option value="0">Select...</option>';
                                                          while($row = mysqli_fetch_array($result)) {	
                                                            if($row['Type']=='Government'){
                                                              echo '<option value="'.$row['ID'].'">'.$row['Name'].'('.$row['Mwaka'].')</option>';
                                                            } else {
                                                              echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
                                                            }
                                                            
                                                          }  
                                                          
                                                  ?>                                
                                              </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                              <label>Department <span style="color:red;">*</span></label>
                                              <div class="input-group date">
                                                  <div class="input-group-addon">
                                                      <i class="fa fa-building"></i>
                                                  </div>
                                                  <select class="form-control select2" name="department" id="department" required>
                                                        
                                                  </select>
                                              </div>
                                          </div>
                                        <div class="form-group">
                                          <label>Name <span style="color:red;">*</span></label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter Office name..." name="name"  required>
                                          </div>
                                        </div>
                                      
                                        <div class="form-group">
                                          <label>Telephone <span style="color:red;">*</span></label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter telephone..." name="telephone"  required/>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label>Email Address|Username<span style="color:red;">*</span></label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter Postal Address..." name="address"  required>
                                          </div>
                                        </div>
                                        <!--div class="form-group">
                                          <label>Period of Reporting :</label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservation" name="reporting"  required>
                                        
                                          </div>
                                        </div-->

                                    </div>
                                    <div class="col-md-6">
                                      
                                      
                                        <div class="form-group">
                                        <?php include 'prof.php';  ?>
                                        </div>
                                        <!--div class="form-group">
                                          <label>Username :</label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter username..." name="username"  required/>
                                          </div>
                                        </div-->
                                        <div class="form-group">
                                          <label>Password <span style="color:red;">*</span></label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Enter password..." name="password"  required/>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label>Repeat Password <span style="color:red;">*</span></label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Enter repeat password..." name="reppassword"  required/>
                                          </div>
                                        </div>
                                          <div class="form-group">
                                              <label>Role Name :</label>
                                              <div class="input-group date">
                                                  <div class="input-group-addon">
                                                      <i class="fa fa-building"></i>
                                                  </div>
                                                  <select class="form-control select2" name="roles" required>
                                                      <?php 
                                                          include 'includes/conn.php'; 
                                                          $query = "SELECT * FROM `roletb`"; 
                                                          $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                          $num = 0;
                                                          echo '<option value="0">Select...</option>';
                                                          while($row = mysqli_fetch_array($result)) {	
                                                                  echo '<option value="'.$row['role_ID'].'">'.$row['Name'].'</option>';
                                                          }  
                                                                              
                                                      ?>                
                                                  </select>
                                              </div>
                                          </div>
                                        
                                    </div>
                                </div>
                            <?php //include 'role.php'; ?>
                              
                                <div class="col-md-12">
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                    <button type="submit" class="btn btn-primary btn-flat" name="addfocalperson"><i class="fa fa-save"></i> Save</button>
                                  </div>
                                </div>
                            </form>
                          </div><!-- /.row -->	 
                      </div>
          
                      <div class="tab-pane" id="tab_3">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-body">
                                    <!-- <a href="organizationreport.php" class='btn btn-success btn-sm btn-flat'><i class='fa fa-print' target="_blank"></i> Print</a>
                                    <a href="#" class='btn btn-info btn-sm editme btn-flat'><i class='fa fa-file'></i> Export</a><br /><br /> -->
                                    <table id="example11" class="table table-bordered">
                                      <thead>
                                          <th>S.N</th>
                                          <th>Institution</th>
                                          <th>Organization</th>
                                          <th>Date Registered</th>
                                          <th>Action</th>
                                      </thead>
                                      <tbody>
                                      <?php 
                                          include 'includes/conn.php';
                                          $kra_details =" ";
                                          $query = "SELECT * FROM `organizationtb` WHERE `org_group`='Institution'"; 
                                          $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                          $num = 0;
                                            while($row = mysqli_fetch_array($result)) {	
                                                $num +=1;
                                                $id_get = $row['ID'];
                                                $Name = $row['Name'];
                                                $Type_ID = $row['under_organization'];

                                                $queryss = "SELECT * FROM `organizationtb` WHERE `ID`='$Type_ID'"; 
                                                $resultss = mysqli_query($conn, $queryss) or die("Error : ".mysqli_error($conn));
                                                $rowss = mysqli_fetch_array($resultss);

                                                  echo "<tr>
                                                  <td>".$num."</td>
                                                  <td>".$Name."</a></td>
                                                  <td>".$rowss['Name']."</td>
                                                  <td>".$rowss['org_registered_date']."</td>
                                                  <td>
                                                      <button class='btn btn-success btn-sm editInstitution btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Edit</button>
                                                      <button class='btn btn-danger btn-sm deleteOrganization btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
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
                      </div>
                      <div class="tab-pane" id="tab_6">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-body">
                                    <table id="example8" class="table table-bordered">
                                      <thead>
                                          <th>S.N</th>
                                          <th>Institution</th>
                                          <th>Type</th>
                                          <th>Telephone</th>
                                          <th>Action</th>
                                      </thead>
                                      <tbody>
                                      <?php 
                                          include 'includes/conn.php';
                                          $kra_details =" ";
                                          $query = "SELECT * FROM `organizationtb` WHERE `org_group`='Ministry'"; 
                                          $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                          $num = 0;
                                            while($row = mysqli_fetch_array($result)) {	
                                                $num +=1;
                                                $id_get = $row['ID'];
                                                $Name = $row['Name'];
                                                $Type = $row['Type'];
                                                $Telephone =$row['Telephone'];
                                                  echo "<tr>
                                                  <td>".$num."</td>
                                                  <td><i class='fa fa-eye'></i>&nbsp;<a href='organizationreport.php?id=".$id_get."'>".$Name."</a></td>
                                                  <td>".$Type."</td>
                                                  <td>".$Telephone."</td>
                                                  <td>
                                                      <a href='vieworganization.php?id=".$id_get."' class='btn btn-primary btn-sm btn-flat'><i class='fa fa-edit'></i> View</a>
                                                      <button class='btn btn-success btn-sm editOrganization btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Edit</button>
                                                      <button class='btn btn-danger btn-sm deleteOrganization btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
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
                      </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_4">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="box">
                              <div class="box-body">
                              <!-- <a href="#" class='btn btn-success btn-sm editme btn-flat'><i class='fa fa-print'></i> Print</a>
                              <a href="#" class='btn btn-info btn-sm editme btn-flat'><i class='fa fa-file'></i> Export</a><br /><br /> -->
                              <table id="example12" class="table table-bordered">
                                <thead>
                                    <th>S.N</th>
                                    <th>Organization</th>
                                    <th>Name</th>
                                    <th>Telephone</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php 
                                    include 'includes/conn.php';
                                    $kra_details =" ";
                                    $query = "SELECT * FROM `userinfo`
                                              INNER JOIN organizationtb ON organizationtb.ID = userinfo.Organization"; 
                                    $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                    $num = 0;
                                      while($row = mysqli_fetch_array($result)) {	
                                          $num +=1;
                                          $id_get = $row['id'];
                                          $Fullname = $row['Fullname'];
                                          $Email = $row['Email'];
                                          $PhoneNumber =$row['PhoneNumber'];
                                          $get_role = $row['Role'];
                                          $role_name = '';
                                          $querys = "SELECT * FROM roletb WHERE role_ID ='$get_role'";
                                          $resultt = mysqli_query($conn, $querys) or die("Error : ".mysqli_error($conn));
                                          if($rows = mysqli_fetch_array($resultt)) {	
                                            $role_name =$rows['Name'];
                                          }
                                            echo "<tr>
                                            <td>".$num."</td>
                                            <td>".$row['Name']."</td>
                                            <td><i class='fa fa-eye'></i>&nbsp;<a href='userreport.php?id=".$id_get."'>".$Fullname."</a></td>
                                          <td>".$PhoneNumber."</td>
                                          <td>".$Email."</td>
                                          <td>".$role_name."</td>
                                            <td>
                                                <button class='btn btn-success btn-sm editme btn-flat' data-id=".$id_get."><i class='fa fa-edit'></i> Edit</button>
                                                <button class='btn btn-danger btn-sm deleteme btn-flat' data-id=".$id_get."><i class='fa fa-trash'></i> Delete</button>
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
                    </div>
              
                    <!-- /.tab-pane -->
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
$(function(){
  //Date range picker
    $('#reservation').daterangepicker()
});

$(function(){
	$("body").on("click", ".editOrganization", function(e){
    e.preventDefault();
    $('#editOrganization').modal('show');
    var id = $(this).data('id');
    getRow_org(id);
  });

  $("body").on("click", ".editInstitution", function(e){
    e.preventDefault();
    $('#editInstitution').modal('show');
    var id = $(this).data('id');
    getRow_org(id);
  });


$("body").on("click", ".deleteOrganization", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#deleteOrganization').modal('show');
    var id = $(this).data('id');
    getRow_org(id);
  });

});

function getRow_org(id){
   
  $.ajax({
    type: 'POST',
    url: 'organization_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.orgid').val(response.ID);
      $('.org_name').html(response.Name);
      $('#edit_Institution').val(response.Name);
      
      $('#edits_organization').val(response.Name);
      $('#editss_telephone').val(response.Telephone);
      $('#editss_email').val(response.Email_org);
      $('#editss_location').val(response.LocationAddress);
      
      
      $('#edit_shortname').val(response.ShortName);
      $('#edit_organization').val(response.ID);
      $('#edits_organization').val(response.Name);
      $('#edit_telephone').val(response.Telephone);
      $('#edit_email').val(response.Email_org);
      $('#edit_location').val(response.LocationAddress);
      $('#edit_status').val(response.Org_Status)
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

$(function(){
	$("body").on("click", ".editme", function(e){
    e.preventDefault();
    $('#editme').modal('show');
    var id = $(this).data('id');
    getRow_me(id);
  });

$("body").on("click", ".deleteme", function(e){
    e.preventDefault();
    $('#deleteme').modal('show');
    var id = $(this).data('id');
    getRow_me(id);
  });

});

function getRow_me(id){
  $.ajax({
    type: 'POST',
    url: 'user_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.meid').val(response.id);
      $('.me_name').html(response.Fullname);
      $('#me_organization').val(response.Organization);
      $('#me_departments').val(response.Department);
      $('#me_name').val(response.Fullname);
      $('#me_telephone').val(response.PhoneNumber);
      $('#me_address').val(response.Email);
      $('#me_role').val(response.Role)
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
<script>
       $(document).ready(function() {
            $('#example11').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#example12').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
           
        } );
   </script>
 <script>
  document.getElementById('name').addEventListener('click', function() {
    this.classList.add('clicked');
  });
  
function clearForm_meuser(){
    document.getElementById("clear_meuser").reset();
}

function clearForm_organization(){
    document.getElementById("clear_organization").reset();
}

function clearForm_institution(){
    document.getElementById("clear_institution").reset();
}
</script>
</body>
</html>
