   
	<div class="row">
							<!------ Include the above in your HEAD tag ---------->
            <div class="row bs-wizard">
				<div class="col-md-3"></div>
				
		                	<?php 
		                			$getid =0;
		                	       if(isset($_GET['xyz'])){
		                	           $getid =$_GET['xyz'];
		                	       } else {
		                	            $getid =0;
		                	       }
							      
							      include 'includes/conn.php';
							     //echo $getid;
							      
							      $sql = "SELECT * FROM `projecttb` WHERE `ID` ='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Description<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Description</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
								  
							
							      
							      //check for step 2
							      $sql = "SELECT * FROM `project_financing` WHERE Project='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Financing<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Financing</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							      
							      
							        //check for step 2
							      $sql = "SELECT * FROM `project_activity` WHERE Project='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Activity<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Activity</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							      
							      	    //check for step 9
							      $sql = "SELECT * FROM `project_targetgroup` WHERE Project='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Implementor<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Implementor</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							      
							        //check for step 2
							      $sql = "SELECT * FROM `project_file` WHERE Project='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Attachment<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Attachment</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							      
							   
							      //check for step 3
							      $sql = "SELECT * FROM `project_location` WHERE Project='$getid'";
							      $result = mysqli_query($conn, $sql);
							      if($row=mysqli_fetch_array($result)) {
							          echo '<div class="col-xs-1 bs-wizard-step complete">
                                              <div class="text-center bs-wizard-stepnum">Location<span style="background-color: red; color: white;border-radius: 10px;">
                            								 </span></div>
                                              <div class="progress"><div class="progress-bar"></div></div>
                                              <a href="#" class="bs-wizard-dot"></a>
                                              <div class="bs-wizard-info text-center"></div>
                                         </div>';
							      } else {
							          echo '<div class="col-xs-1 bs-wizard-step disabled">
                                          <div class="text-center bs-wizard-stepnum">Location</div>
                                          <div class="progress"><div class="progress-bar"></div></div>
                                          <a href="#" class="bs-wizard-dot"></a>
                                          <div class="bs-wizard-info text-center"> </div>
                                        </div>';
							      }
							   ?>
				
				
            </div>
		
	</div>