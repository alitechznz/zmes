<!DOCTYPE html>
<html>
<?php include 'includes/session.php'; ?>
<?php include 'head.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
   <?php include 'header.php'; ?>
   <?php include 'includes/conn.php';?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
   <?php include 'menu.php';   ?>   <!-- /.search form -->

  <!-- /.content-wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       
      <h1>
        MicroBiology Lab Worksheet
        <small>F03/LSD/SOP/004 Rev. #:01</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Lab Sheet</a></li>
        <li class="active">Lab code #: 001</li>
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
							<!------ Include the above in your HEAD tag ---------->
            <div class="row bs-wizard">
				<div class="col-md-1"></div>
				
		                	<?php 
							     $getid =$_GET['code'];
						
							      include 'includes/conn.php';
							      $sql = "SELECT * FROM `LabSampleInfo` WHERE SampleID='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Sample Info<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Sample Info</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							      
							      //check for step 2
							      $sql = "SELECT * FROM `LabTestMethod` WHERE SampleID='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Test Method<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Test Method</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							      
							      
							       //check for step 3
							      $sql = "SELECT * FROM `LabEquipment` WHERE SampleID='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Equipment<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Equipment</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
								  
								  
								      //check for step 5
							      $sql = "SELECT * FROM `LabReagent` WHERE SampleID='$getid' and Reference=''";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Reagent<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Reagent</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							      
							      
							       //check for step 4
							      $sql = "SELECT * FROM `LabSamplePrepparation` WHERE SampleID='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Preparation<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Preparation</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							      
							    
							      
							       //check for step 6
							      $sql = "SELECT * FROM `LabReagent` WHERE SampleID='$getid' and Reference='Yes'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Ref.Standard<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Ref.Standard</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							      
							      
							      //check for step 7
							      $sql = "SELECT * FROM `labcontrol` WHERE SampleID='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Controls<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Controls</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							      
							      
							      //check for step 8
							      $sql = "SELECT * FROM `labtestperformed` WHERE SampleID='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Calculation<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Calculation</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
								  
								  
								   
							      //check for step 9
							      $sql = "SELECT * FROM `labResult` WHERE SampleID='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Test.Results<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Test.Results</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							   ?>
				
				
            </div>
		
	</div>
      <div class="row">
        <div class="col-xs-12">
         
			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
			   <li class="active"><a href="#tab_1" data-toggle="tab"><b>Sample Info</b></a></li>
              <li><a href="#tab_2" data-toggle="tab"><b>Test Method</b></a></li>
              <li><a href="#tab_3" data-toggle="tab"><b>Equipment & Glassware</b></a></li>
			   <li><a href="#tab_4" data-toggle="tab"><b>Reagents & Chemicals</b></a></li>
			  <li><a href="#tab_5" data-toggle="tab"><b>Sample Preparation</b></a></li>
              <li><a href="#tab_6" data-toggle="tab"><b>Reference Standard</b></a></li>
              <li><a href="#tab_7" data-toggle="tab"><b>Controls</b></a></li>
              <li><a href="#tab_8" data-toggle="tab"><b>Calculation</b></a></li>
			  <li><a href="#tab_9" data-toggle="tab"><b>Test Results</b></a></li>
            </ul>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
			 <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
            		<div class="row">
							<div class="col-md-4" style="padding: 2%;">
							   <form role="form" method="POST" action="php/dlabSampleInfo.php">
							   <!-- text input -->
							   <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							      $getname =$_GET['samplename'];
							      $getcode =$_GET['code'];
								  $gradient = $_GET['gradient'];
								  
								 //  $getrole =$_GET['role'];
							      $getdate ='';
							      $getstatus ='';
							      include 'includes/conn.php';
							      $sql = "SELECT * FROM `LabSampleInfo` WHERE SampleSumbitId='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          $getdate = $row['DateReceived'];
							          $btnvalue ="Update";
							          $getstatus = "Checked";
							      } else {
							          $getdate ='';
							          $btnvalue = 'Save';
							          $getstatus ='';
							      }
							      
							   ?>
							   
								
								 <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
								 

								  <!-- Date -->
								  <div class="form-group">
									<label>Date Sample Received by Analyst:</label>
									<div class="input-group date">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									  <input type="date" name="date" class="form-control pull-right " value="<?php echo $getdate; ?>" id="datepicker" required>
									</div>

									<!-- /.input group -->
								  </div>
								  <!-- /.form group -->
								 
								<div class="form-group">
								  <label>Name of the Product :</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-building"></i>
									  </div>
									   <input type="text" class="form-control" placeholder="Enter Name..." name="product" value="<?php echo $getname; ?>" readonly>
									</div>
								</div>
								<div class="form-group">
								  <label>Active Ingredient :</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-building"></i>
									  </div>
									   <input type="text" class="form-control" placeholder="Enter Ingredient..." name="gradient" value="<?php echo $gradient; ?>" readonly>
									</div>
								</div>
								<div class="form-group">
								  <label>Application No /Customer Code No :</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-building"></i>
									  </div>
									   <input type="text" class="form-control" placeholder="Enter Name..." name="custCode" value="<?php echo $getcode; ?>" readonly>
									</div>
								</div>
								<div class="form-group">
								   <div class="checkbox">
									 <label>
										 <input type="checkbox" name="status" class="flat-red " <?php echo $getstatus; ?> required> Accept
									</label>
								   </div>
								</div>

								<div class="box-footer">
									  <button type="submit" name="<?php echo $btnvalue; ?>" class="btn btn-success"><?php echo $btnvalue; ?></button>
									 <button type="button" class="btn btn-primary">Clear</button>
								</div>
							  </form>
							</div>
						<div class="col-md-8">
						       <div class="box">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Test Parameters</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                  <table class="table table-bordered">
                                    <tr>
                                      <th style="width: 10px">#</th>
                                      <th>Parameter</th>
                                      <th>Progress</th>
                                      <th style="width: 40px">%</th>
                                    </tr>
                                    <?php 
                                       include 'includes/conn.php';
                                         $getcode =$_GET['code'];
                                         $nm =1;
        							      $sql = "SELECT * FROM `lab_testsrequested` WHERE SampleID='$getcode'";
        							      $result = mysqli_query($conn, $sql);
        							      while($row=mysqli_fetch_array($result)) {
        							         echo '<tr>
                                                      <td>'.$nm.'</td>
                                                      <td>'.$row['Tests'].'</td>
                                                      <td>
                                                        <div class="progress progress-xs">
                                                          <div class="progress-bar progress-bar-danger" style="width: 0%"></div>
                                                        </div>
                                                      </td>
                                                      <td><span class="badge bg-red">0%</span></td>
                                                    </tr>';
                                                    $nm +=1;
        							      } 
                                    
                                    ?>
                                   
                                  </table>
                                </div>
                                <!-- /.box-body -->
                          
                              </div>
                              <!-- /.box -->
						</div>
					<!-- /.col-8 -->
                 </div><!-- /.row -->	
            </div>
          <!-- /.box -->
		    	  
                        <div class="tab-pane" id="tab_2">
                  		<div class="row">
							<div class="col-md-4" style="padding: 2%;">
							   <form role="form" method="POST" action="php/dlabTestMethod.php">
							   <!-- text input -->
							     <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
								 <input type="hidden" name="gradient" value="<?php  echo $_GET['gradient']; ?>" />
								 
								<div class="form-group">
								  <label>Pharmacopoeia/Standard Method:</label>
								   <input type="text" class="form-control" placeholder="Type (USP, BP, IP, EP, TZS, GPHF etc...)" name="mtype"/><br />
								   <input type="text" class="form-control" placeholder="Indicate Edition" name="edition" /><br />
								   <input type="date" class="form-control" placeholder="" name="tdate" ><br />
								   <input type="text" class="form-control" placeholder="Page number(if applicable)" name="page"/>
								</div>
								  <!-- Date -->
								 
								<div class="form-group">
								  <label>Manufacturer's Method:</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-building"></i>
									  </div>
									   <input type="text" class="form-control" placeholder="Indicate registration dossuier number" name="manufacture">
									</div>
								</div>
								<div class="form-group">
								  <label>In-house Method:</label>
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-building"></i>
									  </div>
									   <input type="text" class="form-control" placeholder="Indicate method number & validation date" name="inhouse">
									</div>
								</div>
								
								<div class="box-footer">
									 <button type="submit"name="save" class="btn btn-success">Save</button>
									 <button type="button" class="btn btn-primary">Clear</button>
								</div>
							  </form>
							</div>
						<div class="col-md-8">
						       <div class="box">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Methods</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                  <table class="table table-bordered">
                                    <tr>
                                      <th style="width: 10px">#</th>
                                      <th>Standard Method</th>
                                      <th>Manufacturer's Method</th>
									  <th>In-house Method</th>
                                       <th> Action </th>
                                    </tr>
                                    <?php 
                                       include 'includes/conn.php';
                                         $getid =$_GET['id'];
							          $gettype =$_GET['type'];
								      $getname =$_GET['samplename'];
								      $getcode =$_GET['code'];
									  
										 $gradient =$_GET['gradient'];
                                         $nm =1;
        							      $sql = "SELECT * FROM `labtestmethod` WHERE SampleID='$getcode'";
        							      $result = mysqli_query($conn, $sql);
        							      while($row=mysqli_fetch_array($result)) {
											   $site = "dlabmethod";
        							         echo '<tr>
                                                      <td>'.$nm.'</td>
                                                      <td>'.$row['Standard'].'</td>
													  <td>'.$row['Manufacture'].'</td>
                                                      <td>
                                                        '.$row['Inhouse'].'
                                                      </td>
                                                      
													      <td>
															<a class="btn btn-danger btn-sm methoddelete btn-flat" href="php/ddeletelab.php?id='.$row['LabTestId'].'&name='.$getname.'&gradient='.$gradient.'&type='.$gettype.'&code='.$getcode.'&sampid='.$getid.'&site='.$site.'"><i class="fa fa-fw fa-trash-o"></i>Delete</a></td>
													 
                                                    </tr>';
                                                    $nm +=1;
        							      } 
                                    
                                    ?>
                                   
                                  </table>
                                </div>
                                <!-- /.box-body -->
                          
                              </div>
                              <!-- /.box -->
						</div>
					<!-- /.col-8 -->
                 </div><!-- /.row -->	
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="row">
							<div class="col-md-4" style="padding: 2%;">
							   <form role="form" method="POST" action="php/daddequipment.php">
							   <!-- text input -->
							    <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							      $getname =$_GET['samplename'];
							      $getcode =$_GET['code'];
							      $getdate ='';
							      $getstatus ='';
							      include 'includes/conn.php';
							      $sql = "SELECT * FROM `LabEquipment` WHERE LabEqSubmitId='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          $btnvalue ="Update";
							          $getstatus = "Checked";
							      } else {
							          $getdate ='';
							          $btnvalue = 'Save';
							          $getstatus ='';
							      }
							   ?>
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
								  <input type="hidden" name="gradient" value="<?php  echo $_GET['gradient']; ?>" />
							   	
								<div class="form-group">
								  <label>Name:</label>
										 <select class="form-control select2" name="equipment" onchange="showUser(this.value)"  required>
                                        <?php 
										 require('includes/conn.php');
											$query="SELECT * FROM Equipment";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value="'.$row['id'].'">'.$row['Name'].'</option>';
											}
											mysqli_close($conn);
									    ?>
									</select>
								</div>
								 
								 
								<div id="hapa">
								  
								</div>

								<div class="box-footer">
									  <button type="submit" name="save" class="btn btn-success">ADD</button>
									 <button type="button" class="btn btn-primary">Clear</button>
								</div>
							  </form>
							</div>
						<div class="col-md-8">
								  <div class="box">
									<!-- /.box-header -->
									<div class="box-body">
										 <table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th>S/N</th>
							  <th>Name</th>
							  <th>Code Number</th>
							  <th>Calibration Status</th>
							  <th>Action</th>
							</tr>
							</thead>
							 <tbody>
							
							
							 <?php 
							  include 'includes/conn.php';
                                       $getid =$_GET['id'];
							          $gettype =$_GET['type'];
								      $getname =$_GET['samplename'];
								      $getcode =$_GET['code'];
									  
										 $gradient =$_GET['gradient'];
										 
                                         $nm =1;
        							      $sql = "SELECT * FROM `labequipment` WHERE SampleID='$getcode'";
        							      $result = mysqli_query($conn, $sql);
        							      while($row=mysqli_fetch_array($result)) {
											   $site = "dlabequipment";
        							         echo '<tr>
                                                      <td>'.$nm.'</td>
                                                      <td>'.$row['Name'].'</td>
													  <td>'.$row['CodeNumber'].'</td>
                                                      <td>
                                                        '.$row['CallibrationStatus'].'
                                                      </td>
                                                      
													     
													 <td>
															<a class="btn btn-danger btn-sm methoddelete btn-flat" href="php/ddeletelab.php?id='.$row['LabEquipementId'].'&name='.$getname.'&gradient='.$gradient.'&type='.$gettype.'&code='.$getcode.'&sampid='.$getid.'&site='.$site.'"><i class="fa fa-fw fa-trash-o"></i>Delete</a></td>
													 
                                                    </tr>';
                                                    $nm +=1;
        							      } 
							?>
							</tbody>
						  </table>
						</div>
					  </div>
					</div>
					<!-- /.col-8 -->
                 </div><!-- /.row -->	
              </div>
              <!-- /.tab-pane -->
			     <div class="tab-pane" id="tab_4">
               
					
					  <div class="row">
							<div class="col-md-4" style="padding: 2%;">
							   <form role="form" method="POST" action="php/daddreagent.php">
							   <!-- text input -->
								<div class="form-group">
								  <label>Name:</label>
									 <select class="form-control select2" name="rname" onchange="showreagent(this.value)">
									     <option value=""></option>
										<?php 
										 require('includes/conn.php');
											$query="SELECT * FROM `reagenttype`";
											$result=mysqli_query($conn, $query);//
											while ($row=mysqli_fetch_array($result)){
												//echo '<option value="'.$row['reagentTypeID'].'">'.$row['reagentName'].'</option>';
												echo '<option value="'.$row['reagentName'].'">'.$row['reagentName'].'</option>';
											}
											mysqli_close($conn);
									    ?>
									</select>
								</div>
								
								  
								<div id="hapa22">
								  
								</div>
								 <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
								  <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
								  <input type="hidden" name="gradient" value="<?php  echo $_GET['gradient']; ?>" />
						
								

								<div class="box-footer">
									  <button type="submit" class="btn btn-success" name="save">Add</button>
									 <button type="button" class="btn btn-primary">Clear</button>
								</div>
							  </form>
							</div>
						<div class="col-md-8">
								  <div class="box">
									<!-- /.box-header -->
									<div class="box-body">
										 <table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th>S/N</th>
							  <th>Name</th>
							  <th>Batch No</th>
							  <th>Expiry Date</th>
							  <th>Action</th>
							</tr>
							</thead>
							 <tbody>
							
							
							 <?php 
								  include 'includes/conn.php';
                                       $getid =$_GET['id'];
							          $gettype =$_GET['type'];
								      $getname =$_GET['samplename'];
								      $getcode =$_GET['code'];
									  
										 $gradient =$_GET['gradient'];
										 
                                         $nm =1;
        							      $sql = "SELECT * FROM `labreagent` WHERE SampleID='$getcode' and Reference=''";
        							      $result = mysqli_query($conn, $sql);
        							      while($row=mysqli_fetch_array($result)) {
											   $site = "dlabreagent";
        							         echo '<tr>
                                                      <td>'.$nm.'</td>
                                                      <td>'.$row['Name'].'</td>
													  <td>'.$row['BatchNo'].'</td>
                                                      <td>
                                                        '.$row['ExpireDate'].'
                                                      </td>
                                                      
													     
													 <td>
															<a class="btn btn-danger btn-sm methoddelete btn-flat" href="php/ddeletelab.php?id='.$row['LabReagentId'].'&name='.$getname.'&gradient='.$gradient.'&type='.$gettype.'&code='.$getcode.'&sampid='.$getid.'&site='.$site.'"><i class="fa fa-fw fa-trash-o"></i>Delete</a></td>
													 
                                                    </tr>';
                                                    $nm +=1;
        							      } 					
							?>
							</tbody>
						  </table>
						</div>
					  </div>
					</div>
					<!-- /.col-8 -->
                 </div><!-- /.row -->	
			   
              </div>
              <!-- /.tab-pane -->
			  <div class="tab-pane" id="tab_5">
                       <div class="row">
						<div class="col-md-12">
						  <div class="box box-info">
						  <?php 
						    include 'includes/conn.php';
							$getID = $_GET['code'];
						    $sql = "SELECT * FROM `LabSamplePrepparation` WHERE `SampleID`='$getID'";
							$resultl =mysqli_query($conn, $sql);
							if(mysqli_num_rows($resultl)> 0) {
								 $rowl = mysqli_fetch_assoc($resultl);
								 $getid =$_GET['id'];
							     $gettype =$_GET['type'];
								echo '
							<form  method="post"  action="php/dlabSamplePreparation.php" enctype="multipart/form-data">
							<div class="box-header">
							 
							  <h3 class="box-title">Sample Preparation (if applicable)
								<small>(Describe sample preparation steps actually performed)</small>
							  </h3>
							  <!-- tools box -->
							  <div class="pull-right box-tools">
								<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
										title="Collapse">
								  <i class="fa fa-minus"></i></button>
								<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
										title="Remove">
								  <i class="fa fa-times"></i></button>
							  </div>
							  <!-- /. tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body pad">
							 
							  
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="'.$gettype.'" />
	                             <input type="hidden" name="name" value="'.$_GET['samplename'].'" />
								 <input type="hidden" name="code" value="'.$_GET['code'].'" />
								 <input type="hidden" name="gradient" value="'.$_GET['gradient'].'" />
								 
										<textarea id="editor1" name="editor1" rows="10" cols="80">'.$rowl['Description'].'</textarea><br />
							<div class="row">	
                              <div class="col-md-3">							
								<div class="form-group">
								<label for="photo" class="col-sm-3 control-label">Attachment:</label>

								<div class="col-sm-9">
									<input type="file" id="photop" name="photop">
								</div>
								</div>
							   </div>
							   <div class="col-md-9">
							        <img src="php/ImageSave/'.$rowl['Attachment'].'" class="user-image" alt="Attachment Image....">
							   </div>
							   
							</div>
							
							<div class="modal-footer">
							  <button type="submit" class="btn btn-success btn-flat" name="update"><i class="fa fa-check-square-o"></i> Update</button>
							  </div>
							</div>
							 </form>';
							} else {
								
						  ?>
						  
						   <form  method="post"  action="php/dlabSamplePreparation.php" enctype="multipart/form-data">
							<div class="box-header">
							 
							  <h3 class="box-title">Sample Preparation (if applicable)
								<small>(Describe sample preparation steps actually performed)</small>
							  </h3>
							  <!-- tools box -->
							  <div class="pull-right box-tools">
								<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
										title="Collapse">
								  <i class="fa fa-minus"></i></button>
								<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
										title="Remove">
								  <i class="fa fa-times"></i></button>
							  </div>
							  <!-- /. tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body pad">
							 
							   <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
								 <input type="hidden" name="gradient" value="<?php  echo $_GET['gradient']; ?>" />
								 
										<textarea id="editor1" name="editor1" rows="10" cols="80"></textarea><br />
											
						 	<div class="form-group">
								<label for="photo" class="col-sm-3 control-label">Attachment:</label>

								<div class="col-sm-9">
									<input type="file" id="photo1" name="photop">
								</div>
							</div>
							
							<div class="modal-footer">
							  <button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
							  </div>
							</div>
							 </form>
							 
							<?php } ?>
							 
						  </div>
						  <!-- /.box -->
						</div>
					</div>  
              </div>
              <!-- /.tab-pane -->
			     <div class="tab-pane" id="tab_6">
						 <div class="row">
                            <div class="col-md-4" style="padding: 2%;">
                                <form role="form" action="php/dlabreference.php" method="post" enctype="multipart/form-data">
                                 <!-- text input -->
                                  <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							    <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
								 <input type="hidden" name="gradient" value="<?php  echo $_GET['gradient']; ?>" />
								 
            					<div class="form-group">
                                  <label>Name of Standard</label>
                                  <input class="form-control" placeholder="Enter(reference microorganism)" name="rname" />
                                </div>
            					 <div class="form-group">
            					  <label for="exampleInputEmail1">Batch No</label>
            					  <input type="text" class="form-control" id="" placeholder="Batch No" name="batch"/>
            					</div>
								 <div class="form-group">
            					  <label for="exampleInputEmail1">Expiry Date</label>
            					  <input type="date" class="form-control" id="" placeholder="Expiry Date" name="expiry"/>
            					</div>
								
                                <div class="box-footer">
                                     <button type="submit" class="btn btn-success" name="save">Add</button>
            						  <button type="button" class="btn btn-primary">Clear</button>
                                </div>
                              </form>
                            </div>
                            <div class="col-md-8">
								  <div class="box">
									<!-- /.box-header -->
									<div class="box-body">
										 <table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th>S/N</th>
							  <th>Name of Standard</th>
							  <th>Batch Number</th>
							  <th>Expiry Date</th>
							  <th>Action</th>
							</tr>
							</thead>
							 <tbody>
							
							
							 <?php 
							  include 'includes/conn.php';
                                          $getid =$_GET['id'];
							          $gettype =$_GET['type'];
								      $getname =$_GET['samplename'];
								      $getcode =$_GET['code'];
									  
                                         $nm =1;
        							      $sql = "SELECT * FROM `labreagent` WHERE SampleID='$getcode' AND Reference='Yes'";
        							      $result = mysqli_query($conn, $sql);
        							      while($row=mysqli_fetch_array($result)) {
											   $site = "dlabreagent";
        							         echo '<tr>
                                                      <td>'.$nm.'</td>
                                                      <td>'.$row['Name'].'</td>
													  <td>'.$row['BatchNo'].'</td>
                                                      <td>
                                                        '.$row['ExpireDate'].'
                                                      </td>
                                                      
													     <td>
															<a class="btn btn-danger btn-sm methoddelete btn-flat" href="php/ddeletelab.php?id='.$row['LabReagentId'].'&name='.$getname.'&gradient='.$gradient.'&type='.$gettype.'&code='.$getcode.'&sampid='.$getid.'&site='.$site.'"><i class="fa fa-fw fa-trash-o"></i>Delete</a></td>
													 
                                                    </tr>';
                                                    $nm +=1;
        							      } 
							?>
							</tbody>
						  </table>
						</div>
					  </div>
					</div>
					<!-- /.col-8 -->
                        </div>
              </div>
              <!-- /.tab-pane -->
			     <div class="tab-pane" id="tab_7">
                   <!-- prepare the summary of the lab test -->
                   <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <form role="form" action="php/dlabcontrol.php" method="post" enctype="multipart/form-data">
                                 <!-- text input -->
                                  <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							    <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
								 <input type="hidden" name="gradient" value="<?php  echo $_GET['gradient']; ?>" />
								 
            					<div class="form-group">
                                  <label>Positive Control</label>
                                  <input class="form-control" placeholder="Positive..." placeholder="Positive Control" name="positive" />
                                </div>
            					 <div class="form-group">
            					  <label for="exampleInputEmail1">Negative Control</label>
            					  <input type="text" class="form-control" id="" placeholder="Negative Control" name="negative"/>
            					</div>
								 <div class="form-group">
            					  <label for="exampleInputEmail1">Blank/phosphate Buffer Saline</label>
            					  <input type="text" class="form-control" id="" placeholder="Blank/phosphate Buffer Saline" name="blank"/>
            					</div>
								 <div class="form-group">
            					  <label for="exampleInputEmail1">Air Settlement Plate Results</label>
            					  <input type="text" class="form-control" id="" placeholder="Air Settlement Plate Results" name="air"/>
            					</div>
								 <div class="form-group">
            					  <label for="exampleInputEmail1">Sterility Check Plate</label>
            					  <input type="text" class="form-control" id="" placeholder="Sterility Check Plate" name="sterility"/>
            					</div>
            				
            
            					
                      
                                <div class="box-footer">
                                     <button type="submit" class="btn btn-success" name="save">Add</button>
            						  <button type="button" class="btn btn-primary">Clear</button>
                                </div>
                              </form>
                            </div>
                            <div class="col-md-8">
								  <div class="box">
									<!-- /.box-header -->
									<div class="box-body">
										 <table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th>S/N</th>
							  <th>Positive Control</th>
							  <th>Negative Control</th>
							  <th>Blank/phosphate</th>
							  <th>Air Settlement</th>
							  <th>Sterility Check</th>
							  <th>Action</th>
							</tr>
							</thead>
							 <tbody>
							
							
							 <?php 
							  include 'includes/conn.php';
                                      $getid =$_GET['id'];
							          $gettype =$_GET['type'];
								      $getname =$_GET['samplename'];
								      $getcode =$_GET['code'];
									  
                                         $nm =1;
        							      $sql = "SELECT * FROM `labcontrol` WHERE SampleID='$getcode'";
        							      $result = mysqli_query($conn, $sql);
        							      while($row=mysqli_fetch_array($result)) {
											  $site = "dlabcontrol";
        							         echo '<tr>
                                                      <td>'.$nm.'</td>
                                                      <td>'.$row['Positive'].'</td>
													  <td>'.$row['Negative'].'</td>
													  <td>'.$row['Blank'].'</td>
													  <td>'.$row['Air'].'</td>
                                                      <td>
                                                        '.$row['Sterility'].'
                                                      </td>
                                                      
													    <td>
															<a class="btn btn-danger btn-sm methoddelete btn-flat" href="php/ddeletelab.php?id='.$row['ControlId'].'&name='.$getname.'&gradient='.$gradient.'&type='.$gettype.'&code='.$getcode.'&sampid='.$getid.'&site='.$site.'"><i class="fa fa-fw fa-trash-o"></i>Delete</a></td>
													 
                                                    </tr>';
                                                    $nm +=1;
        							      } 
							?>
							</tbody>
						  </table>
						</div>
					  </div>
					</div>
					<!-- /.col-8 -->
                        </div>
                    </div>
              </div>
              <!-- /.tab-pane -->
			  
			    <!-- /.tab-pane -->
			   <div class="tab-pane" id="tab_8">
                      <div class="row">
						<div class="col-md-12">
						  <div class="box box-info">
						  <?php 
						    include 'includes/conn.php';
							$getID = $_GET['code'];
						    $sql = "SELECT * FROM `labtestperformed` WHERE `SampleID`='$getID'";
							$resultl =mysqli_query($conn, $sql);
							if(mysqli_num_rows($resultl)> 0) {
								 $rowl = mysqli_fetch_assoc($resultl);
								 $getid =$_GET['id'];
							     $gettype =$_GET['type'];
								echo '
							<form  method="post"  action="php/dlabTestPerformed.php" enctype="multipart/form-data">
							<div class="box-header">
							 
							  <h3 class="box-title">Sample Preparation (if applicable)
								<small>(Describe sample preparation steps actually performed)</small>
							  </h3>
							  <!-- tools box -->
							  <div class="pull-right box-tools">
								<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
										title="Collapse">
								  <i class="fa fa-minus"></i></button>
								<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
										title="Remove">
								  <i class="fa fa-times"></i></button>
							  </div>
							  <!-- /. tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body pad">
							 
							  
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="'.$gettype.'" />
	                             <input type="hidden" name="name" value="'.$_GET['samplename'].'" />
								 <input type="hidden" name="code" value="'.$_GET['code'].'" />
								 <input type="hidden" name="gradient" value="'.$_GET['gradient'].'" />
					
										<textarea id="editor" name="editor" rows="10" cols="80">'.$rowl['Description'].'</textarea><br />
							<div class="row">	
                              <div class="col-md-3">							
								<div class="form-group">
								<label for="photo" class="col-sm-3 control-label">Attachment:</label>

								<div class="col-sm-9">
									<input type="file" id="photop" name="photop">
								</div>
								</div>
							   </div>
							   <div class="col-md-9">
							        <img src="php/ImageSave/'.$rowl['Attachment'].'" class="user-image" alt="Attachment Image....">
							   </div>
							   
							</div>
							
							<div class="modal-footer">
							  <button type="submit" class="btn btn-success btn-flat" name="update"><i class="fa fa-check-square-o"></i> Update</button>
							  </div>
							</div>
							 </form>';
							} else {
								
						  ?>
						  
						   <form  method="post"  action="php/dlabTestPerformed.php" enctype="multipart/form-data">
							<div class="box-header">
							 
							  <h3 class="box-title">Calculation and/or Test Results
								<small>(Describe calculation steps actually performed)</small>
							  </h3>
							  <!-- tools box -->
							  <div class="pull-right box-tools">
								<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
										title="Collapse">
								  <i class="fa fa-minus"></i></button>
								<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
										title="Remove">
								  <i class="fa fa-times"></i></button>
							  </div>
							  <!-- /. tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body pad">
							 
							   <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
								 <input type="hidden" name="gradient" value="<?php  echo $_GET['gradient']; ?>" />
								 
										<textarea id="editor" name="editor" rows="10" cols="80"></textarea><br />
											
						 	<div class="form-group">
								<label for="photo" class="col-sm-3 control-label">Attachment:</label>

								<div class="col-sm-9">
									<input type="file" id="photo1" name="photop">
								</div>
							</div>
							
							<div class="modal-footer">
							  <button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
							  </div>
							</div>
							 </form>
							 
							<?php } ?>
							 
						  </div>
						  <!-- /.box -->
						</div>
					</div>  
              </div>
              <!-- /.tab-pane -->
              
                <!-- /.tab-pane -->
			   <div class="tab-pane" id="tab_9">
                   <!-- prepare the summary of the lab test -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                 <form role="form" action="php/dlabResult.php" method="post" enctype="multipart/form-data">
                                   
							     <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							    <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
								 <input type="hidden" name="gradient" value="<?php  echo $_GET['gradient']; ?>" />

                					 <div class="form-group">
                					  <label for="exampleInputEmail1">Test Parameters </label>
                					  <input type="text" class="form-control" id="" placeholder="Test Parameters" name="TestParameters" required>
                					</div>
                					<div class="form-group">
                					  <label for="exampleInputEmail1">Method </label>
                					  	 <select class="form-control select2" name="testMethod" required>
                                         <option selected="selected"></option>
                                        <?php 
										 require('includes/conn.php');
											$query="SELECT Method FROM lab_method";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value='.$row['Method'].'>'.$row['Method'].'</option>';
											}
											mysqli_close($conn);
									    ?>
									</select>
                					</div>
                					<div class="form-group">
                					  <label for="exampleInputEmail1">Specifications </label>
                					  <input type="text" class="form-control" id="" placeholder="Specifications" name="Specifications" required>
                					</div>
                					 
                					<div class="form-group">
                					  <label for="exampleInputEmail1">Results </label>
                					  <input type="text" class="form-control" id="" placeholder="Results" name="Results" required>
                					</div>
                                    <div class="form-group">
                                      <label>Remarks</label>
                                      <textarea class="form-control" placeholder="Remarks ..." name="Remarks" required></textarea>
                                    </div>
                                   
                                    <div class="form-group">
                                         <label>
                								<input type="checkbox" class="flat-red" value="" checked name="status"> Active
                                         </label>
                                    </div>
                					
                          
                                    <div class="box-footer">
                                         <button type="submit" class="btn btn-success" name="save" >Add</button>
                						  <button type="button" class="btn btn-primary">Clear</button>
										  <a type="button" class="btn btn-info" href="php/finished.php?code=<?php  echo $_GET['code']; ?>&Fanalyst=Fanalyst">Submit Report</a>
                                    </div>
                                  </form>
                            </div>
                            <div class="col-md-8">
                                 <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>S/N</th>
                                      <th> Test Parameters</th>
                                      <th> Method</th>
                    				  <th> Specifications</th>
                                      <th> Results</th>
                    				  <th> Remarks</th>
                                      <th>Action</th>
                                      
                                    </tr>
                                    </thead>
                                    <tbody>
                    				<?php 
                    				  include 'includes/conn.php';
                    				   $query = "SELECT * FROM `labresult` WHERE `SampleID`='$getID'"; 
                    					$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    					$num = 1;
                    						while($row = mysqli_fetch_array($result)) {	
                    						$site = "dlabresult";
                    				
                                   echo '<tr>';
                                      echo '<td>'.$num.'</td>';
                                      echo '<td>'.$row['testParameter'].'</td>';
                                      echo '<td>'.$row['method'].'</td>';
                                      echo '<td>'.$row['specification'].'</td>';
                                       echo '<td>'.$row['result'].'</td>';
                                      echo '<td>'.$row['remark'].'</td>';
									   echo '<td>
															<a class="btn btn-danger btn-sm methoddelete btn-flat" href="php/ddeletelab.php?id='.$row['labResultId'].'&name='.$getname.'&gradient='.$gradient.'&type='.$gettype.'&code='.$getcode.'&sampid='.$getid.'&site='.$site.'"><i class="fa fa-fw fa-trash-o"></i>Delete</a></td>';
                                    echo '</tr>';
                    				$num = $num + 1;
                                   		}								
                    				?>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
              </div>
              <!-- /.tab-pane -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
	
  </div>
  <!-- /.content-wrapper -->
 <?php include 'footer.php'; ?>
<!-- jQuery 3 -->
 <!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
     <!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE for demo purposes -->
<!-- CK Editor -->
<script src="../bower_components/ckeditor/ckeditor.js"></script>
<script src="../dist/js/demo.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5();
  });
  
   $(function () {
    // Replace the <textarea id="editor2"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor');
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5();
  });
</script>
<script>
    $(function () {
        $('#example1').DataTable();
        $('#example2').DataTable();
			 
			  //Initialize Select2 Elements
            
             //Flat red color scheme for iCheck
             $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                 checkboxClass: 'icheckbox_flat-green',
                 radioClass: 'iradio_flat-green'
             })
         });
</script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
	
	
  })
</script>



</body>
</html>
