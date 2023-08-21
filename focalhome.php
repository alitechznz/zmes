<?php include "header.php"; ?>

<body class="hold-transition light-skin sidebar-mini theme-primary">
	
<div class="wrapper">

  <?php 
    include "navigator.php"; 
    include "menu_focal.php";
  ?>
  
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container">
		<!-- Main content -->
		<section class="content">
			<div class="row">
                        <div class="col-xl-4 col-12">
							<a href="fl_agenda_list.php" class="box bg-success bg-hover-danger">
								<div class="box-body">
									<span class="text-white icon-Cart2 font-size-40"><span class="path1"></span><span class="path2"></span></span>
									<div class="text-white font-weight-600 font-size-18 mb-2 mt-5">Total Project</div>
									<div class="text-white font-size-16">4</div>
								</div>
							</a>
						</div>
						<div class="col-xl-4 col-12">
							<a href="#" class="box bg-warning bg-hover-info">
								<div class="box-body">
									<span class="text-white icon-Layout-arrange font-size-40"><span class="path1"></span><span class="path2"></span></span>
									<div class="text-white font-weight-600 font-size-18 mb-2 mt-5">Finished Projects</div>
									<div class="text-white font-size-16">0</div>
								</div>
							</a>
						</div>
						<div class="col-xl-4 col-12">
							<a href="#" class="box bg-info bg-hover-success">
								<div class="box-body">
									<span class="text-white icon-Equalizer font-size-40"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
									<div class="text-white font-weight-600 font-size-18 mb-2 mt-5">Ongoing Projects</div>
									<div class="text-white font-size-16">0</div>
								</div>
							</a>
						</div>
			
                    <div class="col-xl-12 col-12">
							<div class="box">
								<div class="box-header with-border">
									<h4 class="box-title">Number of Projects Per Year</h4>
								</div>
								<div class="box-body">
									<div id="bar-chart_single"></div>
								</div>
							</div>
                     </div>
                     <div class="col-xl-12 col-12">
                        <div class="box-header with-border">
                             <h4 class="box-title">KeyA Overview</h4>
                        </div>
                        <div class="vtabs">
                            <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home9" role="tab"><span><i class="ion-home mr-15"></i>MKUZA III</span></a> </li>
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile9" role="tab"><span><i class="ion-person mr-15"></i>SDGs</span></a> </li>
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile91" role="tab"><span><i class="ion-person mr-15"></i>Annual Development Plan</span></a> </li>
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile92" role="tab"><span><i class="ion-person mr-15"></i>Agenda 2063</span></a> </li>
                            
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home9" role="tabpanel">
                                    <div class="col-md-12">
                                        <div class="p-15" style="text-align:justify;">
                                          
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile9" role="tabpanel">
                                    <div class="p-15" style="text-align:justify;">
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile91" role="tabpanel">
                                    <div class="p-15" style="text-align:justify;">
                                     
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile92" role="tabpanel">
                                    <div class="p-15" style="text-align:justify;">
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
				
			

			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
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
 <?php include "footer.php"; ?>