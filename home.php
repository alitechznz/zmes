<?php include "header.php"; ?>
<body class="hold-transition light-skin sidebar-mini theme-primary">
	
<div class="wrapper">

  <?php 
    include "navigator.php"; 
    include "menu.php";
  ?>
  
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container">
		<!-- Main content -->
		<section class="content">
			<div class="row">
			<div class="col-xl-4">
					<a href="#" class="box">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<div>								
									<div class="text-dark font-weight-700 h2 mb-2 mt-5">24</div>
									<div class="font-size-16">New Project</div>
								</div>
								<div class="bg-danger-light rounded-circle h-80 w-80 text-center l-h-100">
									<span class="text-danger font-size-40 icon-Cart2"><span class="path1"></span><span class="path2"></span></span>									
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xl-4">
					<a href="#" class="box">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<div>								
									<div class="text-dark font-weight-700 h2 mb-2 mt-5">810</div>
									<div class="font-size-16">Stakeholder</div>
								</div>
								<div class="bg-warning-light rounded-circle h-80 w-80 text-center l-h-100">
									<span class="text-warning font-size-40 icon-Binocular"></span>									
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xl-4">
					<a href="#" class="box">
						<div class="box-body">
							<div class="d-flex justify-content-between align-items-center">
								<div>								
									<div class="text-dark font-weight-700 h2 mb-2 mt-5">40</div>
									<div class="font-size-16">New Messages</div>
								</div>
								<div class="bg-success-light rounded-circle h-80 w-80 text-center l-h-100">
									<span class="icon-Mail text-success font-size-40"></span>									
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xl-6 col-12">
					<div class="box">
						<div class="box-header no-border">
							<h4 class="box-title">
								Budget Growth
							</h4>
						</div>
						<div class="box-body pt-0">
							<div id="growth"></div>
						</div>
					</div>										
				</div>
				<div class="col-xl-6 col-12">
					<div class="box">		
						<div class="box-header">
							<h4 class="box-title">Team Overview</h4>
						</div>
						<div class="box-body py-0">	
							<div id="chart4" class="h-350 w-p100"></div>
						</div>			
					</div>
				</div>
			
				<div class="col-12">
					<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Project List (Recent) </h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<table id="example5" class="table table-bordered table-striped" style="width:100%">
							<thead>
								<tr>
									
									<th>Sector</th>
									<th>Project</th>
									<th>Sponsor</th>
									<th>Amount</th>
									<th>Start Date</th>
									<th>Expected End Date</th>
									<th>Status</th>
									
								</tr>
							</thead>
							<tbody>
							
								<tr>
									<td>North Unguja</td>
									<td>Fishering</td>
									<td>Green Economics</td>
									<td>SMZ & UN</td>
									<td>$40,345</td>
									<td></td>
									<td><span class="badge badge-primary-light">Approved</span></td>
									
								</tr>
								<tr>
									<td>Unguja</td>
									<td>Tourism</td>
									<td>Promote Tourism for all</td>
									<td>SMZ</td>
									<td>$40,345</td>
									<td></td>
									<td><span class="badge badge-primary-light">Approved</span></td>
									
								</tr>
								<tr>
									<td>Pemba</td>
									<td>Agriculture</td>
									<td>Increasing Cloves</td>
									<td>SMZ</td>
									<td>$40,345</td>
									<td></td>
									<td><span class="badge badge-primary-light">Approved</span></td>
									
								</tr>
								<tr>
									<td>Zanzibar</td>
									<td>Women Agenda</td>
									<td>Women Participation</td>
									<td>UNSF</td>
									<td>$40,345</td>
									<td></td>
									<td><span class="badge badge-primary-light">Approved</span></td>
									
								</tr>
								<tr>
									<td>Unguja</td>
									<td>Tourism</td>
									<td>Promote Tourism for all</td>
									<td>SMZ</td>
									<td>$40,345</td>
									<td></td>
									<td><span class="badge badge-primary-light">Approved</span></td>
									
								</tr>
								<tr>
									<td>Pemba</td>
									<td>Agriculture</td>
									<td>$40,345</td>
									<td>Increasing Cloves</td>
									<td>SMZ</td>
									<td></td>
									<td><span class="badge badge-primary-light">Approved</span></td>
									
								</tr>
								<tr>
									<td>Zanzibar</td>
									<td>Women Agenda</td>
									<td>Women Participation</td>
									<td>UNSF</td>
									<td>$40,345</td>
									<td></td>
									<td><span class="badge badge-primary-light">Approved</span></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
								<th>Sector</th>
									<th>Project</th>
									<th>Sponsor</th>
									<th>Amount</th>
									<th>Start Date</th>
									<th>Expected End Date</th>
									<th>Status</th>
								</tr>
							</tfoot>
						</table>
						</div>
					</div>
					<!-- /.box-body -->
					</div>
					<!-- /.box -->      
				</div> 		

			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
 <?php include "footer2.php"; ?>