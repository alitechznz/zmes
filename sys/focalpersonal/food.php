<?php include 'includes/session.php'; ?>
<?php include 'head.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
   <?php include 'header.php'; ?>
  
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
   <?php include 'menu.php';   ?>   <!-- /.search form -->

  <!-- /.content-wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
        
      <h1>
        Food Lab Worksheet
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
				<div class="col-md-3"></div>
				
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
								  
								    //check for step 9
							      $sql = "SELECT * FROM `LabTestMethod` WHERE SampleID='$getid' and Page='Product'";
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
                                          <div class="text-center bs-wizard-stepnum">P.Specification</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							      
							      //check for step 2
							      $sql = "SELECT * FROM `LabTestMethod` WHERE SampleID='$getid' and Page='Method'";
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
							      
							        //check for step 5
							      $sql = "SELECT * FROM `LabReagent` WHERE SampleID='$getid'";
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
							      
							       //check for step 6
							      $sql = "SELECT * FROM `LabTestPerformed` WHERE SampleID='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">T.Performed<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">T.Performed</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							      
							      
							      //check for step 7
							      $sql = "SELECT * FROM `labremark` WHERE SampleID='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Remarks<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Remarks</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							      
							      
							      //check for step 8
							      $sql = "SELECT * FROM `labresult` WHERE SampleID='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Results<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Results</div>
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
			  <li><a href="#tab_9" data-toggle="tab"><b>Product Specification</b></a></li>
              <li><a href="#tab_2" data-toggle="tab"><b>Test Method</b></a></li>
              <li><a href="#tab_3" data-toggle="tab"><b>Equipment & Glassware</b></a></li>
			  <li><a href="#tab_4" data-toggle="tab"><b>Sample Preparation</b></a></li>
			   <li><a href="#tab_5" data-toggle="tab"><b>Reagents & Chemicals</b></a></li>
              <li><a href="#tab_6" data-toggle="tab"><b>Calculation Performed</b></a></li>
                <li><a href="#tab_7" data-toggle="tab"><b>Remarks</b></a></li>
                <li><a href="#tab_8" data-toggle="tab"><b>Results</b></a></li>
            </ul>
	<div class="tab-content">
              <div class="tab-pane active" id="tab_1">
    
					<div class="row">
							<div class="col-md-4 box-body">
							   <form role="form" method="POST" action="php/labSampleInfo.php">
							   <!-- text input -->
							   <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							      $getname =$_GET['samplename'];
							      $getcode =$_GET['code'];
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
            </div> <!-- /.tab-pane -->
			
			
			        <div class="tab-pane" id="tab_9">
                  		<div class="row">
							<div class="col-md-4 box-body">
							   <form role="form" method="POST" action="php/productspecification.php">
							   <!-- text input -->
							     <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
								 
								<div class="form-group">
								  <label>Product Type:</label>
								 <select class="form-control select2" name="labproduct" onchange="showProduct(this.value)">
                                         <option value="">Select..</option>';
                                        <?php 
										 require('includes/conn.php');
											$query="SELECT * FROM productspecification";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value="'.$row['Product'].'">'.$row['Product'].'</option>';
											}
											mysqli_close($conn);
									    ?>
									</select>
								</div>
								  <!-- Date -->
								 
								<div id="hapa2">
								  
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
                                  <h3 class="box-title">Product Specification</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                  <table class="table table-bordered">
                                    <tr>
                                      <th style="width: 10px">#</th>
                                      <th>Product Type</th>
                                      <th>Specification</th>
                                       <th> Action </th>
                                    </tr>
									  <?php 
							          $getid =$_GET['id'];
							          $gettype =$_GET['type'];
								      $getname =$_GET['samplename'];
								      $getcode =$_GET['code'];
							   
                                       include 'includes/conn.php';
                                         $getcode =$_GET['code'];
                                         $nm =1;
        							      $sql = "SELECT * FROM `labtestmethod` WHERE SampleID='$getcode'";
        							      $result = mysqli_query($conn, $sql);
        							      while($row=mysqli_fetch_array($result)) {
											  $site = "dlabmethod";
        							         echo '<tr>
                                                      <td>'.$nm.'</td>
                                                      <td>'.$row['method'].'</td>
                                                      <td>
                                                        '.$row['ProductSpecification'].'
                                                      </td>
                                                      
													      <td>
															<a class="btn btn-danger btn-sm methoddelete btn-flat" href="php/deletelab.php?id='.$row['LabTestId'].'&name='.$getname.'&type='.$gettype.'&code='.$getcode.'&sampid='.$getid.'&site='.$site.'"><i class="fa fa-fw fa-trash-o"></i>Delete</a></td>
													 
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
	  
                        <div class="tab-pane" id="tab_2">
                  		<div class="row">
							<div class="col-md-4 box-body">
							   <form role="form" method="POST" action="php/labTestMethod.php">
							   <!-- text input -->
							     <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
								 
								<div class="form-group">
								  <label>Test Method:</label>
								 <select class="form-control select2" name="testMethod" onchange="showUserMethod(this.value)">
                                         <option value="">Select..</option>';
                                        <?php 
										 require('includes/conn.php');
											$query="SELECT * FROM lab_method";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value="'.$row['Method'].'">'.$row['Method'].'</option>';
											}
											mysqli_close($conn);
									    ?>
									</select>
								</div>
								  <!-- Date -->
								 
								<div id="hapa2">
								  
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
                                      <th>Test Method</th>
                                      <th>Specification</th>
                                       <th> Action </th>
                                    </tr>
									  <?php 
							          $getid =$_GET['id'];
							          $gettype =$_GET['type'];
								      $getname =$_GET['samplename'];
								      $getcode =$_GET['code'];
							   
                                       include 'includes/conn.php';
                                         $getcode =$_GET['code'];
                                         $nm =1;
        							      $sql = "SELECT * FROM `labtestmethod` WHERE SampleID='$getcode'";
        							      $result = mysqli_query($conn, $sql);
        							      while($row=mysqli_fetch_array($result)) {
											  $site = "dlabmethod";
        							         echo '<tr>
                                                      <td>'.$nm.'</td>
                                                      <td>'.$row['method'].'</td>
                                                      <td>
                                                        '.$row['ProductSpecification'].'
                                                      </td>
                                                      
													      <td>
															<a class="btn btn-danger btn-sm methoddelete btn-flat" href="php/deletelab.php?id='.$row['LabTestId'].'&name='.$getname.'&type='.$gettype.'&code='.$getcode.'&sampid='.$getid.'&site='.$site.'"><i class="fa fa-fw fa-trash-o"></i>Delete</a></td>
													 
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
							<div class="col-md-4 box-body">
							   <form role="form" method="POST" action="php/addequipment.php">
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
							   	
								<div class="form-group">
								  <label>Name:</label>
										 <select class="form-control select2" name="equipment" onchange="showUser(this.value)"  required>
										 <option value="">Select..</option>';
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
							  $getid =$_GET['id'];
							          $gettype =$_GET['type'];
								      $getname =$_GET['samplename'];
								      $getcode =$_GET['code'];
							   
							  include 'includes/conn.php';
                                         $getcode =$_GET['code'];
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
                                                      
													      <td><a class="btn btn-danger btn-sm equipmentdelete btn-flat" href="php/deletelab.php?id='.$row['LabEquipementId'].'&name='.$getname.'&type='.$gettype.'&code='.$getcode.'&sampid='.$getid.'&site='.$site.'"><i class="fa fa-fw fa-trash-o"></i>Delete</a></td>
													 
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
							<form  method="post"  action="php/labSamplePreparation.php" enctype="multipart/form-data">
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
						  
						   <form  method="post"  action="php/labSamplePreparation.php" enctype="multipart/form-data">
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
               <div class="tab-pane" id="tab_5">
                     <div class="row">
							<div class="col-md-4 box-body">
							   <form role="form" method="POST" action="php/addreagent.php">
							   <!-- text input -->
							
								<div class="form-group">
								  <label>Name:</label>
									 <select class="form-control select2" name="rname" onchange="showreagent(this.value)">
									       <option value="">Select...</option>
										<?php 
										 require('includes/conn.php');
											$query="SELECT * FROM `reagenttype`";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value="'.$row['reagentTypeID'].'">'.$row['reagentName'].'</option>';
											}
											mysqli_close($conn);
									    ?>
									</select>
								</div>
								
								<div id="hapa22">
								  
								</div>
								
								  <div class="form-group">
									<label>Grade :</label>
									<div class="input-group date">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									  <input type="text" class="form-control pull-right" id="grade" name="grade" value="<?php ?>">
									</div>
								  </div>
								
								 <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
								  <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
								 
						
								

								<div class="box-footer">
									  <button type="submit" name="save" class="btn btn-success">Add</button>
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
							  <th>Grade</th>
							  <th>Expire Date</th>
							  <th>Action</th>
							</tr>
							</thead>
							 <tbody>
							
							
							 <?php 
							     $getid =$_GET['id'];
							          $gettype =$_GET['type'];
								      $getname =$_GET['samplename'];
								      $getcode =$_GET['code'];
							   
							     include 'php/conn.php';
							       $query = "SELECT * FROM `labreagent` WHERE SampleID='$getcode'"; 
								$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
								$num = 1;
								while($row = mysqli_fetch_array($result)) {	
									$site = "dlabreagent";
							
								echo '<tr>';
									echo '<td>'.$num.'</td>';
							         echo '<td>'.$row['Name'].'</td>';
							         echo '<td>'.$row['BatchNo'].'</td>';
									 echo '<td>'.$row['Grade'].'</td>';
								     echo '<td>'.$row['ExpireDate'].'</td>';
								 
							 
							  
							 echo '<td>
							 <a class="btn btn-danger btn-sm equipmentdelete btn-flat" href="php/deletelab.php?id='.$row['LabReagentId'].'&name='.$getname.'&type='.$gettype.'&code='.$getcode.'&sampid='.$getid.'&site='.$site.'"><i class="fa fa-fw fa-trash-o"></i>Delete</a></td>
							
							     </tr>';
							$num = $num + 1;
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
			     <div class="tab-pane" id="tab_6">
						<div class="row">
								<div class="col-md-12">
							
								  <div class="box box-info">
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
							<form  method="post"  action="php/labTestPerformed.php" enctype="multipart/form-data">
						
							<div class="box-body pad">
							 
							  
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="'.$gettype.'" />
	                             <input type="hidden" name="name" value="'.$_GET['samplename'].'" />
								 <input type="hidden" name="code" value="'.$_GET['code'].'" />
										<textarea id="editor" name="editor1" rows="10" cols="80">'.$rowl['Description'].'</textarea><br />
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
									
									<!-- /.box-header -->
									<div class="box-body pad">
									  <form name="form1" method="post"  action="php/labTestPerformed.php" enctype="multipart/form-data">
							   <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
														
										<textarea id="editor" name="editor1" rows="10" cols="80">
																
											</textarea><br />
										<div class="form-group">
								<label for="photo" class="col-sm-3 control-label">Attachment:</label>

								<div class="col-sm-9">
									<input type="file" id="photo" name="photop">
								</div>
							</div>
							
							<div class="modal-footer">
							  <button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
							  </div>
							  </form>
									</div>
									<?php } ?>
								  </div>
								  <!-- /.box -->
							
								</div>
							</div>
              </div>
              <!-- /.tab-pane -->
			     <div class="tab-pane" id="tab_7">
                   <!-- prepare the summary of the lab test -->
                   <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
							   <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							      $getname =$_GET['samplename'];
							      $getcode =$_GET['code'];
								 //  $getrole =$_GET['role'];
							      $getdate ='';
							     $getremark ='';
							      include 'includes/conn.php';
							      $sql = "SELECT * FROM `labremark` WHERE SampleID='$getcode'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          $getdate = $row['date'];
									  $getremark = $row['remarks'];
							      }
							      
							   ?>
                                <form role="form" action="php/labRemarks.php" method="post" enctype="multipart/form-data">
                                 <!-- text input -->
                                  <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							    <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							   	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
	                             <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" value="<?php  echo $_GET['code']; ?>" />
								<div class="form-group">
            					  <label for="exampleInputEmail1">Analysed by</label>
            					  <input type="text" class="form-control" id="" placeholder="Analysed by" name="analysedBy" value="<?php echo $user['Fullname']; ?>" readonly>
            					</div>
            					<div class="form-group">
                                  <label>Remarks</label>
                                  <textarea class="form-control" placeholder="Remarks ..." name="Remarks" required><?php echo $getremark; ?></textarea>
                                </div>
            					
            					<div class="form-group">
            					  <label for="exampleInputEmail1">Date </label>
            					  <input type="date" class="form-control" id="" placeholder="Date" name="Date" value="<?php echo $getdate; ?>" required>
            					</div>
            
            					
                      
                                <div class="box-footer">
                                     <button type="submit" class="btn btn-success" name="save">Save</button>
            						  <button type="button" class="btn btn-primary">Clear</button>
                                </div>
                              </form>
                            </div>
     
                        </div>
                    </div>
              </div>
              <!-- /.tab-pane -->
              
                <!-- /.tab-pane -->
			   <div class="tab-pane" id="tab_8">
                   <!-- prepare the summary of the lab test -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                 <form role="form" action="php/labResult.php" method="post" enctype="multipart/form-data">
                                     <!-- text input -->
                                       <!-- text input -->
							     <?php 
							     $getid =$_GET['id'];
							     $gettype =$_GET['type'];
							   ?>
							     <input type="hidden" name="sampleID" value="<?php echo $getid; ?>" />
							     	<input type="hidden" name="type" value="<?php  echo $gettype; ?>" />
									 <input type="hidden" name="name" value="<?php  echo $_GET['samplename']; ?>" />
								 <input type="hidden" name="code" id="codehapa" value="<?php  echo $_GET['code']; ?>" />

                					 <div class="form-group">
                					  <label for="exampleInputEmail1">Test Parameters </label>
                					   <select class="form-control select2" name="TestParameters" onchange="showUser(this.value)"  required>
										 <option value="">Select..</option>';
                                        <?php 
										 require('includes/conn.php');
										 $ID= $_GET['code'];
											$query="SELECT * FROM lab_testsrequested WHERE SampleID='$ID'";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value="'.$row['Tests'].'">'.$row['Tests'].'</option>';
											}
											mysqli_close($conn);
									    ?>
									</select>
                					</div>
                					<div class="form-group">
                					  <label for="exampleInputEmail1">Method </label>
                					  	 <select class="form-control select2" name="testMethod" onchange="showspecification(this.value)" required>
                                         <option selected="selected"></option>
                                        <?php 
										 require('includes/conn.php');
										 $ID= $_GET['code'];
											$query="SELECT * FROM labtestmethod WHERE SampleID='$ID'";
											$result=mysqli_query($conn, $query);
											while ($row=mysqli_fetch_array($result)){
												echo '<option value="'.$row['method'].'">'.$row['method'].'</option>';
											}
											mysqli_close($conn);
									    ?>
									</select>
                					</div>
                					<div class="form-group">
                					  <label for="exampleInputEmail1">Specifications </label>
                					  <input type="text" class="form-control" id="getspecify" placeholder="Specifications" name="Specifications" required>
                					</div>
									<div id="hapa3"></div>
                					 
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
									 $getid =$_GET['id'];
							          $gettype =$_GET['type'];
								      $getname =$_GET['samplename'];
								      $getcode =$_GET['code'];
							   
                    				  include 'includes/conn.php';
                    				   $query = "SELECT * FROM `labResult` WHERE SampleID='$getcode'"; 
                    					$result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                    					$num = 1;
                    						while($row = mysqli_fetch_array($result)) {	
                    						$site ="dlabresult";
                    				
                                   echo '<tr>';
                                      echo '<td>'.$num.'</td>';
                                      echo '<td>'.$row['testParameter'].'</td>';
                                      echo '<td>'.$row['method'].'</td>';
                                      echo '<td>'.$row['specification'].'</td>';
                                       echo '<td>'.$row['result'].'</td>';
                                      echo '<td>'.$row['remark'].'</td>';
                                      echo '<td><a class="btn btn-danger btn-sm resultdelete btn-flat" href="php/deletelab.php?id='.$row['labResultId'].'&name='.$getname.'&type='.$gettype.'&code='.$getcode.'&sampid='.$getid.'&site='.$site.'"><i class="fa fa-fw fa-trash-o"></i>Delete</a></td>';
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
           </div>
		</div>
	</div>	
      <!-- /.row -->
</section>
	 <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include 'footer.php'; ?>
  <?php include 'headsample_modal.php'; ?>
<!-- jQuery 3 -->
 <!-- jQuery 3 -->
 <!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

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
<!-- CK Editor -->
<script src="../bower_components/ckeditor/ckeditor.js"></script>
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>

$(function(){
   alert("hi");
  
   $("body").on("click", ".methoddelete", function(e){
	   alert("hi");
    e.preventDefault();
    $('#methoddelete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  
  //$('.assign').click(function(e){
  $("body").on("click", ".equipmentdelete", function(e){
    e.preventDefault();
    $('#equipmentdelete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

/*
 $("body").on("click", ".reagentdelete", function(e){
    e.preventDefault();
    $('#reagentdelete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


 $("body").on("click", ".remarkdelete", function(e){
    e.preventDefault();
    $('#remarkdelete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
*/
 $("body").on("click", ".resultdelete", function(e){
    e.preventDefault();
    $('#resultdelete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


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

  $(document).ready(function () {
    $('.sidebar-menu').tree();
	
	
  })
  

function getRow(id){
	//alert('Hi ali');
	alert(id);
  $.ajax({
    type: 'POST',
    url: 'headsample_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
    $('.empid').val(response.Submit_ID);
    //$('#submit_id').val(response.Submit_ID);
      //$('.del_employee_name').html(response.Fullname);
      
      
    }
  });
}



</script>



</body>
</html>
