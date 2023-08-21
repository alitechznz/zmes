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
      Project/Program Monitoring
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Project List</li>
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
          <div class="box">
            
               <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>S.N</th>
                  <th>Title</th>
                  <th>Progress</th>
                  <th>Time Status</th>
                  <th>Action</th>
                </thead>
                <tbody>
               
                <?php 
                    include 'includes/conn.php';
                    
                    //tafuta miradi yake tu
                    $user_id = $_SESSION['user'];
                    $user_org = $_SESSION['user_org'];
                    
                    $annual_status ="";
                    $quartely_status = "";
                    $kpi_status = "";
                    $plan_status = "";
                    $resource_status = "";
                    $monitoring_form_status = "";
                    $currentDate = date('Y-m-d');

                    $query_duedate = "SELECT * FROM `duedate`"; 
                    $result_duedate = mysqli_query($conn, $query_duedate) or die("Error : ".mysqli_error($conn));
                    while($row_duedate = mysqli_fetch_array($result_duedate)) {	
                         if($row_duedate['reporttype'] =='Annual Form'){
                            $annual_status = $row_duedate['dateline'];
                         }elseif($row_duedate['reporttype'] =='KPI'){
                            $kpi_status = $row_duedate['dateline'];
                         }elseif($row_duedate['reporttype'] =='M&E Plan'){
                            $plan_status = $row_duedate['dateline'];
                         }elseif($row_duedate['reporttype'] =='Quarterly Form'){
                            $quartely_status = $row_duedate['dateline'];
                         }elseif($row_duedate['reporttype'] =='Resource Tracking Form'){
                            $resource_status = $row_duedate['dateline'];
                         }elseif($row_duedate['reporttype'] =='Monitoring Form'){
                            $monitoring_form_status = $row_duedate['dateline'];
                         }
                    }
                    $currentday = date("Y-m-d");

                    $kpi_status = date("Y-m-d", strtotime($kpi_status));
                    $kpi_status = strtotime($kpi_status) - strtotime($currentDate);
                    $kpi_status = round($kpi_status / 86400); 
                   
                    $annual_status = date("Y-m-d", strtotime($annual_status));
                    $annual_status = strtotime($annual_status) - strtotime($currentDate);
                    $annual_status = round($annual_status / 86400);

                    $plan_status = date("Y-m-d", strtotime($plan_status));
                    $plan_status = strtotime($plan_status) - strtotime($currentDate);
                    $plan_status = round($plan_status / 86400);

                    $quartely_status = date("Y-m-d", strtotime($quartely_status));
                    $quartely_status = strtotime($quartely_status) - strtotime($currentDate);
                    $quartely_status = round($quartely_status / 86400);

                    $resource_status = date("Y-m-d", strtotime($resource_status));
                    $resource_status = strtotime($resource_status) - strtotime($currentDate);
                    $resource_status = round($resource_status / 86400);

                    $monitoring_form_status = date("Y-m-d", strtotime($monitoring_form_status));
                    $monitoring_form_status = strtotime($monitoring_form_status) - strtotime($currentDate);
                    $monitoring_form_status = round($monitoring_form_status / 86400);
             
                  if($user_role['Name']=="Focal Person"){
                    $query_yake = "SELECT * FROM `project_targetgroup` WHERE `Institution` ='$user_org' OR `FocalPerson` ='$user_id'"; 
                    $result_yake = mysqli_query($conn, $query_yake) or die("Error : ".mysqli_error($conn));
                    $num = 0;
                    while($row_yake = mysqli_fetch_array($result_yake)) {	
                             $get_project = $row_yake['Project'];
                              $query = "SELECT * FROM `projecttb` WHERE `ID` ='$get_project' AND `pType` ='Project'"; 
                              $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                              
                              if($row = mysqli_fetch_array($result)) {	
                                  $num +=1;
                                      echo "<tr>
                                      <td>".$num."</td>
                                      <td>".$row['pTitle']."</td>
                                      <td>";
                                      
                                      $getID = $row['ID'];
                                      $progress = 0;
                                      $queryp = "SELECT * FROM `project_progress` WHERE `Project` =' $getID'"; 
                                      $resultp = mysqli_query($conn, $queryp) or die("Error : ".mysqli_error($conn));
                                      if($rowp = mysqli_fetch_array($resultp)) {	
                                          $progress = $rowp['Progress'];
                                      }
                                      
                                          if($row['Status'] == "IDENTIFICATION"){
                                                    echo  "<span class='label label-primary'>".$row['Status']."</span>
                                                            <div class='progress progress-xs'>
                                                                <div class='progress-bar progress-bar-danger' style='width: ".$progress."%'></div>
                                                              </div>
                                                              <span class='badge bg-red'>".$progress."%</span>
                                                          ";
                                                  } elseif($row['Status'] == "IMPLEMENTATION"){
                                                    echo  "<span class='label label-info'>".$row['Status']."</span>
                                                          <div class='progress progress-xs'>
                                                                <div class='progress-bar progress-bar-danger' style='width: ".$progress."%'></div>
                                                              </div>
                                                              <span class='badge bg-red'>".$progress."%</span>
                                                          ";
                                                  } elseif($row['Status'] == "COMPLETION"){
                                                    echo  "<span class='label label-success'>".$row['Status']."</span>
                                                          <div class='progress progress-xs'>
                                                                <div class='progress-bar progress-bar-danger' style='width: ".$progress."%'></div>
                                                              </div>
                                                              <span class='badge bg-red'>".$progress."%</span>
                                                    ";
                                                  }  elseif($row['Status'] == "CANCELLED"){
                                                      echo  "<span class='label label-danger'>".$row['Status']."</span>
                                                      <div class='progress progress-xs'>
                                                                <div class='progress-bar progress-bar-danger' style='width: ".$progress."%'></div>
                                                              </div>
                                                              <span class='badge bg-red'>".$progress."%</span>
                                                      ";
                                                  }
                                                      elseif($row['Status'] == "SUSPENDED"){
                                                      echo  "<span class='label label-warning'>".$row['Status']."</span>
                                                          <div class='progress progress-xs'>
                                                                <div class='progress-bar progress-bar-danger' style='width: ".$progress."%'></div>
                                                              </div>
                                                              <span class='badge bg-red'>".$progress."%</span>
                                                      ";
                                                  }
                                      echo "</td>
                                              <td>";
                                                  //calculate number of days remains
                                                  date_default_timezone_set('Africa/Nairobi'); // Then call the date functions
                                                  $startdate = $row['StartDate'];
                                                  $enddate = $row['EndDate'];
                                                  $currentday = date("Y-m-d");
                                                  $remaindays = 0;
                                                  $percentageday = 0;
                                                    $range = date("d-m-Y", strtotime($row['StartDate']))." - ".date("d-m-Y", strtotime($row['EndDate']));
                                                    
                                                  if(strtotime($enddate) <= strtotime($currentday)) {
                                                      $remaindays = 0;
                                                      $percentageday = 100;
                                                  } else {
                                                      // Calculating the difference in timestamps 
                                                      $diff = strtotime($enddate) - strtotime($currentday); 
                                                      // 1 day = 24 hours 
                                                      // 24 * 60 * 60 = 86400 seconds 
                                                      $remaindays = abs(round($diff / 86400)); 
                                                      
                                                      $diff = strtotime($enddate) - strtotime($startdate); 
                                                      $totaldays = abs(round($diff / 86400)); 
                                                      
                                                      $zilizokwisha = ($totaldays - $remaindays);
                                                      
                                                      $percentageday = abs(round(($zilizokwisha/$totaldays) *100));
                                                    
                                                  }
                                                    echo "<span>".$range."</span>
                                                          <div class='progress progress-xs'>
                                                            <div class='progress-bar progress-bar-danger' style='width: ".$percentageday."%'></div>
                                                          </div>
                                                          <span class='badge bg-red'>".$remaindays." /days remained</span>";
                                                  
                                                  
                                              echo "</td>
                                        <td>"; 
                                 
                                       

                                       
                                              if(strpos($user_role['Permission'], 'mon_kra') !== false) {
                                                  if($kpi_status >= 0){
                                                    echo " <a href='assign_kra.php?id=".$row['ID']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-edit'></i> KPI</a>";
                                                  } 
                                              }
                                              if(strpos($user_role['Permission'], 'mon_workplan') !== false) {
                                                  if($plan_status >= 0){
                                                    echo "<a href='m&e.php?id=".$row['ID']."'><button class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> M&E Plan</button></a>";
                                                  }
                                              }

                                              if(strpos($user_role['Permission'], 'mon_resource') !== false) {
                                                if($resource_status >= 0){
                                                  echo "<a href='resource.php?id=".$row['ID']."'><button class='btn btn-warning btn-sm btn-flat'><i class='fa fa-folder'></i> Resource</button></a>";
                                                }
                                              }

                                              if(strpos($user_role['Permission'], 'mon_quarter') !== false) {
                                                if($quartely_status >= 0){
                                                  echo "<a href='quartely.php?id=".$row['ID']."'> <button class='btn btn-info btn-sm btn-flat'><i class='fa fa-file'></i> Quarter Report</button></a>";
                                                }
                                              }

                                              if(strpos($user_role['Permission'], 'mon_annual') !== false) {
                                                if($annual_status >= 0){  
                                                  echo "<a href='annual.php?id=".$row['ID']."'><button class='btn btn-primary btn-sm btn-flat'><i class='fa fa-file'></i> Annual Reports</button></a>";
                                                }
                                              }

                                              if(strpos($user_role['Permission'], 'mon_monitor') !== false) {
                                                if($monitoring_form_status >= 0){ 
                                                  echo "<a href='monitoring.php?id=".$row['ID']."'> <button class='btn btn-danger btn-sm btn-flat'><i class='fa fa-file'></i> Monitoring Form</button></a>";
                                                }
                                              }

                                              if(strpos($user_role['Permission'], 'mon_report') !== false) {
                                                  echo "<a href='fplist_mon.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-file'></i> Reports</button></a>";
                                              }

                                              if(strpos($user_role['Permission'], 'mon_report_request') !== false) {
                                                  echo "<a href='monitoring.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Request Report</button></a>";
      
                                              }

                                              if(strpos($user_role['Permission'], 'mon_report') !== false) {
                                                echo "<a href='fplist_mon.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-file'></i> Approve</button></a>";
                                              }
                                              if(strpos($user_role['Permission'], 'mon_report') !== false) {
                                                echo "<a href='fplist_mon.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-file'></i> Confirm</button></a>";
                                              }
                                              if(strpos($user_role['Permission'], 'mon_report') !== false) {
                                                echo "<a href='fplist_mon.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-file'></i> Accept</button></a>";
                                              }
                                              
                                       
                                          echo
                                              "</td>
                                  </tr>";
                            }
                    }
                          //mwisho wa FB
                  } else {
                    $annual_status ="";
                    $quartely_status = "";
                    $kpi_status = "";
                    $plan_status = "";
                    $resource_status = "";
                    $monitoring_form_status = "";
                    $currentDate = date('Y-m-d');

                    $query_duedate = "SELECT * FROM `duedate`"; 
                    $result_duedate = mysqli_query($conn, $query_duedate) or die("Error : ".mysqli_error($conn));
                    while($row_duedate = mysqli_fetch_array($result_duedate)) {	
                         if($row_duedate['reporttype'] =='Annual Form'){
                            $annual_status = $row_duedate['dateline'];
                         }elseif($row_duedate['reporttype'] =='KPI'){
                            $kpi_status = $row_duedate['dateline'];
                         }elseif($row_duedate['reporttype'] =='M&E Plan'){
                            $plan_status = $row_duedate['dateline'];
                         }elseif($row_duedate['reporttype'] =='Quarterly Form'){
                            $quartely_status = $row_duedate['dateline'];
                         }elseif($row_duedate['reporttype'] =='Resource Tracking Form'){
                            $resource_status = $row_duedate['dateline'];
                         }elseif($row_duedate['reporttype'] =='Monitoring Form'){
                            $monitoring_form_status = $row_duedate['dateline'];
                         }
                    }
                    $currentday = date("Y-m-d");

                    $kpi_status = date("Y-m-d", strtotime($kpi_status));
                    $kpi_status = strtotime($kpi_status) - strtotime($currentDate);
                    $kpi_status = round($kpi_status / 86400); 
                   
                    $annual_status = date("Y-m-d", strtotime($annual_status));
                    $annual_status = strtotime($annual_status) - strtotime($currentDate);
                    $annual_status = round($annual_status / 86400);

                    $plan_status = date("Y-m-d", strtotime($plan_status));
                    $plan_status = strtotime($plan_status) - strtotime($currentDate);
                    $plan_status = round($plan_status / 86400);

                    $quartely_status = date("Y-m-d", strtotime($quartely_status));
                    $quartely_status = strtotime($quartely_status) - strtotime($currentDate);
                    $quartely_status = round($quartely_status / 86400);

                    $resource_status = date("Y-m-d", strtotime($resource_status));
                    $resource_status = strtotime($resource_status) - strtotime($currentDate);
                    $resource_status = round($resource_status / 86400);

                    $monitoring_form_status = date("Y-m-d", strtotime($monitoring_form_status));
                    $monitoring_form_status = strtotime($monitoring_form_status) - strtotime($currentDate);
                    $monitoring_form_status = round($monitoring_form_status / 86400);

                          $query = "SELECT * FROM `projecttb` WHERE `pType` = 'Project'"; 
                          $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                          $num = 0;
                          while($row = mysqli_fetch_array($result)) {	
                              $num +=1;
                                  echo "<tr>
                                  <td>".$num."</td>
                                  <td>".$row['pTitle']."</td>
                                  <td>";
                                  
                                  $getID = $row['ID'];
                                  $progress = 0;
                                  $queryp = "SELECT * FROM `project_progress` WHERE `Project` =' $getID'"; 
                                  $resultp = mysqli_query($conn, $queryp) or die("Error : ".mysqli_error($conn));
                                  if($rowp = mysqli_fetch_array($resultp)) {	
                                      $progress = $rowp['Progress'];
                                  }
                                  
                                      if($row['Status'] == "IDENTIFICATION"){
                                                echo  "<span class='label label-primary'>".$row['Status']."</span>
                                                        <div class='progress progress-xs'>
                                                            <div class='progress-bar progress-bar-danger' style='width: ".$progress."%'></div>
                                                          </div>
                                                          <span class='badge bg-red'>".$progress."%</span>
                                                      ";
                                              } elseif($row['Status'] == "IMPLEMENTATION"){
                                                echo  "<span class='label label-info'>".$row['Status']."</span>
                                                      <div class='progress progress-xs'>
                                                            <div class='progress-bar progress-bar-danger' style='width: ".$progress."%'></div>
                                                          </div>
                                                          <span class='badge bg-red'>".$progress."%</span>
                                                      ";
                                              } elseif($row['Status'] == "COMPLETION"){
                                                echo  "<span class='label label-success'>".$row['Status']."</span>
                                                      <div class='progress progress-xs'>
                                                            <div class='progress-bar progress-bar-danger' style='width: ".$progress."%'></div>
                                                          </div>
                                                          <span class='badge bg-red'>".$progress."%</span>
                                                ";
                                              }  elseif($row['Status'] == "CANCELLED"){
                                                  echo  "<span class='label label-danger'>".$row['Status']."</span>
                                                  <div class='progress progress-xs'>
                                                            <div class='progress-bar progress-bar-danger' style='width: ".$progress."%'></div>
                                                          </div>
                                                          <span class='badge bg-red'>".$progress."%</span>
                                                  ";
                                              }
                                                  elseif($row['Status'] == "SUSPENDED"){
                                                  echo  "<span class='label label-warning'>".$row['Status']."</span>
                                                      <div class='progress progress-xs'>
                                                            <div class='progress-bar progress-bar-danger' style='width: ".$progress."%'></div>
                                                          </div>
                                                          <span class='badge bg-red'>".$progress."%</span>
                                                  ";
                                              }
                                  echo "</td>
                                          <td>";
                                              //calculate number of days remains
                                              date_default_timezone_set('Africa/Nairobi'); // Then call the date functions
                                              $startdate = $row['StartDate'];
                                              $enddate = $row['EndDate'];
                                              $currentday = date("Y-m-d");
                                              $remaindays = 0;
                                              $percentageday = 0;
                                                $range = date("d-m-Y", strtotime($row['StartDate']))." - ".date("d-m-Y", strtotime($row['EndDate']));
                                                
                                              if(strtotime($enddate) <= strtotime($currentday)) {
                                                  $remaindays = 0;
                                                  $percentageday = 100;
                                              } else {
                                                  // Calculating the difference in timestamps 
                                                  $diff = strtotime($enddate) - strtotime($currentday); 
                                                  // 1 day = 24 hours 
                                                  // 24 * 60 * 60 = 86400 seconds 
                                                  $remaindays = abs(round($diff / 86400)); 
                                                  
                                                  $diff = strtotime($enddate) - strtotime($startdate); 
                                                  $totaldays = abs(round($diff / 86400)); 
                                                  
                                                  $zilizokwisha = ($totaldays - $remaindays);
                                                  
                                                  $percentageday = abs(round(($zilizokwisha/$totaldays) *100));
                                                
                                              }
                                                echo "<span>".$range."</span>
                                                      <div class='progress progress-xs'>
                                                        <div class='progress-bar progress-bar-danger' style='width: ".$percentageday."%'></div>
                                                      </div>
                                                      <span class='badge bg-red'>".$remaindays." /days remained</span>";
                                              
                                              
                                          echo "</td>
                                    <td>"; 
                                   
                                          if(strpos($user_role['Permission'], 'mon_kra') !== false) {
                                            if($kpi_status >= 0){
                                              echo " <a href='assign_kra.php?id=".$row['ID']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-edit'></i> KPI</a>";
                                            }
                                          }

                                          if(strpos($user_role['Permission'], 'mon_workplan') !== false) {
                                            if($plan_status >= 0){
                                              echo "<a href='m&e.php?id=".$row['ID']."'><button class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> M&E Plan</button></a>";
                                            }
                                          }

                                          if(strpos($user_role['Permission'], 'mon_resource') !== false) {
                                            if($resource_status >= 0){
                                              echo "<a href='resource.php?id=".$row['ID']."'><button class='btn btn-warning btn-sm btn-flat'><i class='fa fa-folder'></i> Resource</button></a>";
                                            }
                                          }

                                          if(strpos($user_role['Permission'], 'mon_quarter') !== false) {
                                            if($quartely_status >= 0){
                                                echo "<a href='quartely.php?id=".$row['ID']."'> <button class='btn btn-info btn-sm btn-flat'><i class='fa fa-file'></i> Quarter Report</button></a>";
                                            }
                                          }

                                          if(strpos($user_role['Permission'], 'mon_annual') !== false) {
                                            if($annual_status >= 0){
                                              echo "<a href='annual.php?id=".$row['ID']."'><button class='btn btn-primary btn-sm btn-flat'><i class='fa fa-file'></i> Annual Reports</button></a>";
                                            }
                                          }

                                          if(strpos($user_role['Permission'], 'mon_monitor') !== false) {
                                            if($monitoring_form_status >= 0){  
                                              echo "<a href='monitoring.php?id=".$row['ID']."'> <button class='btn btn-danger btn-sm btn-flat'><i class='fa fa-file'></i> Monitoring Form</button></a>";
                                            }
                                          }

                                          if(strpos($user_role['Permission'], 'mon_submit') !== false) {
                                            if($monitoring_form_status >= 0){  
                                              echo "<a href='monitoring.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-file'></i> Submit Report</button></a>";
                                            }
                                          }

                                          if(strpos($user_role['Permission'], 'mon_verify') !== false) {
                                            if($monitoring_form_status >= 0){  
                                              echo "<a href='monitoring.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-file'></i> Approve Report</button></a>";
                                            }
                                          }

                                          if(strpos($user_role['Permission'], 'mon_confirm') !== false) {
                                            if($monitoring_form_status >= 0){  
                                              echo "<a href='monitoring.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-file'></i> Confirm Report</button></a>";
                                            }
                                          }

                                          if(strpos($user_role['Permission'], 'mon_accept') !== false) {
                                            if($monitoring_form_status >= 0){  
                                              echo "<a href='monitoring.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-file'></i> ZPC Accept Report</button></a>";
                                            }
                                          }

                                          if(strpos($user_role['Permission'], 'mon_report') !== false) {
                                            echo "<a href='fplist_mon.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-file'></i> Reports</button></a>";
                                          }

                                          if(strpos($user_role['Permission'], 'mon_report_request') !== false) {
                                              echo "<a href='monitoring.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-edit'></i> Request Report</button></a>";
                                          }

                                          if(strpos($user_role['Permission'], 'mon_report') !== false) {
                                            echo "<a href='fplist_mon.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-file'></i> Approve</button></a>";
                                          }
                                          if(strpos($user_role['Permission'], 'mon_report') !== false) {
                                            echo "<a href='fplist_mon.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-file'></i> Confirm</button></a>";
                                          }
                                          if(strpos($user_role['Permission'], 'mon_report') !== false) {
                                            echo "<a href='fplist_mon.php?id=".$row['ID']."'> <button class='btn btn-success btn-sm btn-flat'><i class='fa fa-file'></i> Accept</button></a>";
                                          }
                                          
                                    
                                      echo
                                          "</td>
                              </tr>";
                          }
                        }
    
                    ?>
                                            
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
 <?php include 'includes/list_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$("body").on("click", ".editagenda", function(e){
//  $('.edit').click(function(e){
    e.preventDefault();
    $('#editagenda').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".reports", function(e){
 // $('.delete').click(function(e){
    e.preventDefault();
    $('#reports').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

$("body").on("click", ".photo", function(e){
 // $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
	//alert('Hi ali');
	//alert(id);
  $.ajax({
    type: 'POST',
    url: '',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.agendaid').val(response.ID);
      $('.agenda_name').html(response.Name);
      $('#edit_code').val(response.Code);
      $('#edit_agendaname').val(response.Name);
      $('#edit_startdate').val(response.StartDate);
      $('#edit_enddate').val(response.EndDate);
      $('#edit_about').val(response.Explaination);
      $('#edit_status').val(response.Status)
      //$('#position_val').val(response.position_id).html(response.Status);
    //  $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
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
