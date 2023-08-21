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
		  <!-- Sidebar toggle button-->
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
								<a href="login.php"  title="User Login" class="btn btn-dark btn-sm btn-outline" style="margin-top: -14px;">
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
                            <a href="login.php"  title="User Login" class="btn btn-dark btn-outline">
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
							<a href="agenda_list.php" class="box bg-danger bg-hover-danger">
								<div class="box-body">
									<span class="text-white icon-Cart2 font-size-40"><span class="path1"></span><span class="path2"></span></span>
									<div class="text-white font-weight-600 font-size-18 mb-2 mt-5">Total Agenda</div>
									 <?php
                                         include 'php/conn.php';
                                         $num = 0;
                                         $status = '';
                                         $sql ="SELECT * FROM agendatb";
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
							<a href="dash_list.php?type ='total'" class="box bg-warning bg-hover-info">
								<div class="box-body">
									<span class="text-white icon-Layout-arrange font-size-40"><span class="path1"></span><span class="path2"></span></span>
									<div class="text-white font-weight-600 font-size-18 mb-2 mt-5">Total Projects</div>
									 <?php
                                         include 'php/conn.php';
                                         $num = 0;
                                         $status = '';
                                         $sql ="SELECT * FROM projecttb";
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
									<div class="text-white font-size-16">Agenda</div>
								</div>
							</a>
						</div>
						<div class="col-xl-3 col-12">
							<a href="national.php" class="box bg-success bg-hover-success">
								<div class="box-body">
									<span class="text-white icon-Equalizer font-size-40"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
									<div class="text-white font-weight-600 font-size-18 mb-2 mt-5">National</div>
									<div class="text-white font-size-16">Agenda</div>
								</div>
							</a>
						</div>
			
                <div class="col-12">

                    <div class="box">
                    <div class="box-header with-border">
                        <?php 
                            $type =" ";
                           
                           echo '<h3 class="box-title">List of Agenda </h3>';
                        ?>
                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Agenda Name</th>
                                    <th>Code No</th>
                                    <th>Description</th>
                                    <th>Start date</th>
                                    <th>Expected End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                     <?php 
                                                include 'php/conn.php';

                                                $query = "SELECT * FROM `agendatb`"; 
                                                $result = mysqli_query($conn, $query) or die("Error : ".mysqli_error($conn));
                                                $num = 0;
                                                  while($row = mysqli_fetch_array($result)) {	
                                                      $num +=1;
                                                    echo "<tr>
                                                            <td>".$num."</td>
                                                            <td>".me_decrypt_data($row['Name'])."</td>
                                                            <td>".me_decrypt_data($row['Code'])."</td>
                                                            <td>".me_decrypt_data($row['Explaination'])."</td>
                                                            <td>".$row['StartDate']."</td>
                                                            <td>".$row['EndDate']."</td>
                                                            <td><span class='badge badge-primary-light'>".me_decrypt_data($row['Status'])."</span></td>
                                                          
                                                          </tr>
                                                        ";
                                                  }


                                                function me_decrypt_data($data_x){
                                                    $ciphering = "AES-128-CTR"; 
                                                    $options = 0; 
                                                    $decryption_iv = '1234567891011121'; 
                                                    $decryption_key = "ZPCME@ali@2020"; 
                                                    $decryption=openssl_decrypt ($data_x, $ciphering, 
                                                            $decryption_key, $options, $decryption_iv); 
                                                    
                                                    return $decryption;
                                                 }
                                                
                                                 
                                             ?>
                              
                            </tbody>
                            <tfoot>
                                <tr>
                                 
                                    <th>S.N</th>
                                    <th>Agenda Name</th>
                                    <th>Code No</th>
                                    <th>Description</th>
                                    <th>Start date</th>
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
		        </div>
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
    
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

	<!-- Power BI Admin App -->
	<script src="main/js/template.js"></script>
    <script src="main/js/demo.js"></script>
    <script src="main/js/pages/data-table.js"></script>
	<script src="main/js/pages/dashboard3.js"></script>
	
</body>
</html>
