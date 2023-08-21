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
				  <h4 class="box-title">International Agenda Overview</h4>
				 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<!-- Nav tabs -->
					<div class="vtabs">
						<ul class="nav nav-tabs tabs-vertical" role="tablist">
							<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile9" role="tab"><span><i class="ion-home mr-15"></i>SDGs</span></a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#agenda2063" role="tab"><span><i class="ion-home mr-15"></i>Agenda 2063</span></a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home9" role="tab"><span><i class="ion-home mr-15"></i>Report(s)</span></a> </li>
                        </ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane" id="home9" role="tabpanel">
                               
							</div>
							<div class="tab-pane active" id="profile9" role="tabpanel">
								<div class="p-15" style="text-align:justify;">
									<h3>ABOUT SDGs</h3>
									<h4>Introduction.</h4>
									<p>	The post-2015 Global development agenda of Sustainable Development Goals (SDGs) was adopted by world leaders in September 2015 during the 70th session of the UN General Assembly. The Revolutionary Government Zanzibar (RGoZ) has been committed to implementing and actively engaged in pursuing and achieving the Global 2030 Agenda of SDGs, Regional and National development agenda in order to bring the state into middle income level parallel with ending all forms of poverty and fighting with violence while ensuring that no one is left behind.
										To meet the commitment of Global 2030 Agenda, more data is needed as an evidence base which enable the Zanzibar Planning Commission (ZPC) to track the progress made towards achieving the targets of MKUZA III and SDGs. Therefore, involvement of all stakeholders including the Government, private sector, civil society organizations (CSOs), and international development partners is needed to smooth the role of ZPC who is responsible for coordinating, implementing and safeguarding of SDGs. 
									</p><br />
								    <h4>
										Mainstreaming SDGs
									</h4>
									<p>
										SDGs have been mainstreamed in the National development plans namely Zanzibar Vision 2020 which is implemented through successive short-term plans of five years period. Therefore, implementation of SDGs is realized through implementation of these short term plans currently known as MKUZA III. 
									</p>
									<div class="row">
										<div class="col-7">
											<h4>Efforts</h4>
											<p>
												Several efforts have been undertaken for mainstreaming the SDGs including:
											</p>
											<ul>
												<li>Domestication of SDGs indicators</li>
												<li>Undertaking the assessment for availability of SDGs data reporting</li>
												<li>Undertaking assessment of national capacity to produce data for SDGs reporting (public and private institutions)</li>
												<li>Adaptation of metadata for SDGs indicators</li>
												<li>Adoption of Advanced Data Planning Tool (ADAPT) </li>
											</ul>
											
										</div>
										<div class="col-5">
											<img src="images/SDG.jpg" style="width:100%;"/>
										</div>
									</div>
									<p>Currently, Zanzibar adopt 190 SDGs indicators whereby 156 indicators don’t have baseline data yet and 34 indicators have at least baseline data but not in the required disaggregation level. OCGS with the support of UNDP realized that there is no data for monitoring SDGs from Private Sectors while for Government Entities data are not uniform and have a number of shortcomings including lack of proper data collection tools. Also, under the support of UNFPA, OCGS adapted metadata for 78 SDGs indicators and succeeded to improve the metadata for MKUZA III and have been already entered in the Advanced Data Planning Tool for mapping process. These will results to data roadmap for SDGs monitoring. </p>
								</div>
							</div>
							<div class="tab-pane" id="messages9" role="tabpanel">
								<div class="p-15" style="text-align:justify;">
									<h3>ABOUT Agenda 2020</h3>
                                    <h4>Introduction.</h4>
								</div>
							</div>
							<div class="tab-pane" id="agenda2063" role="tabpanel">
							<div class="p-15" style="text-align:justify;">
									<h3>ABOUT AGENDA 2063</h3>
									<h4>Introduction.</h4>
									<p>	Agenda 2063 have been adopted in the Summit of the African Union (AU) in Addis Ababa, Ethiopia in the year 2013. Head of States and Government at their 50th Anniversary Solemn Declaration laid down a vision for Africa they want to see in the next half a century.  The Africa We Want, is the blueprint of continental socio-economic and political transformation. Agenda 2063 is an Investment opportunities and Global interest in Africa that need to Capitalize on. Agenda 2063 are new phenomenon to most of member’s state, unlike Global Agenda 2030 which is commonly known, and a lot of efforts have been done to make sure it understandable. Many African countries haven’t done localisation and domestication of Agenda 2063 as compared with SDGs. One of the key strategies for Implementing Agenda 2063 for the African countries is to internalize, mainstream the Agenda 2063 into National Development Policy and Planning Instruments. 
									</p>
									<p>
									    The Domestication and harmonization of the Agenda 2063 has come to right time as the African Union Development Agency and the African Union Commission convened a meeting among all Member States to discussion the development of a Comprehensive Progress Report on the Implementation of the First Ten Years Implementation of Agenda 2063 by using VNRs reports already presented in the HLPFs’. The meeting has also called up on all member states to conduct domestication, harmonization and awareness creation sessions of Africa’s transformative agenda 2063 in their respective countries.
									</p>
									<br />
								    <h4>
									Mainstreaming of Agenda 2063 and Agenda 2030
									</h4>
									<p>
										The United Republic of Tanzania has mainstreamed the SDGs whose goals relate with Agenda 2063 in national development frameworks, particularly through the medium-term planning frameworks, that is, FYDP II and MKUZA III.   The Agenda 2063 (The Africa We Want) and the launching of the Sustainable
Development Goals (SDGs), translate into a unique possibility for Zanzibar/Tanzania   to align its   ambitions with regional and global development goals.  

									</p>
									<div class="row">
										<div class="col-7">
											
											<p>
											Zanzibar Strategy for Growth and Reduction of Poverty III   has outlined the development aspirations of the Revolutionary Government of Zanzibar in the next five years. The aspirations are structured along the mentioned five Key Results Areas (KRAs) that are targeted by interventions that will be pursued. These are Economic growth, Human capital, Services, Environment and Governance.  In all areas, Zanzibar has a number of policies, strategies which have impacts to all Agenda 2063/SDGs.
											</p>
										
										</div>
										<div class="col-5">
											<img src="images/agenda2063.jpg" style="width:100%;"/>
										</div>
									</div>
									
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
 <?php 
   include 'dash_footer.php';
 ?>

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
    
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  
	<!-- Power BI Admin App -->
	<script src="main/js/template.js"></script>
    <script src="main/js/demo.js"></script>
    <script src="main/js/pages/data-table.js"></script>
	<script src="main/js/pages/dashboard3.js"></script>
	
</body>
</html>
