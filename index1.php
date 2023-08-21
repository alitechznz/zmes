<!DOCTYPE html>
<html lang="en" style="margin-bottom:0px !important;">
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


</style>



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
                                         $sql ="SELECT * FROM projecttb WHERE pTypeGroup='National'";
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
                                         $sql ="SELECT * FROM agendatb WHERE pTypeGroup='LGA'";
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
									<h5 class="box-title">Stakeholder Overview (Number of Projects)</h5>
									<a href="agendaoverview.php" style="color:red;" id="stackholderoverview">(more info)</a>
								</div>
								<div class="box-body py-0">	
									<div id="chart6" class="h-350 w-p100"></div>
								</div>			
							</div>
						</div>
						<div class="col-xl-6 col-12">
							<div class="box" style="height:600px;">		
								<div class="box-header">
									<h4 class="box-title">Strategies Overview</h4> 
								</div>
								<div class="box-body py-0">	
									<div id="chart3" class="h-350 w-p100" style="height:400px;"></div>
								</div>			
							</div>
						</div>
						<div class="col-xl-6 col-12" >
								
							
								<div class="box" >		
                                    <div class="box-header">
										<h4 class="box-title">Key Indicators Performance</h4>
										<a href="indicatorsoverview.php" style="color:red;" id="agendaoverview">(Click here for more info...!)</a>
									</div>
                                    <div class="box-body py-0">	
											<!-- /.box-header -->
										<div class="box-body analytics-info">
											<div class="demo-radio-button">
												
												<input name="group1" type="radio" id="radio_12"/>
												<label for="radio_12">SDGs</label>
												<input name="group1" type="radio" id="radio_14"/>
												<label for="radio_14">Agenda 2063</label>
											</div>
										</div>
										
										<!--div id="chart1" class="h-500 w-p100"></div>
										<div id="nightingale-chart1" style="height:400px;"></div-->
										<div id="basic-pie" style="height:400px;"></div>
                                    </div>			
                                </div>
						</div>
						<!--div class="col-xxxl-12 col-xl-12 col-12">
							<div class="box">
								<div class="box-header with-border">
									<h4 class="box-title">Project Target Map [Local Government]</h4>
								
								</div>
								<!-- /.box-header >
								<div class="box-body" style="height:600px;">
								
									 <div id="mapid" style="width: 100%; height: 530px; border: 1px solid #ccc"></div>
                                            <script src="dist/leaflet.groupedlayercontrol.min.js"></script>
                                            <script src="dist/leaflet.groupedlayercontrol.min.js.map"></script>
                                            <script src="dist/leaflet-routing-machine.js"></script>
                                            <script src="dist/leaflet.shpfile.js"></script>
                                            <script src="dist/shp.js"></script>
                                            <script src="dist/shp.min.js"> </script>
                                        	<script>
                                        
                                          //-6.1655/39.2033
                                        	var mymap = L.map('mapid').setView([-6.1655,39.2033],8);
                                        	L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?access_token={accessToken}', {
                                        	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                        	maxZoom: 20,
                                        	id: 'mapbox.streets',
                                          accessToken: 'pk.eyJ1IjoiYmluYm9uaXkiLCJhIjoiY2swa2VhdDB0MGl5OTNsbGlnMWduMmd0ZiJ9.XajWTPyAcPtxvcxIVZmg3Q',
                                        }).addTo(mymap);
                                        
                                         
                                          
                                          // add a scale at at your map.
                                          var scale = L.control.scale().addTo(mymap); 
                                        
                                        // Get the label.
                                        var metres = scale._getRoundNum(mymap.containerPointToLatLng([0, mymap.getSize().y / 2 ]).distanceTo( mymap.containerPointToLatLng([scale.options.maxWidth,mymap.getSize().y / 2 ])))
                                          label = metres < 1000 ? metres + ' m' : (metres / 1000) + ' km';
                                        
                                          console.log(label);
                                          
                                             
                                        
                                          //////////////////////////////
                                          
                                          
                                          
                                            var osm = L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"),
                                          
                                          googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{maxZoom: 20,subdomains:['mt0','mt1','mt2','mt3']}),
                                         
                                          
                                          
                                            mqi = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{maxZoom: 20,subdomains:['mt0','mt1','mt2','mt3']});
                                        
                                        var baseMaps = {
                                            "OpenStreetMap": osm,
                                            "GoogleStreets": mqi,
                                        	"Google view": googleStreets
                                        	
                                        		
                                        };
                                        
                                        var overlays =  {//add any overlays here
                                        
                                        
                                        
                                            };
                                        
                                        L.control.layers(baseMaps,overlays, {position: 'topright'}).addTo(mymap);
                                          
                                          
                                          
                                          
                                          
                                        
                                          var north = L.control({position: "bottomleft"});
                                        north.onAdd = function(mymap) {
                                            var div = L.DomUtil.create("div");
                                            div.innerHTML = '<img style="width:20%;margin-left:10%;"src="dist/north5.png">';
                                            return div;
                                        }
                                        north.addTo(mymap);
                                        
                                        
                                        
                                        function popUp(f,l){
                                            var out = [];
                                            if (f.properties){
                                                for(key in f.properties){
                                                    out.push(key+": "+f.properties[key]);
                                                }
                                                l.bindPopup(out.join("<br />"));
                                            }
                                        }
                                        var jsonTest = new L.GeoJSON.AJAX(["dist/zanzibar_ward.geojson","dist/zanzibar_ward.geojson"],{onEachFeature:popUp}).addTo(mymap);
                                        
                                        
                                        var icon = L.divIcon({
                                               
                                               iconSize: [30, 42],
                                               iconAnchor: [15, 42] // half of width + height
                                           });
                                        
                                        icon = L.divIcon({
                                               className: 'custom-div-icon',
                                               html: "<div style='background-color:#00004d;' class='marker-pin'></div><i class='fa fa-home awesome'>",
                                               iconSize: [30, 42],
                                               iconAnchor: [15, 42]
                                           });
                                        
                                           icon1 = L.divIcon({
                                               className: 'custom-div-icon',
                                               html: "<div style='background-color:#ffffff;' class='marker-pin'></div><i class='fa fa-home awesome'>",
                                               iconSize: [30, 42],
                                               iconAnchor: [15, 42]
                                           });
                                        
                                         // mymap.locate();
                                        
                                          function onLocationFound(e) {
                                            var radius = e.accuracy;
                                        
                                            L.marker(e.latlng).addTo(mymap)
                                                .bindPopup("You are within " + radius + " meters from this point").openPopup();
                                        
                                            L.circle(e.latlng, radius).addTo(mymap);
                                        }
                                        
                                        mymap.on('locationfound', onLocationFound);
                                        
                                        function onLocationError(e) {
                                            alert(e.message);
                                        }
                                        
                                        mymap.on('locationerror', onLocationError);
                                        
                                        
                                        </script>
                                        
                                        <script> 
                                         
                                        
                                            var marker = L.marker([-6.1789725,39.2054938],  {icon: icon}).addTo(mymap)
                                          .bindPopup('Ofisi ya ZPC  .<br> VUGA  .<br> ZANZIBAR '
                                          ).openPopup();
                                        
                                        
                                            
                                        	</script> 
                                        
                                            </div>
									
								</div>
								<!-- /.box-body >
							</div-->
							<!-- /.box -->	
						
						<div class="col-xl-12 col-12">
							<div class="box">
								<div class="box-header with-border">
									<h4 class="box-title">Number of Projects</h4>
								</div>
								<div class="box-body">
								    <?php include 'chart.php'; ?>
									<div id="bar-chart_single"></div>
								</div>
							</div>
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
  $(document).ready(function() {
  barChart_single();
 
  $(window).resize(function() {
    window.barChart_single.redraw();
  });

  });

  function barChart_single() {
  window.barChart = Morris.Bar({
    element: 'bar-chart_single',
    data: [
      { y: '2006', a: 100 },
      { y: '2007', a: 75},
      { y: '2008', a: 50},
      { y: '2009', a: 75},
      { y: '2010', a: 50},
      { y: '2011', a: 75},
      { y: '2012', a: 100}
    ],
    xkey: 'y',
    ykeys: 'a',
    labels: 'Series A',
    lineColors: '#1e88e5',
    lineWidth: '3px',
    resize: true,
    redraw: true
  });
}
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
