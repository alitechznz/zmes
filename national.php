<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/smz-trans.png">

    <title>ZPC-M&E</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="main/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="main/css/style.css">
	<link rel="stylesheet" href="main/css/skin_color.css">
     
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  <header class="main-header" >
	
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-10" style="margin-left:20px !important;">
	<div class="container" style="max-width:1450px !important;">
		<div class="app-menu">
			<ul class="header-megamenu nav">
				<li class="btn-group nav-item d-md-none">
					<div class="row">
						<div class="col-xl-4 col-4">
							<img src="images/smz-trans.png" style="width:99%; margin-top:20px;" />
						</div>
						<div class="col-xl-8 col-8">
							<h4 style="padding-top:17px;">ZANZIBAR PLANNING COMMISSION</h4>
							<h6 style="margin-top:-8px;">M&E DASHBOARD</h6>

							<div class="notifications-menu" style="padding-top:0px;">
								<a href="index.php"  title="User Login" class="btn btn-primary btn-sm" style="width: 50px !important; text-align: left; margin-top: -14px;">
									Home
								</a>
								<a href="sys/"  title="User Login" class="btn btn-dark btn-sm btn-outline" style="margin-top: -14px;">
									Login
								</a>
								<a href="https://www.planningznz.go.tz"  title="User Login" class="btn btn-dark btn-sm btn-outline" style="margin-top: -14px;">
									Website
								</a>
							</div>
							
						</div>
					</div>
				</li>
				<li class="btn-group nav-item d-none d-xl-inline-block" style="width:100px !important;">
                    <img src="images/smz-trans.png" style="width:97%" />
                </li>
                <li class="btn-group nav-item d-none d-xl-inline-block">
					<h4 style="padding-top:17px;">ZANZIBAR PLANNING COMMISSION</h4>
					<h6 style="margin-top:-8px;">M&E DASHBOARD</h6>
				</li>
			</ul> 
		  </div>

		  <div class="navbar-custom-menu r-side">
            <div class="nav navbar-nav">
                <div class="btn-group d-lg-inline-flex d-none">
                     <div class="row">
                        <div class="app-menu">
						    <div class="search-bx mx-5">
							    <form>
								<div class="input-group">
								  <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
								  <div class="input-group-append">
									<button class="btn" type="submit" id="button-addon3"><i class="ti-search"></i></button>
								  </div>
								</div>
							    </form>
						    </div>
                        </div>
                        <div class="notifications-menu" style="padding-top:0px;">
                            <a href="index.php"  title="User Login" class="btn btn-primary">
                                Home
                            </a>
                        </div>
                        <div class="notifications-menu" style="padding-top:0px;">
                            <a href="sys/"  title="User Login" class="btn btn-dark btn-outline">
                                Login
                            </a>
                        </div>
                        <div class="notifications-menu" style="padding-top:0px;">
                            <a href="https://www.planningznz.go.tz"  title="User Login" class="btn btn-dark btn-outline">
                                Website
                            </a>
                        </div>
                     </div>
                </div>
            </div>
			
		  </div>
		</div>
    </nav>
  </header>
  
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left:20px !important; min-height: 400px;">
	  <div class="container" style="max-width:1450px !important;">
		<!-- Main content -->
		<section class="content">
			<div class="row">
                   	<div class="col-xl-3 col-12">
							<a href="dash_list.php?type ='total'" class="box bg-warning bg-hover-info">
								<div class="box-body">
									<span class="text-white icon-Layout-arrange font-size-40"><span class="path1"></span><span class="path2"></span></span>
									<div class="text-white font-weight-600 font-size-18 mb-2 mt-5">National Projects</div>
									 <?php
                                         include 'php/conn.php';
                                         $num = 0;
                                         $status = '';
                                         $sql ="SELECT * FROM projecttb WHERE pTypeGroup='National' AND `Confirmation`='Accepted'";
                                         $result = mysqli_query($conn, $sql);
                                         while($row = mysqli_fetch_array($result)){
                                             $num +=1;
                                         }
                                           echo '<div class="text-white font-size-16">'.$num.'</div>';
                                      ?>
								
								</div>
							</a>
						</div>
						<div class="col-xl-3 col-12">
							<a href="lgalist.php" class="box bg-danger bg-hover-danger">
								<div class="box-body">
									<span class="text-white icon-Cart2 font-size-40"><span class="path1"></span><span class="path2"></span></span>
									<div class="text-white font-weight-600 font-size-18 mb-2 mt-5">LGAs Projects</div>
									 <?php
                                         include 'php/conn.php';
                                         $num = 0;
                                         $status = '';
                                         $sql ="SELECT * FROM projecttb WHERE pTypeGroup='LGA'";
                                         $result = mysqli_query($conn, $sql);
                                         while($row = mysqli_fetch_array($result)){
                                             $num +=1;
                                         }
                                           echo '<div class="text-white font-size-16">'.$num.'</div>';
                                      ?>
								
								</div>
							</a>
						</div>
						<div class="col-xl-3 col-12">
							<a href="international.php" class="box bg-info bg-hover-success">
								<div class="box-body">
									<span class="text-white icon-Equalizer font-size-40"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
									<div class="text-white font-weight-600 font-size-18 mb-2 mt-5">International</div>
									<div class="text-white font-size-16">Strategies</div>
								</div>
							</a>
						</div>
						<div class="col-xl-3 col-12">
							<a href="national.php" class="box bg-success bg-hover-success">
								<div class="box-body">
									<span class="text-white icon-Equalizer font-size-40"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
									<div class="text-white font-weight-600 font-size-18 mb-2 mt-5">National</div>
									<div class="text-white font-size-16">Strategies</div>
								</div>
							</a>
						</div>
			<div class="col-12">
			  <div class="box box-default">
				<div class="box-header with-border">
				  <h4 class="box-title">National Agenda Overview</h4>
				 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<!-- Nav tabs -->
					<div class="vtabs">
						<ul class="nav nav-tabs tabs-vertical" role="tablist">
							<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home9" role="tab"><span><i class="ion-home mr-15"></i>MKUZA III</span></a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#adp" role="tab"><span><i class="ion-home mr-15"></i>Annual Development Plan</span></a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile9" role="tab"><span><i class="ion-person mr-15"></i>Report(s)</span></a> </li>
						
                        </ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active" id="home9" role="tabpanel">
                                <div class="col-md-12">
                                    <div class="p-15" style="text-align:justify;">
                                        <h3>ABOUT MKUZA III</h3>
                                        <h4>Introduction.</h4>
                                        <p>The RGoZ has implemented various development programme and project that
											address the problem of poverty and hunger in Zanzibar. The instruments to
											guide the poverty interventions have been put in place to facilitate the policy
											framework for economic and social transformation. More specifically the RGoZ
											has formulated the Strategy to put innovative actions for the implementation of
											variousinterventionsso asto increase production and productivity, rural incomes,
											attaining national and household food security and support overall economic
											growth. In principle, such an approach allows transparent and coordinated
											budgeting and funding, and should therefore bring consistency and synergies
											to achieve not only common objectives but also sustainable development.
											This requires having in place a comprehensive M&E system that will enable
											assessments to be undertaken of actual progress of sectoral and programme
											implementation as well as periodic reviews of relevance, efficiency, usefulness,
											impact and sustainability of all interventions in relation to its stated goal and
											objectives. </p>
											<p>
												M&E has therefore shifted from being implementation based (concerned with
												the implementation of activities) to being results-based (assessing if real changes
												have occurred). Monitoring implementation in MKUZA III focuses on the inputs,
												outputs, outcome and impact which include specific products and services.
											</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7 p-15" style="text-align:justify;">
										   <h4>Objectives of the MKUZA III</h4>
										   <p>The overall objective of the guideline is to provide guidance that will enable
												stakeholders to track progress on the implementation of interventions under
												the response of the MKUZA III. It as well helps ZPC and other stakeholders to
												understand the procedure that can be used to monitor the progress, efficiency and
												to evaluate the effectiveness of sector interventions from different interventions. 
											</p>
											<h4>Advantage of the MKUZA III</h4>
											<ul>
												<li>To align the reporting system with national requirement. </li>
												<li>To guide the MKUZA III implementers on how to collect, analyse and report to ZPC.</li>
                                                <li>To meet the national, regional and international reporting requirements
													on the implementations of the national, regional and international
													interventions including the reporting of the implementation of the
													SDGs 
												</li>
												<li>Outline monitoring, evaluation, data collection and reporting roles of all
													stakeholders so as to facilitate sound decision-making and strengthen
													coordination of activities in MKUZA III.
												</li>
											</ul>
											<h4>Key Indicator of the MKUZA III</h4>
											<ul>
												<li>Job Creation and Employment</li>
												<li>Women Empowerment</li>
												<li>Job Creation and Employment</li>
											</ul>
                                    </div>
                                    <div class="col-md-5 col-12">
									       <div class="box">		
                                                <div class="box-header">
                                                    <h4 class="box-title">Current Progress</h4>
                                                </div>
                                                <div class="box-body py-0">	
                                                    <div id="chart5" class="h-350 w-p100"></div>
                                                </div>			
                                            </div>
                                            <div class="box">		
                                                <div class="box-header">
                                                    <h4 class="box-title">Publication Reports</h4>
                                                </div>
                                                		
                                            </div>
                                        
                                    </div>
                                </div>
                               
								
							</div>
							<div class="tab-pane" id="profile9" role="tabpanel">
								<div class="p-15" style="text-align:justify;">
									
								</div>
							</div>
							<div class="tab-pane" id="adp" role="tabpanel">
								<div class="p-15" style="text-align:justify;">
									<h3>About Annual Development Plan</h3>
                                    <h4>Introduction.</h4>
                                    <p>
                                        Monitoring Reports on Development Plans are based on the implementation of the various activities of the Development Programs and Projects implemented in the Zanzibar Development Plans implemented during in a particular financial year. Monitoring of Development Plans involves stakeholders from all Government sectors implementing Development Programs and Projects for the relevant financial year. Monitoring and implementation activities for Development Plans are carried out on quarterly for each financial year based on actual implementation of development programs and projects.
                                    </p>
                                    <p>
                                        Monitoring also involves identifying existing challenges as well as proposing ways to solve emerging challenges. Such monitoring involves visiting programs and projects for each sector after receiving implementation reports from those sectors. The monitoring also includes priority areas identified in Annual Development Plan in order to ensure the implementation of MKUZA III is carried out effectively for the purpose to improve economic growth and enhancing social welfare.
                                    </p>
								</div>
							</div>
							<div class="tab-pane" id="messages10" role="tabpanel">
								<div class="p-15" style="text-align:justify;">
									<h3>ABOUT Agenda 2063</h3>
                                    <h4>Introduction.</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
			<!-- /.col -->	
			</div>
			
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
 <footer class="main-footer" style="margin-left:20px !important;">
	  <div class="container">
		<div class="pull-right d-none d-sm-inline-block">
			<ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
			  <li class="nav-item">
				<a class="nav-link" href="#">Contact with ZPC</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="www.technosolutions.co.tz">Powered by: TechnoSolutions Zanzibar</a>
			  </li>
			</ul>
		</div>
		  &copy; 2020 <a href="#">Zanzibar Planning Commission</a>. All Rights Reserved.
	  </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar">
	  
	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="mdi mdi-message-text"></i></a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="mdi mdi-playlist-check"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Users</p>
			<a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
		  </div>
		  <div class="lookup lookup-sm lookup-right d-none d-lg-block">
			<input type="text" name="s" placeholder="Search" class="w-p100">
		  </div>
          <div class="media-list media-list-hover mt-20">
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>			
			
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>
			  
		  </div>

      </div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Todo List</p>
			<a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
		  </div>
        <ul class="todo-list mt-20">
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_1" class="filled-in">
			  <label for="basic_checkbox_1" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_2" class="filled-in">
			  <label for="basic_checkbox_2" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_3" class="filled-in">
			  <label for="basic_checkbox_3" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_4" class="filled-in">
			  <label for="basic_checkbox_4" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_5" class="filled-in">
			  <label for="basic_checkbox_5" class="mb-0 h-15"></label>
			  <span class="text-line">Maecenas scelerisque</span>
			  <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_6" class="filled-in">
			  <label for="basic_checkbox_6" class="mb-0 h-15"></label>
			  <span class="text-line">Vivamus nec orci</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_7" class="filled-in">
			  <label for="basic_checkbox_7" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_8" class="filled-in">
			  <label for="basic_checkbox_8" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_9" class="filled-in">
			  <label for="basic_checkbox_9" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_10" class="filled-in">
			  <label for="basic_checkbox_10" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
		  </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
	
	<!-- Vendor JS -->
	<script src="main/js/vendors.min.js"></script>
    <script src="assets/icons/feather-icons/feather.min.js"></script>	

    <script src="assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
    <script src="assets/vendor_components/datatable/datatables.min.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    
	
   
	<!-- Power BI Admin App -->
	<script src="main/js/template.js"></script>
    <script src="main/js/demo.js"></script>
    <script src="main/js/pages/data-table.js"></script>
	<script src="main/js/pages/dashboard3.js"></script>
	
</body>
</html>
