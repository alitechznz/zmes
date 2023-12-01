
<?php include 'includes/session.php'; ?>
<?php
  // session_start();

  if(isset($_SESSION['page_status']) !=TRUE){ 
	  header('location:index.php');
  } 
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/head_menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <?php 
       if(strpos($user_role['Permission'], 'audit_add') !== false){
    ?>
        <section class="content">
        <?php 
          // include 'gethomesummary.php';
          include 'getbudgetchart.php';
        ?>
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Plan</span>
                   <?php
                         include 'includes/conn.php';
                         $num = 0;
                         $sql ="SELECT * FROM agendatb";
                         $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                             $num +=1;
                         }
                           echo '<span class="info-box-number">'.$num.'</span>';
                      ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Program</span>
               <?php
                         include 'includes/conn.php';
                         $num = 0;
                         $sql ="SELECT * FROM projecttb WHERE pType ='Program'";
                         $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                             $num +=1;
                         }
                           echo '<span class="info-box-number">'.$num.'</span>';
                      ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Project</span>
               <?php
                         include 'includes/conn.php';
                         $num = 0;
                         $sql ="SELECT * FROM projecttb WHERE pType ='Project'";
                         $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                             $num +=1;
                         }
                           echo '<span class="info-box-number">'.$num.'</span>';
                      ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users</span>
               <?php
                         include 'includes/conn.php';
                         $num = 0;
                         $sql ="SELECT * FROM userinfo";
                         $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                             $num +=1;
                         }
                           echo '<span class="info-box-number">'.$num.'</span>';
                      ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Annual Budget Report</h3>
        
                      <div class="box-tools pull-right">
                          <div class="col-xl-3 col-12">
                            <div class="form-group">
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-search"></i>
                                </div>
                                <select class="form-control select2" name="overview" id="overview" onchange="showOverview(this.value)" required>
                                  <?php 
                                    include 'includes/conn.php'; 
                                      $query = "SELECT * FROM `budgetterm` ORDER BY ID DESC"; 
                                      $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                      $num = 0;
                                      
                                      while($row = mysqli_fetch_array($result)) {	
                                        echo '<option value="'.$row['Item'].'">'.$row['Item'].'</option>';
                                      }  
                                      
                                  ?>                
                                </select>
                              </div>
                            </div>
										      </div>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                          <p class="text-center">
                            <strong><span style="color:grey;"> Development Partners (DPs)</span>/<span style="color:cornflowerblue;">Government (RGoZ)</span></strong>
                          </p>
        
                          <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" style="height: 180px;"></canvas>
                          </div>
                          <!-- /.chart-responsive -->
                        </div>
                       
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                    <div class="box-footer">
                      <div class="row">
                        <div class="col-sm-4 col-xs-6">
                          <div class="description-block border-right">
                            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 0%</span>
                            <h5 class="description-header">0</h5>
                            <span class="description-text">TOTAL BUDGET</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 col-xs-6">
                          <div class="description-block">
                            <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 0%</span>
                            <h5 class="description-header">0</h5>
                            <span class="description-text">AMOUNT DISBURSED</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 col-xs-6">
                          <div class="description-block border-right">
                            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 0%</span>
                            <h5 class="description-header">$0.00</h5>
                            <span class="description-text">AMOUNT LEFT</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title">Project Category</h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="chart-responsive">
                            <canvas id="pieChart" height="185"></canvas>
                          </div>
                          <!-- ./chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                          <ul class="chart-legend clearfix">
                            <?php echo $pie_legend; ?>
                          </ul>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                      <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">Government (RGoZ)
                          <span class="pull-right text-red"><i class="fa fa-angle-down"></i> <?php echo $per_mradi_SMZ; ?>%</span></a></li>
                        <li><a href="#">Development Partners (DPs) <span class="pull-right text-green"><i class="fa fa-angle-up"></i> <?php echo $per_mradi_WM; ?>%</span></a>
                        </li>
                        <li><a href="#">RGoZ & DPs
                          <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i><?php echo $per_mradi_WOTE; ?>%</span></a></li>
                      </ul>
                    </div>
                    <!-- /.footer -->
                  </div>
                  <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->

      <!-- Main row -->
       <!-- /.row -->

       <div class="row">
            <div class="col-md-6">
                  <div class="box box-info">
                        <div class="box-header with-border">
                          <h3 class="box-title">Project Budget</h3>
            
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="table-responsive">
                              <?php include '../morris/projectbudg.php'; ?>
                          </div>
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                         
                        </div>
                        <!-- /.box-footer -->
                      </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Overdue Tasks</h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                          <div class="table-responsive">
                            <table class="table no-margin">
                              <thead>
                              <tr>
                                <th>Overdue</th>
                                <th>Project</th>
                                <th>Deadline</th>
                                <th>Implementor</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                 <td><span class='label label-danger'>30 days</span></td>
                                 <td>Mradi wa Ujenzi wa Mahanga na Vituo vya Zimamoto na Uokozi</td>
                                 <td>13/07/2022</td>
                                 <td>Jeshi la Kujenga Uchumi</td>
                                                
                              </tr>
                              <tr>
                                 <td><span class='label label-danger'>12 days</span></td>
                                 <td>Usambazaji umeme vijijini</td>
                                 <td>01/08/2022</td>
                                 <td>Wizara ya Maji, Nishati na Madini</td>
                                                
                              </tr>
                              
                                  <?php
                                  /*
                                     include 'includes/conn.php';
                                     $num = 0;
                                     $sql ="SELECT * FROM projecttb
                                            INNER JOIN donortb ON projecttb.ID = donortb.project 
                                            INNER JOIN organizationtb ON donortb.Organization = organizationtb.ID ORDER BY projecttb.ID DESC LIMIT 8";
                                     $result = mysqli_query($conn, $sql);
                                     while($row = mysqli_fetch_array($result)){
                                           echo '<tr>
                                                <td><a href="projectreport.php?id='.$row['ID'].'">'.$row['Short title'].'</a></td>
                                                <td>'.$row['pTitle'].'</td>
                                                <td>'.$row['Name'].'</td>
                                                <td>'.$row['Start Date'].'</td>
                                                
                                                <td>';
                                                     if($row['Status'] == "IDENTIFICATION"){
                                                       echo  "<span class='label label-primary'>".$row['Status']."</span>";
                                                    } elseif($row['Status'] == "IMPLEMENTATION"){
                                                      echo  "<span class='label label-info'>".$row['Status']."</span>";
                                                    } elseif($row['Status'] == "COMPLETION"){
                                                      echo  "<span class='label label-success'>".$row['Status']."</span>";
                                                    }  elseif($row['Status'] == "CANCELLED"){
                                                        echo  "<span class='label label-danger'>".$row['Status']."</span>";
                                                    }
                                                        elseif($row['Status'] == "SUSPENDED"){
                                                        echo  "<span class='label label-warning'>".$row['Status']."</span>";
                                                    }
                                                 echo '</td>
                                              </tr>';
                                     }
                                      */
                                  ?> 
                          
                              </tbody>
                            </table>
                          </div>
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                          
                          <a href="list.php" class="btn btn-sm btn-default btn-flat pull-right">View All Project</a>
                        </div>
                        <!-- /.box-footer -->
                  </div>
            </div>
      </div>
      <div class="row">
            <div class="col-md-6">
                  <div class="box box-info">
                        <div class="box-header with-border">
                          <h3 class="box-title">Workload (Projects & Performance)</h3>
            
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="table-responsive">
                            <?php include '../morris/bar_var.php'; ?>
                          </div>
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                        </div>
                        <!-- /.box-footer -->
                      </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Upcoming Deadlines</h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <div class="box-body">
                          <div class="table-responsive">
                            <table class="table no-margin">
                              <thead>
                              <tr>
                                <th>Implementor</th>
                                <th>Project</th>
                                <th>Deadline</th>
                                <th>Workload</th>
                                
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                 <td>Wizara ya Uchumi wa Buluu na Uvuvi</td>
                                 <td>Kuanzisha Shamba la Kufugia Samaki kwa Kutumia Nyavu</td>
                                 <td>28/08/2022</td>
                                 <td> 
                                    <div class='progress progress-xs'>
                                      <div class='progress-bar progress-bar-danger' style='width: 67%'></div>
                                    </div>
                                    <span class='badge bg-red'>67%</span>
                                  </td>
                                                
                              </tr>
                                  <?php
                                  /*
                                     include 'includes/conn.php';
                                     $num = 0;
                                     $sql ="SELECT * FROM projecttb
                                            INNER JOIN donortb ON projecttb.ID = donortb.project 
                                            INNER JOIN organizationtb ON donortb.Organization = organizationtb.ID ORDER BY projecttb.ID DESC LIMIT 8";
                                     $result = mysqli_query($conn, $sql);
                                     while($row = mysqli_fetch_array($result)){
                                           echo '<tr>
                                                <td><a href="projectreport.php?id='.$row['ID'].'">'.$row['Short title'].'</a></td>
                                                <td>'.$row['pTitle'].'</td>
                                                <td>'.$row['Name'].'</td>
                                                <td>'.$row['Start Date'].'</td>
                                                
                                                <td>';
                                                     if($row['Status'] == "IDENTIFICATION"){
                                                       echo  "<span class='label label-primary'>".$row['Status']."</span>";
                                                    } elseif($row['Status'] == "IMPLEMENTATION"){
                                                      echo  "<span class='label label-info'>".$row['Status']."</span>";
                                                    } elseif($row['Status'] == "COMPLETION"){
                                                      echo  "<span class='label label-success'>".$row['Status']."</span>";
                                                    }  elseif($row['Status'] == "CANCELLED"){
                                                        echo  "<span class='label label-danger'>".$row['Status']."</span>";
                                                    }
                                                        elseif($row['Status'] == "SUSPENDED"){
                                                        echo  "<span class='label label-warning'>".$row['Status']."</span>";
                                                    }
                                                 echo '</td>
                                              </tr>';
                                     }
                                      */
                                  ?> 
                          
                              </tbody>
                            </table>
                          </div>
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                          
                          <a href="list.php" class="btn btn-sm btn-default btn-flat pull-right">View All Project</a>
                        </div>
                        <!-- /.box-footer -->
                  </div>
            </div>
      </div>
      <!-- /.row -->
    </section>
    <?php } else { ?>
        <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php
                         include 'includes/conn.php';
                         $num_proj = 0;
                         $num_complt = 0;
                         $num_ongoing = 0;
                         $num_current = 0;

                         $user_id = $_SESSION['user'];
                         $user_org = $_SESSION['user_org'];

                         $sql = "SELECT * FROM `project_targetgroup` WHERE `Institution` ='$user_org' OR `FocalPerson` ='$user_id'"; 
                         $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                             $get_project = $row['Project'];
                             $query = "SELECT * FROM `projecttb` WHERE `ID` ='$get_project'"; 
                             $results = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                             if($rows = mysqli_fetch_array($results)) {	
                                  if($rows['Status']=='COMPLETION'){
                                    $num_complt +=1;
                                  } elseif($rows['Status']=='CANCELLED' || $rows['Status']=='SUSPENDED'){
                                    $num_current +=1;
                                  } else{
                                    $num_ongoing +=1;
                                  }
                             }

                             $num_proj +=1;
                         }
                           echo '<h3>'.$num_proj.'</h3>';
                      ?>
              <!-- <h3>0</h3> -->

              <p>Total Project</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $num_complt; ?><sup style="font-size: 20px"></sup></h3>

              <p>Completed Projects</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $num_ongoing; ?></h3>

              <p>Ongoing Projects</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $num_current; ?></h3>

              <p>Suspended Projects</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      
        <!-- ./col -->
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Budget (TZS)</span>
                   <?php
                         include 'includes/conn.php';
                         // Set error reporting level to exclude warnings
                          error_reporting(E_ALL & ~E_WARNING);
                          
                         $num = 0;
                         $total_budget = 0;
                         $total_disbursed = 0;
                         setlocale(LC_ALL,"TZS");

                         $get_org = $_SESSION['user_org'];
                         $sql_mwanzo ="SELECT * FROM project_targetgroup WHERE project_targetgroup.Institution ='$get_org'";
                         $result_mwanzo = mysqli_query($conn, $sql_mwanzo);
                         while($row_mwanzo = mysqli_fetch_array($result_mwanzo)){
                            $project = $row_mwanzo['Project'];
                            $sql ="SELECT * FROM project_financing 
                            INNER JOIN projecttb ON project_financing.Project = projecttb.ID
                            WHERE project_financing.Project='$project'";
                            $result = mysqli_query($conn, $sql);
                            $get_total_b = 0;
                            $get_total_d = 0;
                            while($row = mysqli_fetch_array($result)){
                                $get_total_b = $row['TotalAmount'];
                                $get_total_d = $row['Disbursed'];
                                if($get_total_b){
                                  $total_budget = $total_budget + $get_total_b;
                                }

                                if(is_numeric($get_total_d)){
                                  $total_disbursed = $total_disbursed + $get_total_d;
                                }
                               
                            }

                            $total_budget = number_format($total_budget, 2, '.', ',');
                            $total_disbursed = number_format($total_disbursed, 2, '.', ',');
                         }
                           echo '<span class="info-box-number">'.$total_budget.'</span>';
                      ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Disbursement </span>
               <?php
                     
                  echo '<span class="info-box-number">'.$total_disbursed.' (TZS)</span>';
              ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Spending Amount</span>
               <?php
                         include 'includes/conn.php';
                         $num = 0;
                         $sql ="SELECT * FROM projecttb WHERE pType ='Project'";
                         $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                             $num +=1;
                         }
                           echo '<span class="info-box-number">0.000 Tsh</span>';
                      ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Amount Remained</span>
               <?php
                         include 'includes/conn.php';
                         $num = 0;
                         $sql ="SELECT * FROM userinfo";
                         $result = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_array($result)){
                             $num +=1;
                         }
                           echo '<span class="info-box-number">0.000 Tsh</span>';
                      ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
            <div class="col-md-6">
                  <div class="box box-info">
                        <div class="box-header with-border">
                          <h3 class="box-title">Project Budget</h3>
            
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="table-responsive">
                              <?php include '../morris/projectbudg.php'; ?>
                          </div>
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                         
                        </div>
                        <!-- /.box-footer -->
                      </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Overdue Tasks</h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                          <div class="table-responsive">
                            <table class="table no-margin">
                              <thead>
                              <tr>
                                <th>Overdue</th>
                                <th>Project</th>
                                <th>Deadline</th>
                                <th>Implementor</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                 <td><span class='label label-danger'>30 days</span></td>
                                 <td>Mradi wa Ujenzi wa Mahanga na Vituo vya Zimamoto na Uokozi</td>
                                 <td>13/07/2022</td>
                                 <td>Jeshi la Kujenga Uchumi</td>
                                                
                              </tr>
                              <tr>
                                 <td><span class='label label-danger'>12 days</span></td>
                                 <td>Usambazaji umeme vijijini</td>
                                 <td>01/08/2022</td>
                                 <td>Wizara ya Maji, Nishati na Madini</td>
                                                
                              </tr>
                              
                              
                                  <?php
                                  /*
                                     include 'includes/conn.php';
                                     $num = 0;
                                     $sql ="SELECT * FROM projecttb
                                            INNER JOIN donortb ON projecttb.ID = donortb.project 
                                            INNER JOIN organizationtb ON donortb.Organization = organizationtb.ID ORDER BY projecttb.ID DESC LIMIT 8";
                                     $result = mysqli_query($conn, $sql);
                                     while($row = mysqli_fetch_array($result)){
                                           echo '<tr>
                                                <td><a href="projectreport.php?id='.$row['ID'].'">'.$row['Short title'].'</a></td>
                                                <td>'.$row['pTitle'].'</td>
                                                <td>'.$row['Name'].'</td>
                                                <td>'.$row['Start Date'].'</td>
                                                
                                                <td>';
                                                     if($row['Status'] == "IDENTIFICATION"){
                                                       echo  "<span class='label label-primary'>".$row['Status']."</span>";
                                                    } elseif($row['Status'] == "IMPLEMENTATION"){
                                                      echo  "<span class='label label-info'>".$row['Status']."</span>";
                                                    } elseif($row['Status'] == "COMPLETION"){
                                                      echo  "<span class='label label-success'>".$row['Status']."</span>";
                                                    }  elseif($row['Status'] == "CANCELLED"){
                                                        echo  "<span class='label label-danger'>".$row['Status']."</span>";
                                                    }
                                                        elseif($row['Status'] == "SUSPENDED"){
                                                        echo  "<span class='label label-warning'>".$row['Status']."</span>";
                                                    }
                                                 echo '</td>
                                              </tr>';
                                     }
                                      */
                                  ?> 
                          
                              </tbody>
                            </table>
                          </div>
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                          
                          <a href="list.php" class="btn btn-sm btn-default btn-flat pull-right">View All Project</a>
                        </div>
                        <!-- /.box-footer -->
                  </div>
            </div>
      </div>
      <div class="row">
            <div class="col-md-6">
                  <div class="box box-info">
                        <div class="box-header with-border">
                          <h3 class="box-title">Workload</h3>
            
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="table-responsive">
                            <?php include '../morris/bar_var_man.php'; ?>
                          </div>
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                        </div>
                        <!-- /.box-footer -->
                      </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Upcoming Deadlines</h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <div class="box-body">
                          <div class="table-responsive">
                            <table class="table no-margin">
                              <thead>
                              <tr>
                                <th>Implementor</th>
                                <th>Project</th>
                                <th>Deadline</th>
                                <th>Workload</th>
                                
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                 <td>Wizara ya Uchumi wa Buluu na Uvuvi</td>
                                 <td>Kuanzisha Shamba la Kufugia Samaki kwa Kutumia Nyavu</td>
                                 <td>28/08/2022</td>
                                 <td></td>
                                                
                              </tr>
                                  <?php
                                  /*
                                     include 'includes/conn.php';
                                     $num = 0;
                                     $sql ="SELECT * FROM projecttb
                                            INNER JOIN donortb ON projecttb.ID = donortb.project 
                                            INNER JOIN organizationtb ON donortb.Organization = organizationtb.ID ORDER BY projecttb.ID DESC LIMIT 8";
                                     $result = mysqli_query($conn, $sql);
                                     while($row = mysqli_fetch_array($result)){
                                           echo '<tr>
                                                <td><a href="projectreport.php?id='.$row['ID'].'">'.$row['Short title'].'</a></td>
                                                <td>'.$row['pTitle'].'</td>
                                                <td>'.$row['Name'].'</td>
                                                <td>'.$row['Start Date'].'</td>
                                                
                                                <td>';
                                                     if($row['Status'] == "IDENTIFICATION"){
                                                       echo  "<span class='label label-primary'>".$row['Status']."</span>";
                                                    } elseif($row['Status'] == "IMPLEMENTATION"){
                                                      echo  "<span class='label label-info'>".$row['Status']."</span>";
                                                    } elseif($row['Status'] == "COMPLETION"){
                                                      echo  "<span class='label label-success'>".$row['Status']."</span>";
                                                    }  elseif($row['Status'] == "CANCELLED"){
                                                        echo  "<span class='label label-danger'>".$row['Status']."</span>";
                                                    }
                                                        elseif($row['Status'] == "SUSPENDED"){
                                                        echo  "<span class='label label-warning'>".$row['Status']."</span>";
                                                    }
                                                 echo '</td>
                                              </tr>';
                                     }
                                      */
                                  ?> 
                          
                              </tbody>
                            </table>
                          </div>
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                          
                          <a href="list.php" class="btn btn-sm btn-default btn-flat pull-right">View All Project</a>
                        </div>
                        <!-- /.box-footer -->
                  </div>
            </div>
      </div>
      <!-- /.row -->

    </section>
    <?php } ?>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	  
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) >
<script src="dist/js/pages/dashboard2.js"></script-->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(function(){

     // -----------------------
  // - MONTHLY SALES CHART -
  // -----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
  // This will get the first returned node in the jQuery collection.
  var salesChart       = new Chart(salesChartCanvas);

  var salesChartData = {
    labels  : ['July','August', 'September', 'October', 'November', 'December', 'January', 'February', 'March', 'April', 'May', 'June'],
    datasets: [
      {
        label               : 'Electronics',
        fillColor           : 'rgb(210, 214, 222)',
        strokeColor         : 'rgb(210, 214, 222)',
        pointColor          : 'rgb(210, 214, 222)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgb(220,220,220)',
        data                : [65, 59, 80, 81, 56, 55, 40, 3, 4, 10, 16, 17]
      },
      {
        label               : 'Digital Goods',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [28, 48, 40, 19, 86, 27, 90, 8, 10, 20, 11, 39]
      }
    ]
  };

  var salesChartOptions = {
    // Boolean - If we should show the scale at all
    showScale               : true,
    // Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : false,
    // String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    // Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    // Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    // Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    // Boolean - Whether the line is curved between points
    bezierCurve             : true,
    // Number - Tension of the bezier curve between points
    bezierCurveTension      : 0.3,
    // Boolean - Whether to show a dot for each point
    pointDot                : false,
    // Number - Radius of each point dot in pixels
    pointDotRadius          : 4,
    // Number - Pixel width of point dot stroke
    pointDotStrokeWidth     : 1,
    // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,
    // Boolean - Whether to show a stroke for datasets
    datasetStroke           : true,
    // Number - Pixel width of dataset stroke
    datasetStrokeWidth      : 2,
    // Boolean - Whether to fill the dataset with a color
    datasetFill             : true,
    // String - A legend template
    legendTemplate          : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio     : true,
    // Boolean - whether to make the chart responsive to window resizing
    responsive              : true
  };

  // Create the line chart
  salesChart.Line(salesChartData, salesChartOptions);

  // ---------------------------
  // - END MONTHLY SALES CHART -
  // ---------------------------
// -------------
  // - PIE CHART -
  // -------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [<?php echo $chart_data; ?>];
  var pieOptions     = {
    // Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    // String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    // Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    // Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    // Number - Amount of animation steps
    animationSteps       : 100,
    // String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    // Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    // Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    // Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    // String - A legend template
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    // String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%> '
  };
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  // -----------------
  // - END PIE CHART -
  // -----------------


   /* SPARKLINE CHARTS
   * ----------------
   * Create a inline charts with spark line
   */

  // -----------------
  // - SPARKLINE BAR -
  // -----------------
  $('.sparkbar').each(function () {
    var $this = $(this);
    $this.sparkline('html', {
      type    : 'bar',
      height  : $this.data('height') ? $this.data('height') : '30',
      barColor: $this.data('color')
    });
  });

  // -----------------
  // - SPARKLINE PIE -
  // -----------------
  $('.sparkpie').each(function () {
    var $this = $(this);
    $this.sparkline('html', {
      type       : 'pie',
      height     : $this.data('height') ? $this.data('height') : '90',
      sliceColors: $this.data('color')
    });
  });

  // ------------------
  // - SPARKLINE LINE -
  // ------------------
  $('.sparkline').each(function () {
    var $this = $(this);
    $this.sparkline('html', {
      type     : 'line',
      height   : $this.data('height') ? $this.data('height') : '90',
      width    : '100%',
      lineColor: $this.data('linecolor'),
      fillColor: $this.data('fillcolor'),
      spotColor: $this.data('spotcolor')
    });
  });

 
});

function showOverview(str) {
   if (str.length > 0) {
	am4core.ready(function() {
		// Themes begin
		am4core.useTheme(am4themes_animated);
		// Themes end
		var data = [];
		var value1 = 0;
		var value2 = 0;
		var value3 = 0;

		var data_get='';
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				data_get = this.responseText;
				var values = this.responseText.split('"');
				//array zero ni zero
				var idadi = values[2];
				var taasisi = values[1];
				var planpesa = values[3];
				var releasepesa = values[4];

				//humu
				var taasisiArray = [];
				var idadiArray = [];
				var planpesaArray = [];
				var releasepesaArray = [];

				var myarr_taasisi = taasisi.split(',');
				var myarr_idadi = idadi.split(',');
				var myarr_planpesa = planpesa.split(',');
				var myarr_releasepesa = releasepesa.split(',');

				//alert(myarr_taasisi.length);
				for (var i = 0; i < (myarr_taasisi.length-1); i++) {
					taasisiArray[i] = myarr_taasisi[i];
				}
				
				
				for (var i = 0; i < taasisiArray.length; i++) {
					value1 = myarr_planpesa[i];
					value2 = myarr_idadi[i];
					value3 = myarr_releasepesa[i];
					data.push({ category: taasisiArray[i], value1: value1, value2:value2, value3:value3 });
				}

				var interfaceColors = new am4core.InterfaceColorSet();
				var chart = am4core.create("chartdiv", am4charts.XYChart);
				chart.data = data;
				chart.bottomAxesContainer.layout = "horizontal";
				chart.bottomAxesContainer.reverseOrder = true;

				var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
				categoryAxis.dataFields.category = "category";
				categoryAxis.renderer.grid.template.stroke = interfaceColors.getFor("background");
				categoryAxis.renderer.grid.template.strokeOpacity = 1;
				categoryAxis.renderer.grid.template.location = 1;
				categoryAxis.renderer.minGridDistance = 20;

				var valueAxis1 = chart.xAxes.push(new am4charts.ValueAxis());
				valueAxis1.tooltip.disabled = true;
				valueAxis1.renderer.baseGrid.disabled = true;
				valueAxis1.marginRight = 30;
				valueAxis1.renderer.gridContainer.background.fill = interfaceColors.getFor("alternativeBackground");
				valueAxis1.renderer.gridContainer.background.fillOpacity = 0.05;
				valueAxis1.renderer.grid.template.stroke = interfaceColors.getFor("background");
				valueAxis1.renderer.grid.template.strokeOpacity = 1;
				valueAxis1.title.text = "Planned Budget (%)";

				var series1 = chart.series.push(new am4charts.LineSeries());
				series1.dataFields.categoryY = "category";
				series1.dataFields.valueX = "value1";
				series1.xAxis = valueAxis1;
				series1.name = "Series 1";
				var bullet1 = series1.bullets.push(new am4charts.CircleBullet());
				bullet1.tooltipText = "{valueX.value}";

				var valueAxis2 = chart.xAxes.push(new am4charts.ValueAxis());
				valueAxis2.tooltip.disabled = true;
				valueAxis2.renderer.baseGrid.disabled = true;
				valueAxis2.marginRight = 30;
				valueAxis2.renderer.gridContainer.background.fill = interfaceColors.getFor("alternativeBackground");
				valueAxis2.renderer.gridContainer.background.fillOpacity = 0.05;
				valueAxis2.renderer.grid.template.stroke = interfaceColors.getFor("background");
				valueAxis2.renderer.grid.template.strokeOpacity = 1;
				valueAxis2.title.text = "Number of Projects";

				var series2 = chart.series.push(new am4charts.ColumnSeries());
				series2.dataFields.categoryY = "category";
				series2.dataFields.valueX = "value2";
				series2.xAxis = valueAxis2;
				series2.name = "Series 2";
				var bullet2 = series2.bullets.push(new am4charts.CircleBullet());
				bullet2.fillOpacity = 0;
				bullet2.strokeOpacity = 0;
				bullet2.tooltipText = "{valueX.value}";

				var valueAxis3 = chart.xAxes.push(new am4charts.ValueAxis());
				valueAxis3.tooltip.disabled = true;
				valueAxis3.renderer.baseGrid.disabled = true;
				valueAxis3.renderer.gridContainer.background.fill = interfaceColors.getFor("alternativeBackground");
				valueAxis3.renderer.gridContainer.background.fillOpacity = 0.05;
				valueAxis3.renderer.grid.template.stroke = interfaceColors.getFor("background");
				valueAxis3.renderer.grid.template.strokeOpacity = 1;
				valueAxis3.title.text = "Disbursed Budget (%)";

				var series3 = chart.series.push(new am4charts.LineSeries());
				series3.dataFields.categoryY = "category";
				series3.dataFields.valueX = "value3";
				series3.xAxis = valueAxis3;
				series3.name = "Series 3";
				var bullet3 = series3.bullets.push(new am4charts.CircleBullet());
				bullet3.tooltipText = "{valueX.value}";

				chart.cursor = new am4charts.XYCursor();
				chart.cursor.behavior = "zoomY";

				var scrollbarY = new am4core.Scrollbar();
				chart.scrollbarY = scrollbarY;
				//alert(data_get);
			}
		};
		xmlhttp.open("GET", "getbudgetchart.php?budget=" + str, true);
		xmlhttp.send();
		}); // end am4core.ready()
    }
}
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>
