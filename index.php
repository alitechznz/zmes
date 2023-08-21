<?php
// Start the session
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>
<!DOCTYPE html>
<html lang="en" style="margin-bottom:0px !important;">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/smz-trans.png">

    <title>ZMES</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="main/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="main/css/style.css">
	<link rel="stylesheet" href="main/css/skin_color.css">

	<link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
   
   <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
   
<script type="text/javascript" src="dist/leaflet.ajax.min.js"></script>
<style>

 #mapid { height: 530px;
          width:567px; }
.b:hover {
  text-shadow: 0 0 10px rgba(255,255,255,1) , 0 0 20px rgba(255,255,255,1) , 0 0 30px rgba(255,255,255,1) , 0 0 40px #00ffff , 0 0 70px #00ffff , 0 0 80px #00ffff , 0 0 100px #00ffff ;
}

.marker-pin {
  width: 30px;
  height: 30px;
  border-radius: 50% 50% 50% 0;
  background: #c30b82;
  position: absolute;
  transform: rotate(-45deg);
  left: 50%;
  top: 50%;
  margin: -15px 0 0 -15px;
}

.marker-pin::after {
    content: '';
    width: 24px;
    height: 24px;
    margin: 3px 0 0 3px;
    background: #fff;
    position: absolute;
    border-radius: 50%;
 }


.custom-div-icon i {
   position: absolute;
   width: 22px;
   font-size: 22px;
   left: 0;
   right: 0;
   margin: 10px auto;
   text-align: center;
}

.custom-div-icon i.awesome {
    margin: 12px auto;
    font-size: 17px;
 }
</style>	
	<style>
  .morris-hover {
  position:absolute;
  z-index:1000;
}


.morris-hover.morris-default-style {     border-radius:10px;
  padding:6px;
  color:#666;
  background:rgba(255, 255, 255, 0.8);
  border:solid 2px rgba(230, 230, 230, 0.8);
  font-family:sans-serif;
  font-size:12px;
  text-align:center;
}

.morris-hover.morris-default-style .morris-hover-row-label {
  font-weight:bold;
  margin:0.25em 0;
}

.morris-hover.morris-default-style .morris-hover-point {
  white-space:nowrap;
  margin:0.1em 0;
}

svg { width: 100%; }

.mydiv {
    visibility:hidden;
}

#chartdiv {
  width: 100%;
  height: 500px;
}

#chartdivlist {
  width: 100%;
  height: 350px;
}

#chartdivkey{
  height: 300px;
}

#chartdivkey1 {
  height: 300px;
}

#chartdivthreebar {
  width: 100%;
  height: 360px;
}

</style>

<!-- Resources -->
<!--script src="morris/amcharts/charts.js"></script>
<script src="morris/amcharts/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/plugins/sunburst.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script-->

<script src="morris/amcharts/core.js"></script>
<script src="morris/amcharts/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/plugins/sunburst.js"></script>
<script src="morris/amcharts/animated.js"></script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".boxkey").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  <header class="main-header" >
	
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-10" style="margin-left:20px !important;">
		<div class="container" style="max-width:1450px !important;">
		  <!-- Sidebar toggle button-->
		  <div class="app-menu">
			<ul class="header-megamenu nav">
				<li class="btn-group nav-item d-md-none">
					<div class="row">
						<div class="col-xl-4 col-md-4 col-4">
							<img src="images/smz-trans.png" style="width:99%; margin-top:20px;" />
						</div>
						<div class="col-xl-8 col-md-8 col-8">
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
                            <a href="http://www.zmes.planningznz.go.tz/index.php"  title="User Login" class="btn btn-primary">
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
			<?php include 'getmiradi.php'; ?>
			<div class="row">
				
				<div class="col-xl-3 col-12">
					<div class="box box-bordered border-primary">
						<div class="box-header with-border">
							<h4 class="box-title"><strong>WELCOME TO THE</strong> ZPC-M&E</h4>
						</div>
						<div class="box-body" style="text-align:justify;">
							<p>The RGoZ has implemented various development programmes and projects that address the problem of poverty and hunger in Zanzibar. The instruments to guide the poverty interventions have been put in place to facilitate the policy framework for economic and social transformation. More specifically the RGoZ has formulated the Strategy to put innovative actions for the implementation of various interventions so as to increase production and productivity, rural incomes, attaining national and household food security, and support overall economic growth through the implementation of SDGs. </p>
							<p>Zanzibar has established an effective M&E system, which tracks the progress of implementation and attainment of the planned results of ZSGRP, SDGs, and agenda 2063 for Africa over a period of time.</p>
							<p>. This is being done through a set of indicators and targets stipulated in the ZSGRP III M&E framework. The M&E Department of the ZanzibarPlanning Commission is in place and responsible for the coordination and linkages of various stakeholders in M&E of ZSGRP, SDGs and agenda 2063 for Africa, as well as identifying, adopting and approving national development key priority areas; and calling for, from any institution, any information, representation or data relating to matters of monitoring and evaluation. </p>
							<p>The overall objective of the assignment is to design, install and populate an electronic and operational M&E system with web-based database for National and International Strategies at the Zanzibar Planning Commission. </p>
							<hr />
							<h3>
								<code>ABOUT OUR DASHBOARD:</code>
							</h3>
							<p>●	Provide stakeholders with an efficient way to enter, store, retrieve and analyze ZSGRP, SDGs, and agenda 2063 data at all times, and avoids disjointed processes and inaccuracies.</p>
						    <p>●	Capture ZSGRP, SDGs and agenda 2063 data and Output Monitoring forms, surveys and researches that are periodically submitted to ZPC, </p>
						    <p>●	Capture and record detailed activity level indicators and financial data about each of the SDGs and MKUZA projects that the RGoZ and Development Partners’ funds, as part of ZPC’s resource tracking process</p>
						    <p>●	Track the data entrance process and progress with and funding for all data sources in the National M&E framework of the MKUZA and SDGs </p>
							<p>●	Store details about all MKUZA, SDGs and agenda 2063 key performance indicators, as per the indicators defined in the National M&E framework of the MKUZA and SDGs</p>
						    <p>●	Capture and update an inventory (directory) of socio-economic related research in Zanzibar undertaken by researchers, private sectors, academic institutions, Zanzibar M&E associations and research institutions that have undertaken MKUZA and SDGs</p>
						    <p>●	Store relevant details about all MKUZA III and SDGs documentation (knowledge sharing) kept in the ZPC’s documentation center and its website,</p>
							<p>●	Capture and update an inventory (directory) of socio-economic related research in Zanzibar undertaken by researchers, private sectors, academic</p>
						</div>
					</div>
				</div>
				<div class="col-xl-9 col-12">
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
					
						<div class="col-xl-12 col-12">
							<div class="box">		
								<div class="box-header">
									<div class="row">
										<div class="col-xl-6 col-12">
											<h5 class="box-title">Annual Development Plan Financial Performance</h5>
										</div>
										<div class="col-xl-3 col-12">
											<!-- Button trigger modal -->
											<!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
													Abbreviation
											</button-->
											<button class="btn btn-primary btn-sm viewabb btn-flat">
												<i class="glyphicon glyphicon-zoom-in"></i>Check Abbreviation
											</button>
										</div>
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
								<div class="box-body py-0">	
									<!-- HTML -->
									<div id="chartdiv"></div>
								</div>			
							</div>
						</div>

						<div class="col-xl-6 col-12">
							<div class="box"  style="height:500px;"	>	
								<div class="box-header">
									<h4 class="box-title">Strategies Overview</h4> 
								</div>
								<div class="box-body py-0">	
									<div id="chart3" class="h-350 ws-p100"></div>
								</div>			
							</div>
						</div>

						<div class="col-xl-6 col-12" >
							<div class="box" style="height:500px;">		
                                <div class="box-header">
									<h4 class="box-title">Key Indicators Performance</h4>
									
								</div>
								<?php
                                         include 'php/conn.php';
                                         $num = 0;
                                         $strategy=array();
										 $strategy_id=array();

                                         $sql1 ="SELECT * FROM `agendatb` WHERE `Status`='Active'";
                                         $result = mysqli_query($conn, $sql);
                                         while($row = mysqli_fetch_array($result)){
											$strategy[$num] = $row['Code'];
											$strategy_id[$num] = $row['ID'];
                                             $num +=1;
                                         }
                                         
                                ?>
                                <div class="box-body py-0">	
									<div class="box-body analytics-info">
										<div class="demo-radio-button">
											<?php 
											    // for($x = 0; $x <= count($strategy); $x++) {
												// 	echo $strategy[$x+1];
												// 	if($x == 0){
												// 		echo '
												// 			<input name="group1" type="radio" value="'.$strategy[$x].'" id="radio_'.$x.'" checked/>
												// 			<label for="radio_'.$x.'">'.$strategy[$x].'</label>
												// 	      ';
												// 	} else {
												// 		echo '
												// 			<input name="group1" type="radio" value="'.$strategy[$x].'" id="radio_'.$x.'" />
												// 			<label for="radio_'.$x.'">'.$strategy[$x].'</label>
												// 	      ';
												// 	}
														
												// }
											?>
											<div class="col-6">
												<input name="group1" type="radio" value="SDGs" id="radio_12" checked/>
												<label for="radio_12">SDGs</label>
											</div>
											<div class="col-6">
												<input name="group1" type="radio" value="Agenda2063" id="radio_14"/>
												<label for="radio_14">Agenda 2063</label>
											</div>
											<!-- <div class="col-6">
												<input name="group1" type="radio" value="AnnualDevelopment" id="radio_15"/>
												<label for="radio_15">Annual Development</label>
											</div> -->
										</div>
									</div>
										<!-- HTML -->
									<div id="chartdivkey" class="SDGs boxkey"></div>
									<div id="chartdivkey1" class="Agenda2063 boxkey"></div>
 
                                </div>			
                            </div>
						</div>
						
						<div class="col-xxxl-12 col-xl-12 col-12">
							<div class="box">
								<div class="box-header with-border">
									<div class="row">
										<div class="col-xl-8 col-12">
											<h5 class="box-title">Number of Projects by Financier</h5>
										</div>
										
									</div>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<!-- HTML -->
									<div id="chartdivthreebar"></div>
								</div>
								<!-- /.box-body -->
						    </div>
							<!-- /.box -->	
						</div>
					
						<div class="col-xl-8 col-12">
							<div class="box">
								<div class="box-header with-border">
									<h4 class="box-title">Recent Publication(s)</h4>
								</div>
								<div class="box-body" style="height:170px;">
								      <p>
								          <a href="php/file/SDGs Implementation 1.pdf" download>SDGs Implementation 1</a>
								          <img class ="newimg blinkaa" src="images/new4.gif" />
								      </p>
								      <p>
								          <a href="php/file/SDGs Roadmap 1.pdf" download>SDGs Roadmap 1</a>
								          <img class ="newimg blinkaa" src="images/new4.gif" />
								      </p>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-12">
							<div class="box">
								<div class="box-header with-border">
									<h4 class="box-title">Total Visitors</h4>
								</div>
								<div class="box-body" style="height:170px;">
								   
								    <a href="https://info.flagcounter.com/SWsg"><img src="https://s05.flagcounter.com/count/SWsg/bg_FFFFFF/txt_000000/border_CCCCCC/columns_4/maxflags_18/viewers_0/labels_0/pageviews_1/flags_0/percent_0/" alt="Flag Counter" border="0" style="margin-top:-15px;"></a>
								</div>
							</div>
						</div>

						<!-- Modal -->
						<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">List of the Institution Abbreviation </h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
								<div class="modal-body" id="getabbreviation">
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<!--button type="button" class="btn btn-primary">Save changes</button-->
								</div>
								</div>
							</div>
						</div>
						
						<!--div class="col-xl-12 col-12">
							<div class="box">
								<div class="box-body">
									<h4 class="box-title">Number of Projects</h4>
									<ul class="list-inline text-center mt-40">
										<li>
											<h5><i class="fa fa-circle mr-5 text-success"></i>Data 1</h5>
										</li>
										<li>
											<h5><i class="fa fa-circle mr-5 text-info"></i>Data 2</h5>
										</li>
										<li>
											<h5><i class="fa fa-circle mr-5 text-warning"></i>Data 3</h5>
										</li>
									</ul>
									<div id="area-chart3"></div>
								</div>
							</div>
						</div-->
					
					</div>
				</div>
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
	
<script>
	/*
  $(document).ready(function() {
  	barChart_single();
 
	$(window).resize(function() {
		window.barChart_single.redraw();
	});
  });

*/

var overview_var='';
$(document).ready(function(){
	$("#chartdivkey1").hide();	
	var strbyid = document.getElementById("overview").value;
	//alert(strbyid);
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               // document.getElementById("chartdiv").innerHTML = this.responseText;
			   var data_get = this.responseText;
			//alert(data_get);
				overview_var = this.responseText;
			  //var tcode = <?php //echo $taasisi_code; ?>
			 // alert(overview_var);
            }
        };
        xmlhttp.open("GET", "getoverview.php?budget=" + strbyid, true);
        xmlhttp.send();
})

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
				chart.responsive.enabled = true;
				chart.responsive.rules.push({
                  relevant: function(target) {
                    return false;
                  },
                  state: function(target, stateId) {
                    return;
                  }
                });

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
		xmlhttp.open("GET", "getoverview.php?budget=" + str, true);
		xmlhttp.send();
		}); // end am4core.ready()
    }
}

/*
<!-- Chart code -->
<!-- Chart code -->
*/

am4core.ready(function() {
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end
var chart = am4core.create("chartdivkey", am4charts.PieChart3D);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
chart.responsive.enabled = true;
chart.data = [
  {
    country: "Goal 1",
    litres: 501.9
  },
  {
    country: "Goal 2",
    litres: 301.9
  },
  {
    country: "Goal 3",
    litres: 201.1
  },
  {
    country: "Goal 4",
    litres: 165.8
  },
  {
    country: "Goal 5",
    litres: 139.9
  },
  {
    country: "Goal 6",
    litres: 128.3
  }
];

chart.innerRadius = am4core.percent(40);
chart.depth = 120;

chart.legend = new am4charts.Legend();

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "litres";
series.dataFields.depthValue = "litres";
series.dataFields.category = "country";
series.slices.template.cornerRadius = 5;
series.colors.step = 3;

}); // end am4core.ready()

//<!-- Chart code -->

am4core.ready(function() {
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end
var chart = am4core.create("chartdivkey1", am4charts.PieChart3D);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
chart.responsive.enabled = true;
chart.data = [
  {
    country: "Goal 1",
    litres: 501.9
  },
  {
    country: "Goal 2",
    litres: 301.9
  },
  {
    country: "Goal 3",
    litres: 201.1
  },
  {
    country: "Goal 4",
    litres: 165.8
  },
  {
    country: "Goal 5",
    litres: 139.9
  },
  {
    country: "Goal 6",
    litres: 128.3
  }
];

chart.innerRadius = am4core.percent(40);
chart.depth = 120;

chart.legend = new am4charts.Legend();

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "litres";
series.dataFields.depthValue = "litres";
series.dataFields.category = "country";
series.slices.template.cornerRadius = 5;
series.colors.step = 3;

}); // end am4core.ready()

//<!-- Chart code -->
am4core.ready(function() {
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end
var data = [];

var value1 = 0;
var value2 = 0;
var value3 = 0;

var strbyid = document.getElementById("overview").value;
//alert(strbyid);
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

		//alert(idadi);
		//alert(taasisi);
		//alert(planpesa);
		//alert(releasepesa);

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
		
		//alert(taasisiArray);
        /*
		var names = ["Raina",
		"Demarcus",
		"Carlo",
		"Jacinda",
		"Richie",
		"Antony",
		"Amada",
		"Idalia",
		"Janella",
		"Marla",
		"Curtis",
		"Shellie",
		"Meggan",
		"Nathanael",
		"Jannette",
		"Tyrell",
		"Sheena",
		"Maranda",
		"Briana"
		];
		*/
		for (var i = 0; i < taasisiArray.length; i++) {
		//value1 += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 5);
		//value2 += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 5);
		//alue3 += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 5);

		value1 = myarr_planpesa[i];
		value2 = myarr_idadi[i];
		value3 = myarr_releasepesa[i];
		data.push({ category: taasisiArray[i], value1: value1, value2:value2, value3:value3 });
		//alert(data);
		}

		//alert(data);

		//data = { category:"WEMA", value:12, value2:90, value3:70 },{ category:"WEMA 2", value:50, value2:30, value3:30 };

		var interfaceColors = new am4core.InterfaceColorSet();
		var chart = am4core.create("chartdiv", am4charts.XYChart);
		//alert(overview_var);
		//data = overview_var;

		//var datas = [{ category:ORMBLM, value1:2, value2:1, value3:99 }, { category:OMPR, value1:8, value2:0, value3:13 }];

		chart.data = data;
		// the following line makes value axes to be arranged vertically.
		chart.bottomAxesContainer.layout = "horizontal";
		chart.bottomAxesContainer.reverseOrder = true;
		chart.responsive.enabled = true;

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
xmlhttp.open("GET", "getoverview.php?budget=" + strbyid, true);
xmlhttp.send();



}); // end am4core.ready()
</script>

<script>

$("body").on("click", ".viewabb", function(e){
    e.preventDefault();
	$('#exampleModalLong').modal('show');
    getRow();
  });

function getRow(){
	var str = document.getElementById("overview").value;
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               document.getElementById("getabbreviation").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getabbreviation.php?budget="+str, true);
        xmlhttp.send();
}

</script>
<!-- Chart code -->
<script>
am4core.ready(function() {
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end
var chart = am4core.create('chartdivthreebar', am4charts.XYChart)
//chart.colors.step = 2;
chart.colors.list = [
  am4core.color("#3CB371"),
  am4core.color("#FFD700"),
  am4core.color("#7B68EE"),
  am4core.color("#FF9671"),
  am4core.color("#FFC75F"),
  am4core.color("#F9F871")
];
chart.legend = new am4charts.Legend()
chart.legend.position = 'top'
chart.legend.paddingBottom = 20
chart.legend.labels.template.maxWidth = 95

chart.responsive.enabled = true;


var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
xAxis.dataFields.category = 'category'
xAxis.renderer.cellStartLocation = 0.1
xAxis.renderer.cellEndLocation = 0.9
xAxis.renderer.grid.template.location = 0;

var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
yAxis.min = 0;

function createSeries(value, name) {
    var series = chart.series.push(new am4charts.ColumnSeries())
    series.dataFields.valueY = value
    series.dataFields.categoryX = 'category'
    series.name = name

    series.events.on("hidden", arrangeColumns);
    series.events.on("shown", arrangeColumns);

    var bullet = series.bullets.push(new am4charts.LabelBullet())
    bullet.interactionsEnabled = false
    bullet.dy = 30;
    bullet.label.text = '{valueY}'
    bullet.label.fill = am4core.color('#fffffd')

    return series;
}
/*
chart.data = [
    {
        category: 'Place #1',
        first: 40,
        second: 55,
        third: 60
    },
    {
        category: 'Place #2',
        first: 30,
        second: 78,
        third: 69
    },
    {
        category: 'Place #3',
        first: 27,
        second: 40,
        third: 45
    },
    {
        category: 'Place #4',
        first: 50,
        second: 33,
        third: 22
    }
]
*/
chart.data = [<?php echo $chart_data_d2; ?> ]

createSeries('first', 'Revolutional Government of Zanzibar, RGoZ');
createSeries('second', 'Development Partners, DPs');
createSeries('third', 'RGoZ & DPs');

function arrangeColumns() {

    var series = chart.series.getIndex(0);

    var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
    if (series.dataItems.length > 1) {
        var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
        var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
        var delta = ((x1 - x0) / chart.series.length) * w;
        if (am4core.isNumber(delta)) {
            var middle = chart.series.length / 2;

            var newIndex = 0;
            chart.series.each(function(series) {
                if (!series.isHidden && !series.isHiding) {
                    series.dummyData = newIndex;
                    newIndex++;
                }
                else {
                    series.dummyData = chart.series.indexOf(series);
                }
            })
            var visibleCount = newIndex;
            var newMiddle = visibleCount / 2;

            chart.series.each(function(series) {
                var trueIndex = chart.series.indexOf(series);
                var newIndex = series.dummyData;

                var dx = (newIndex - trueIndex + middle - newMiddle) * delta

                series.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                series.bulletsContainer.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
            })
        }
    }
}

}); // end am4core.ready()
</script>

	<!-- Vendor JS -->
	<script src="main/js/vendors.min.js"></script>
	<script src="assets/icons/feather-icons/feather.min.js"></script>	
	<script src="assets/vendor_components/echarts/dist/echarts-en.min.js"></script>
	<script src="assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="assets/vendor_components/gmaps/gmaps.min.js"></script>
	<script src="assets/vendor_components/gmaps/jquery.gmaps.js"></script>
    
	<!-- Power BI Admin App -->
	<script src="main/js/template.js"></script>
	<script src="main/js/demo.js"></script>
	<script src="main/js/pages/echart-pie-doghnut.js"></script>
	<script src="main/js/pages/echart-pie-1.js"></script>
	<script src="main/js/pages/echart-pie-2.js"></script>
	<script src="main/js/pages/echart-pie-3.js"></script>
	<script src="main/js/pages/dashboard3.js"></script>
	
	
</body>
</html>
