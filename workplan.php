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
      <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Workplan</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">new</li>
								<li class="breadcrumb-item active" aria-current="page">Workplan</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>	  
		<!-- Main content -->
		<section class="content">
			<div class="row">
            <div class="col-12">
			  <div class="box box-default">
				<div class="box-body">
					 <div class="row">
                         <div class="col-4">
                            <div class="col-lg-12 col-12">
                                <div class="box">
                                <!-- /.box-header -->
                                    <form class="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Plan Description</label>
                                            <textarea rows="5" class="form-control" placeholder="Description..."></textarea>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date:</label>
                                                <input type="date" class="form-control" name="startdate">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End Date:</label>
                                                <input type="date" class="form-control" name="enddate">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
                                        <i class="ti-trash"></i> Clear
                                        </button>
                                        <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-save-alt"></i> Save
                                        </button>
                                    </div>  
                                </form>
                            </div>
                            <!-- /.box -->			
                        </div>  
                         </div>
                         <div class="col-8">
                         <div class="table-responsive">
                                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Agenda</th>
                                                <th>Explaination</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>
                                                <td>North Unguja</td>
                                                <td>Fishering</td>
                                                <td>Green Economics</td>
                                                <td>SMZ & UN</td>
                                                <td><span class="badge badge-primary-light">Approved</span></td>
                                                <td>
                                                     <a href="#" class="btn"><span class="icon-Write"><span class="path1"></span><span class="path2"></span></span></a>
                                                    <a href="#" class="waves-effect waves-light btn btn-danger-light btn-circle"><span class="icon-Trash1 font-size-18"><span class="path1"></span><span class="path2"></span></span></a>
                                                </td>
                                                
                                            </tr>
                                
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Agenda</th>
                                                <th>Explaination</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                         </div>
                     </div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
			<!-- /.col -->

            
            
		</section>
		<!-- /.content -->
	  </div>
  </div>
 <?php include "footer2.php"; ?>